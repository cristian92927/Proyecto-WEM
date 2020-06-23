// variables
let botones = document.getElementsByClassName('btn-header');
let texto = document.getElementsByClassName('move')[0];
let texto2 = document.getElementsByClassName('move2')[0];
let btn = document.getElementsByClassName('btn')[0];

window.addEventListener('load', function(){
	texto.style.transition = '1s';
	texto.classList.remove('move');
	texto2.style.transition = '1.3s';
	texto2.classList.remove('move2');
	btn.style.transition = '1.6s';
	btn.classList.remove('btn');
});

let equipo = document.getElementById('enlace-equipo');
equipo.addEventListener('click',function(){
	var desp = window.pageYOffset;
	window.scroll(0, 517);
});

window.addEventListener('scroll',function(){
	console.log(window.pageYOffset);
})