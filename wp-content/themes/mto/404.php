<?php get_header(); ?>

<div class="single_page">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				
				<article class="page_article js-article">
						<h1 class="page_article--title page-<?php echo $post->ID;?>">Error 404.</h1>

						<div class="row">
							<div class="col-md-8">
								<div class="article_entry page-<?php echo $post->ID;?>">
									The page you were looking for was not found.<br>
									Please use the menu above or the search box below to find what you were looking for.

									<section class="search">

											<p><?php get_search_form(); ?></p>

									</section> <?php // end search section ?>

								</div>
							</div>

						</div>

				</article>

			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>