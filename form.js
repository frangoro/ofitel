//Add JQuery compatibility mode
/*$.noConflict();
jQuery(document).ready(function(){
  jQuery("button").click(function(){
jQuery("p").text("jQuery is still working!");
  });
});*/

jQuery(document).ready(function( $ ) {

    function after_form_submitted(data) 
    {
        console.log(data);
        if(data.result == 'success')
        {
            $('form#contactForm').hide();
            $('#success_message').show();
            $('#error_message').hide();
        }
        else
        {
            $('#error_message').append('<ul></ul>');

            jQuery.each(data.errors,function(key,val)
            {
                $('#error_message ul').append('<li>'+key+':'+val+'</li>');
            });
            $('#success_message').hide();
            $('#error_message').show();

            //reverse the response on the button
            $('button[type="button"]', $form).each(function()
            {
                $btn = $(this);
                label = $btn.prop('orig_label');
                if(label)
                {
                    $btn.prop('type','submit' ); 
                    $btn.text(label);
                    $btn.prop('orig_label','');
                }
            });
            
        }//else
    }

	$('#contactForm').submit(function(e) {
        e.preventDefault();

        $form = $(this);
        //show some response on the button
        $('button[type="submit"]', $form).each(function()
        {
            $btn = $(this);
            $btn.prop('type','button' ); 
            $btn.prop('orig_label',$btn.text());
            $btn.text('Enviando ...');
        });
        
        var formdata = new FormData(this);
        $.ajax({
            type: "POST",
            url: ofitel_object.templateUrl + '/handler.php',
            data: formdata,
            success: after_form_submitted,
            dataType: 'json' ,
            processData: false,
            contentType: false,
            cache: false        
        });   
    });	
});
