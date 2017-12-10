<?php
require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'].ruta::getRuta().'/modelo/bo/checkinoutBo.php';
require_once $_SERVER['DOCUMENT_ROOT'].ruta::getRuta().'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

switch ($_REQUEST['action']) {

	case 'obtener-datos':
	  	$bean = new checkinoutBean();
	  	$bo = new CheckinoutBo();   

	  	$bean->userid=$_POST['userid'];    
	    $result = $bo->obtenerDatosBo($bean);
	    print $result;
    	break;

    case 'genera-reporte':    	
	    if (isset($_REQUEST['userid'])) {
	    	ob_start();
	    	require_once $_SERVER['DOCUMENT_ROOT'].ruta::getRuta().'/vista/logicavista/TarjetaEempleadoHtml2Pdf.php';
	    	$content = ob_get_clean();
	    	$html2pdf = new Html2Pdf('P','A4','es', 'false', 'UTF-8');
	    	$html2pdf->setDefaultFont('Arial');
	    	$html2pdf->writeHTML($content);
	    	$html2pdf->output('tarjeta-de-empleado.pdf');
	    }
    	break;
}
  