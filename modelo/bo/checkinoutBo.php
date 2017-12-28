<?php
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta. '/ruta.php';
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta. '/modelo/dao/checkinout/checkinoutDao.php';
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta. '/vista/logicavista/checkinoutView.php';

class CheckinoutBo {

  var $dao;

  function __construct() {
      $this->dao=new CheckinoutDao();
      $this->view=new CheckinoutView();
  }

  function obtenerDatosPorIdBo($data) {
    
    $result = $this->dao->obtenerDatosPorIdDao($data);
    $params = array ( base64_encode($data->userid) );
    return $this->view->listaView($result, $params);

  }

  function obtenerDatosPorRangoFechasBo($data){

    $result = $this->dao->obtenerDatosPorRangoFechasDao($data);
    $params = array ( base64_encode($data->userid), base64_encode($data->fecha1), base64_encode($data->fecha2) );
    return $this->view->listaView($result, $params);
  }
   
  function eliminarDatoBo($data) {

    $resultado = $this->dao->eliminarUsuarioDao($data);
    return $resultado;

  }

}
?>
