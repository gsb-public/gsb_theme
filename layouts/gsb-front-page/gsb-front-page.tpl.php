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

<div class="panel-display gsb-front-page<?php if (!empty($class)) { print $class; } ?>">
  <div id="top-content"></div>
  <div class="front-panel-header-row">
    <div class="front-slider-pane">
      <?php print $content['contentslider']; ?>
    </div>
    <div id="quicklinks" class="front-sidebar-pane narrow-view">
      <?php print $content['sidebarnavigation']; ?>
    </div>
  </div>
  <div class="front-panel-feature-row">
    <div class="front-panel-feature-three">
      <?php print $content['featuredcolthree']; ?>
    </div>
    <div class="front-panel-feature-one">
      <?php print $content['featuredcolone']; ?>
    </div>
    <div class="front-panel-feature-two narrow-view">
      <?php print $content['featuredcoltwo']; ?>
    </div>
  </div>
</div><!-- /.gsb-front-page -->
