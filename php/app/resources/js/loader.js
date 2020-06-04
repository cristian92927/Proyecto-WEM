window.addEventListener('load', function(){
	let body = document.getElementsByTagName('body')[0];
	let ocultar = document.getElementById('onload');
	ocultar.style.transition='1s';
	ocultar.style.opacity='0';
	ocultar.style.zIndex='-1';
	body.classList.remove('hidden');
});