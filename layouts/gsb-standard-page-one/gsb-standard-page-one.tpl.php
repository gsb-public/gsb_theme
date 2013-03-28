<?php
/**
 * @file
 * Template for GSB Standard Page One.
 *
 * Variables:
 * - $css_id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 * panel of the layout. This layout supports the following sections:
 */
?>

<div class="panel-display gsb-standard-page-one clearfix <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>

          <div id="content-below-wrapper">

              <div id="content-upper-main-1">
                <?php print $content['contentuppermain1']; ?>
              </div>

              <div id="content-upper-sidebar">
                <?php print $content['contentuppersidebar']; ?>
              </div>

              <div>

                  <div id="content-upper-main-2">
                    <?php print $content['contentuppermain2']; ?>
                  </div>

               <!--  <div id="content-middle-left" class="span8 next-row"> -->
                  <div id="content-upper-middle-column1">
                    <?php print $content['contentmiddlecolumn1']; ?>
                  </div>

                  <div id="content-upper-middle-column2">
                    <?php print $content['contentmiddlecolumn2']; ?>
                  </div>
               <!-- </div> -->

                  <div id="content-lower">
                    <?php print $content['contentlowerfooter']; ?>
                  </div>

              </div>

              <div id="content-upper-middle-sidebar">
                  <?php print $content['contentmiddlesidebar']; ?>
              </div>


          </div>


</div><!-- /.gsb-standard-page-one -->
