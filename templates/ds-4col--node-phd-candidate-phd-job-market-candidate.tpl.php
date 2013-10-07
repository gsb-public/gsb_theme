<?php

/**
 * @file
 * Display Suite 4 column template.
 *
 * CHANGES
 * Add a full width region for the name to span 100%.
 */
?>
<<?php print $layout_wrapper; print $layout_attributes; ?> class="ds-4col <?php print $classes;?> clearfix">

  <?php if (isset($title_suffix['contextual_links'])): ?>
  <?php print render($title_suffix['contextual_links']); ?>
  <?php endif; ?>

  <h5 class="phd-name"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h5>

  <<?php print $first_wrapper ?> class="group-first<?php print $first_classes; ?>">
    <?php print $first; ?>
  </<?php print $first_wrapper ?>>

  <<?php print $second_wrapper ?> class="group-second<?php print $second_classes; ?>">
    <?php print $second; ?>
  </<?php print $second_wrapper ?>>

  <<?php print $third_wrapper ?> class="group-third<?php print $third_classes; ?>">
    <?php print $third; ?>
  </<?php print $third_wrapper ?>>

  <<?php print $fourth_wrapper ?> class="group-fourth<?php print $fourth_classes; ?>">
    <?php print $fourth; ?>
  </<?php print $fourth_wrapper ?>>

</<?php print $layout_wrapper ?>>

<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>
