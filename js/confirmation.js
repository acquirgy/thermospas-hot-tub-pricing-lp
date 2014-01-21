jQuery(function(){

  $('#cfm-form1').submit( function(e) {

    form = $(this);

    e.preventDefault();
    if( form.hasClass('valid') ) {
      $.ajax({
        type: "POST",
        url: "ajax.php",
        data: form.serialize()
      }).done(function( msg ) {
        form.slideUp();
        $('.success').show();
        $('#subtitle1').hide();

      });
    }

  });


});