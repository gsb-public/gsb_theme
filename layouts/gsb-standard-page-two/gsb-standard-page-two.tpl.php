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


  <div class="content-wrapper">

    <div class="main-wrapper">
      <?php print $content['main']; ?>
    </div>

    </div><!-- /.main-wrapper -->

    <div class="sidebar-wrapper">

      <div id="quicklinks">
        <?php print $content['quicklinks']; ?>
      </div>

      <div class="sidebar-inner">
        <?php print $content['sidebar']; ?>
      </div>

    </div><!-- /.sidebar-wrapper -->

  </div><!-- /.content-wrapper -->

</div><!-- /.gsb-standard-page-two -->
