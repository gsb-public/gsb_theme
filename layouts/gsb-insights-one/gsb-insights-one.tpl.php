<?php
/**
 * @file
 * Template for GSB Insights One.
 *
 * Variables:
 * - $css_id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 * panel of the layout. This layout supports the following sections:
 */
?>

<div class="panel-display gsb-insights-one<?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>

  <?php if ($content['contentone']): ?>
    <div class="full-header">
      <?php print $content['contentone']; ?>
    </div>
  <?php endif; ?>

    <div class="insights-main-wrapper">

      <?php if ($content['contenttwoone'] || $content['contenttwotwo'] || $content['contenttwothree']): ?>
        <div class="wide-narrow-narrow">
          <div class="column first wide-view">
            <?php print $content['contenttwoone']; ?>
          </div>
          <div class="column second narrow-view">
            <?php print $content['contenttwotwo']; ?>
          </div>
          <div class="column third narrow-view">
            <?php print $content['contenttwothree']; ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if ($content['contentthreeone'] || $content['contentthreetwo'] || $content['contentthreethree']): ?>
        <div class="narrow-narrow-wide">
          <div class="column first narrow-view">
            <?php print $content['contentthreeone']; ?>
          </div>
          <div class="column second narrow-view">
            <?php print $content['contentthreetwo']; ?>
          </div>
          <div class="column third wide-view">
            <?php print $content['contentthreethree']; ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if ($content['contentfourone'] || $content['contentfourtwo'] || $content['contentfourthree']): ?>
        <div class="narrow-wide-narrow">
          <div class="column first narrow-view">
            <?php print $content['contentfourone']; ?>
          </div>
          <div class="column second wide-view">
            <?php print $content['contentfourtwo']; ?>
          </div>
          <div class="column third narrow-view">
            <?php print $content['contentfourthree']; ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if ($content['contentfiveone'] || $content['contentfivetwo'] || $content['contentfivethree'] || $content['contentfivefour']): ?>
        <div class="narrow-narrow-narrow-narrow">
          <div class="column first narrow-view">
            <?php print $content['contentfiveone']; ?>
          </div>
          <div class="column second narrow-view">
            <?php print $content['contentfivetwo']; ?>
          </div>
          <div class="column third narrow-view">
            <?php print $content['contentfivethree']; ?>
          </div>
          <div class="column fourth narrow-view">
            <?php print $content['contentfivefour']; ?>
          </div>
        </div>
      <?php endif; ?>

    </div><!-- /.insights-main-wrapper -->

</div><!-- /.gsb-insights-one -->
