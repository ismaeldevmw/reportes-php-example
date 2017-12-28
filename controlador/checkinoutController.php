<?php
require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'].ruta::getRuta().'/modelo/bo/checkinoutBo.php';
require_once $_SERVER['DOCUMENT_ROOT'].ruta::getRuta().'/modelo/beans/checkinoutBean.php';
require_once $_SERVER['DOCUMENT_ROOT'].ruta::getRuta().'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

if ($_REQUEST['action']) {

	if ($_REQUEST['action'] == 'obtener-datos') {
		
		$bean = new checkinoutBean();
	  	$bo = new CheckinoutBo(); 

	  	if ($_POST['userid'] != '' && $_POST['fecha1'] == '' && $_POST['fecha2'] == '' ) {

	  		$bean->userid = $_POST['userid'];    
	    	$result = $bo->obtenerDatosPorIdBo($bean);

	  	} elseif ($_POST['userid'] != '' && $_POST['fecha1'] != '' && $_POST['fecha2'] != '' ) {
	  		
  		$bean->userid = $_POST['userid'];
  		$bean->fecha1 = $_POST['fecha1'];
  		$bean->fecha2 = $_POST['fecha2'];    
    	$result = $bo->obtenerDatosPorRangoFechasBo($bean);

	  	} else {
	  		$result = '';
	  	}

	    print $result;

	}

	if ($_REQUEST['action'] == 'genera-reporte') {
		
		if (isset($_REQUEST['userid'])) {
	    	ob_start();
	    	require_once $_SERVER['DOCUMENT_ROOT'].ruta::getRuta().'/vista/logicavista/TarjetaEempleadoHtml2Pdf.php';
	    	$content = ob_get_clean();
	    	$html2pdf = new Html2Pdf('P','A4','es', 'false', 'UTF-8');
	    	$html2pdf->setDefaultFont('Arial');
	    	$html2pdf->writeHTML($content);
	    	$html2pdf->output('tarjeta-de-empleado.pdf');
	    }

	}
}
  