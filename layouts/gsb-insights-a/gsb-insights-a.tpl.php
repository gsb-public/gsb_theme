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

  <?php if ($content['contentone']): ?>
    <div class="full-header superwide-view">
      <?php print $content['contentone']; ?>
    </div>
  <?php endif; ?>

    <div class="insights-main-wrapper">

      <?php if ($content['contenttwoone'] || $content['contenttwotwo'] || $content['contenttwothree'] || $content['contenttwofour'] || $content['contenttwofive']): ?>
        <div class="wide-narrow-narrow">
          <div class="column first">
            <div class="wide-view alpha">
              <?php print $content['contenttwoone']; ?>
            </div>
            <div class="narrow-view beta">
              <?php print $content['contenttwotwo']; ?>
            </div>
            <div class="narrow-view gamma">
              <?php print $content['contenttwothree']; ?>
            </div>
          </div>
          <div class="column second narrow-view">
            <?php print $content['contenttwofour']; ?>
          </div>
          <div class="column third narrow-view">
            <?php print $content['contenttwofive']; ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if ($content['contentthreeone'] || $content['contentthreetwo'] || $content['contentthreethree'] || $content['contentthreefour'] || $content['contentthreefive']): ?>
        <div class="narrow-narrow-wide">
          <div class="column first narrow-view">
            <?php print $content['contentthreeone']; ?>
          </div>
          <div class="column second narrow-view">
            <?php print $content['contentthreetwo']; ?>
          </div>
          <div class="column third">
            <div class="wide-view alpha">
              <?php print $content['contentthreethree']; ?>
            </div>
            <div class="narrow-view beta">
              <?php print $content['contentthreefour']; ?>
            </div>
            <div class="narrow-view gamma">
              <?php print $content['contentthreefive']; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <?php if ($content['contentfourone'] || $content['contentfourtwo'] || $content['contentfourthree'] || $content['contentfourfour'] || $content['contentfourfive']): ?>
        <div class="narrow-wide-narrow">
          <div class="column first narrow-view">
            <?php print $content['contentfourone']; ?>
          </div>
          <div class="column second">
            <div class="wide-view alpha">
              <?php print $content['contentfourtwo']; ?>
            </div>
            <div class="narrow-view beta">
              <?php print $content['contentfourthree']; ?>
            </div>
            <div class="narrow-view gamma">
              <?php print $content['contentfourfour']; ?>
            </div>
          </div>
          <div class="column third narrow-view">
            <?php print $content['contentfourfive']; ?>
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

    <div class="insights-listing-wrapper">
      <?php if ($content['contentsixone']): ?>
        <div class="insights-topic-listing">
          <?php print $content['contentsixone']; ?>
        </div>
      <?php endif; ?>
    </div><!-- /.insights-listing-wrapper -->

</div><!-- /.gsb-insights-one -->
