<?php get_header(); ?>

<div class="single_page">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>
				
					<article class="page_article js-article">
						<?php $image_id = get_post_meta($post->ID,'_ppm_page_logo_id',true); ?>
						<?php if (!empty($image_id)) : ?>
							<?php $image = wp_get_attachment_image_src($image_id,'full'); ?>
							<img class="img-responsive section_logo" src="<?php echo $image[0]; ?>"/>
						<?php else : ?>
							<h1 class="page_article--title page-<?php echo $post->ID;?>"><?php the_title(); ?></h1>
						<?php endif; ?>

						<?php $contact_name = get_post_meta($post->ID,'_ppm_contact_name',true); ?>
						<?php $contact_tel = get_post_meta($post->ID,'_ppm_contact_tel',true); ?>
						<?php $contact_email = get_post_meta($post->ID,'_ppm_contact_email',true); ?>
						<?php $contact_name2 = get_post_meta($post->ID,'_ppm_contact_name2',true); ?>
						<?php $contact_tel2 = get_post_meta($post->ID,'_ppm_contact_tel2',true); ?>
						<?php $contact_email2 = get_post_meta($post->ID,'_ppm_contact_email2',true); ?>
						<?php if (!empty($contact_name)) : ?>
							<div class="row">
								<div class="col-md-8">
									<div class="article_entry page-<?php echo $post->ID;?>">
										<?php the_content(); ?>
									</div>
								</div>
								<div class="col-md-4">
									<div class="widget contact_widget">
										<h4 class="section_widget--title">Contact Information:</h4>
										<ul>
											<?php if (!empty($contact_name)) echo '<li>'.$contact_name.'</li>';?>
											<?php if (!empty($contact_tel)) echo '<li>'.$contact_tel.'</li>';?>
											<?php if (!empty($contact_email)) echo '<li>'.$contact_email.'</li>';?>
											<?php if (!empty($contact_name2)) echo '<li>'.$contact_name2.'</li>';?>
											<?php if (!empty($contact_tel2)) echo '<li>'.$contact_tel2.'</li>';?>
											<?php if (!empty($contact_email2)) echo '<li>'.$contact_email2.'</li>';?>
										</ul>
									</div>
								</div>
							</div>
					
							<?php else: ?>
							
							<div class="article_entry page-<?php echo $post->ID;?>">
								<?php the_content(); ?>
							</div>

						<?php endif; ?>

						<?php $groups = get_post_meta($post->ID,'_ppm_values_group',true); ?>	
						<?php if (!empty($groups)) : $count = 0; ?>
							<div class="values row">
							<?php foreach ($groups as $key => $group) : $count++; ?>
								<?php $title = $group['title'];?>
								<?php $description = $group['description'];?>
									<?php if (!empty($title)) { ?>
										<div class="col-md-6">
											<div class="value ">
												<h4><?php echo $title;?><br><small><?php echo $description;?></small></h4>
											</div>
										</div>
						        	<?php };?>
							<?php endforeach; ?>
							</div>
						<?php endif; ?>

						<?php $buttons = get_post_meta($post->ID,'_ppm_buttons_group',true); ?>	
						<?php if (!empty($buttons)) : $count = 0; ?>
							<div class="buttons">
							<?php foreach ($buttons as $key => $button) : $count++; ?>
								<?php $btn_title = $button['btn_title'];?>
								<?php $btn_link = $button['btn_link'];?>
									<?php if (!empty($btn_title)) { ?>
										<a target="_blank" class="download-link" href="<?php echo $btn_link ?>"><?php echo $btn_title;?> <i class="fa fa-file-pdf-o"></i></a>
						        	<?php };?>
							<?php endforeach; ?>
							</div>
						<?php endif; ?>
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