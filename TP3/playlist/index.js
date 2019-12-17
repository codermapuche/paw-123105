const init = (function(window, undefined) {
	
	function test(root, opts) {
		const self = this;
				
		self.id       = Date.now();
		self.playlist = opts;
		
		self.video = root.appendChild(document.createElement('article'))
										 .appendChild(document.createElement('div'))
										 .appendChild(document.createElement('video'));
										 
		root.appendChild(document.createElement('nav'))
				.appendChild(document.createElement('ul'))
				.innerHTML = self.playlist.map(function(v) { return '<li><a href="'+v.path+'" data-path="'+v.path+'">' + v.title + '</a></li>'; }).join('');
		
		
		Array.prototype.slice.apply(root.querySelectorAll('nav a'))
			.forEach(function(a) {
				a.addEventListener('click', function(e) {
					e.preventDefault();
					self.play(this.dataset.path);
				})
			});
		
		var current = 0;
		
		self.play = function(url) {
			self.video.src = url;
			self.video.play();
			current = self.playlist.map(function(v){ return v.path; }).indexOf(url);
		}
				
    self.video.addEventListener('ended',function() {
			if (current < self.playlist.length - 1) {
				current++;
				self.play(self.playlist[current].path);
			}
		},false);
	}

	return function init(root, opts) {
		var t = new test(root, opts);
	}
})(window);