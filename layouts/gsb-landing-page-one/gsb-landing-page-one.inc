<?php
// Plugin definition
$plugin = array(
  'title' => t('GSB Landing Page One'),
  'icon' => 'gsb-landing-page-one.png',
  'category' => t('Panopoly'),
  'theme' => 'gsb-landing-page-one',
  'css' => 'gsb-landing-page-one.css',
  'regions' => array(
    'contentheader' => t('Content Header'),
    'contentuppermain' => t('Content Upper Main'),
    'contentuppersidebar' => t('Content Upper Sidebar'),
    'contentmiddlecolumn1' => t('Content Middle Column 1'),
    'contentmiddlecolumn2' => t('Content Middle Column 2'),
    'contentmiddlesidebar' => t('Content Middle Sidebar'),
    'contentlowerfooter' => t('Content Lower Footer'),
  ),
);
