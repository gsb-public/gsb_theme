<?php
/**
 * @file
 * Template for GSB Landing Events.
 *
 * Variables:
 * - $css_id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 * panel of the layout. This layout supports the following sections:
 */
?>

<div class="panel-display gsb-landing-events clearfix <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>

  <div class="content-wrapper">

    <?php if ($content['sidebar']): ?>
      <div class="inner-sidebar-wrapper narrow-view">

        <?php if ($content['sidebar']): ?>
          <div class="sidebar-inner">
            <?php print $content['sidebar']; ?>
          </div>
        <?php endif; ?>

      </div><!-- /.inner-sidebar-wrapper -->
    <?php endif; ?>

    <div class="main-wrapper"><div class="inner-main-wrapper wide-view">
      <?php print $content['main']; ?>
    </div></div><!-- /.inner-main-wrapper, /.main-wrapper -->

  </div><!-- /.content-wrapper -->

</div><!-- /.gsb-landing-events -->
