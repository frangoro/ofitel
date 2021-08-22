<?php
/* Template Name: contact */
?>

<?php
if(isset($_POST['submitted'])) {
    if(trim($_POST['contactName']) === '') {
        $nameError = 'Please enter your name.';
        $hasError = true;
    } else {
        $name = trim($_POST['contactName']);
    }

    if(trim($_POST['email']) === '')  {
        $emailError = 'Please enter your email address.';
        $hasError = true;
    } else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+.[a-z]{2,4}$/i", trim($_POST['email']))) {
        $emailError = 'You entered an invalid email address.';
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }

    if(trim($_POST['comments']) === '') {
        $commentError = 'Please enter a message.';
        $hasError = true;
    } else {
        if(function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['comments']));
        } else {
            $comments = trim($_POST['comments']);
        }
    }

    if(!isset($hasError)) {
        $emailTo = get_option('tz_email');
        if (!isset($emailTo) || ($emailTo == '') ){
            $emailTo = get_option('admin_email');
        }
        $subject = '[PHP Snippets] From '.$name;
        $body = 'Name: $name nnEmail: $email nnComments: $comments';
        $headers = 'From: '.$name.' <'.$emailTo.'>' . "rn" . 'Reply-To: ' . $email;
        wp_mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
    }
} 
?>

<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if (astra_page_layout() == 'left-sidebar') : ?>

    <?php get_sidebar(); ?>

<?php endif ?>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
    <h2>Crea tu propio sello</h2>
        <p>
            Envíanos tu diseño y te responderemos lo antes posible para validarlo contigo sin ningún compromiso.
            <img src="https://39786474.servicio-online.net/wp-content/uploads/2021/06/sellos.jpg" alt="Sello de ejemplo" width="120" height="120">
        </p>
    <form role="form" action="<?php the_permalink(); ?>" id="contactForm" method="post" enctype="multipart/form-data">
        <div class="form-group">
                <label for="contactName">Nombre de contacto:</label>
                <input type="text" name="contactName" id="contactName" value="" />
        </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" value="" required/>
            </div>
            <button type="submit" class="btn btn-lg btn-success pull-right" id="btnContactUs">Enviar →</button>

            <div class="form-group">
                <label for="commentsText">Comentarios:</label>
                <textarea name="comments" id="commentsText" rows="20″ cols="30″></textarea>
            </div>         

            <div class="form-group">
                <label for="myfile">Incluir imagen:</label>
                <input type="file" id="myfile" name="myfile" class="form-control">
                <p>Admite: pdf, docx, odt, jpg...</p> 
            </div>

            <div class="form-group">
                <label for="stamp_sizes">Elige un tamaño:</label>
                <select name="stamp_sizes" id="stamp_sizes" >
                    <option value="20x50">20x50</option>
                    <option value="20x51">20x51</option> 
                    <option value="20x52">20x52</option> 
                    <option value="20x53">20x53</option>            
                </select> 
            </div>

            <div class="form-group">
                <p>Elige el color de la tinta:</p>
                <input type="radio" id="negro" name="ink_color" value="negro">
                <label for="html">Negro</label><br>
                <input type="radio" id="azul" name="ink_color" value="azul">
                <label for="css">Azul</label><br>
            </div>
            

        </div>

        <input type="hidden" name="submitted" id="submitted" value="true" />

    </form>
    <div>
        <p>Nos pondremos en contacto contigo lo antes posible para confirmar el pedido.</p>
        <p>La creación del sello suele tardar unas 24 horas.</p>
    </div>
    <div id="success_message" style="width:100%; height:100%; display:none; ">
        <h3>¡Petición enviada correctamente!</h3>
    </div>
    <div id="error_message" style="width:100%; height:100%; display:none; ">
        <h3>Error: </h3>Se produjo un error al enviar el formulario. Si lo prefiere mándenos un email directamente: ofiteldigital@gmail.com
    </div>
</div>

<div id="primary" <?php astra_primary_class(); ?>>

    <?php astra_primary_content_top(); ?>

    <?php astra_content_page_loop(); ?>

    <?php astra_primary_content_bottom(); ?>

</div><!-- #primary -->

<?php if (astra_page_layout() == 'right-sidebar') : ?>

    <?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>