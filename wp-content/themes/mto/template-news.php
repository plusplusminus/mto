<?php
/*
Template Name: Page - News
*/
?>

<?php get_header(); ?>

<?php

	$paged = 1;
	if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
	if ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
	$paged = intval( $paged );

	$query_args = array(
		'post_type' => 'post',
		'paged' => $paged,
		'cat' => $category[0]
	);

	$query =  new WP_Query($query_args);

?>
    <div class="container">

			<div id="content" class="row clearfix">

						<div id="main" class="col-md-8 clearfix" role="main">

			              <header class="page-head article-header">
			                
			                <div class=""><h1 class="page-title entry-title" itemprop="headline"><?php the_title(); ?></h1></div>
			              
			              </header> <!-- end article header -->

							<?php if ( $query->have_posts() ) : $count = 0; ?>

							<?php while ( $query->have_posts() ) : $query->the_post(); $count++;?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

								<header class="article-header">
									<div class="titlewrap clearfix">
										<h1 class="post-title entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									</div>
								</header> <?php // end article header ?>

								<?php global $brew_options; ?>
    								<?php if( $brew_options['featured'] == '2' || ( $brew_options['featured'] == '4' && is_single() ) || ( $brew_options['featured'] == '3' && is_home() ) ) { ?>
										<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-featured' ); ?>
										<?php if ( $image[1] < '750' && has_post_thumbnail() ) { ?>
											<section class="featured-content featured-img featured-img-bg" style="background: url('<?php echo $image[0]; ?>')">
										<?php } // end if 
										else { ?>
											<section class="featured-content featured-img">
												<?php if ( has_post_thumbnail() ) { ?>
				                                    <a class="featured-img" href="<?php the_permalink(); ?>">
				                                    	<?php the_post_thumbnail( 'post-featured' ); ?>
				                                    </a>
					                            <?php } // end if 
												else { ?>
					                            	<hr>
					                            <?php } //end else?>
						                <?php } // end else ?>
									<?php } // end if 
									else { ?>
										<section class="featured-content featured-img">
									<?php } // end else ?>

								</section>

								<section class="entry-content clearfix">
									<?php the_excerpt(); ?>
									
									<?php wp_link_pages(
                                		array(
                                		
	                                        'before' => '<div class="page-link"><span>' . __( 'Pages:', 'brew' ) . '</span>',
	                                        'after' => '</div>'
                                		) 
                                	); ?>
								</section> <?php // end article section ?>
								<hr>
								<footer class="article-footer clearfix">
									<span class="tags pull-left"><?php printf( '<span class="">' . __( 'in %1$s&nbsp;&nbsp;', 'bonestheme' ) . '</span>', get_the_category_list(', ') ); ?> <?php the_tags( '<span class="tags-title">' . __( '<i class="fa fa-tags"></i>', 'bonestheme' ) . '</span> ', ', ', '' ); ?></span>
									<span class="pull-right"><a class="more_link"  href="<?php the_permalink(); ?>">Read more <i class="fa fa-chevron-right"></i></a></span>

            					</footer> <?php // end article footer ?>
            					<hr>
							</article> <?php // end article ?>

							<?php endwhile; ?>


                  <?php if (function_exists("emm_paginate")) { ?>
                      <?php emm_paginate(); ?>
									<?php } else { ?>
											<nav class="wp-prev-next">
													<ul class="clearfix">
														<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' )) ?></li>
														<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'bonestheme' )) ?></li>
													</ul>
											</nav>
									<?php } ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry clearfix">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>


							<?php endif; ?>

						</div> <?php // end #main ?>


						<?php get_sidebar(); ?>


			</div> <?php // end #content ?>

    </div> <!-- end ./container -->

<?php get_footer(); ?>
