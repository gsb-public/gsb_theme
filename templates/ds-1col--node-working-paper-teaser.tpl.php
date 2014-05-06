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

<?php if ($use_photo) print render($photo); ?>
<div class="person-fpp-wrapper">
<?php print render($name); ?>
<?php if ($use_rank) print '<span class="field field-name-field-rank">' . render($rank) . '</span>'; ?>
<?php if ($use_academic_area) print '<span class="field field-name-field-academic-area">' . render($academic_area) . '</span>'; ?>
<?php print render($program); ?>
<?php if ($use_phone) print '<div class="field field-name-field-phone">' . render($phone) . '</div>'; ?>
<?php if ($use_email) print '<div class="field field-name-field-email"><a href="mailto:' . render($email) . '">Email</a></div>'; ?>
<?php print render($summary); ?>
</div>
<?php print '</' . $ds_content_wrapper . '>' ?>

<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>
