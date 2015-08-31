<?php /* Top Header Section */ ?>

<?php global $post; ?>



	<header class="header">
		<div class="bg-img">
			<?php the_post_thumbnail('full',array('class' => 'img-responsive')); ?>
		</div>
		
		<div class="title">
			<div class="container">
			<?php $heading = get_post_meta($post->ID,'_ppm_home_heading',true); ?>
			<h1><?php echo esc_html($heading);?></h1>
			<div class="subline">
				<div class="row">
					<div class="col-md-3">
						<h2>What Sets MTO Apart?</h2>
					</div>
					<div class="col-md-9">
						<p class="lead">We may define a food to be any substance which will repair the functional waste of the body, increase its growth, or maintain the heat, muscular, and nervous energy. </p>
					</div>
				</div>
			</p>
			</div>
		</div>
	</header>

	<button class="trigger" data-info="Scroll to explore"><span>Trigger</span></button>
	
	<article class="content">

		

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
			<?php while ( $child_pages->have_posts() ) : $child_pages->the_post(); $count++;?>
			    <?php $menu_item .= '<li class="menu_item"><a href="#page-'.$post->ID.'">'.get_the_title().'</a></li>'; ?>
				<div id="page-<?php echo $post->ID;?>" class="section_page">
					<div class="section_page--inner">
						<div class="container">
							<div class="row">
								<div class="col-md-9 col-md-offset-3">
									<h3><?php the_title(); ?></h3>
									<?php the_content(); ?>
									
								</div>
							</div>
							<div class="stamp">
								<?php the_post_thumbnail('full',array('class' => 'img-responsive')); ?>
							</div>
						</div>
					</div>
				</div>

			<?php endwhile; ?>

			<div id="sidebar-nav" class="sidenav affix" >
				<h4>Overview</h4>
				<ul>
					<?php echo $menu_item; ?>
				</ul>
			</div>

			<?php else : ?>
			<article <?php post_class(); ?>>
				<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
			</article><!-- /.post -->
		<?php endif; // End IF Statement ?> 
		


