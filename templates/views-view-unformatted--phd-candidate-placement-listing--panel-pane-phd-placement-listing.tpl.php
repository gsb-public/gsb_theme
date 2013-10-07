<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 *
 * CHANGED
 *
 * H3 to H4
 * Added phd-placement-wrapper around title and row.
 * Added Back to top pager link after each grouping.
 */
?>
<div class="phd-placement-wrapper">
  <?php if (!empty($title)): ?>
    <h4 class="views-field-name"><?php print $title; ?></h4>
  <?php endif; ?>
  <div class="phd-row-wrapper">
    <?php foreach ($rows as $id => $row): ?>
      <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
        <?php print $row; ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<div class="pager-region">
  <div class="item-list">
    <ul class="additional-links">
      <li class="go-to-top-link first last"><a href="#placement-listing-top">Back to the Top</a></li>
    </ul>
  </div>
</div>
