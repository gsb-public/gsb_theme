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

  <?php if ($content['fullheader']): ?>
    <div class="full-header">
      <?php print $content['fullheader']; ?>
    </div>
  <?php endif; ?>

  <div class="inner-content-wrapper">

    <div class="main-wrapper">

      <?php if ($content['maintop']): ?>
        <div class="main-header">
          <?php print $content['maintop']; ?>
        </div>
      <?php endif; ?>

      <?php if ($content['contenttwoone'] || $content['contenttwotwo'] || $content['contenttwothree']): ?>
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
      <?php endif; ?>

      <?php if ($content['mainquote']): ?>
        <div class="gsb-bizin-quote">
          <?php print $content['mainquote']; ?>
        </div>
      <?php endif; ?>

      <?php if ($content['contentfourone'] || $content['contentfourtwo'] || $content['contentfourthree']): ?>
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
      <?php endif; ?>

      <?php if ($content['mainbottom']): ?>
        <div class="main-footer">
          <?php print $content['mainbottom']; ?>
        </div>
      <?php endif; ?>

    </div><!-- /.main-wrapper -->

    <?php if ($content['quicklinks'] || $content['sidebar']): ?>
      <div class="inner-sidebar-wrapper">

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

      </div><!-- /.sidebar-wrapper -->
    <?php endif; ?>

  </div><!-- /.content-wrapper -->

</div><!-- /.gsb-business-insights -->
