<?php get_header(); ?>

	<div class="single_page">
		<div class="container">
		<div class="row">
			<div class="col-md-8">
				<article class="page_article">
					<h1 class="page_article--title"><?php the_title(); ?></h1>
					<div class="article_entry">
						<?php the_content(); ?>
					</div>
				</article>
			</div>
			<?php get_sidebar(); ?>
		</div>

	</div>

<?php get_footer(); ?>