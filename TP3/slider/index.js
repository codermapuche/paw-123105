const init = (function(window, undefined) {
	
	function loadImage(cb) {
		return function (url, idx) {			
			var xhr = new XMLHttpRequest(),
					img = new Image();

			xhr.open('GET', url, true);
			xhr.responseType = 'arraybuffer';

			xhr.onprogress = function(ev) {
				if (ev.lengthComputable) {
					cb(idx, parseInt((ev.loaded / ev.total) * 100));
				}
			}

			xhr.onloadend = function() {
				if (!xhr.status === 200) {
					throw new Error('Image cannot be load: ' + url);
				}
				
				var options = {},
						headers = xhr.getAllResponseHeaders(),
						m = headers.match(/^Content-Type\:\s*(.*?)$/mi);

				if (m && m[1]) {
					options.type = m[1];
				}
				
				img.onload = function () {
					// At this time, the browser has a local copy of image.
					cb(idx, 100);
				}
			}

			xhr.send();
		}
	}

	function slider(root, imgs) {
		const self = this;
		
		self.id = Date.now();
		self.display = root.appendChild(document.createElement('article'));
		self.speed = 6;
		self.current = 0;
		
		var left = new Array(imgs.length).fill(100);
		
		function updProgress(idx, ratio) {
			left[idx] = (100 - ratio);
			var allLoads = (imgs.length * 100),
					wait = allLoads - left.reduce(function(s, p) { return s + p; }, 0);
					
			wait = Math.floor(wait * 100 / allLoads);
			
			if (wait == 100) {
				delete self.display.dataset.load;
				buildSlider();
			} else {
				self.display.dataset.load = wait + '%';			
			}
		}
		
		function buildSlider() {			
			self.nav = root.appendChild(document.createElement('nav'));
			
			self.display.innerHTML = (new Array(imgs.length)).fill('')
					.map(function(_, idx) {
						return 	'<input type="radio" name="slider-' + self.id + '" id="slider-' + self.id + '-' + idx + '" ' + (idx == 0 ? 'checked' : '') + '>' +							
										'<div style="background-image:url(\'' + imgs[idx] + '\')"></div>';
					})
					.join('');
						
			(function() {
				var dots = self.nav.appendChild(document.createElement('ul'));
				dots.classList.add('dots');
				dots.innerHTML = (new Array(imgs.length)).fill('').map(function(_, idx) { return '<li><label for="slider-' + self.id + '-' + idx + '"></label></li>'; }).join('');
			})();
			
			(function() {
				var thumbs = self.nav.appendChild(document.createElement('ul'));
				thumbs.classList.add('thumbs');
				thumbs.innerHTML = (new Array(imgs.length)).fill('').map(function(_, idx) { return '<li><label for="slider-' + self.id + '-' + idx + '" style="background-image:url(\'' + imgs[idx] + '\')"></label></li>'; }).join('');
			})();
			
			(function() {
				var arrows = self.nav.appendChild(document.createElement('ul'));
				arrows.classList.add('arrows');
				arrows.innerHTML = (new Array(2)).fill('<li></li>').join('');
				arrows.querySelector('li:first-child').addEventListener('click', function() { self.prev(); });
				arrows.querySelector('li:last-child').addEventListener('click', function() { self.next(); });
			})();		
			
			(function() {
				document.addEventListener("keypress", function (e) {
					switch (e.keyCode) {
						case 37:
							self.prev();
							break;
						case 39:
							self.next();
							break;
					}
				});
			})();			
			
			function currentDeFacto() {
				var curr = Number(self.display.querySelector('input:checked').id.split('-').pop());				
				if (curr != self.current) { 
					self.current = curr; 
					return true; 
				}
				
				return false;
			}
			
			self.next = function (timer) {
				if (currentDeFacto()) { return; }
				
				if (self.current == imgs.length - 1) {
					self.current = 0;
				} else {
					self.current++;
				}
				
				self.display.querySelector('#slider-' + self.id + '-' + self.current).checked = true;
				skip = timer ? false : true;
			}
			
			self.prev = function () {	
				if (currentDeFacto()) { return; }
				
				if (self.current == 0) {
					self.current = imgs.length - 1;
				} else {
					self.current--;
				}
				
				self.display.querySelector('#slider-' + self.id + '-' + self.current).checked = true;
				skip = true;
			}
			
			var skip = false;
			setInterval(function() { 
				if (skip) { skip = false; return; }
				self.next(true); 
			}, self.speed * 1000);
		}
		
		imgs.forEach(loadImage(updProgress));
	}

	return function init(root, imgs) {
		var sl = new slider(root, imgs);
	}
})(window);