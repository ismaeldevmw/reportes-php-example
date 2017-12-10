<?php
class CheckinoutSql {    
    public static function  registrarAspirante(){
        $query="insert into aspirante(nombre,paterno,materno,fnacimiento,folio,password,correo,status) values(?,?,?,?,?,?,?,?);";
        return $query;
    }
    
    public static function actualizarAspirante(){
        $query="update aspirante set nombre=?, paterno=?, materno=?, fnacimiento=?, folio=?, password=?, correo=? where idAspirante=?;";
        return $query;
    }
    
    public static function eliminarAspirante(){
        $query="delete from aspirante where idAspirante=?;";
        return $query;
    }
    
    public static function obtenerDatosSql(){
      $query="SELECT userid, checktime, name, deptname  FROM checkinout LEFT JOIN userinfo USING(userid)LEFT JOIN departments ON defaultdeptid = deptid WHERE userid = ?;";
      return $query;
    }
}
?>
