function validarHojaDiario(t,f) {

       	if (document.getElementById('sucursal').value == 0) {
            alert('Debe seleccionar una tienda');
            return 0;
        }
      	
	if (confirm("Desea ingresar la informacion en pantalla a la base de datos ?\n\nTienda: " + t + "\nFecha: " + f)) {
		document.getElementById('frm_diario').submit();
	} // end if
} // end function