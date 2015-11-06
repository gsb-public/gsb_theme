<?php
/**
 * @file
 * Template to control the add content individual links in the add content modal.
 */
?>
<?php if (isset($content_type['top level']) || !empty($first_page) || !empty($stock_content_page) ): ?>
<li>
  <?php print $text_button; ?>
</li>
<?php endif; ?>
<?php if (!isset($content_type['top level']) && empty($first_page) && empty($stock_content_page) ): ?>
<div class="content-type-button clearfix">
  <?php print $image_button; ?>
  <div><?php print $text_button; ?></div>
</div>
<?php endif; ?>
