<?php
header("Content-Type: text/text; charset=ISO-8859-1");

class CheckinoutView {    
    
    function listaView($data, $params){
        $cad = '
        <div class="col-md-12">     
          <div class="page-header">';
            if (count($params) != null) {
                if ( isset($params[0]) && !isset($params[1]) && !isset($params[2]) ) {
                    $cad.='
                    <a href="../controlador/checkinoutController.php?action=genera-reporte&userid='.$params[0].'" target="_blank" class="form-control btn btn-success">Generar PDF</a>';
                } elseif (isset($params[0]) && isset($params[1]) && isset($params[2]) ) {
                    $cad.='
                    <a href="../controlador/checkinoutController.php?action=genera-reporte&userid='.$params[0].'&fecha1='.$params[1].'&fecha2='.$params[2].'" target="_blank" class="form-control btn btn-success">Generar PDF</a>';
                } 
            }
          $cad.=' 
          </div>
          <table class="table table-striped table-hover table-bordered">
            <thead class="thead-dark">
              <tr>
                <th>Empleado</th>
                <th>Nombre</th>
                <th>Entrada / Salida</th>
                <th>Departamento</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>';
              if (count($data) == null) {
                $cad.='
                  <tr>
                    <td>Ningun registro encontrado</td>                 
                    <td>Ningun registro encontrado</td>                 
                    <td>Ningun registro encontrado</td>                 
                    <td>Ningun registro encontrado</td>                 
                    <td>Ningun registro encontrado</td>
                 </tr>';
              } else {
                for($i=0; $i<count($data); $i++){
                  $find  = 'AM';
                  if (strpos($data[$i]->hour, $find)) {
                    $cad.='
                      <tr>
                        <td>'.$data[$i]->userid.'</td>
                        <td>'.$data[$i]->name.'</td> 
                        <td style="background: #00BCD4;">'.$data[$i]->checktime.'</td> 
                        <td>'.$data[$i]->deptname.'</td> 
                        <td>
                          <a href="javascript://" data-toggle="modal" data-target="#myModalActualiza" id="'.$data[$i]->userid.'" onclick="traeDatosUsuarioId(this)" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                          <a href="#" data-toggle="tooltip" data-placement="top" title="Eliminar" id="'.$data[$i]->userid.'" onclick="delUsuario(this)" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td> 
                      </tr>';
                  } else {
                    $cad.='
                      <tr>
                        <td>'.$data[$i]->userid.'</td>
                        <td>'.$data[$i]->name.'</td> 
                        <td style="background: #8C9EFF;">'.$data[$i]->checktime.'</td> 
                        <td>'.$data[$i]->deptname.'</td> 
                        <td>
                          <a href="javascript://" data-toggle="modal" data-target="#myModalActualiza" id="'.$data[$i]->userid.'" onclick="traeDatosUsuarioId(this)" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                          <a href="#" data-toggle="tooltip" data-placement="top" title="Eliminar" id="'.$data[$i]->userid.'" onclick="delUsuario(this)" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td> 
                      </tr>';
                  }               
               }
             }              
            $cad.='
            </tbody>
          </table> 
        </div>       
        ';
        return $cad;
    }
    
}
?>