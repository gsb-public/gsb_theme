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

<div class="panel-display gsb-front-page clearfix <?php if (!empty($class)) { print $class; } ?>">
  <div class="front-panel-header-row">
    <div class="front-slider-pane wide-view">
      <?php print $content['contentslider']; ?>
    </div>
    <div class="front-sidebar-pane narrow-view">
      <?php print $content['sidebarnavigation']; ?>
    </div>
  </div>
  <div class="front-panel-feature-row">
    <div class="front-panel-feature-one">
      <?php print $content['featuredcolone']; ?>
    </div>
    <div class="front-panel-feature-two narrow-view">
      <?php print $content['featuredcoltwo']; ?>
    </div>
    <div class="front-panel-feature-three narrow-view">
      <?php print $content['featuredcolthree']; ?>
    </div>
  </div>
  <div class="front-panel-footer-row">
    <div class="front-panel-footer-one">
      <?php print $content['footercolone']; ?>
    </div>
    <div class="front-panel-footer-two narrow-view">
      <?php print $content['footercoltwo']; ?>
    </div>
    <div class="front-panel-footer-three narrow-view">
      <?php print $content['footercolthree']; ?>
    </div>
  </div>
</div><!-- /.gsb-front-page -->
