function toggleInfo(option) {
    const info = document.getElementById('info');
    const hiperglucemiaFields = document.getElementById('hiperglucemia-fields');
    const hipoglucemiaFields = document.getElementById('hipoglucemia-fields');

    if (option === 'hiperglucemia') {
        info.style.display = 'block';
        hiperglucemiaFields.style.display = 'block';
        hipoglucemiaFields.style.display = 'none';
    } else if (option === 'hipoglucemia') {
        info.style.display = 'block';
        hiperglucemiaFields.style.display = 'none';
        hipoglucemiaFields.style.display = 'block';
    } else {
        info.style.display = 'none';
        hiperglucemiaFields.style.display = 'none';
        hipoglucemiaFields.style.display = 'none';
    }
}

function deselect() {
    const radios = document.getElementsByName('glucemia');
    radios.forEach(radio => radio.checked = false);
    document.getElementById('info').style.display = 'none';
    document.getElementById('hiperglucemia-fields').style.display = 'none';
    document.getElementById('hipoglucemia-fields').style.display = 'none';
}

function validateForm() {
    const glucemiaRadios = document.getElementsByName('glucemia');
    let glucemiaSelected = false;

    for (let radio of glucemiaRadios) {
        if (radio.checked) {
            glucemiaSelected = true;
            break;
        }
    }

    if (!glucemiaSelected) {
        alert("Por favor, selecciona un estado de glucemia.");
        return false; // Evita el envío del formulario
    }

    return true; // Permite el envío del formulario
}
