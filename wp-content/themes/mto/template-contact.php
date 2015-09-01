<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

<div class="single_page">
	<div class="container">
		<div class="row">
			<div class="col-md-4">

				<aside class="section_sidebar">
					<?php $groups = get_post_meta($post->ID,'_ppm_contact_group',true); ?>
					<?php if (!empty($groups)) : $count = 0; ?>
						<div class="list-group list-group-collapse" id="accordion">
							<?php foreach ($groups as $key => $group) : $count++; ?>
								<?php $name = $group['name'];?>
								<?php $telephone = $group['telephone'];?>
								<?php $mobile = $group['mobile'];?>
								<?php $email = $group['email'];?>
								<?php $description = $group['description'];?>
								
								<a href="#collapse<?php echo $count; ?>" class="list-group-item" data-toggle="collapse" data-parent="#accordion"><span><?php echo $group['title']; ?></span></a>
								<div id="collapse<?php echo $count; ?>" class="panel collapse collapse-content-holder">
						            <div class="collapse-content panel-body">
						            	<ul class="fa-ul">
						            		<?php if (!empty($name)) { ?>
						            	  		<li class="name"><i class="fa-li fa fa-user"></i> <?php echo $name;?></li>
						            	  	<?php };?>
						            	  	<?php if (!empty($telephone)) { ?>
						            	  		<li class="telephone"><i class="fa-li fa fa-phone"></i> <a href="tel:<?php echo $telephone;?>"><?php echo $telephone;?></a></li>
						            	  	<?php };?>
						            	  	<?php if (!empty($mobile)) { ?>
						            	  		<li class="mobile"><i class="fa-li fa fa-mobile"></i> <a href="tel:<?php echo $mobile;?>"><?php echo $mobile;?></a></li>
						            	  	<?php };?>
						            	  	<?php if (!empty($email)) { ?>
						            	  		<li class="email"><i class="fa-li fa fa-envelope-o"></i> <a target="_blank" href="mailto:<?php echo $email;?>"><?php echo $email;?></a></li>
											<?php };?>
						            	  	<?php if (!empty($description)) { ?>
						            	  		<li class="description"><i class="fa-li fa fa-map-marker"></i> <?php echo wpautop($description);?></li>
						            	  	<?php };?>
						            	</ul>
						            </div>
						        </div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

				</aside>
			</div>
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
		</div>
	</div>
</div>

<?php get_footer(); ?>
