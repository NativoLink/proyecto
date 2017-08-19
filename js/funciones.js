
function newDoc(archivo) {
    window.location.assign(archivo);
}
function CargarAjax_Form(arch, form, tipo){
      $.ajax({
        type: tipo,
        url: arch,
        data : $('#'+form+"").serialize(),
        success: function(msg){
         console.log(msg);
        //alert(msg);
        //$('#contenedor_win').html(msg);
        //$("#contenedor_win").addClass('zoomIn animated ');
        // $("#sesiones").append('<div><p>'+msg+'</div>');
        // $( ".remodal-bg" ).removeClass('remodal-is-closed');
        // $( ".remodal-bg" ).addClass('remodal-is-openning');
    }
  });
}
function CargarAjax_Win(arch,vares,tipo){
	$('#contenedor_win').html('');
	$.ajax({
        type: tipo,
        url: arch,
        data: vares,
        success: function(msg){
        $('#contenedor_win').html(msg);
        console.log('iniciar modal');
        $("#modal").addClass('bounceInRight animated');
        }
      });
}

function CargarAjax(contenedor,arch, vares, tipo){
      $('#'+contenedor+'').html('');
      $.ajax({
        type: tipo,
        url: arch,
        data: vares,
        success: function(msg){
        $('#'+contenedor+'').html(msg);
        console.log('iniciar modal');
        }
      });
    }
function CAjax(arch, vares, tipo){
      $.ajax({
        type: tipo,
        url: arch,
        data: vares,
        success: function(msg){
        console.log('Success CAjax'+msg);
        }
      });
    }
function QRAjax(arch, vares, tipo,contenedor){
  $.ajax({
    type: tipo,
    url: arch,
    data: vares,
    success: function(msg){
    $("#"+contenedor+"").append(msg);
    }
  });
}
function VotoAjax(arch, vares, tipo){
  $.ajax({
    type: tipo,
    url: arch,
    data: vares,
    success: function(msg){
        $('body').append(msg);
    alert('Success '+msg);
    location.reload();
    console.log('Success '+msg);
    }
  });
}

function optionAjax(arch, vares, tipo,contenedor){
  $.ajax({
    type: tipo,
    url: arch,
    data: vares,
    success: function(msg){
//$("#"+contenedor+"").text(msg);
       num = msg.trim();
         $("#"+contenedor+"").attr("value",num);
          $("#"+contenedor+"").val(num);
          console.log(num);
//          $("#"+contenedor+"").val(msg);
    }
  });
}

function optionAjax2(arch, vares, tipo,contenedor1,contenedor2){
  $.ajax({
    type: tipo,
    url: arch,
    data: vares,
    success: function(msg){
//$("#"+contenedor+"").text(msg);
var cant_hm = msg.split("-");
         $("#"+contenedor1+"").attr("value",cant_hm[0]);
         $("#"+contenedor2+"").attr("value",cant_hm[1]);
          console.log('Success '+msg);
//          $("#"+contenedor+"").val(msg);
    }
  });
}

function option2Ajax(arch, vares, tipo,contenedor){
  $.ajax({
    type: tipo,
    url: arch,
    data: vares,
    success: function(msg){
    // $("#"+contenedor+"").text(msg);
    $("#"+contenedor+"").attr("value",msg);
          console.log('Success '+msg);
         // $("#"+contenedor+"").val(msg);
    }
  });
}

function validarSiNumero(numero){
    if (!/^([0-9])*$/.test(numero))
      alert("El valor " + numero + " no es un número");
  }

function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}





