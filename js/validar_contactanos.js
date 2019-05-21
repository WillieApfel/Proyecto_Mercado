function validar() {
	var telefono, asunto;
	telefono = document.getElementById('telefono').value;
	asunto = document.getElementById('asunto').value;

	if (telefono === "" || asunto === "") {
		alert("Faltan campos obligatorios");
		return false;
	} 
	else if (isNaN(telefono) || telefono.length>12) {
		alert("El Nº de telefono es invalido");
		return false;
	} 
	else if (telefono.length<11) {
		alert("Al Nº de telefono le faltan digitos");
		return false;
	} 
}