const init = (function(window, undefined) {

	function mineCell(mf, x, y) {
		const self = this;

		self.root = document.createElement('div');
		self.x = x;
		self.y = y;
		self.isMine = false;
		self.neighbors = [];

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

	function mineFinder(sizeX, sizeY) {
		const self = this;

		self.id = Date.now();
		self.threshold = Math.min(.2, Math.random());

		self.root = document.createElement('div');
		
		var rows = [];
		self.board = Array(sizeX * sizeY)
									.fill(false)
									.map(function(_, idx) {
										var x = idx % sizeX,
												y = Math.floor(idx / sizeX);
										
										if (x == 0) {
											rows.push(document.createElement('div'));
										}
										
										var mCell = new mineCell(self, x, y);
										mCell.isMine = Math.random() <= self.threshold;
										mCell.root.dataset.name = mCell.isMine ? 'M' : '';

										rows[rows.length - 1].appendChild(mCell.root);
										
										return mCell;
									})
									.map(function(mCell, idx, board) {
										var x = mCell.x,
												y = mCell.y;
																				
										if (x > 0) {
											board[idx - 1].neighbors.push(mCell);
											mCell.neighbors.push(board[idx - 1]);
											
											if (y > 0) {
												board[idx - sizeX - 1].neighbors.push(mCell);
												mCell.neighbors.push(board[idx - sizeX - 1]);																																			
											}																
										}
																				
										if (y > 0) {
											board[idx - sizeX].neighbors.push(mCell);		
											mCell.neighbors.push(board[idx - sizeX]);	
											
											if (x < sizeX - 1) {
												board[idx - sizeX + 1].neighbors.push(mCell);	
												mCell.neighbors.push(board[idx - sizeX + 1]);		
											}																
										}
										
										return mCell;
									});
									
		self.board
			.filter(function(mCell) { return !mCell.isMine; })
			.forEach(function(mCell) {
				mCell.root.dataset.name = mCell.neighbors.map(function(n) { return n.isMine; }).filter(Boolean).length;			
			});

		rows.forEach(function(tr) { self.root.appendChild(tr); });
	}

	mineFinder.prototype.activate = function(mCell) {
		const self = this;
		
		if (mCell.isMine) {
			if (!self.over) {
				self.over = true;
				
				self.board
					.filter(function(mCell) { return mCell.isMine; })
					.forEach(function(mCell) { mCell.activate(); });				
			}
			return;
		}
		
		if (mCell.root.dataset.name == '0') {
			mCell.neighbors.forEach(function(n) { return n.activate(); });
		}
	}

	return function init(root, sizeX, sizeY) {
		var mf = new mineFinder(sizeX, sizeY);				
		root.appendChild(mf.root);
	}
})(window);