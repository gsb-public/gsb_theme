<?php
// Plugin definition
$plugin = array(
  'title' => t('GSB Landing Page One'),
  'icon' => 'gsb-landing-page-one.png',
  'category' => t('Panopoly'),
  'theme' => 'gsb-landing-page-one',
  'css' => 'gsb-landing-page-one.css',
  'regions' => array(
    'fullheader' => t('Full Header'),
    'maintop' => t('Main Top'),
    'mainmiddlefirst' => t('Main Middle 1'),
    'mainmiddlesecond' => t('Main Middle 2'),
    'mainbottom' => t('Main Bottom'),
    'quicklinks' => t('Quick Links'),
    'sidebar' => t('Sidebar'),
  ),
);
