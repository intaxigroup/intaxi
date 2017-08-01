/* http://ettrics.com/lab/demo/vertical-layout-navigation/ */
$(function() {
	var menu = document.querySelector('.nav__list');
	var burger = document.querySelector('.burger');
	var doc = $(document);

	var openMenu = function() {
		burger.classList.toggle('burger--active');
		menu.classList.toggle('nav__list--active');
	};
	
	var init = function() {
		burger.addEventListener('click', openMenu, false);
	};
	doc.on('ready', init);
});