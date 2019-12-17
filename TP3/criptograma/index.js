const init = (function(window, undefined) {
	
	var frases = [
		'NO SE TRATA DE SI TE DERRIBAN, SE TRATA DE SI TE LEVANTAS.',
		'EL EXITO ES IR DE FRACASO EN FRACASO SIN PERDER EL ENTUSIASMO.',
		'NO TENER TIEMPO ES UNA EXCUSA PARA NO COMPROMETERSE.',
		'LA INDECISION ES EL LADRON DE LA OPORTUNIDAD.',
		'NO SOY PRODUCTO DE MIS CIRCUNSTANCIAS. SOY PRODUCTO DE MIS DECISIONES.',
		'LO QUE NO SE EMPIEZA NUNCA TENDRA UN FINAL.',
		'EL COSTE DE ESTAR EQUIVOCADO ES PEOR QUE EL DE NO HACER NADA.',
		'SE PUEDE TENER TODO EN LA VIDA, PERO NO TODO AL MISMO TIEMPO.',
	]
	
	var reemplazos = [
		'A|B|C|D|E|F|G|H|I|J|K|L|M|N|O|P|Q|R|S|T|W|X|Y|Z|a|b|c|d|e|f|g|h|i|j|k|l|m|n|o|p|q|r|s|t|w|x|y|z'.split('|'),		'\u03FC|\u03F5|\u03F9|\u03DC|\u03E5|\u03CA|\u03CD|\u03CC|\u03F0|\u03CE|\u03E8|\u03F4|\u03D1|\u03DB|\u03A1|\u03E2|\u03AD|\u0398|\u03BD|\u03C1|\u03D6|\u03B2|\u0396|\u03B0|\u039C|\u03B1|\u03C5|\u03D7|\u03EE|\u03A8|\u039D|\u03AA|\u0395|\u03E4|\u039A|\u03B8|\u03BF|\u03AF|\u03EB|\u03DE|\u03D8|\u03A9|\u03F6|\u0399|\u03ED|\u03C9|\u0394|\u0397'.split('|'),'0|1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26|27|28|29|30|31|32|33|34|35|36|37|38|39|40|41|42|43|44|45|46|47'.split('|')
	]
	
	function pCell(mf, idp, source, target) {
		const self = this;

		self.root = document.createElement('div');
		self.root.dataset.name = target;
		
		var input = self.root.appendChild(document.createElement('input'));		
		input.type = "text";
		input.addEventListener('change', function() { self.update(); });

		self.update = function() {
			if (input.value.length > 0) {
				input.value = input.value[0];
			}
			
			mf.update(idp, input.value[0]);
		}
	}

	function crygr(opts) {
		const self = this;
				
		self.id = Date.now();
		self.encode   = 'A|B|C|D|E|F|G|H|I|J|K|L|M|N|O|P|Q|R|S|T|U|V|W|X|Y|Z'.split('|');
		
		self.root      = document.createElement('div');
		self.pictoRoot = document.createElement('p');
		self.frase     = frases[Math.floor(Math.random() * frases.length)].toUpperCase();
		self.reemplazo = reemplazos[opts.reemplazo];											
		
		self.reemplazo.sort(function() { return Math.random() - 0.5; });						
		self.encode.sort(function() { return Math.random() - 0.5; });
		
		for (var idx = 0; idx < self.frase.length; idx++) {
			var span = self.pictoRoot.appendChild(document.createElement('span')),
					idp = self.encode.indexOf(self.frase[idx]);
			
			if (idp > -1) {
				span.dataset.picto = self.reemplazo[idp];
				span.dataset.letra = "";
				span.dataset.idp = idp;
			} else {
				span.dataset.picto = '';
				span.dataset.letra = self.frase[idx];
			}
		}
		var rows = [];
		rows.push(document.createElement('div'));
		
		self.board = Array(self.encode.length)
									.fill("")
									.map(function(_, idx) {
										var tCell = new pCell(self, idx, self.encode[idx], self.reemplazo[idx]);
										rows[rows.length - 1].appendChild(tCell.root);
										
										return tCell;
									});

		rows.forEach(function(tr) { self.root.appendChild(tr); });
	}

	crygr.prototype.update = function(idp, target) {
		const self = this;
		
		Array.prototype.slice.apply(self.pictoRoot.querySelectorAll('[data-idp="' + idp + '"]'))
				 .forEach(function(span) {
					 span.dataset.letra = target;					 
				 });
	}

	return function init(root, opts) {
		var cg = new crygr(opts);
		root.appendChild(cg.root);
		root.appendChild(cg.pictoRoot);
	}
})(window);