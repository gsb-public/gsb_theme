<?php
/**
 * @file
 * Display Suite 1 column template.
 *
 * CHANGES:
 *  - Removed clearfix
 *  - Remove line break white space
 */
?>
<<?php print $ds_content_wrapper; print $layout_attributes; ?> class="ds-1col <?php print $classes;?>">
<?php if (isset($title_suffix['contextual_links'])): ?>
  <?php print render($title_suffix['contextual_links']); ?>
<?php endif; ?>
<?php print render($name); ?>
<?php if ($use_photo) print render($photo); ?>
<?php if ($use_phone) print render($phone); ?>
<?php if ($use_email) print render($email); ?>
<?php if ($use_rank) print render($rank); ?>
<?php if ($use_academic_area) print render($academic_area); ?>
<?php print render($summary); ?>
<?php print render($program); ?>
<?php print '</' . $ds_content_wrapper . '>' ?>
<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>