function toggleFechaDeAlta(checkbox) {
    var fechaDeAltaField = document.getElementById('fechaDeAltaField');
    var temporalValueField = document.querySelector('input[name="cocheTemporal"]');
    
    if (checkbox.checked) {
        fechaDeAltaField.style.display = 'none';
        temporalValueField.value = '1';
    } else {
        fechaDeAltaField.style.display = 'block';
        temporalValueField.value = '0';
    }
}