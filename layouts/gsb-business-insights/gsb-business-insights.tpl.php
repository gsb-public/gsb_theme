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

<div class="panel-display gsb-business-insights <?php if (!empty($class)) { print $class; } ?>">
  <div class="gsb-bizin-wrapper">

    <div class="gsb-bizin-content">

      <div class="gsb-bizin-header">
        <?php print $content['contentoneone']; ?>
      </div>

      <div class="gsb-bizin-3col">
        <div>
          <?php print $content['contenttwoone']; ?>
        </div>
        <div>
          <?php print $content['contenttwotwo']; ?>
        </div>
        <div>
          <?php print $content['contenttwothree']; ?>
        </div>
      </div>

      <div class="gsb-bizin-quote">
        <?php print $content['contentthreeone']; ?>
      </div>

      <div class="gsb-bizin-3col">
        <div>
          <?php print $content['contentfourone']; ?>
        </div>
        <div>
          <?php print $content['contentfourtwo']; ?>
        </div>
        <div>
          <?php print $content['contentfourthree']; ?>
        </div>
      </div>

      <div class="gsb-bizin-footer">
        <?php print $content['contentfiveone']; ?>
      </div>

    </div><!-- /.gsb-business-content -->

    <div class="gsb-bizin-sidebar">
      <?php print $content['contentrightone']; ?>
    </div><!-- /.gsb-bizin-sidebar -->
  </div>

</div><!-- /.gsb-business-insights -->
