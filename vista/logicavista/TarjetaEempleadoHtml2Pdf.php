<?php 
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta. '/ruta.php';
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta. '/modelo/dao/checkinout/checkinoutDao.php';

$bean = new checkinoutBean();  
$bean->userid= $_GET['userid'];    
$bo = new CheckinoutDao();    
$data = $bo->obtenerDatosDao($bean);
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
                <th>ID</th>
                <th>Name</th>
                <th>Checktime</th>
                <th>Deptname</th>
              </tr>
            </thead>
            <tbody>
            <?php 
             if (count($data) != null) {
                for($i=0; $i<count($data); $i++){
                    echo '
                    <tr>
                        <td style="width: 15px;">'.$data[$i]->userid.'</td>
                        <td style="width: 200px;">'.utf8_encode($data[$i]->name).'</td> 
                        <td style="width: 100px;">'.$data[$i]->checktime.'</td> 
                        <td style="width: 192px;">'.utf8_encode($data[$i]->deptname).'</td> 
                    </tr>
                    ';
                }
            }      
            ?>
            </tbody>
        </table>
    </div> 
</page> 