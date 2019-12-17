const init = (function(window, undefined) {
	
	function test(root, opts) {
		const self = this;
				
		self.id    = Date.now();
		self.rOk   = 0;
		self.rFail = 0;
		self.root  = root;
		
		opts.preguntas.sort(function() { return Math.random() - 0.5; });
		self.preguntas = opts.preguntas.slice(0, opts.cantidadAPreguntar);
				
		root.appendChild(document.createElement('header'))
		    .appendChild(document.createElement('h1'))
				.innerText = opts.titulo;
				
		var art = root.appendChild(document.createElement('article'));
		
		art.appendChild(document.createElement('label'));
		art.appendChild(document.createElement('select'));
		art.appendChild(document.createElement('button'))
			 .innerText = "Siguiente";
		
		self.root.querySelector('button').addEventListener('click', function() {
			self.siguiente();			
		});
		
		self.siguiente();
		
		self.timer = setTimeout(function() { self.preguntas.push({}); self.finalizar(); }, 1000 * Number(opts.tiempoDeTrabajo));
	}

	test.prototype.finalizar = function() {
		const self = this;
		
		clearTimeout(self.timer);
		
		self.root.querySelector('article').innerHTML = 	'<ul>' +
																											'<li><strong>Correctas:</strong> ' + self.rOk +
																											'<li><strong>Incorrectas:</strong> ' + self.rFail +
																											'<li><strong>Realizadas:</strong> ' + (self.rOk + self.rFail) +
																											'<li><strong>Faltantes:</strong> ' + self.preguntas.length +
																										'</ul>';
	}

	test.prototype.siguiente = function() {
		const self = this;
						
		if (self.root.querySelector('select').value == 1) {
			self.rOk++;
		}
		
		if (self.root.querySelector('select').value == -1) {
			self.rFail++;
		}
		
		if (self.preguntas.length == 0) {
			return self.finalizar();
		}
		
		var p = self.preguntas.shift();
		
		self.root.querySelector('label').innerHTML = p.pregunta;
		self.root.querySelector('select').innerHTML = '<option' + p.respuestas
																															 .map(function(txt, id) { 
																																	return ' value="' + (p.correctas.indexOf(id) == -1 ? -1 : 1) + '">' + txt; 
																																})
																																.join('</option><option') + '</option>';
	}

	return function init(root, opts) {
		var t = new test(root, opts);
	}
})(window);