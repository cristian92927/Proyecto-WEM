function allowDrop(ev){
	ev.preventDefault();
}
var copia;
function drag(ev){
	copia = "<div class='caja' style='background-color:"+ev.target.style.backgroundColor+";'><p>" + ev.target.childNodes[1].innerHTML + "</p></div>";
	ev.dataTransfer.setData('text', copia);
	console.log(ev.target.getAttribute('docid'));
};
function drop(ev){
	ev.preventDefault();
	ev.target.innerHTML = ev.dataTransfer.getData("text");
}
var bin;
var trimestre = document.getElementById('trimestre');
var aula = document.getElementById('aula');

aula.addEventListener('dblclick', function(){
	bin = 1;
	texto();
});
trimestre.addEventListener('dblclick', function(){
	bin = 0;
	texto();
});

function texto(){
	if(bin == 0){
		var val = prompt('Ingrese el trimestre');
		if (val == null) {
			trimestre.innerHTML = "Trimestre:";
		}else{
			trimestre.innerHTML = "Trimestre: "+val;
		}
	}else if(bin == 1){
		var val = prompt('Ingrese el lugar');
		if (val == null) {
			aula.innerHTML = "Lugar:";
		}else{
			aula.innerHTML = "Lugar: "+val;
		}
	}
}