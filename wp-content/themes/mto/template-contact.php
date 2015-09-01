<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

<div class="single_page">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php if ( have_posts() ) : ?>

						<?php while ( have_posts() ) : the_post(); ?>
					
						<article class="page_article js-article">
							<h1 class="page_article--title page-<?php echo $post->ID;?>"><?php the_title(); ?></h1>
						
							<div class="article_entry page-<?php echo $post->ID;?>">
								<?php the_content(); ?>
							</div>
						</article>

						<?php endwhile; ?>
					
					<?php endif; ?>

				<?php wp_reset_query(); ?>
			</div>

			<div class="col-md-3 col-md-offset-1">

				<aside class="section_sidebar">
					<?php $groups = get_post_meta($post->ID,'_ppm_contact_group',true); ?>
					<?php if (!empty($groups)) : $count = 0; ?>
						<div class="list-group list-group-collapse" id="accordion">
							<h3 class="section_widget--title">Contact Information</h3>
							<?php foreach ($groups as $key => $group) : $count++; ?>
								<?php $address = $group['address'];?>
								<?php $telephone = $group['telephone'];?>
								<?php $fax = $group['fax'];?>
								<?php $email = $group['email'];?>
								<?php $location = $group['location'];?>
								
								<a href="#collapse<?php echo $count; ?>" class="list-group-item" data-toggle="collapse" data-parent="#accordion"><span><?php echo $group['title']; ?></span></a>
								<div id="collapse<?php echo $count; ?>" class="collapse collapse-content-holder">
						            <div class="collapse-content panel-body">
						            	<ul class="fa-ul">
						            		<?php if (!empty($address)) { ?>
						            	  		<li class="address"><i class="fa-li fa fa-envelope"></i> <?php echo $address;?></li>
						            	  	<?php };?>
						            	  	<?php if (!empty($telephone)) { ?>
						            	  		<li class="telephone"><i class="fa-li fa fa-phone"></i> <a href="tel:<?php echo $telephone;?>"><?php echo $telephone;?></a></li>
						            	  	<?php };?>
						            	  	<?php if (!empty($fax)) { ?>
						            	  		<li class="fax"><i class="fa-li fa fa-fax"></i> <?php echo $fax;?></li>
						            	  	<?php };?>
						            	  	<?php if (!empty($email)) { ?>
						            	  		<li class="email"><i class="fa-li fa fa-envelope-o"></i> <a target="_blank" href="mailto:<?php echo $email;?>"><?php echo $email;?></a></li>
											<?php };?>
						            	  	<?php if (!empty($location)) { ?>
						            	  		<li class="location"><i class="fa-li fa fa-map-marker"></i> <?php echo wpautop($location);?></li>
						            	  	<?php };?>
						            	</ul>
						            </div>
						        </div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

				</aside>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
