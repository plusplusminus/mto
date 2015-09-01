<?php /* Template Name: Company Overview */ ?>

<?php get_header(); ?>

<div class="single_page">
	<div class="container">
		<div class="row">
			<div class="col-md-8">

				
					<article class="page_article js-article">
						<h1 class="page_article--title"><?php the_title(); ?></h1>
					
						<div class="article_entry">
							<figure id="overview_image_map">
								<svg version="1.1" id="imagemap" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 viewBox="0 0 1200 620" style="enable-background:new 0 0 1200 620;" xml:space="preserve">
									
									<style type="text/css">.st0{fill:rgba(0,0,0,0);}</style>
								
									<image style="overflow:visible;" width="1200" height="620" xlink:href="<?php echo get_stylesheet_directory_uri();?>/library/images/imagemap.png"></image>
									<a xlink:href href="http://localhost/mto/home/mto-global/" class="js-overlay-link">
										<rect id="mtoglobal" x="536" y="147.1" class="st0" width="300" height="98"/>
									</a>
									<a xlink:href href="http://localhost/mto/home/mto-lowveld/" class="js-overlay-link">
										<rect id="mtolowveld" x="345.3" y="269.1" class="st0" width="321.3" height="98"/>
									</a>
									<a xlink:href href="http://localhost/mto/home/mto-cape/" class="js-overlay-link">
										<rect id="mtocape" x="34.7" y="269.1" class="st0" width="302.9" height="98"/>
									</a>
									<a xlink:href href="http://localhost/mto/home/mto-solutions/" class="js-overlay-link">
										<rect id="mtosolutions" x="159.2" y="488.1" class="st0" width="332.4" height="98"/>
									</a>
									<a xlink:href href="http://localhost/mto/home/mto-group/" class="js-overlay-link">
										<rect id="mtogroup" x="519.8" y="488.1" class="st0" width="303.4" height="98"/>
									</a>
									<a xlink:href href="http://localhost/mto/home/mto-cares/" class="js-overlay-link">
										<rect id="mtocares" x="855.3" y="522" class="st0" width="303.5" height="98"/>
									</a>
								</svg>
							</figure>

						</div>
					</article>

			</div>

			<div class="col-md-4">
				<div class="widget">
					<div class="section_widget--heading">
						<h3 class="section_widget--title">Downloads</h3>
					</div>
					<?php $buttons = get_post_meta($post->ID,'_ppm_buttons_group',true); ?>	
					<?php if (!empty($buttons)) : $count = 0; ?>
						<ul class="buttons">
						<?php foreach ($buttons as $key => $button) : $count++; ?>
							<?php $btn_title = $button['btn_title'];?>
							<?php $btn_link = $button['btn_link'];?>
								<?php if (!empty($btn_title)) { ?>
									<li><a target="_blank" href="<?php echo $btn_link ?>"><?php echo $btn_title;?> <i class="fa fa-file-pdf-o"></i></a> </li>
					        	<?php };?>
						<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>