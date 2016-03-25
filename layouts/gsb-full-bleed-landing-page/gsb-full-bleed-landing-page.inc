<?php
// Plugin definition
$plugin = array(
  'title' => t('GSB Full Bleed Landing Page'),
  'icon' => 'gsb-full-bleed-landing-page.png',
  'category' => t('GSB'),
  'theme' => 'gsb-full-bleed-landing-page',
  'regions' => array(
    'full_bleed_header' => t('Full Bleed Header'),
    'left_rail' => t('Left Rail'),
    'top_full' => t('Top Full'),
    'top_left' => t('Top Left'),
    'top_right' => t('Top Right'),
    'middle_full' => t('Middle Full'),
    'middle_left' => t('Middle Left'),
    'middle_right' => t('Middle Right'),
    'bottom_full' => t('Bottom Full'),
  ),
);
