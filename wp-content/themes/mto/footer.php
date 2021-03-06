  <?php global $tpb_options; ?> 
    <footer id="footer" class="footer">
      <div class="footer_primary">
        <div class="container">
          <div class="row">
            
            <div class="col-md-3">
              <p class="primary_copy">Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?></p>
            </div>

            <div class="col-md-6">
              <p class="primary_slogan">"Reshaping the African timber landscape, sustainably."</p>
            </div>
            
            <div class="col-md-3">
                <p class="primary_attribution">Created by <a href="http://www.plusplusminus.co.za/?utm_source=MTO&amp;utm_medium=Footer&amp;utm_campaign=Credit" title="PlusPlusMinus Design &amp; Development" target="_blank">PlusPlusMinus</a></p>
            </div>
            
          </div>
        </div>
      </div>
    </footer>


  <!-- Modal -->
    <div class="modal fade" id="content-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Form -->
      <div class="modal fade" id="form-modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3>Product Enquiry</h3>
            </div>
            <div class="modal-body">
              
              <?php gravity_form( 1, false, false, false, '', true );?>
            
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

    <!-- all js scripts are loaded in library/bones.php -->
    <?php wp_footer(); ?>
  </body>
    <!-- Hello? Doctor? Name? Continue? Yesterday? Tomorrow?  -->

  </body>

</html> <!-- end page. what a ride! -->
