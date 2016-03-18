<?php
// Plugin definition
$plugin = array(
  'title' => t('GSB Full Bleed Page'),
  'icon' => 'gsb-full-bleed-page.png',
  'category' => t('GSB'),
  'theme' => 'gsb-full-bleed-page',
  'regions' => array(
    'featured_content' => t('Featured content'),
    'maintop' => t('Main Top'),
    'mainmiddlefirst' => t('Main Middle 1'),
    'mainmiddlesecond' => t('Main Middle 2'),
    'mainbottom' => t('Main Bottom'),
    'quicklinks' => t('Quick Links'),
    'sidebar' => t('Sidebar content'),
  ),
);
