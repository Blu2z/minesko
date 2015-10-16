var btn = $('.btn__head'),
	list = $('.head__list li');

btn.on('click', function (e) {
	e.preventDefault();

	$(this).toggleClass('active').hasClass('active') ? list.slideDown() : list.slideUp();
});