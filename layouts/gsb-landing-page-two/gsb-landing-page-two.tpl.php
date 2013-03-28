<?php
/**
 * @file
 * Template for Panopoly Landing Page Two.
 *
 * Variables:
 * - $css_id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 * panel of the layout. This layout supports the following sections:
 */
?>

<div class="panel-display gsb-landing-page-two clearfix <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>

          <div id="main-upper">
            <?php print $content['contentheader']; ?>
          </div>

          <div id="content-below-wrapper">
              <div id="content-upper-wrapper">
                  <div id="content-upper-main">
                    <?php print $content['contentuppermain']; ?>
                  </div>
                  <div id="content-lower-main">
                    <?php print $content['contentlowermain']; ?>
                  </div>
                  <div id="content-upper-middle-column1">
                     <?php print $content['contentmiddlecolumn1']; ?>
                  </div>
                  <div id="content-upper-middle-column2">
                    <?php print $content['contentmiddlecolumn2']; ?>
                  </div>
               </div>
                <div id="content-sidebar" class="float-right span4">
                    <div id="content-upper-middle-sidebar">
                      <?php print $content['contentuppersidebar']; ?>
                    </div>
                    <div id="content-lower-middle-sidebar">
                      <?php print $content['contentmiddlesidebar']; ?>
                    </div>
                </div>
              </div>

          </div>

          <div id="content-lower">

          </div>

</div><!-- /.gsb-landing-page-one -->
