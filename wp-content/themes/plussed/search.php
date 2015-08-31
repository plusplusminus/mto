<?php get_header(); ?>
      
      <div class="container">
      
        <div id="content" class="clearfix row">
        
          <div id="main" class="col col-lg-8 clearfix" role="main">
          
            <div class=""><h1 class="page-title"><span><?php _e("Search Results for","bonestheme"); ?>:</span> <?php echo esc_attr(get_search_query()); ?></h1></div>

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
              
              <header>
                
                <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                
                <p class="meta"><?php _e("Posted", "bonestheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_date(); ?></time> <?php _e("by", "bonestheme"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "bonestheme"); ?> <?php the_category(', '); ?>.</p>
              
              </header> <!-- end article header -->
            
              <section class="post_content">
                <?php the_excerpt('<span class="read-more">' . __("Read more on","bonestheme") . ' "'.the_title('', '', false).'" &raquo;</span>'); ?>
            
              </section> <!-- end article section -->
              
              <footer>
            
                
              </footer> <!-- end article footer -->
            
            </article> <!-- end article -->
            
            <?php endwhile; ?>  
            
            <?php if (function_exists("emm_paginate")) { ?>
              <?php emm_paginate(); ?>

            <?php } else { // if it is disabled, display regular wp prev & next links ?>
              <nav class="wp-prev-next">
                <ul class="clearfix">
                  <li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?></li>
                  <li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?></li>
                </ul>
              </nav>
            <?php } ?>      
            
            <?php else : ?>
            
            <!-- this area shows up if there are no results -->
            
            <article id="post-not-found">
                <header>
                  <h1><?php _e("Not Found", "bonestheme"); ?></h1>
                </header>
                <section class="post_content">
                  <p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
                </section>
                <footer>
                </footer>
            </article>
            
            <?php endif; ?>
        
          </div> <!-- end #main -->
            
            <?php get_sidebar(); // sidebar 1 ?>
      
        </div> <!-- end #content -->

      </div> <!-- end .container -->

<?php get_footer(); ?>