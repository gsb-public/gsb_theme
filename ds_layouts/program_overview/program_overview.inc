<?php

/**
 * @file
 * Display Suite Program Overview configuration.
 */

function ds_program_overview() {
  return array(
    'label' => t('Program Overview'),
    'regions' => array(
      'left' => t('Left'),
      'right' => t('Right'),
      'learn' => t('Learn'),
      'faculty' => t('Faculty'),
      'cta' => t('CTA'),
      'explore' => t('Explore'),
      'footer' => t('Footer'),
    ),
    // Uncomment if you want to include a CSS file for this layout (program_overview.css)
    // 'css' => TRUE,
    'image' => TRUE,
  );
}
