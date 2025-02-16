function mostrarFormulario() {

    var formularios = document.querySelectorAll('.formulario-hipohiper');
    
    formularios.forEach(function(form) {
        form.style.display = 'none';
    });


    var hiperglucemia = document.getElementById('hiperglucemia').checked;
    var hipoglucemia = document.getElementById('hipoglucemia').checked;
    


    if (desayunoSeleccionado) {
        document.getElementById('formularioHiperglucemia').style.display = 'block';
    } else if (almuerzoSeleccionado) {
        document.getElementById('formularioHipoglucemia').style.display = 'block';
    } 
}