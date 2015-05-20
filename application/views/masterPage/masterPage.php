<?php 
$this->load->view('masterPage/partes/header');
$this->load->view($viewNave.'/'. $nave);
$this->load->view($viewControlador.'/'. $contenido);
$this->load->view('masterPage/partes/footer'); 
?>