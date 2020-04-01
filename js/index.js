// variables
let nav = document.getElementById('nav');
let menu = document.getElementById('enlaces');
let abrir = document.getElementById('open');
let botones = document.getElementsByClassName('btn-header');
let cerrado = true;

function apertura(){
	if(cerrado){
		menu.style.height = '100vh';
		cerrado = false;
	}else{
		menu.style.height = '0px';
		menu.style.overflow = 'hidden';
		cerrado = true;
	}
}
function menus(){
	let desplazamiento_actual = window.pageYOffset;
	if(desplazamiento_actual<=148){
		nav.classList.remove('nav2');
		nav.className = ('nav1');
		nav.style.transition = '1s';
		menu.classList.remove('enlaces2');
		menu.className = ('enlaces');
		menu.style.top='80px';
		abrir.style.color='white';
	}else{
		nav.classList.remove('nav1');
		nav.className = ('nav2');
		nav.style.transition = '1s';
		menu.classList.remove('enlaces');
		menu.className = ('enlaces2');
		menu.style.top='100px';
		abrir.style.color='black';
	}
}
window.addEventListener('load', function(){	
	menus();
});
window.addEventListener('click', function(e){
	if(cerrado==false){
		let span = document.querySelector('span');
		if(e.target !== span && e.target !== abrir){
			menu.style.height = '0px';
			menu.style.overflow = 'hidden';
			cerrado = true;
		}
	}
});
window.addEventListener('scroll',function(){
	menus();
});
window.addEventListener('resize',function(){
	if(screen.width>=700){
		cerrado=true;
		menu.style.removeProperty('overflow');
		menu.style.removeProperty('height');
	}
});
abrir.addEventListener('click', function(){
	apertura()
});