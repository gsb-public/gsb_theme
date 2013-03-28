<?php
/**
 * @file
 * Template for GSB Standard Page 2.
 *
 * Variables:
 * - $css_id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 * panel of the layout. This layout supports the following sections:
 */
?>

<div class="panel-display gsb-standard-page-two clearfix <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>

          <div id="content-below-wrapper">
           <div id="content-main-column1">
                  <?php print $content['contentmaincolumn1']; ?>
                </div>
                <div id="content-sidebar">
                  <?php print $content['contentsidebar']; ?>
                </div>
             </div>
          </div>

</div><!-- /.gsb-standard-page-two -->
