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

  function obtenerDatosBo($data){
    $result = $this->dao->obtenerDatosDao($data);
    return $this->view->listaView($result);
  }
   
  function eliminarDatoBo($data) {
    $resultado = $this->dao->eliminarUsuarioDao($data);
    return $resultado;
  }
}
?>
