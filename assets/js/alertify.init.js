var tituloConsulta = '<span class="fa fa-question-circle fa-2x" '
              + 'style="vertical-align:middle;color:#337AB7;">'
              + '</span><em style="vertical-align:middle;color:#337AB7;">&nbsp;&nbsp;&nbsp;&nbsp;Consulta del sistema</em>';

alertify.defaults.transition = "zoom";
alertify.defaults.theme.ok = "btn btn-success";
alertify.defaults.theme.cancel = "btn btn-danger";
alertify.defaults.theme.input = "form-control";
alertify.defaults.glossary.title = tituloConsulta;
alertify.defaults.glossary.ok = "<i class='fas fa-check' aria-hidden='true'></i>&nbsp;&nbsp;Aceptar";
alertify.defaults.glossary.cancel = "<i class='fas fa-times' aria-hidden='true'></i>&nbsp;&nbsp;Cancelar";
alertify.defaults.pinnable = false;
alertify.defaults.modal = true;
alertify.defaults.movable = false;

function alerta(mensaje, tipo, funcionok) {

  if (typeof(mensaje) == 'undefined') {
    mensaje = "No hay mensaje para mostrar.";
  }

  if (typeof(tipo) == 'undefined') {
    tipo = 1;
  }       

  if (tipo == 1 || tipo > 3) { // MENSAJE INFORMATIVO
    var Header = '<i class="fas fa-info-circle fa-2x" '
              + 'style="vertical-align:middle;color:#5CB85C;">'
              + '</i><em style="vertical-align:middle;color:#5CB85C;">&nbsp;&nbsp;&nbsp;&nbsp;Mensaje del sistema</em>';

    if (typeof(funcionok) == 'undefined') {
      alertify.alert(mensaje).set({'pinnable': false, 'modal': true}).setHeader(Header);
    } else {
      alertify.alert().setHeader(Header)
      .setting({
        'label': 'Continuar',
        'message': mensaje,
        'pinnable': false,
        'modal': true,
        'onok':  funcionok
      }).show();
    }
  } else if(tipo == 2) { //MENSAJE DE ADVERTENCIA
    var Header = '<i class="fas fa-exclamation-circle fa-2x" '
              + 'style="vertical-align:middle;color:#F0AD4E;">'
              + '</i><em style="vertical-align:middle;color:#F0AD4E;">&nbsp;&nbsp;&nbsp;&nbsp;Advertencia del sistema</em>';

    alertify.alert(mensaje).set({'pinnable': false, 'modal': true}).setHeader(Header);
  } else if(tipo == 3) { //MENSAJE DE ERROR
    var Header = '<i class="fas fa-times-circle fa-2x" '
              + 'style="vertical-align:middle;color:#e10000;">'
              + '</i><em style="vertical-align:middle;color:#e10000;">&nbsp;&nbsp;&nbsp;&nbsp;Error del sistema</em>';

    alertify.alert(mensaje).set({'pinnable': false, 'modal': true}).setHeader(Header);
  }
}