function toggleGlucemiaInfo(state) {

    document.getElementById('hiperglucemia-fields').style.display = 'none';
    document.getElementById('hipoglucemia-fields').style.display = 'none';

  
    if (state === 'hiperglucemia') {
        document.getElementById('hiperglucemia-fields').style.display = 'block';
        document.getElementById('hipoglucemia').checked = false;  // Desmarcar hipoglucemia
    } else if (state === 'hipoglucemia') {
        document.getElementById('hipoglucemia-fields').style.display = 'block';
        document.getElementById('hiperglucemia').checked = false;  // Desmarcar hiperglucemia
    } else {
        // Si "ninguno" está seleccionado
        document.getElementById('hiperglucemia-fields').style.display = 'none';
        document.getElementById('hipoglucemia-fields').style.display = 'none';
    }
}
