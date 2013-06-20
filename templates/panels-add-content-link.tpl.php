<?php
/**
 * @file
 * Template to control the add content individual links in the add content modal.
 */
?>
<?php if (isset($content_type['top level']) || $first_page == TRUE || $stock_content_page == TRUE ): ?>
<li>
  <?php print $text_button; ?>
</li>
<?php endif; ?>
<?php if (!isset($content_type['top level']) && $first_page != TRUE && $stock_content_page != TRUE): ?>
<div class="content-type-button clearfix">
  <?php print $image_button; ?>
  <div><?php print $text_button; ?></div>
</div>
<?php endif; ?>
