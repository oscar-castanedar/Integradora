

  $("#puntaje1").change(function() {
    if($("#puntaje1").val() == "50" && $("#puntaje2").val() == "50"){

        $("#puntaje3").val("0");
     
        $('#puntaje3').prop('disabled', true);
    
    }else{
        $('#puntaje2').prop('disabled', false);
      $('#puntaje3').prop('disabled', false);
     
    }
  });

  
  $("#puntaje2").change(function() {
    if($("#puntaje2").val() == "50" && $("#puntaje3").val() == "50"){
     
        $("#puntaje1").val("0");
     
  
        $('#puntaje1').prop('disabled', true);
     
    }else{
        $('#puntaje3').prop('disabled', false);
        $('#puntaje1').prop('disabled', false);
    }
  });

  $("#puntaje3").change(function() {
    if($("#puntaje3").val() == "50" && $("#puntaje1").val() == "50"){
        $("#puntaje2").val("0");
       
     
      
    
        $('#puntaje2').prop('disabled', 'disabled');
       
    }else{
        $('#puntaje2').prop('disabled', false);
        $('#puntaje1').prop('disabled', false);
    }
  });
  $("#puntaje1").change(function() {
    if($("#puntaje1").val() == "100"){
        $("#puntaje2").val("0");
        $("#puntaje3").val("0");
     
        $('#puntaje2').prop('disabled', 'disabled');
        $('#puntaje3').prop('disabled', 'disabled');
    
    }else{
        $('#puntaje2').prop('disabled', false);
      $('#puntaje3').prop('disabled', false);
     
    }
  });
  $("#puntaje2").change(function() {
    if($("#puntaje2").val() == "100"){
        $("#puntaje3").val("0");
        $("#puntaje1").val("0");
     
        $('#puntaje3').prop('disabled', true);
        $('#puntaje1').prop('disabled', true);
     
    }else{
        $('#puntaje3').prop('disabled', false);
        $('#puntaje1').prop('disabled', false);
    }
  });
  
  $("#puntaje3").change(function() {
    if($("#puntaje3").val() == "100"){
        $("#puntaje2").val("0");
        $("#puntaje1").val("0");
     
      
        $('#puntaje1').prop('disabled', 'disabled');
        $('#puntaje2').prop('disabled', 'disabled');
       
    }else{
        $('#puntaje2').prop('disabled', false);
        $('#puntaje1').prop('disabled', false);
    }


     ;
     puntaje2 = document.getElementById("puntaje2");
     puntaje3 = document.getElementById("puntaje3");

     
window.calculateSumListener = function calculateSumListener() {
  //Devuelve el valor del input #firstNumber
  
  var puntaje1 = document.getElementById("puntaje1").value;
  //Devuelve el valor del input #secondNumber
  var puntaje2 = document.getElementById("puntaje2").value;

  var puntaje3 = document.getElementById("puntaje3").value;

  var result = parseInt(puntaje1) + parseInt(puntaje2) + parseInt(puntaje3);

  if(result == "100"){
    
  }else{
    alert('El total del puntaje no suma el 100% por lo cuál su pregunta no será insertada');
    window.history.go(-1);
  }



  
    
  };

     
  });



 /* $("#tema").change(function () {
      var value = $(this).val();
      $("#idTema").val(value);
  });*/