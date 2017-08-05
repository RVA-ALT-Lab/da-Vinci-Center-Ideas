<?php
/**
 * Template Name: Ideas
 *
 * Template for ideas.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_html( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">
				
					    <?php the_content();?>
					      <?php         
					      $fac_email = wp_get_post_terms(get_the_ID(), 'emails');
					          // args
					          $args = array(
					            'numberposts' => 20,
					            'post_type'   => 'post',
					          	'cat' => 3					            
					          );


					          // query
					          $the_query = new WP_Query( $args );

					          ?>
			</div> 


					        <?php if( $the_query->have_posts() ): ?>
					          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					           <div class="card" style="width: 20rem;">
								  <img class="card-img-top" src="<?php the_post_thumbnail_url('large');?>" alt="idea image representation">
								  <div class="card-block">
								    <a href="<?php the_permalink();?>"><h4 class="card-title"><?php the_title();?></h4></a>
								    <p class="card-text"><?php $idea_summary = get_post_custom_values( 'idea_summary' ); echo $idea_summary[0];?></p>
								    <!--<a href="<?php the_permalink();?>" class="btn btn-primary">Learn More</a>-->
								    <div class="idea-author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></div>
								    <div class="idea-data"><?php the_modified_date();?></div>
								    <?php if( function_exists('dot_irecommendthis') ) dot_irecommendthis(); ?>
								    <br/>
								    <i class="idea-comments fa fa-comments-o" aria-hidden="true"></i><?php comments_number( '', '%', '%' ); ?>								   
								    <div class="idea-update"></div>
								  </div>
								</div>

					          <?php endwhile; ?>
					        <?php endif; ?>

          <?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>


				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->



<?php get_footer(); ?>
