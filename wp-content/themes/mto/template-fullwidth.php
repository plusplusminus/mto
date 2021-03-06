<?php /* Template Name: Full Width */ ?>

<?php get_header(); ?>

<div class="single_page">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>
				
					<article class="page_article js-article">
						<h1 class="page_article--title"><?php the_title(); ?></h1>
					
						<div class="article_entry">
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