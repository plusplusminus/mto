<?php /* Template Name: Header Video */ ?>
<?php get_header(); ?>

<div class="single_page">
	<div class="container">
		
	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="row">
				<div class="col-md-6 page_header">
					<h1 class="page_article--title"><?php the_title(); ?></h1>
					<div class="page_article js-article">
						<div class="article_entry">
							<?php the_content(); ?>
						</div>
					</div>
				</div>

				<div class="col-md-6 page_video post">
					<?php
					$url = esc_url( get_post_meta( get_the_ID(), '_ppm_header_video', 1 ) );
					echo wp_oembed_get( $url );
					?>
				</div>
			</div>
			<br><br>

		<?php endwhile; ?>
	
	<?php endif; ?>

	<?php wp_reset_query(); ?>

	<?php 
		global $post;
		$args = array(
			'order'          => 'ASC',
			'post_type'      => 'page',
			'post_parent'    => $post->ID,
			'posts_per_page'    => -1,
		);

		$child_pages = new WP_Query( $args );

		?>

		<?php if ( $child_pages->have_posts() ) : $count = 0; ?>
			<?php $menu_item = ''; ?>
			<div class="row">
			<?php while ( $child_pages->have_posts() ) : $child_pages->the_post(); $count++;?>
			
						
				<div class="col-md-4">
					<div class="thumbnail">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('full',array('class' => 'img-responsive')); ?>
						</a>
						<div class="caption">
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						</div>
					</div>
				</div>

			<?php endwhile; ?>
			</div>
		<?php endif; ?>



	</div>
</div>

<?php get_footer(); ?>