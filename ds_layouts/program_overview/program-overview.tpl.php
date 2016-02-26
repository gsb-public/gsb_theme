<?php
/**
 * @file
 * Display Suite Program Overview template.
 *
 * Available variables:
 *
 * Layout:
 * - $classes: String of classes that can be used to style this layout.
 * - $contextual_links: Renderable array of contextual links.
 * - $layout_wrapper: wrapper surrounding the layout.
 *
 * Regions:
 *
 * - $left: Rendered content for the "Left" region.
 * - $left_classes: String of classes that can be used to style the "Left" region.
 *
 * - $right: Rendered content for the "Right" region.
 * - $right_classes: String of classes that can be used to style the "Right" region.
 *
 * - $learn: Rendered content for the "Learn" region.
 * - $learn_classes: String of classes that can be used to style the "Learn" region.
 *
 * - $faculty: Rendered content for the "Faculty" region.
 * - $faculty_classes: String of classes that can be used to style the "Faculty" region.
 *
 * - $cta: Rendered content for the "CTA" region.
 * - $cta_classes: String of classes that can be used to style the "CTA" region.
 *
 * - $explore: Rendered content for the "Explore" region.
 * - $explore_classes: String of classes that can be used to style the "Explore" region.
 *
 * - $footer: Rendered content for the "Footer" region.
 * - $footer_classes: String of classes that can be used to style the "Footer" region.
 */
?>
<<?php print $layout_wrapper; print $layout_attributes; ?> class="<?php print $classes;?> clearfix">

  <!-- Needed to activate contextual links -->
  <?php if (isset($title_suffix['contextual_links'])): ?>
    <?php print render($title_suffix['contextual_links']); ?>
  <?php endif; ?>

    <div class="ds-main-wrapper">
      <<?php print $left_wrapper; ?> class="ds-left<?php print $left_classes; ?>">
        <?php print $left; ?>
      </<?php print $left_wrapper; ?>>

      <<?php print $right_wrapper; ?> class="ds-right<?php print $right_classes; ?>">
        <?php print $right; ?>
      </<?php print $right_wrapper; ?>>
    </div>

    <<?php print $learn_wrapper; ?> class="ds-learn<?php print $learn_classes; ?>">
      <div class="learn-wrapper-inner">
        <?php print $learn; ?>
      </div>
    </<?php print $learn_wrapper; ?>>

    <<?php print $faculty_wrapper; ?> class="ds-faculty<?php print $faculty_classes; ?>">
      <h2 class="section-title">Faculty Leadership</h2>
      <?php print $faculty; ?>
    </<?php print $faculty_wrapper; ?>>

    <<?php print $cta_wrapper; ?> class="ds-cta<?php print $cta_classes; ?>">
      <div class="cta-wrapper-inner">
        <?php print $cta; ?>
      </div>
    </<?php print $cta_wrapper; ?>>

    <<?php print $explore_wrapper; ?> class="ds-explore<?php print $explore_classes; ?>">
      <h2 class="section-title">Explore Related Programs</h2>
      <?php print $explore; ?>
    </<?php print $explore_wrapper; ?>>

    <<?php print $footer_wrapper; ?> class="ds-footer<?php print $footer_classes; ?>">
      <?php print $footer; ?>
    </<?php print $footer_wrapper; ?>>

</<?php print $layout_wrapper ?>>

<!-- Needed to activate display suite support on forms -->
<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>
