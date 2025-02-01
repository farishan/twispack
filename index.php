<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
	  <meta charset="<?php bloginfo( 'charset' ); ?>">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

	  <?php wp_head(); ?>
	</head>

  <body <?php body_class(); ?>>
    <header class="py-8 border-b">
      <?php $logo_dark = get_option('logo_dark'); ?>
      <?php $logo_light = get_option('logo_light'); ?>
      <div class="container">
        <h1 class="text-3xl font-bold">
          <a href="/">
            <?php if ($logo_dark) : ?>
              <img src="<?php echo $logo_dark; ?>" alt="<?php bloginfo( 'name' ); ?>" class=" max-w-40 object-contain" />
            <?php else: ?>
              <?php bloginfo( 'name' ); ?>
            <?php endif; ?>
          </a>
        </h1>
      </div>
	  </header>

    <main id="main" class="container mx-auto py-8 lg:py-16">
      <?php if ( have_posts() ) : ?>
        <section>
          <?php while ( have_posts() ) : the_post(); ?>
            <?php if ( is_single() || is_page() ) : ?>
              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header>
                  <?php the_category(); ?>
                  <h1><?php the_title(); ?></h1>
                  <p><?php the_author(); ?></p>
                  <p><?php the_date(); ?></p>
                </header>
                <div>
                  <?php the_content(); ?>
                </div>
                <footer>
                  <?php the_tags(); ?>
                </footer>
              </article>
            <?php else : ?>
              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header>
                  <figure><?php the_post_thumbnail(); ?></figure>
                  <a href="<?php the_permalink(); ?>">
                    <h2><?php the_title(); ?></h2>
                  </a>
                  <p><?php the_author(); ?></p>
                  <p><?php the_date(); ?></p>
                </header>
                <div>
                  <?php the_excerpt(); ?>
                </div>
              </article>
            <?php endif; ?>
          <?php endwhile; ?>
        </section>
      <?php else: ?>
        <?php if( is_404()) : ?>
          <p>Sorry, we couldn't find your page.</p>
        <?php endif; ?>
      <?php endif; ?>
    </main>

    <footer class="py-8 border-t">
      <div class="container">
        <p>Copyright &copy; <?php echo date('Y'); ?></p>
      </div>
    </footer>

    <?php wp_footer(); ?>
  </body>
</html>