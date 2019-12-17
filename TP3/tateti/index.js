const init = (function(window, undefined) {
	var stats = localStorage.getItem('tateti');

	if (stats) {
		stats = JSON.parse(stats);
	} else {
		stats = [];
	}

	function ttCell(mf, x, y) {
		const self = this;

		self.root = document.createElement('div');
		self.x = x;
		self.y = y;
		self.lines = { row : [], column : [], crossl : [], crossr : [] };

		self.root.addEventListener('click', function() { self.activate(); });

		var activated = false;
		self.activate = function() {
			if (!activated) {
				activated = true;
				self.root.classList.add('activated');
				mf.activate(self);
			}
		}
	}

	function tateti(opts) {
		const self = this;
		
		var size = opts.size;
		
		self.id = Date.now();
		self.root = document.createElement('div');
		self.statsRoot = document.createElement('table');
		self.size = opts.size;
		self.player0 = opts.player0;
		self.player1 = opts.player1;

		self.statsRoot.innerHTML = 	'<tr>' + 
																	stats
																		.filter(function(s) { return s.size == self.size })
																		.map(function(s) { return '<td>' + [ s.moment, s.player, s.line ].join('</td><td>') + '</td>'; }).join('</tr><tr>') + 
																'</tr>';
																
		var rows = [];
		self.board = Array(size * size)
									.fill("")
									.map(function(_, idx) {
										var x = idx % size,
												y = Math.floor(idx / size);

										if (x == 0) {
											rows.push(document.createElement('div'));
										}

										var tCell = new ttCell(self, x, y);
										rows[rows.length - 1].appendChild(tCell.root);

										return tCell;
									})
									.map(function(tCell, idx, board) {
										var x = tCell.x,
												y = tCell.y;

										if (x > 0) {
											board[idx - 1].lines.row.forEach(function(l) {
												l.lines.row.push(tCell);
												tCell.lines.row.push(l);
											});
												
											board[idx - 1].lines.row.push(tCell);
											tCell.lines.row.push(board[idx - 1]);

											if (y > 0) {
												board[idx - size - 1].lines.crossl.forEach(function(l) {
													l.lines.crossl.push(tCell);
													tCell.lines.crossl.push(l);
												});

												board[idx - size - 1].lines.crossl.push(tCell);
												tCell.lines.crossl.push(board[idx - size - 1]);
											}
										}

										if (y > 0) {
											board[idx - size].lines.column.forEach(function(l) {
												l.lines.column.push(tCell);
												tCell.lines.column.push(l);
											});
											
											board[idx - size].lines.column.push(tCell);
											tCell.lines.column.push(board[idx - size]);

											if (x < size - 1) {
												board[idx - size + 1].lines.crossr.forEach(function(l) {
													l.lines.crossr.push(tCell);
													tCell.lines.crossr.push(l);
												});
												
												board[idx - size + 1].lines.crossr.push(tCell);
												tCell.lines.crossr.push(board[idx - size + 1]);
											}
										}
										
										return tCell;
									});

		self.playerOne = true;

		rows.forEach(function(tr) { self.root.appendChild(tr); });
	}

	tateti.prototype.activate = function(tCell) {
		const self = this;
		if (self.playerOne === null) {
			tCell.root.dataset.name = "-";
			return;
		}

		var name = self.playerOne ? "X" : "O";

		tCell.root.dataset.name = name;
		self.playerOne = !self.playerOne;

 		for (var line in tCell.lines) {
			if (tCell.lines[line].filter(function(c) { return c.root.dataset.name == name; }).length == self.size - 1) {
				
				stats.push({ 
					moment: (new Date()).toISOString().replace('T', ' ').split('.').shift(), 
					player: (self.playerOne ? self.player0 : self.player1) + ' [' + name + ']', 
					size  : self.size, 
					line  : line
				});
				
				localStorage.setItem('tateti', JSON.stringify(stats));
				self.playerOne = null;
				self.board.forEach(function(c) { c.activate(); });
				return;
			}
		}
	}

	return function init(root, aside, opts) {
		var ttt = new tateti(opts);
		root.appendChild(ttt.root);
		aside.appendChild(ttt.statsRoot);
	}
})(window);