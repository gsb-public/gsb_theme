<?php

/**
 * @file
 * Display Suite 1 column template.
 *
 * CHANGES:
 *  - Removed clearfix
 *  - Remove line break white space
 *  - Add figure wrapper
 */
?>
<<?php print $ds_content_wrapper; print $layout_attributes; ?> class="ds-1col <?php print $classes;?>">
  <?php if (isset($title_suffix['contextual_links'])): ?>
  <?php print render($title_suffix['contextual_links']); ?>
  <?php endif; ?>
  <figure>
    <?php print $ds_content; ?>
  </figure>
<?php print '</' . $ds_content_wrapper . '>' ?>
<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>
