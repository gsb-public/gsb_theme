<?php
/**
 * @file
 * Template for GSB Insights A.
 *
 * Variables:
 * - $css_id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 * panel of the layout. This layout supports the following sections:
 */
?>

<div class="panel-display gsb-insights-a<?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>

  <div class="insights-card-wrapper">
    <?php if ($content['contentone']): ?>
      <div class="full-header superwide-view">
        <?php print $content['contentone']; ?>
      </div>
    <?php endif; ?>

    <div class="insights-main-wrapper">

      <?php if ($content['contenttwoone']): ?>
        <div class="wide-view">
          <?php print $content['contenttwoone']; ?>
        </div>
      <?php endif; ?>

      <?php if ($content['contenttwotwo']): ?>
        <div class="narrow-view">
          <?php print $content['contenttwotwo']; ?>
        </div>
      <?php endif; ?>

      <?php if ($content['contenttwothree']): ?>
        <div class="narrow-view">
          <?php print $content['contenttwothree']; ?>
        </div>
      <?php endif; ?>

      <?php if ($content['contentthreeone']): ?>
        <div class="narrow-view">
          <?php print $content['contentthreeone']; ?>
        </div>
      <?php endif; ?>

      <?php if ($content['contentthreetwo']): ?>
        <div class="narrow-view">
          <?php print $content['contentthreetwo']; ?>
        </div>
      <?php endif; ?>

      <?php if ($content['contentthreethree']): ?>
        <div class="wide-view">
          <?php print $content['contentthreethree']; ?>
        </div>
      <?php endif; ?>

      <?php if ($content['contentfourone']): ?>
        <div class="narrow-view">
          <?php print $content['contentfourone']; ?>
        </div>
      <?php endif; ?>

      <?php if ($content['contentfourtwo']): ?>
        <div class="wide-view">
          <?php print $content['contentfourtwo']; ?>
        </div>
      <?php endif; ?>

      <?php if ($content['contentfourthree']): ?>
        <div class="narrow-view">
          <?php print $content['contentfourthree']; ?>
        </div>
      <?php endif; ?>

      <?php if ($content['contentfiveone']): ?>
        <div class="narrow-view">
          <?php print $content['contentfiveone']; ?>
        </div>
      <?php endif; ?>

      <?php if ($content['contentfivetwo']): ?>
        <div class="narrow-view">
          <?php print $content['contentfivetwo']; ?>
        </div>
      <?php endif; ?>

      <?php if ($content['contentfivethree']): ?>
        <div class="narrow-view">
          <?php print $content['contentfivethree']; ?>
        </div>
      <?php endif; ?>

      <?php if ($content['contentfivefour']): ?>
        <div class="narrow-view">
          <?php print $content['contentfivefour']; ?>
        </div>
      <?php endif; ?>

    </div><!-- /.insights-main-wrapper -->
  </div><!-- /.insights-card-wrapper -->

  <div class="insights-listing-wrapper">
    <?php if ($content['contentsixone']): ?>
      <div class="insights-topic-listing">
        <?php print $content['contentsixone']; ?>
      </div>
    <?php endif; ?>
  </div><!-- /.insights-listing-wrapper -->

</div><!-- /.gsb-insights-a -->
