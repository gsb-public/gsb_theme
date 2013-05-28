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


  <div id="top-content" class="content-wrapper">

    <div class="main-wrapper"><div class="inner-main-wrapper wide-view">
      <?php print $content['main']; ?>
    </div></div><!-- /.inner-main-wrapper, /.main-wrapper -->

    <?php if ($content['quicklinks'] || $content['sidebar']): ?>
      <div class="inner-sidebar-wrapper narrow-view">

        <?php if ($content['quicklinks']): ?>
          <div id="quicklinks">
            <?php print $content['quicklinks']; ?>
          </div>
        <?php endif; ?>

        <?php if ($content['sidebar']): ?>
          <div class="sidebar-inner">
            <?php print $content['sidebar']; ?>
          </div>
        <?php endif; ?>

      </div><!-- /.inner-sidebar-wrapper -->
    <?php endif; ?>

  </div><!-- /.content-wrapper -->

</div><!-- /.gsb-standard-page-two -->
