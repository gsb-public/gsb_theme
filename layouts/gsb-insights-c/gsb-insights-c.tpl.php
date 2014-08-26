<?php
/**
 * @file
 * Template for GSB Insights C.
 *
 * Variables:
 * - $css_id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 * panel of the layout. This layout supports the following sections:
 */
?>

<div class="panel-display gsb-insights-c<?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>

  <div class="insights-card-wrapper">
    <?php if ($content['contentone']): ?>
      <div class="full-header superwide-view">
        <?php print $content['contentone']; ?>
      </div>
    <?php endif; ?>

    <div class="insights-main-wrapper">

      <?php if ($content['contenttwoone'] || $content['contenttwotwo']): ?>
        <div class="wide-wide">
          <div class="column first wide-view">
            <?php print $content['contenttwoone']; ?>
          </div>
          <div class="column second wide-view">
            <?php print $content['contenttwotwo']; ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if ($content['contentthreeone'] || $content['contentthreetwo'] || $content['contentthreethree'] || $content['contentthreefour']): ?>
        <div class="narrow-narrow-narrow-narrow">
          <div class="column first narrow-view">
            <?php print $content['contentthreeone']; ?>
          </div>
          <div class="column second narrow-view">
            <?php print $content['contentthreetwo']; ?>
          </div>
          <div class="column third narrow-view">
            <?php print $content['contentthreethree']; ?>
          </div>
          <div class="column fourth narrow-view">
            <?php print $content['contentthreefour']; ?>
          </div>
        </div>
      <?php endif; ?>

    </div><!-- /.insights-main-wrapper -->
  </div><!-- /.insights-card-wrapper -->

  <div class="insights-listing-wrapper">
    <?php if ($content['contentfourone']): ?>
      <div class="insights-topic-listing">
        <?php print $content['contentfourone']; ?>
      </div>
    <?php endif; ?>
  </div><!-- /.insights-listing-wrapper -->

</div><!-- /.gsb-insights-c -->
