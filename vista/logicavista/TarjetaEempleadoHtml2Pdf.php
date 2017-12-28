<?php 
// require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta. '/ruta.php';
// require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta. '/modelo/dao/checkinout/checkinoutDao.php';

if ( isset($_GET['userid']) && !isset($_GET['fecha1']) && !isset($_GET['fecha2'])) {
  
    $bean = new checkinoutBean();  
    $bean->userid = base64_decode($_GET['userid']);  

    $bo = new CheckinoutDao();    
    $data = $bo->obtenerDatosPorIdDao($bean);

} elseif (isset($_GET['userid']) && isset($_GET['fecha1']) && isset($_GET['fecha2']) ) {
  
    $bean = new checkinoutBean();  
    $bean->userid = base64_decode($_GET['userid']);
    $bean->fecha1 = base64_decode($_GET['fecha1']);
    $bean->fecha2 = base64_decode($_GET['fecha2']);

    $bo = new CheckinoutDao();    
    $data = $bo->obtenerDatosPorRangoFechasDao($bean);

}
?>

<link rel="stylesheet" type="text/css" href="../vista/assets/css/TarjetaEempleadoHtml2Pdf.css">
<page backtop="7mm" backbottom="7mm" backleft="10mm" backright="10mm"> 
    <div>        
        
       <div class="header-bar">
            <img src="../vista/assets/img/informe.png"  class="image-top">
            <h1>Resultados</h1>
        </div>
        <table class="page_header">
            <thead>
                <tr>                    
                    <th>Nombre</th>
                    <th>Departamento</th>
                    <th>Número de empleado</th>
                </tr>
            </thead>
            <tr>
                <td ><?php echo utf8_encode($data[0]->name) ?></td> 
                <td ><?php echo utf8_encode($data[0]->deptname) ?></td> 
                <td ><?php echo $data[0]->userid ?></td> 
            </tr>
        </table>
        <table class="page_main">            
            <thead>
              <tr>
                <th>Fecha</th>
                <th>Dia</th>
                <th>Entrada / Salida</th>
                <th>Detalles</th>
              </tr>
            </thead>
            <tbody>
            <?php 
             if (count($data) != null) { 
                $find  = 'AM';
                for($i=0; $i<count($data); $i++){
                    if (strpos($data[$i]->hour, $find)) {
                       echo '
                       <tr>
                           <td style="width: 126px;">'.$data[$i]->date.'</td>
                           <td style="width: 126px;">'.$data[$i]->day.'</td> 
                           <td style="width: 126px; background: #00BCD4;">'.$data[$i]->hour.'</td> 
                           <td style="width: 126px;">'.$data[$i]->checktime.'</td> 
                       </tr>
                       ';
                    } else {
                        echo '
                        <tr>
                            <td style="width: 126px;">'.$data[$i]->date.'</td>
                            <td style="width: 126px;">'.$data[$i]->day.'</td> 
                            <td style="width: 126px; background: #8C9EFF;">'.$data[$i]->hour.'</td> 
                            <td style="width: 126px;">'.$data[$i]->checktime.'</td> 
                        </tr>
                        ';
                    }                   
                }
            }      
            ?>
            </tbody>
        </table>
    </div> 
</page> 