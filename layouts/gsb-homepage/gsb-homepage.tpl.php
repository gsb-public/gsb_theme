<?php
/**
 * @file
 * Template for GSB Landing Standard Page 1.
 *
 * Variables:
 * - $css_id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 * panel of the layout. This layout supports the following sections:
 */
?>

<div class="panel-display panels-layout-gsb-homepage <?php if (!empty($class)) { print $class; } ?>">

  <div id="top-content"></div>

  <?php if ($content['mainbody']): ?>
    <div class="full-view">
      <?php print $content['mainbody']; ?>
    </div>
  <?php endif; ?>

</div><!-- /.gsb-homepage -->
