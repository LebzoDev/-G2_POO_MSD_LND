$(function(){

    var erreur
    $('#creerChambre').click(function(e){
      var numero = $('#numero').val();
      var numeroBatiment = $('#numeroBatiment').val();
      var type = $('#type').val();
      console.log(numero);
      console.log(numeroBatiment);
      console.log(type);
      var erreur;
      if (numero==null  | numero=='') {
        $('#error-1').html('*Ce champ est obligatoire...');
        erreur= true;
      }
      if (numeroBatiment==null  | numeroBatiment=='') {
        $('#error-2').html('*Ce champ est obligatoire...');
        erreur = true;
      }
      if ((type == "Veuillez choisir")){
        $('#error-3').html('*Veuillez choisir un type...');
        erreur = true;
      }
      if (erreur) {
        e.preventDefault();
        return false;
      }
    
});

    $("#numero").keyup(function(){
      $('#error-1').html('');
    })
    $("#numeroBatiment").keyup(function(){
      $('#error-2').html('');
    })
    $("#type").click(function(){
      $('#error-3').html('');
    })

  })