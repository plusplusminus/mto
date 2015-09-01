<?php get_header(); ?>

<div class="single_page">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>
				
					<article class="page_article js-article">
						<h1 class="page_article--title page-<?php echo $post->ID;?>"><?php the_title(); ?></h1>
						<?php $image_id = get_post_meta($post->ID,'_ppm_page_logo_id',true); ?>
						<?php if (!empty($image_id)) : ?>
							<?php $image = wp_get_attachment_image_src($image_id,'full'); ?>
							<img class="img-responsive section_logo" src="<?php echo $image[0]; ?>"/>
						<?php endif; ?>
						<div class="article_entry page-<?php echo $post->ID;?>">
							<?php the_content(); ?>
						</div>
					</article>

					<?php endwhile; ?>
				
				<?php endif; ?>

			<?php wp_reset_query(); ?>

			</div>
		<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>