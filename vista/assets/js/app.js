var x;
x = $(document);
x.ready(inicializarEventos);

function inicializarEventos() {
}

function rgUsuario() {  
  $('#formregistro').submit(function(event){
  event.preventDefault();
  var apaterno = $("#apaterno").val();
  var amaterno = $("#amaterno").val();
  var nombre =$("#nombre").val();
  var calle = $("#calle").val();
  var telefono = $("#tel").val();
  var cargo = $("#cargo").val();
  var usuario = $("#usuario").val();
  var clave = $("#clave").val();  
  
  if (apaterno == null || apaterno.length == 0) {
    $("#campoapaterno").addClass("has-error");
    alert("Por favor ingresa tu apellido paterno");
    return false;
  }
  else {
    $("#campoapaterno").removeClass("has-error");
  }
  
  if (amaterno == null || amaterno.length == 0) {
    $("#campoamaterno").addClass("has-error");
    alert("Por favor ingresa tu apellido materno");
    return false;
  }else {
    $("#campoamaterno").removeClass("has-error");
  }

  if (nombre == null || nombre.length == 0) {
    $("#camponombre").addClass("has-error");
    alert("Por favor ingresa tu nombre.")
    return false;
  }else {
    $("#camponombre").removeClass("has-error");    
  }
  
  if (calle == null || calle.length == 0){
    $("#campocalle").addClass("has-error");
    alert("Por favor ingresa tu calle y número");
    return false;
  }else {
    $("#campocalle").removeClass("has-error");
  }

  if (telefono == null || telefono.length == 0) {    
    $("#campocp").addClass("has-error");
    alert("Por favor ingresa tu telefono");
    return false;
  }else {
    $("#campocp").removeClass("has-error");    
  }

  if (cargo == null || cargo.length == 0) {
    $("#campocolonia").addClass("has-error");
    alert("Por favor ingresa tu cargo");
    return false;
  }else {
    $("#campocolonia").removeClass("has-error");
  }
       
  if (usuario == null || usuario.length == 0) {
    $("#campousuario").addClass("has-error");
    alert("Por favor ingresa tu usuario");
    return false;
  }else {
    $("#campousuario").removeClass("has-error");
  }
  
  if (clave == null || clave.length == 0) {
    $("#campoclave").addClass("has-error");
    alert("Por favor ingresa tu clave de acceso");
    return false;
  }else {
    $("#campoclave").removeClass("has-error");    
  }     
    $("#notificacion").html("");
    var datos = "action=insert&" + $("#formregistro").serialize();
    $.post("../controlador/usersController.php", datos, function(data) {        
        $('#notificacion').html(data);
        $('#notificacion').fadeIn();  
    });    
  });
}


function upUsuario() {         
    $("#mensaje").html("");
    var datos = "action=savedata&" + $("#formactualizar").serialize();
    $.post("../controlador/usersController.php", datos, function(data) {        
        $('#mensaje').html(data);
        $('#mensaje').fadeIn();
    });
}

function traeDatosUsuarioId(user) {
  $("#mensaje").html("");
  $('#contenido-update').html("");
  var id    = user.id;
  var datos = "action=update&id="+id ;
  $.post("../controlador/usersController.php", datos, function(data) {
      $('#contenido-update').html(data);        
  });
}

function delUsuario(user) { 
    if(confirm('¿Seguro que desea eliminar este usuario?')){
      $("#mensaje-delete").html("");
      var id    = user.id;
      var datos = "action=delete&id="+id ;
      $.post("../controlador/usersController.php", datos, function(data) {
          $('#mensaje-delete').prepend(data);
          $('#mensaje-delete').show('slow');
          $('#mensaje-delete').fadeOut(5000);  
      });     
    } 
}