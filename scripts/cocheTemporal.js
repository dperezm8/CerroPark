function eliminaFecha(checkbox) {
    var cocheTemporal = document.getElementById('valorTemporal');
    var validoHastaField = document.getElementById('validoHasta');
    validoHastaField.style.display = checkbox.checked ? 'none' : 'block';
    validoHastaField.querySelector('input').required = !checkbox.checked;
    cocheTemporal.value = checkbox.checked ? '1' : '0';
}