<?php
/**
 * @file
 * Template for Panopoly Selby Flipped.
 *
 * Variables:
 * - $css_id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 * panel of the layout. This layout supports the following sections:
 */
?>

<div class="panel-display gsb-standard-page-three clearfix <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>



          <div id="content-below-wrapper">
            <div id="content-main">
            <?php print $content['contentmain']; ?>
            </div>
          </div>


</div><!-- /.gsb-standard-page-three -->
