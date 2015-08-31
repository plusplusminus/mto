  <?php global $tpb_options; ?> 
    <footer id="footer" class="footer">
      <div class="footer_primary">
        <div class="container">
          <div class="row">
            <div class="col-md-2 visible-xs">
              <div class="primary_logo">
              <?php if ( ( '' != $tpb_options['footer_logo']['url'] ) ) {
                $logo_url = $tpb_options['footer_logo']['url'];
                $site_name = get_bloginfo('name');
                $site_description = get_bloginfo('description');
                echo '<img class="img-responsive" src="'.$logo_url.'" alt="'.esc_attr($site_name).'"/>' . "\n";
              } // End IF Statement */
              ?>
              </div>
            </div>
            <div class="col-md-5">
              <span class="primary_copy">Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</span>
            </div>
            <div class="col-md-2 hidden-xs">
              <div class="primary_logo">
              <?php if ( ( '' != $tpb_options['footer_logo']['url'] ) ) {
                $logo_url = $tpb_options['footer_logo']['url'];
                $site_name = get_bloginfo('name');
                $site_description = get_bloginfo('description');
                echo '<img class="img-responsive" src="'.$logo_url.'" alt="'.esc_attr($site_name).'"/>' . "\n";
              } // End IF Statement */
              ?>
              </div>
            </div>
            <div class="col-md-5">
                <span class="primary_attribution">Created with <i class="fa fa-heart"></i> by <a href="http://www.plusplusminus.co.za/?utm_source=LeandriKers&amp;utm_medium=Footer&amp;utm_campaign=Credit" title="PlusPlusMinus Design &amp; Development" target="_blank">PlusPlusMinus</a></span>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>

    <!-- all js scripts are loaded in library/bones.php -->
    <?php wp_footer(); ?>
  </body>
    <!-- Hello? Doctor? Name? Continue? Yesterday? Tomorrow?  -->

  </body>

</html> <!-- end page. what a ride! -->
