<?php
/**
 * @file
 * Template for GSB Full Bleed Landing Page.
 *
 * Variables:
 * - $css_id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 * panel of the layout. This layout supports the following sections:
 */
?>

<div class="panel-display gsb-full-bleed-landing-page clearfix <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>

  <?php if ($content['full_bleed_header']): ?>
    <div class="full-bleed-header full-view">
      <?php print $content['full_bleed_header']; ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($title)): ?>
    <h1 class="title"><?php print $title; ?></h1>
  <?php endif; ?>

  <div class="content-wrapper">

    <?php if ($content['left_rail']): ?>

      <div class="left-rail-wrapper">
        <?php if ($content['left_rail']): ?>
          <div id="sidebar" class="column">
            <?php print $content['left_rail']; ?>
          </div>
        <?php endif; ?>
      </div><!-- /.left-rail-wrapper -->

    <?php endif; ?>

    <?php if ($content['left_rail']): ?>
      <div class="main-wrapper with-left-rail">
    <?php endif; ?>

    <?php if (empty($content['left_rail'])): ?>
      <div class="main-wrapper">
    <?php endif; ?>

      <?php if ($content['top_full'] || $content['top_left'] || $content['top_right']): ?>
        <div class="top-wrapper">
          <div class="top-inner-wrapper">
            <?php if ($content['top_full']): ?>
              <div class="top-full full-view">
                <?php print $content['top_full']; ?>
              </div>
            <?php endif; ?>
            <?php if ($content['top_left'] || $content['top_right']): ?>
                <div class="top-left wide-view">
                  <?php print $content['top_left']; ?>
                </div>
                <div class="top-right wide-view">
                  <?php print $content['top_right']; ?>
                </div>
            <?php endif; ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if ($content['middle_full'] || $content['middle_left'] || $content['middle_right']): ?>
        <div class="middle-wrapper">
          <div class="middle-inner-wrapper">
            <?php if ($content['middle_full']): ?>
              <div class="middle-full full-view">
                <?php print $content['middle_full']; ?>
              </div>
            <?php endif; ?>
            <?php if ($content['middle_left'] || $content['middle_right']): ?>
              <div class="middle-left wide-view">
                <?php print $content['middle_left']; ?>
              </div>
              <div class="middle-right wide-view">
                <?php print $content['middle_right']; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if ($content['bottom_full']): ?>
        <div class="bottom-wrapper">
          <?php if ($content['bottom_full']): ?>
            <div class="bottom-full full-view">
              <?php print $content['bottom_full']; ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div><!-- /.main-wrapper -->
  </div><!-- /.content-wrapper -->

</div><!-- /.gsb-full-bleed-landing-page -->
