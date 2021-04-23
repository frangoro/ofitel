<?php get_header(); ?>

<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <!-- TITULO H1 DE PÁGINA -->
      <h1 class="my-4"> <?php 
        //Verificar que el archivo sea de fecha
        if(get_the_archive_title()){
          //Si es un archivo de fecha, mostrar el titulo de fecha
          the_archive_title();
        }
        //Si NO es una fecha
        else{
          //Mostrar el título del término
          single_term_title();            
        } ?> 
      </h1>
      <p><?php //Mostrar descripción del objeto
       echo term_description(); ?></p>

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <div class="card mb-4">
            <?php the_post_thumbnail(); ?>
            <div class="card-body">
              <h2 class="card-title"><?php the_title(); ?></h2>
              <p class="card-text"><?php the_excerpt(); ?></p>
              <a href="<?php the_permalink(); ?>" class="btn btn-primary">Leer más &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              <?php echo get_the_date(); ?> - <?php the_author(); ?>
            </div>
          </div>
        <?php endwhile;
      else : ?>
        <p>Lo siento, no hemos encontrado ningún post.</p>
      <?php endif; ?>

      <!-- Blog Post -->
      <div class="card mb-4">
        <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
        <div class="card-body">
          <h2 class="card-title">Post Title</h2>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
          <a href="#" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
          Posted on January 1, 2020 by
          <a href="#">Start Bootstrap</a>
        </div>
      </div>

      <!-- Blog Post -->
      <div class="card mb-4">
        <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
        <div class="card-body">
          <h2 class="card-title">Post Title</h2>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
          <a href="#" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
          Posted on January 1, 2020 by
          <a href="#">Start Bootstrap</a>
        </div>
      </div>

      <!-- Blog Post -->
      <div class="card mb-4">
        <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
        <div class="card-body">
          <h2 class="card-title">Post Title</h2>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
          <a href="#" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
          Posted on January 1, 2020 by
          <a href="#">Start Bootstrap</a>
        </div>
      </div>

      <!-- Pagination -->
      <nav class="ofitel-paginacion">
        <?php echo paginate_links(); ?>
      </nav>

    </div>

    <!-- Sidebar Widgets Column -->
    <?php get_sidebar(); ?>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

<?php get_footer(); ?>