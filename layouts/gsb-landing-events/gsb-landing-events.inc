<?php
// Plugin definition
$plugin = array(
  'title' => t('GSB Event Landing'),
  'icon' => 'gsb-landing-events-2015-07-20-1.png',
  'category' => t('GSB'),
  'theme' => 'gsb-landing-events',
  'css' => 'gsb-landing-events.css',
  'regions' => array(
    'featured_event' => t('Featured Event'),
    'main' => t('Main Event Listing'),
    'quicklinks' => t('Quick Links'),
    'sidebar' => t('Sidebar'),
  ),
);
