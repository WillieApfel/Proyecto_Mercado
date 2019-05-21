function validar() {
	var nombre, apellidos, usuario, correo, clave, expresion;
	nombre = document.getElementById('nombres').value;
	apellidos = document.getElementById('apellidos').value;
	usuario = document.getElementById('usuario').value;
	correo = document.getElementById('correo').value;
	clave = document.getElementById('clave').value;

	expresion = /\w+@\w+\.+[a-z]/;

	if (nombre === "" || apellidos === "" || usuario === "" || correo === "" || clave === "") {
		alert("Faltan campos obligatorios");
		return false;
	} 
	else if (nombre.length>40) {
		alert("El nombre es muy largo");
		return false;
	} 
	else if (apellidos.length>50) {
		alert("Los apellidos son muy largos");
		return false;
	} 
	else if (usuario.length>20) {
		alert("El usuario es muy largo");
		return false;
	} 
	else if (correo.length>60) {
		alert("El correo es muy largo");
		return false;
	} 
	else if (clave.length>20) {
		alert("La clave es muy larga");
		return false;
	} 


	if (correo.length>50) {
		alert("El correo es muy largo");
		return false;
	}
	 else if (!expresion.test(correo)) {
		alert("El correo no es valido");
		return false;
	}
}