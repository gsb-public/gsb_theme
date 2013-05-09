<?php

/**
 * @file
 * Theme and preprocess functions for GSB Theme.
 */

/**
 * Overrides theme_date_all_day_label().
 */
function gsb_theme_date_all_day_label($variables) {
  return '';
}

/**
 * Overrides theme_date_display_range().
 */
function gsb_theme_date_display_range($variables) {
  return $variables['date1'] . ' - ' . $variables['date2'];
}

/**
 * Overrides theme_breadcrumb().
 */
function gsb_theme_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (count($breadcrumb) > 1) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $output .= '<div class="breadcrumb">' . implode(' &rsaquo; ', $breadcrumb) . '</div>';
    return $output;
  }
}

/**
 * Implements hook_form_FORM_ID_alter() for views_exposed_form().
 */
function gsb_theme_form_views_exposed_form_alter(&$form, &$form_state) {
  $search_form_ids = array(
    'views-exposed-form-clubs-search-search-club',
    'views-exposed-form-search-news-news-list',
    'views-exposed-form-media-mention-media-mention-solr',
    'views-exposed-form-publications-publications-solr',
    'views-exposed-form-research-papers-panel-pane-1',
    'views-exposed-form-search-faculty-panel-pane-1',
    'views-exposed-form-faculty-search-solr-search',
    'views-exposed-form-search-case-study-panel-pane-1',
    'views-exposed-form-case-study-search-solr-search',
  );
  $filter_form_ids = array(
    'views-exposed-form-case-study-filters-case-study-list',
    'views-exposed-form-club-filters-club-list',
    'views-exposed-form-news-list-news-list',
    'views-exposed-form-media-mention-filters-media-mention-list',
    'views-exposed-form-publications-filters-publication-list',
    'views-exposed-form-research-paper-filters-research-paper-list',
    'views-exposed-form-faculty-filters-faculty-list'

  );
  if ($form['#id'] == 'views-exposed-form-gsb-event-panel-pane-2') {
    $form['search']['#attributes']['placeholder'] = t('search within');
  }

  if ($is_search_form = in_array($form['#id'], $search_form_ids)) {
    // Add placeholder text.
    $form['keyword']['#attributes']['placeholder'] = t('search within');
    $form['#attributes']['class'][] = 'gsb-views-exposed-search';
  }
  if ($is_filter_form = in_array($form['#id'], $filter_form_ids)) {
    $form['#attributes']['class'][] = 'gsb-views-exposed-filter';
  }
  if ($is_search_form || $is_filter_form) {
    $form['#attributes']['class'][] = 'gsb-views-exposed-form';
  }
}

/**
 * Preprocess html.
 *
 * Load slectivizr library for support IE 8,7 pseudo classes.
 */
function gsb_theme_preprocess_html(&$variables) {
  global $base_url;
  $selectivizr = array(
    '#tag' => 'script',
    '#attributes' => array(
      'src' => $base_url . '/' . drupal_get_path('theme', 'gsb_theme') . '/js/libs/selectivizr-min.js', 
    ),
    '#prefix' => '<!--[if lt IE 9]>',
    '#suffix' => '</script><![endif]-->',
  );
  drupal_add_html_head($selectivizr, 'selectivzr');
}