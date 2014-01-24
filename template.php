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

  // Remove the breadcrumb on the 'Search' page
  $root_path = menu_tab_root_path();
  if ($root_path == 'gsearch') {
    unset($variables['breadcrumb']);
    return;
  }

  // We can't implement hook_menu_breadcrumb_alter because breadcrumbs_by_path
  // are loaded on page_build.
  // We assume that Home link is first and remove it.
  array_shift($breadcrumb);

  if (!empty($breadcrumb)) {
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
    'views-exposed-form-club-filters-club-list',
    'views-exposed-form-gsb-event-panel-pane-2',
    'views-exposed-form-gsb-event-event-listing-pane',
    'views-exposed-form-gsb-event-event-calendar-pane',
  );
  $filter_form_ids = array(
    'views-exposed-form-case-study-filters-case-study-list',
    'views-exposed-form-club-filters-club-list',
    'views-exposed-form-news-list-news-list',
    'views-exposed-form-media-mention-filters-media-mention-list',
    'views-exposed-form-publications-filters-publication-list',
    'views-exposed-form-research-paper-filters-research-paper-list',
    'views-exposed-form-faculty-filters-faculty-list',
    'views-exposed-form-gsb-working-paper-listing-working-paper-list',
    'views-exposed-form-gsb-case-listing-case-listing',
    'views-exposed-form-gsb-book-listing-book-listing',
  );


  if ($is_search_form = in_array($form['#id'], $search_form_ids)) {
    // Add placeholder text.
    if (!empty($form['keyword'])) {
      $form['keyword']['#attributes']['placeholder'] = t('search within');
    }
    else if (!empty($form['search'])) {
      $form['search']['#attributes']['placeholder'] = t('search within');
    }

    $form['#attributes']['class'][] = 'gsb-views-exposed-search';
  }
  if ($is_filter_form = in_array($form['#id'], $filter_form_ids)) {
    $form['#attributes']['class'][] = 'gsb-views-exposed-filter';
  }
  if ($is_search_form || $is_filter_form) {
    $form['#attributes']['class'][] = 'gsb-views-exposed-form';
  }

  $split_search_views = array(
    'faculty_filters',
    'gsb_event',
    'gsb_working_paper_listing',
    'gsb_case_listing',
    'gsb_book_listing',
  );
  if (in_array($form_state['view']->name, $split_search_views)) {
    // Trigger the alternate template, see gsb_theme_preprocess_views_exposed_form().
    $form['#gsb_theme_search_button'] = TRUE;
    // Exclude the search text field from auto-submit.
    $form['search']['#attributes']['class'][] = 'ctools-auto-submit-exclude';
  }

  if ($form['#id'] == 'views-exposed-form-faculty-filters-faculty-list') {
    // Add placeholder text.
    $form['search']['#attributes']['placeholder'] = t('search by name, research interests, or other keywords');
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

  // Normally template_preprocess_html() will add classes based on the URL, but
  // if this is a node page we have to check the request_uri() directly.
  $allowed_paths = array(
    'programs',
    'stanford-gsb-experience',
  );
  $normalized_arg = arg(0);
  $args = explode('/', trim(request_uri(), '/'));
  if (isset($args[0]) && in_array($args[0], $allowed_paths) && $normalized_arg == 'node') {
    foreach (theme_get_suggestions($args, 'page', '-') as $arg) {
      $variables['classes_array'][] = drupal_html_class($arg);
    }
  }
  if (user_access('administer panelizer node page content')) {
    drupal_add_css(drupal_get_path('theme', 'gsb_theme') . '/css/admin-modal/admin-modal.css');
  }
  if (drupal_get_http_header('status') == "404 Not Found") {
    $variables['theme_hook_suggestions'][] = 'html__404';
  }
  if (drupal_get_http_header('status') == "404 Not Found" || drupal_get_http_header('status') == "403 Forbidden") {
    $variables['classes_array'][] = 'error-page';
  }
}
function gsb_theme_preprocess_page(&$variables) {
  if(drupal_get_http_header('status') == "403 Forbidden") {
    $variables['theme_hook_suggestions'][] = 'page__403';
  }

  $variables['event_and_search'] = array(
    '#type' => 'container',
    '#attributes' => array(
      'class' => array(
        'event-and-search',
      ),
    ),
    'link' => array(
      '#type' => 'link',
      '#href' => 'events',
      '#title' => t('Event Calendar'),
      '#attributes' => array(
        'class' => array(
          'event-link',
        ),
      ),
    ),
    'search' => module_invoke('google_appliance', 'block_view', 'ga_block_search_form'),
  );
}

/**
 * Preprocess exposed filters forms.
 */
function gsb_theme_preprocess_views_exposed_form(&$variables) {
  // Alter search blocks titles.
  if ($variables['form']['#id'] == 'views-exposed-form-club-filters-club-list') {
    if (isset($variables['widgets']['filter-field_search_field_value']->label)) {
      $variables['widgets']['filter-field_search_field_value']->label .= '<strong>Stanford GSB Clubs</strong>';
    }
  }
  // Add the 'Filter by' to the filter title on the admissions events pane
  if ($variables['form']['#id'] == 'views-exposed-form-admission-events-pane') {
    $variables['filter_title'] = t('Filter by');
  }

  if (isset($variables['form']['#gsb_theme_search_button'])) {
    // Allow for an alternate template.
    $variables['theme_hook_suggestions'][] = 'views_exposed_form__split_search';

    $variables['search_widgets'] = array();
    $search_form_name = 'filter-field_search_field_value';
    // Split the search widget to go above the search button.
    if (isset($variables['widgets'][$search_form_name])) {
      $variables['search_widgets'][$search_form_name] = $variables['widgets'][$search_form_name];
      unset($variables['widgets'][$search_form_name]);
    }
  }
}

/**
 * Implements hook_form_alter()
 * adds class for add contet forms
 */
function gsb_theme_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'views_content_views_panes_content_type_edit_form' || $form_id == 'ctools_block_content_type_edit_form' || $form_id == 'fieldable_panels_panes_fieldable_panels_pane_content_type_edit_form') {
    $form['#attributes']['class'][] = 'modal-add-content-form';
    $form['buttons']['#weight'] = 99;
  }
}
/**
 * Implements hook_preprocess_HOOK() for theme_field().
 */
function gsb_theme_preprocess_field(&$variables, $hook) {
  // Ensure custom DS labels are used for link label formatters.
  if (isset($variables['ds-config']['lb']) && $variables['element']['#formatter'] == 'link_label') {
    foreach ($variables['items'] as &$item) {
      if (isset($item['#field'])) {
        $item['#field']['label'] = $variables['ds-config']['lb'];
      }
    }
  }

  // Remove 'clearfix' class from case fields
  $element = $variables['element'];
  $key = array_search('clearfix', $variables['classes_array']);
  if ($element['#bundle'] == 'case' && $key !== FALSE) {
    unset($variables['classes_array'][$key]);
  }
}
