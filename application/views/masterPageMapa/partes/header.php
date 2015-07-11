<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $titulo; ?></title>
        <link rel="stylesheet" href="<?php echo base_url();?>utilities/css/bootstrap.css">      
        <script type="text/javascript" src="<?php echo base_url();?>utilities/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>utilities/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>utilities/js/funciones.js"></script>
        <script>
            
            function datos_marker(lat,log,marker) {
                var mi_marker = new google.maps.LatLng(lat, lng);
                map.panTo(mi_marker);
                google.maps.event.trigger(marker, 'click');
            }
        
        </script>
        <?php echo $map['js'] ?>
          <script type="text/javascript">

                function confirmarEliminar()
                  {
                    if (confirm("¿Esta seguro que desea eliminar?"))
                    { 
                        alert("El registro ha sido eliminado") 
                    }
                        else { 
                              return false
                             }
                  }
        </script> 
    </head>
    <body>
        <header>
            <section class="contenedor">
                <h1>VentaSoft</h1>
                <p>Software Para la Gestion de Ventas</p>
            </section>
        </header>
        