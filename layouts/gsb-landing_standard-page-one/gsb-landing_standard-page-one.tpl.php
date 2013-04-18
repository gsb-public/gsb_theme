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

<div class="panel-display gsb-landing_standard-page-one <?php if (!empty($class)) { print $class; } ?>">

  <div class="full-header">
    <?php print $content['fullheader']; ?>
  </div>

  <div class="inner-content-wrapper">

    <div class="main-wrapper">

      <div class="main-header">
        <?php print $content['maintop']; ?>
      </div>

      <div class="main-middle">
        <div class="column-first">
          <?php print $content['mainmiddlefirst']; ?>
        </div>

        <div class="column-second">
          <?php print $content['mainmiddlesecond']; ?>
        </div>
      </div><!-- /.main-middle -->

      <div class="main-footer">
        <?php print $content['mainbottom']; ?>
      </div>

    </div><!-- /.main-wrapper -->

    <div class="inner-sidebar-wrapper">
      <div id="quicklinks">
        <?php print $content['quicklinks']; ?>
      </div>
      <div class="sidebar-inner">
        <?php print $content['sidebar']; ?>
      </div>
    </div><!-- /.sidebar-wrapper -->

  </div><!-- /.content-wrapper -->

</div><!-- /.gsb-landing-page-one -->
