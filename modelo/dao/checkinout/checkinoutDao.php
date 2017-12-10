<?php
require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'].ruta::getRuta()."/modelo/dao/conexion.php";
require_once $_SERVER['DOCUMENT_ROOT'].ruta::getRuta().'/modelo/beans/checkinoutBean.php';
require_once $_SERVER['DOCUMENT_ROOT'].ruta::getRuta().'/modelo/dao/procesaParametros.php';
require_once $_SERVER['DOCUMENT_ROOT'].ruta::getRuta().'/modelo/dao/checkinout/checkinoutSql.php';

class CheckinoutDao {

    private $conn ;

    function __construct() {
      $this->conn = Conexion::conectar();
    }
    function __destruct() {
      $this->conn->close();
    }

    function obtenerDatosDao($data){
      $dataArray = array ($data->userid);
      $sql = procesaParametros::PrepareStatement(CheckinoutSql::obtenerDatosSql(), $dataArray);
      $rs = $this->conn->query($sql);  
      $resultset = array();                        
      
      while ( $row = $rs->fetch_array() ) {
        $lista = new checkinoutBean();
        $lista->userid = $row['userid'];      
        $lista->name = $row['name'];    
        $lista->checktime = $row['checktime'];  
        $lista->deptname = $row['deptname']; 
        array_push($resultset,$lista); 
      }

      return $resultset;
    }
}
?>
