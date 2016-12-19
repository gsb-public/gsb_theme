<?php
// $Id$
/**
 * @file
 *    default theme implementation for the search block form
 * variables of interest
 * - variables['form'] : the form elements array, pre-render
 * - variables['block_search_form']['hidden'] : hidden form elements collapsed + rendered
 * - variables['block_serach_form'] : form elements rendered and keyed by original form keys
 * - variables['block_search_form_complete'] : the entire form collapsed and rendered
 *
 * @see template_preprocess_google_appliance_block_form()
 */
//dsm($variables);
?>
<div class="container-inline">
  <?php if (empty($variables['form']['#block']->subject)) : ?>
  <?php endif; ?>
  <?php print $block_search_form_complete; ?>
</div>
