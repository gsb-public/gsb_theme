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

<div class="panel-display gsb-landing-standard-page-one <?php if (!empty($class)) { print $class; } ?>">

  <?php if ($content['fullheader']): ?>
    <div class="full-header full-view">
      <?php print $content['fullheader']; ?>
    </div>
  <?php endif; ?>

  <div class="inner-content-wrapper">

    <div class="main-wrapper"><div class="inner-main-wrapper">

      <?php if ($content['maintop']): ?>
        <div class="main-header wide-view">
          <?php print $content['maintop']; ?>
        </div>
      <?php endif; ?>

      <?php if ($content['mainmiddlefirst'] || $content['mainmiddlesecond']): ?>
        <div class="main-middle">
          <div class="column-first narrow-view">
            <?php print $content['mainmiddlefirst']; ?>
          </div>

          <div class="column-second narrow-view">
            <?php print $content['mainmiddlesecond']; ?>
          </div>
        </div><!-- /.main-middle -->
      <?php endif; ?>

      <?php if ($content['mainbottom']): ?>
        <div class="main-footer wide-view">
          <?php print $content['mainbottom']; ?>
        </div>
      <?php endif; ?>

    </div></div><!-- /.inner-main-wrapper, /.main-wrapper -->

    <?php if ($content['quicklinks'] || $content['sidebar']): ?>
      <div class="inner-sidebar-wrapper narrow-view">

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

      </div><!-- /.inner-sidebar-wrapper -->
    <?php endif; ?>

  </div><!-- /.content-wrapper -->

</div><!-- /.gsb-landing-page-one -->
