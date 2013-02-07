function formatNumber(num,prefix){
   prefix = prefix || '';
   num += '';
   var splitStr = num.split('.');
   var splitLeft = splitStr[0];
   var splitRight = splitStr.length > 1 ? '.' + splitStr[1] : '';
   var regx = /(\d+)(\d{3})/;
   while (regx.test(splitLeft)) {
      splitLeft = splitLeft.replace(regx, '$1' + ',' + '$2');
   }
   return prefix + splitLeft + splitRight + ".00";
}

function unformatNumber(num) {
   return num.replace(/([^0-9\.\-])/g,'')*1;
}

function validar_extras(a) {
	
	total = 0;
	for (i=0;i<3;i++) {
		if (isNaN(document.getElementById(a + '_qty_' + i).value) || document.getElementById(a + '_qty_' + i).value < 0) {
			alert('Los montos deben ser numeros mayores que 0');
			document.getElementById(a + '_qty_' + i).value = 0;
			document.getElementById(a + '_qty_' + i).focus();
			return 0;
		} else {
			total+=parseInt(document.getElementById(a + '_qty_' + i).value);
		}
	} // end for
	document.getElementById('total_' + a).innerText = formatNumber(total,"Q.");
	
	
} // end function

function sumar_arqueo(a) {
	
//	alert(a);

	total = 0;
	if (isNaN(document.getElementById('txt_' +a).value) || document.getElementById('txt_' + a).value < 0) {
		alert('Los montos de las monedas deben ser numeros mayores que 0');
		document.getElementById('txt_' + a).value = 0;
		document.getElementById('txt_' + a).focus();
		return 0;
	} else {
		total=parseInt(document.getElementById('txt_doscientos').value) * 200;
		total+=parseInt(document.getElementById('txt_cien').value) * 100;
		total+=parseInt(document.getElementById('txt_cincuenta').value) * 50;
		total+=parseInt(document.getElementById('txt_veinte').value) * 20;
		total+=parseInt(document.getElementById('txt_diez').value) * 10;
		total+=parseInt(document.getElementById('txt_cinco').value) * 5;
		total+=parseInt(document.getElementById('txt_uno').value);
		total+=parseInt(document.getElementById('txt_moneda').value);																		
	
		document.getElementById('lbl_doscientos').innerText = formatNumber(parseInt(document.getElementById('txt_doscientos').value) * 200,"Q.");
		document.getElementById('lbl_cien').innerText = formatNumber(parseInt(document.getElementById('txt_cien').value) * 100,"Q.");
		document.getElementById('lbl_cincuenta').innerText = formatNumber(parseInt(document.getElementById('txt_cincuenta').value) * 50,"Q.");
		document.getElementById('lbl_veinte').innerText = formatNumber(parseInt(document.getElementById('txt_veinte').value) * 20,"Q.");
		document.getElementById('lbl_diez').innerText = formatNumber(parseInt(document.getElementById('txt_diez').value) * 10,"Q.");
		document.getElementById('lbl_cinco').innerText = formatNumber(parseInt(document.getElementById('txt_cinco').value) * 5,"Q.");
		document.getElementById('lbl_uno').innerText = formatNumber(document.getElementById('txt_uno').value,"Q.");
		document.getElementById('lbl_moneda').innerText = formatNumber(document.getElementById('txt_moneda').value,"Q.");
		
	}
	
	document.getElementById('lbl_total_arqueo').innerText = formatNumber(total,"Q.");

	
} // end function

function subtotalProducto(i,p) {
    suma = parseInt(document.getElementById('txt_inicial_' + i).value);
    suma+= parseInt(document.getElementById('txt_entrada_' + i).value);
    suma-= parseInt(document.getElementById('txt_salida_' + i).value);
    suma-= parseInt(document.getElementById('txt_final_' + i).value);
    
    document.getElementById('lbl_vendido_' + i).innerText = suma;
    document.getElementById('lbl_venta_' + i).innerText = formatNumber(suma * p,"Q."); 
    
    // Actualizo los totales
    document.getElementById('lbl_sumaInicial').innerText = "----";
    document.getElementById('lbl_sumaFinal').innerText = "----";
    document.getElementById('lbl_ventaTotal').innerText = "----";

} // end function

function validarProducto(a,i,p) {      

    if (isNaN(a.value) || document.getElementById(a.value < 0)) {
        alert('Debe ingresar numeros mayores que 0 en las cantidades de productos');
        a.value = 0;
        a.focus();
        return 0;
    }
    subtotalProducto(i,p);  
} // end function

function selTienda(nombre,id,fecha) {
    document.getElementById('tienda').innerText = nombre;
    document.getElementById('sucursal').value = id;
    document.getElementById('fecha').value = fecha;
    document.getElementById('frm_main').submit();
} // end function
