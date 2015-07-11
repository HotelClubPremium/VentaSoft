function mostrarMapa (ruta,idPersona) {
	var url= ruta+idPersona;
	$.get(url,"",function (data) {
		$("#ruta").html(url);
		$("#mapa").html(data);
	});
}