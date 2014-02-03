<?php

/**
 * @file
 * Display Suite 2 column template.
 *
 * CHANGES:
 *  - Removed clearfix
 *  - Add inner left for fake columns
 */
?>
<<?php print $layout_wrapper; print $layout_attributes; ?> class="ds-2col <?php print $classes;?>">

  <?php if (isset($title_suffix['contextual_links'])): ?>
  <?php print render($title_suffix['contextual_links']); ?>
  <?php endif; ?>

  <<?php print $left_wrapper ?> class="group-left<?php print $left_classes; ?>">
    <div class="group-left-inner">
      <?php print $left; ?>
    </div>
  </<?php print $left_wrapper ?>>

  <<?php print $right_wrapper ?> class="group-right<?php print $right_classes; ?>">
    <?php print $right; ?>
  </<?php print $right_wrapper ?>>

</<?php print $layout_wrapper ?>>

<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>
