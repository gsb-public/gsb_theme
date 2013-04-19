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

<div class="panel-display gsb-business-insights <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>

  <div class="full-header">
    <?php print $content['fullheader']; ?>
  </div>

  <div class="inner-content-wrapper">

    <div class="main-wrapper">

      <div class="main-header">
        <?php print $content['maintop']; ?>
      </div>

      <div class="gsb-bizin-3col-top">
        <div class="column first">
          <?php print $content['contenttwoone']; ?>
        </div>
        <div class="column second">
          <?php print $content['contenttwotwo']; ?>
        </div>
        <div class="column third">
          <?php print $content['contenttwothree']; ?>
        </div>
      </div>

      <div class="gsb-bizin-quote">
        <?php print $content['mainquote']; ?>
      </div>

      <div class="gsb-bizin-3col-bottom">
        <div class="column first">
          <?php print $content['contentfourone']; ?>
        </div>
        <div class="column second">
          <?php print $content['contentfourtwo']; ?>
        </div>
        <div class="column third">
          <?php print $content['contentfourthree']; ?>
        </div>
      </div>

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

</div><!-- /.gsb-business-insights -->
