<?php
/**
 * @file
 * Template for GSB Program Finder.
 *
 * Variables:
 * - $css_id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 * panel of the layout. This layout supports the following sections:
 */
?>

<div class="panel-display gsb-program-finder clearfix <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>

  <?php if ($content['full_bleed_header']): ?>
    <div class="full-bleed-header full-view">
      <?php print $content['full_bleed_header']; ?>
    </div>
  <?php endif; ?>

  <?php if ($content['featured_content']): ?>
    <div class="featured-content full-view">
      <?php print $content['featured_content']; ?>
    </div>
  <?php endif; ?>

  <div class="content-wrapper">

    <div class="main-wrapper"><div class="inner-main-wrapper">

      <?php if ($content['maintop']): ?>
        <div class="main-header wide-view">
          <?php print $content['maintop']; ?>
        </div>
      <?php endif; ?>

    </div></div><!-- /.inner-main-wrapper, /.main-wrapper -->

    <?php if ($content['sidebar']): ?>
      <div class="inner-sidebar-wrapper">

        <?php if ($content['sidebar']): ?>
          <div class="narrow-view sidebar-inner">
            <?php print $content['sidebar']; ?>
          </div>
        <?php endif; ?>

      </div><!-- /.inner-sidebar-wrapper -->
    <?php endif; ?>

  </div><!-- /.content-wrapper -->

</div><!-- /.gsb-program-finder -->
