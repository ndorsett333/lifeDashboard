(function () {
	function updateClock() {
		var node = document.querySelector('[data-life-os-clock]');
		if (!node) {
			return;
		}

		var now = new Date();
		node.textContent = now.toLocaleTimeString([], {
			hour: '2-digit',
			minute: '2-digit',
			second: '2-digit'
		});
	}

	updateClock();
	window.setInterval(updateClock, 1000);
})();
