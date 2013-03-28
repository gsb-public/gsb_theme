<?php
// Plugin definition
$plugin = array(
  'title' => t('GSB Landing Page Two'),
  'icon' => 'gsb-landing-page-two.png',
  'category' => t('Panopoly'),
  'theme' => 'gsb-landing-page-two',
  'css' => 'gsb-landing-page-two.css',
  'regions' => array(
    'contentheader' => t('Content Header'),
    'contentuppermain' => t('Content Upper Main'),
    'contentlowermain' => t('Content Lower Main'),
    'contentmiddlecolumn1' => t('Content Middle Column 1'),
    'contentmiddlecolumn2' => t('Content Middle Column 2'),
    'contentuppersidebar' => t('Content Upper Sidebar'),
    'contentmiddlesidebar' => t('Content Middle Sidebar'),
  ),
);
