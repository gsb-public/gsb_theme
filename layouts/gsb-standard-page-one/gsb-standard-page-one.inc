<?php
// Plugin definition
$plugin = array(
  'title' => t('GSB Standard Page One'),
  'icon' => 'gsb-standard-page-one.png',
  'category' => t('Panopoly'),
  'theme' => 'gsb-standard-page-one',
  'css' => 'gsb-standard-page-one.css',
  'regions' => array(
    'contentuppermain1' => t('Content Upper Main 1'),
    'contentuppersidebar' => t('Content Upper Sidebar'),
    'contentuppermain2' => t('Content Upper Main 2'),
    'contentmiddlecolumn1' => t('Content Middle Column 1'),
    'contentmiddlecolumn2' => t('Content Middle Column 2'),
    'contentlowerfooter' => t('Content Lower Footer'),
    'contentmiddlesidebar' => t('Content Lower Sidebar'),
  ),
);
