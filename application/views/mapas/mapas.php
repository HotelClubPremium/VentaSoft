<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script>
		
		function datos_marker(lat,log,marker) {
			var mi_marker = new google.maps.LatLng(lat, lng);
		    map.panTo(mi_marker);
		    google.maps.event.trigger(marker, 'click');
		}
	
	</script>
	<?php echo $map['js'] ?>
</head>
<body>
	<?php echo $map['html'] ?>
</body>
</html>