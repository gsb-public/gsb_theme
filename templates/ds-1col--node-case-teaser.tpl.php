<?php

/**
 * @file
 * Display Suite 1 column template.
 *
 * CHANGES:
 *  - Removed clearfix
 *  - Add featured label
 *  - Remove line break white space
 */
?>
<<?php print $ds_content_wrapper; print $layout_attributes; ?> class="ds-1col <?php print $classes;?>">

  <?php if (isset($title_suffix['contextual_links'])): ?>
  <?php print render($title_suffix['contextual_links']); ?>
  <?php endif; ?>
  <div class="featured-label">Featured Case Study</div>
  <?php print $ds_content; ?>
<?php print '</' . $ds_content_wrapper . '>' ?>

<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>
