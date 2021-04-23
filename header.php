<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <?php the_custom_logo(); ?>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php
      $menu_ofitel = array(
            'menu'            => 'menu-principal',
            'container'       => 'div',
            'container_class' => 'collapse navbar-collapse',
            'container_id'    => 'navbarResponsive',
            'menu_class'      => 'navbar-nav ml-auto',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'item_spacing'    => 'preserve',
            'depth'           => 0,
            'walker'          => '',
            'theme_location'  => '',
        );
        wp_nav_menu($menu_ofitel);
        ?>
    </div>
  </nav>