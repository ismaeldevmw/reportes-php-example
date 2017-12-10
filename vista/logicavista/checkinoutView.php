<?php
header("Content-Type: text/text; charset=ISO-8859-1");

class CheckinoutView {    
    
    function listaView($data){
        $cad = '
        <div class="col-md-12">     
          <div class="page-header">';
            if (count($data) != null) {
              $cad.='
              <a href="../controlador/checkinoutController.php?action=genera-reporte&userid='.$data[0]->userid.'" target="_blank" class="form-control btn btn-success">PDF</a>';
            }
          $cad.=' 
          </div>
          <table class="table table-striped table-hover table-bordered">
            <thead class="thead-dark">
              <tr>
                <th>No.</th>
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
                          <button type="button" class="btn btn-primary btn-sm">Update</button>
                          <button type="button" class="btn btn-primary btn-sm">Delete</button>
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
                          <button type="button" class="btn btn-primary btn-sm">Update</button>
                          <button type="button" class="btn btn-primary btn-sm">Delete</button>
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