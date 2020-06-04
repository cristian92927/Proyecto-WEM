let cajas = document.getElementsByClassName('cajas')[0];
cajas.addEventListener('drop', function(ev){
	ev.preventDefault();
	var data = ev.dataTransfer.getData('text');
	ev.target.appendChild(document.getElementById(data));
});
cajas.addEventListener('dragover', function(ev){
	ev.preventDefault();
});

/* tablas */
let lunes = document.getElementById('lunes');
let martes = document.getElementById('martes');
let miercoles = document.getElementById('miercoles');
let jueves = document.getElementById('jueves');
let viernes = document.getElementById('viernes');
let flecha_left = document.getElementById('left');
let flecha_right = document.getElementById('right');

let tabla = 0;

flecha_right.addEventListener('click', function(){
	tabla = tabla + 1;
	cambiar();
})
flecha_left.addEventListener('click', function(){
	tabla = tabla - 1;
	cambiar();
})

function cambiar(){
	if(tabla >= 3){
		flecha_right.style.display = 'none';
		flecha_left.style.display = 'flex';
	}
	if(tabla <= 1){
		flecha_right.style.display = 'flex';
		flecha_left.style.display = 'none';
	}
	if(tabla < 4 && tabla > 0){
		flecha_right.style.display = 'flex';
		flecha_left.style.display = 'flex';
	}
	switch (tabla){
		case 0:
			lunes.style.display = 'table';
			martes.style.display = 'none';
			miercoles.style.display = 'none';
			jueves.style.display = 'none';
			viernes.style.display = 'none';
		break;
		case 1:
			lunes.style.display = 'none';
			martes.style.display = 'table';
			miercoles.style.display = 'none';
			jueves.style.display = 'none';
			viernes.style.display = 'none';
		break;
		case 2:
			lunes.style.display = 'none';
			martes.style.display = 'none';
			miercoles.style.display = 'table';
			jueves.style.display = 'none';
			viernes.style.display = 'none';
		break;
		case 3:
			lunes.style.display = 'none';
			martes.style.display = 'none';
			miercoles.style.display = 'none';
			jueves.style.display = 'table';
			viernes.style.display = 'none';
		break;
		case 4:
			lunes.style.display = 'none';
			martes.style.display = 'none';
			miercoles.style.display = 'none';
			jueves.style.display = 'none';
			viernes.style.display = 'table';
		break;
	}
}

function allowDrop(ev){
	ev.preventDefault();
}
function drag(ev){
	ev.dataTransfer.setData('text', ev.target.id);
	console.log(ev.target.id);
};
function drop(ev){
	ev.preventDefault();
	var data = ev.dataTransfer.getData('text');
	ev.target.appendChild(document.getElementById(data));	
}