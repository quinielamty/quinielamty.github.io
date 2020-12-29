/*=============================================
EQUIPO 1
=============================================*/
var local1 = document.getElementById('local1');
local1.addEventListener( 'change', function() {
    if(this.checked) {
      valorlocal1= true;
      result = "L";
              $("#local1").prop('checked', valorlocal1)
   $("#empate1").prop('checked', false)
       $("#visitante1").prop('checked', false)
       CheckEQ1();
    }
});

var empate1 = document.getElementById('empate1');
empate1.addEventListener( 'change', function() {
    if(this.checked) {
      valorempate1= true;
      result = "E";
        $("#local1").prop('checked', false)
   $("#empate1").prop('checked', valorempate1)
       $("#visitante1").prop('checked', false)
       CheckEQ1();
    }
});

var visitante1 = document.getElementById('visitante1');
visitante1.addEventListener( 'change', function() {
    if(this.checked) {
      valorvisitante1= true;
      result = "V";
        $("#local1").prop('checked', false)
   $("#empate1").prop('checked', false)
       $("#visitante1").prop('checked', valorvisitante1)
       CheckEQ1();
    }
});

function CheckEQ1(){
document.getElementById('pronostico1').innerHTML = result;
$("#pronostico1hidden").val(result);

  }


/*=============================================
EQUIPO 2
=============================================*/
var local2 = document.getElementById('local2');
local2.addEventListener( 'change', function() {
    if(this.checked) {
      valorlocal2= true;
      result = "L";
              $("#local2").prop('checked', valorlocal2)
   $("#empate2").prop('checked', false)
       $("#visitante2").prop('checked', false)
       CheckEQ2();
    }

});

var empate2 = document.getElementById('empate2');
empate2.addEventListener( 'change', function() {
    if(this.checked) {
      valorempate2= true;
      result = "E";
        $("#local2").prop('checked', false)
   $("#empate2").prop('checked', valorempate2)
       $("#visitante2").prop('checked', false)
       CheckEQ2();
    }

});

var visitante2 = document.getElementById('visitante2');
visitante2.addEventListener( 'change', function() {
    if(this.checked) {
      valorvisitante2= true;
      result = "V";
        $("#local2").prop('checked', false)
   $("#empate2").prop('checked', false)
       $("#visitante2").prop('checked', valorvisitante2)
       CheckEQ2();
    }
});

function CheckEQ2(){
document.getElementById('pronostico2').innerHTML = result;
$("#pronostico2hidden").val(result);
  }


/*=============================================
EQUIPO 3
=============================================*/
var local3 = document.getElementById('local3');
local3.addEventListener( 'change', function() {
    if(this.checked) {
      valorlocal3= true;
      result = "L";
              $("#local3").prop('checked', valorlocal3)
   $("#empate3").prop('checked', false)
       $("#visitante3").prop('checked', false)
       CheckEQ3();
    }

});

var empate3 = document.getElementById('empate3');
empate3.addEventListener( 'change', function() {
    if(this.checked) {
      valorempate3= true;
      result = "E";
        $("#local3").prop('checked', false)
   $("#empate3").prop('checked', valorempate3)
       $("#visitante3").prop('checked', false)
       CheckEQ3();
    }

});

var visitante3 = document.getElementById('visitante3');
visitante3.addEventListener( 'change', function() {
    if(this.checked) {
      valorvisitante3= true;
      result = "V";
        $("#local3").prop('checked', false)
   $("#empate3").prop('checked', false)
       $("#visitante3").prop('checked', valorvisitante3)
       CheckEQ3();
    }
});

function CheckEQ3(){
document.getElementById('pronostico3').innerHTML = result;
$("#pronostico3hidden").val(result);
  }

/*=============================================
EQUIPO 4
=============================================*/
var local4 = document.getElementById('local4');
local4.addEventListener( 'change', function() {
    if(this.checked) {
      valorlocal4= true;
      result = "L";
              $("#local4").prop('checked', valorlocal4)
   $("#empate4").prop('checked', false)
       $("#visitante4").prop('checked', false)
       CheckEQ4();
    }

});

var empate4 = document.getElementById('empate4');
empate4.addEventListener( 'change', function() {
    if(this.checked) {
      valorempate4= true;
      result = "E";
        $("#local4").prop('checked', false)
   $("#empate4").prop('checked', valorempate4)
       $("#visitante4").prop('checked', false)
       CheckEQ4();
    }

});

var visitante4 = document.getElementById('visitante4');
visitante4.addEventListener( 'change', function() {
    if(this.checked) {
      valorvisitante4= true;
      result = "V";
        $("#local4").prop('checked', false)
   $("#empate4").prop('checked', false)
       $("#visitante4").prop('checked', valorvisitante4)
       CheckEQ4();
    }
});

function CheckEQ4(){
document.getElementById('pronostico4').innerHTML = result;
$("#pronostico4hidden").val(result);
  }
  /*=============================================
EQUIPO 5
=============================================*/
var local5 = document.getElementById('local5');
local5.addEventListener( 'change', function() {
    if(this.checked) {
      valorlocal5= true;
      result = "L";
              $("#local5").prop('checked', valorlocal5)
   $("#empate5").prop('checked', false)
       $("#visitante5").prop('checked', false)
       CheckEQ5();
    }

});

var empate5 = document.getElementById('empate5');
empate5.addEventListener( 'change', function() {
    if(this.checked) {
      valorempate5= true;
      result = "E";
        $("#local5").prop('checked', false)
   $("#empate5").prop('checked', valorempate5)
       $("#visitante5").prop('checked', false)
       CheckEQ5();
    }

});

var visitante5 = document.getElementById('visitante5');
visitante5.addEventListener( 'change', function() {
    if(this.checked) {
      valorvisitante5= true;
      result = "V";
        $("#local5").prop('checked', false)
   $("#empate5").prop('checked', false)
       $("#visitante5").prop('checked', valorvisitante5)
       CheckEQ5();
    }
});

function CheckEQ5(){
document.getElementById('pronostico5').innerHTML = result;
$("#pronostico5hidden").val(result);
  }

    /*=============================================
EQUIPO 6
=============================================*/
var local6 = document.getElementById('local6');
local6.addEventListener( 'change', function() {
    if(this.checked) {
      valorlocal6= true;
      result = "L";
              $("#local6").prop('checked', valorlocal6)
   $("#empate6").prop('checked', false)
       $("#visitante6").prop('checked', false)
       CheckEQ6();
    }

});

var empate6 = document.getElementById('empate6');
empate6.addEventListener( 'change', function() {
    if(this.checked) {
      valorempate6= true;
      result = "E";
        $("#local6").prop('checked', false)
   $("#empate6").prop('checked', valorempate6)
       $("#visitante6").prop('checked', false)
       CheckEQ6();
    }

});

var visitante6 = document.getElementById('visitante6');
visitante6.addEventListener( 'change', function() {
    if(this.checked) {
      valorvisitante6= true;
      result = "V";
        $("#local6").prop('checked', false)
   $("#empate6").prop('checked', false)
       $("#visitante6").prop('checked', valorvisitante6)
       CheckEQ6();
    }
});

function CheckEQ6(){
document.getElementById('pronostico6').innerHTML = result;
$("#pronostico6hidden").val(result);
  }
    /*=============================================
EQUIPO 7
=============================================*/
var local7 = document.getElementById('local7');
local7.addEventListener( 'change', function() {
    if(this.checked) {
      valorlocal7= true;
      result = "L";
              $("#local7").prop('checked', valorlocal7)
   $("#empate7").prop('checked', false)
       $("#visitante7").prop('checked', false)
       CheckEQ7();
    }

});

var empate7 = document.getElementById('empate7');
empate7.addEventListener( 'change', function() {
    if(this.checked) {
      valorempate7= true;
      result = "E";
        $("#local7").prop('checked', false)
   $("#empate7").prop('checked', valorempate7)
       $("#visitante7").prop('checked', false)
       CheckEQ7();
    }

});

var visitante7 = document.getElementById('visitante7');
visitante7.addEventListener( 'change', function() {
    if(this.checked) {
      valorvisitante7= true;
      result = "V";
        $("#local7").prop('checked', false)
   $("#empate7").prop('checked', false)
       $("#visitante7").prop('checked', valorvisitante7)
       CheckEQ7();
    }
});

function CheckEQ7(){
document.getElementById('pronostico7').innerHTML = result;
$("#pronostico7hidden").val(result);
  }

    /*=============================================
EQUIPO 8
=============================================*/
var local8 = document.getElementById('local8');
local8.addEventListener( 'change', function() {
    if(this.checked) {
      valorlocal8= true;
      result = "L";
              $("#local8").prop('checked', valorlocal8)
   $("#empate8").prop('checked', false)
       $("#visitante8").prop('checked', false)
       CheckEQ8();
    }

});

var empate8 = document.getElementById('empate8');
empate8.addEventListener( 'change', function() {
    if(this.checked) {
      valorempate8= true;
      result = "E";
        $("#local8").prop('checked', false)
   $("#empate8").prop('checked', valorempate8)
       $("#visitante8").prop('checked', false)
       CheckEQ8();
    }

});

var visitante8 = document.getElementById('visitante8');
visitante8.addEventListener( 'change', function() {
    if(this.checked) {
      valorvisitante8= true;
      result = "V";
        $("#local8").prop('checked', false)
   $("#empate8").prop('checked', false)
       $("#visitante8").prop('checked', valorvisitante8)
       CheckEQ8();
    }
});

function CheckEQ8(){
document.getElementById('pronostico8').innerHTML = result;
$("#pronostico8hidden").val(result);
  }
    /*=============================================
EQUIPO 9
=============================================*/
var local9 = document.getElementById('local9');
local9.addEventListener( 'change', function() {
    if(this.checked) {
      valorlocal9= true;
      result = "L";
              $("#local9").prop('checked', valorlocal9)
   $("#empate9").prop('checked', false)
       $("#visitante9").prop('checked', false)
       CheckEQ9();
    }

});

var empate9 = document.getElementById('empate9');
empate9.addEventListener( 'change', function() {
    if(this.checked) {
      valorempate9= true;
      result = "E";
        $("#local9").prop('checked', false)
   $("#empate9").prop('checked', valorempate9)
       $("#visitante9").prop('checked', false)
       CheckEQ9();
    }

});

var visitante9 = document.getElementById('visitante9');
visitante9.addEventListener( 'change', function() {
    if(this.checked) {
      valorvisitante9= true;
      result = "V";
        $("#local9").prop('checked', false)
   $("#empate9").prop('checked', false)
       $("#visitante9").prop('checked', valorvisitante9)
       CheckEQ9();
    }
});

function CheckEQ9(){
document.getElementById('pronostico9').innerHTML = result;
$("#pronostico9hidden").val(result);
  }
