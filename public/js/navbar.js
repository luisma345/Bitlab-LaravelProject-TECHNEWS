var isOpen=false;
var opciones =document.getElementById('opciones');
function menu(){
    if(!isOpen){
        document.getElementById('cerrar').style='display:block;';
        document.getElementById('abrir').style='display:none;';
        opciones.classList.remove('hidden');
        isOpen=true;
    }
    else{
        document.getElementById('abrir').style='display:block;';
        document.getElementById('cerrar').style='display:none;';
        opciones.classList.add('hidden');
        isOpen=false;
    }
} 