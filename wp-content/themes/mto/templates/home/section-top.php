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
			
		</div>
		<div class="subline">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<h2>What Sets MTO Apart?</h2>
					</div>
					<div class="col-md-9">
						<p class="lead">The MTO forestry group is built on solid foundations, with a renewed focus to reposition as a leading Pan-African timber product and solutions provider.</p>
					</div>
				</div>
			</div>
		</div>
	</header>

	<button class="trigger" data-info="Scroll to explore"><span>Trigger</span></button>
	
	<article class="content">

		

		<?php 
		global $post;

		$tmp = $post->ID;
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
									<?php the_excerpt(); ?>
									<a class="more_link js-overlay-link"  href="<?php the_permalink(); ?>">Find out more <i class="fa fa-chevron-right"></i></a>
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
				<h5 class="sidenav_title">Overview</h5>
				<ul class="sidenav_menu">
					<?php echo $menu_item; ?>
				</ul>
			</div>

			<?php else : ?>
			<article <?php post_class(); ?>>
				<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
			</article><!-- /.post -->
		<?php endif; // End IF Statement ?>
		<?php wp_reset_query(); ?>

	
		<?php $image_id = get_post_meta($tmp,'_ppm_video_image_id',true); ?>
		<?php $image = wp_get_attachment_image_src($image_id,'full'); ?>

		<section class="section_video" style="background-image:url('<?php echo $image[0];?>');">
			<img class="img-responsive hide" src="<?php echo $image[0]; ?>"/>
			<div class="video_inner">
				<div class="video_inner--content">
					<?php $link = get_post_meta($tmp,'_ppm_video_link',true); ?>
					<?php $about_link = get_post_meta($tmp,'_ppm_about_link',true); ?>

					<a class="btn btn-primary js-overlay-link"  href="<?php echo $link; ?>"><i class="fa fa-play fa-2x"> Watch Our Video</i></a>
					<a class="more_link"  href="<?php echo $about_link; ?>">Find Out More About Us<i class="fa fa-chevron-right"></i></a>
				</div>
			</div>
		</section> 
	</article>
		


