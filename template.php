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
  return $variables['date1'] . ' – ' . $variables['date2'];
  return $variables['time1'] . ' – ' . $variables['time2'];
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
    'views-exposed-form-search-news-news-list',
    'views-exposed-form-research-papers-panel-pane-1',
    'views-exposed-form-search-faculty-panel-pane-1'
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
    'views-exposed-form-gsb-publications-listing-publications-listing',
    'views-exposed-form-gsb-act-project-listing-panel-pane-1',
    'views-exposed-form-gsb-act-project-listing-panel-pane-2',
    'views-exposed-form-gsb-act-project-listing-panel-pane-3',
    'views-exposed-form-gsb-event-main-event-list-pane',
    'views-exposed-form-admission-events-mba-admission-panel-pane',
    'views-exposed-form-gsb-all-research-listing-all-research-panel-pane',
    'views-exposed-form-admission-events-msx-admission-panel-pane',
    'views-exposed-form-msx-fellows-list',
    'views-exposed-form-gsb-act-project-listing-panel-pane-1'
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
    'club_filters',
    'faculty_filters',
    'gsb_event',
    'gsb_working_paper_listing',
    'gsb_case_listing',
    'gsb_book_listing',
    'gsb_publications_listing',
    'admission_events',
    'publication_filters',
    'msx_fellows',
    'gsb_act_project_listing'
  );
  if (in_array($form_state['view']->name, $split_search_views)) {
    // Trigger the alternate template, see gsb_theme_preprocess_views_exposed_form().
    $form['#gsb_theme_search_button'] = TRUE;
    // Exclude the search text field from auto-submit.
    $form['search']['#attributes']['class'][] = 'ctools-auto-submit-exclude';
  }

  // Faculty listing placeholder text.
  if ($form['#id'] == 'views-exposed-form-faculty-filters-faculty-list') {
    // Add placeholder text.
    $form['search']['#attributes']['placeholder'] = t('search by name, research interests, or other keywords');
  }
  // Working paper listing placeholder text.
  if ($form['#id'] == 'views-exposed-form-gsb-working-paper-listing-working-paper-list') {
    // Add placeholder text.
    $form['search']['#attributes']['placeholder'] = t('search by title, author, date, topic, or other keywords');
  }
  // Case study listing placeholder text.
  if ($form['#id'] == 'views-exposed-form-gsb-case-listing-case-listing') {
    // Add placeholder text.
    $form['search']['#attributes']['placeholder'] = t('search by title, author, date, topic, or other keywords');
  }
  // Book listing placeholder text.
  if ($form['#id'] == 'views-exposed-form-gsb-book-listing-book-listing') {
    // Add placeholder text.
    $form['search']['#attributes']['placeholder'] = t('search by title, author, year, topic, or other keywords');
  }
  // Publication listing placeholder text.
  if ($form['#id'] == 'views-exposed-form-gsb-publications-listing-publications-listing') {
    // Add placeholder text.
    $form['search']['#attributes']['placeholder'] = t('search by title, author, year, journal, topic, or other keywords');
  }
  // Announcement and school story mixed listing placeholder text.
  if ($form['#id'] == 'views-exposed-form-gsb-announcement-school-listing-annssh-stories-list') {
    // Add placeholder text.
    $form['search']['#attributes']['placeholder'] = t('search by name, program, date, topic, or other keywords');
  }
  // Ranking listing placeholder text.
  if ($form['#id'] == 'views-exposed-form-gsb-ranking-listing-ranking-listing') {
    // Add placeholder text.
    $form['search']['#attributes']['placeholder'] = t('search by publication, date, or other keywords');
  }
  // Faculty insights listing placeholder text.
  if ($form['#id'] == 'views-exposed-form-gsb-faculty-insights-listing-faculty-insights-listing') {
    // Add placeholder text.
    $form['search']['#attributes']['placeholder'] = t('search by name, date, topic, or other keywords');
  }
  // In the media listing placeholder text.
  if ($form['#id'] == 'views-exposed-form-gsb-in-the-media-listing-in-the-media-listing') {
    // Add placeholder text.
    $form['search']['#attributes']['placeholder'] = t('search by name, program, date, topic, or other keywords');
  }
  // Alumni stories listing placeholder text.
  if ($form['#id'] == 'views-exposed-form-stories-alumni-stories-listing') {
    // Add placeholder text.
    $form['search']['#attributes']['placeholder'] = t('search by name, program, class year, topic, or other keywords');
  }
  // Giving stories listing placeholder text.
  if ($form['#id'] == 'views-exposed-form-stories-giving-stories-listing') {
    // Add placeholder text.
    $form['search']['#attributes']['placeholder'] = t('search by name, program, class year, topic, or other keywords');
  }
  // Alumni book listing placeholder text.
  if ($form['#id'] == 'views-exposed-form-gsb-book-listing-alumni-book-listing') {
    // Add placeholder text.
    $form['search']['#attributes']['placeholder'] = t('search by name, program, class year, topic, or other keywords');
  }
  // Clubs listing placeholder text.
  if ($form['#id'] == 'views-exposed-form-club-filters-club-list') {
    // Add placeholder text.
    $form['search']['#attributes']['placeholder'] = t('Search Stanford GSB clubs');
  }
  // Main event listing placeholder text.
  if ($form['#id'] == 'views-exposed-form-gsb-event-main-event-list-pane') {
    // Add placeholder text.
    $form['search']['#attributes']['placeholder'] = t('search for upcoming events');
  }
  // MBA admission event listing after build customizations.
  if ($form['#id'] == 'views-exposed-form-admission-events-mba-admission-panel-pane') {
    $form['#after_build'][] = 'gsb_theme_admission_events_mba_list_after_build';
  }
  // All publications listing.
  if ($form['#id'] == 'views-exposed-form-gsb-all-research-listing-all-research-panel-pane') {
    // Add placeholder text.
    $form['field_search_field_value']['#attributes']['placeholder'] = t('search by title, author, journal, topic, or other keywords');
  }
  // MSx admission events.
  if ($form['#id'] == 'views-exposed-form-admission-events-msx-admission-panel-pane') {
    // Add placeholder text.
    $form['search']['#attributes']['placeholder'] = t('search by location, title, or other keywords');
  }
  // Faculty listing placeholder text.
  if ($form['#id'] == 'views-exposed-form-msx-fellows-list') {
    // Add placeholder text.
    $form['search']['#attributes']['placeholder'] = t('search by name, research interests, or other keywords');
  }
  // Alumni ACT Project listing placeholder text.
  if ($form['#id'] == 'views-exposed-form-gsb-act-project-listing-panel-pane-1') {
    // Add placeholder text.
    $form['search']['#attributes']['placeholder'] = t('search by project, interests, or other keywords');
  }
}

function gsb_theme_admission_events_mba_list_after_build($form, &$form_state) {
  // Add placeholder text.
  $form['search']['#attributes']['placeholder'] = t('search by location, title, or other keywords');

  // Alter the date field labels
  $form['date_search']['min']['#title'] = t('Date from');
  $form['date_search']['max']['#title'] = t('to');

  // Hide the date descriptions
  unset($form['date_search']['max']['date']['#description'], $form['date_search']['min']['date']['#description']);

  return $form;
}

/**
 * Preprocess html.
 *
 * Load selectivizr library for support IE 8, 7 pseudo classes.
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
    'library',
    'newsroom',
    'insights',
    'alumni',
    'organizations',
    'faculty-research',
    'events',
    'exec-ed',
    'seed',
  );
  $normalized_arg = arg(0);
  $parsed_url = drupal_parse_url(request_uri());
  $path = explode('/', trim($parsed_url['path'], '/'));
  if (isset($path[0]) && in_array($path[0], $allowed_paths) && $normalized_arg == 'node') {
    foreach (theme_get_suggestions($path, 'page', '-') as $arg) {
      $variables['classes_array'][] = drupal_html_class($arg);
    }
  }
  if (user_access('administer panelizer node page content')) {
    drupal_add_css(drupal_get_path('theme', 'gsb_theme') . '/css/admin-modal/admin-modal.css');
  }
  if (drupal_get_http_header('status') == "404 Not Found") {
    $variables['classes_array'][] = 'page-error page-404';
  }
  if (drupal_get_http_header('status') == "403 Forbidden") {
    $variables['classes_array'][] = 'page-error page-403';
  }
  if ($display = panels_get_current_page_display()) {
    $variables['classes_array'][] = 'panels-layout-' . $display->layout;
  }
}

/**
 * Preprocess page.
 */
function gsb_theme_preprocess_page(&$variables) {
  // 403 page
  if(drupal_get_http_header('status') == "403 Forbidden") {
    $variables['theme_hook_suggestions'][] = 'page__403';
  }
  // 404 page
  if (drupal_get_http_header('status') == "404 Not Found") {
    $variables['theme_hook_suggestions'][] = 'page__404';
  }

  $object = menu_get_object();
  if ($object && !empty($object->path['alias'])) {
    if ($object->path['alias'] == 'exec-ed/admission') {
      $fred = 'fred';
      $variables['theme_hook_suggestions'][] = 'page__ee_program_admission';
    }
  }

  // Add search and event link to main navigation
  $variables['global_search'] = array(
    '#type' => 'container',
    '#attributes' => array(
      'class' => array(
        'global-search',
      ),
    ),
    'search' => module_invoke('google_appliance', 'block_view', 'ga_block_search_form'),
  );
}

/**
 * Preprocess exposed filters forms.
 */
function gsb_theme_preprocess_views_exposed_form(&$variables) {
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
 * modifies the action for the exec-ed and seed pages google_appliance_block_form
 * also, adds class for add content forms
 */
function gsb_theme_form_alter(&$form, &$form_state, $form_id) {
  $form['#attached']['js'][drupal_get_path('theme', 'gsb_theme') . '/js/gsb_forms.js'] = array();
  if ($form_id == 'google_appliance_block_form') {
    if (strpos($form['#action'], '/exec-ed') === 0) {
      $form['#action'] = '/exec-ed/search';
    }
    if (strpos($form['#action'], '/seed') === 0) {
      $form['#action'] = '/seed/search';
    }
  }
  if ($form_id == 'views_content_views_panes_content_type_edit_form' || $form_id == 'ctools_block_content_type_edit_form' || $form_id == 'fieldable_panels_panes_fieldable_panels_pane_content_type_edit_form') {
    $form['#attributes']['class'][] = 'modal-add-content-form';
    $form['buttons']['#weight'] = 99;
  }
}

/**
 * Implements hook_preprocess_HOOK() for theme_field().
 */
function gsb_theme_preprocess_field(&$variables, $hook) {

  // Check if the element is: field_related_faculty
  // And if it is empty, then hide the element by adding the 'hide_this' css class to
  if ($variables['element']['#field_name'] == 'field_related_faculty') {
    $item_id = $variables['element']['#items'][0]['value'];
    if (empty($variables['element'][0]['entity']['field_collection_item'][$item_id]['field_person_fac_single_ref'])) {
      $variables['classes_array'][] = 'hide_this';
    }
  }

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

/**
 * Implements theme_menu_link().
 */
function gsb_theme_preprocess_menu_link(&$variables) {
  // Need to remove any menu minipanels code on anything that isn't the main
  // menu.
  if ($variables['element']['#original_link']['menu_name'] !== 'main-menu' &&
    $variables['element']['#original_link']['menu_name'] !== 'menu-executive-education-mega-me' &&
    $variables['element']['#original_link']['menu_name'] !== 'menu-mega-menu-seed') {
    unset($variables['element']['#localized_options']['menu_minipanels_hover']);
  }
}

/**
 * Implements hook_process_HOOK() for node.tpl.php.
 */
function gsb_theme_process_node(&$variables, $hook) {
  // For teaser listings, if the right column is not empty, add a specific class.
  $types = array(
    'book',
    'event',
    'announcement',
    'school_story',
    'offsite_school_story',
    'idea_story',
    'offsite_idea_story',
  );
  $view_modes = array(
    'teaser_listing',
    'event_listing',
    'news_listing',
    'compact',
    'expanded',
    'main_list'
  );
  _gsb_theme_prepare_two_column_classes($variables['type'], $types, $view_modes, $variables);
}

/**
 * Implements hook_preprocess_HOOK() for entities.
 */
function gsb_theme_process_entity(&$variables, $hook) {
  if ($variables['entity_type'] == 'field_collection_item' && isset($variables['field_collection_item'])) {
    $types = array(
      'field_featured_item',
    );
    $view_modes = array(
      'full',
    );
    _gsb_theme_prepare_two_column_classes($variables['field_collection_item']->bundle(), $types, $view_modes, $variables);
  }
}

/**
 * Prepares a template for two columns.
 *
 * @param string $bundle
 *   The bundle of the entity.
 * @param array $bundles
 *   The bundles to prepare.
 * @param array $view_modes
 *   The view modes to prepare.
 * @param array $variables
 *   The array of variables for the template.
 */
function _gsb_theme_prepare_two_column_classes($bundle, $bundles, $view_modes, &$variables) {
  if (in_array($bundle, $bundles) && in_array($variables['view_mode'], $view_modes)) {
    if (!empty($variables['right'])) {
      $variables['left_classes'] .= ' second-column';
    }
  }
}

/**
 * Implements hook_preprocess_HOOK() for views-view-table.tpl.php.
 */
function gsb_theme_preprocess_views_view_table(&$variables) {
  // A list of table views that should be responsive.
  $responsive_views = array(
    'admission_events',
  );

  if (in_array($variables['view']->name, $responsive_views)) {
    $variables['classes_array'][] = 'responsive';
  }
}

/**
 * Themed output of the footnotes list appearing at at [footnotes]
 *
 * Accepts an array containing an ordered listing of associative arrays, each
 * containing values on the following keys:
 *   text   - the raw unprocessed text extracted from within the [fn] tag
 *   text_clean   - a sanitized version of the previous, may be used as HTML attribute value
 *   value  - the raw unprocessed footnote number or other identifying label
 *   fn_id  - the globally unique identifier for the in-body footnote link
 *            anchor, used to allow links from the list to the body
 *   ref_id - the globally unique identifier for the footnote's anchor in the
 *            footnote listing, used to allow links to the list from the body
 */
function gsb_theme_footnote_list($footnotes) {
  $str = '<ul class="footnotes">';
  // Drupal 7 requires we use "render element" which just introduces a wrapper
  // around the old array.
  $footnotes = $footnotes['footnotes'];
  // loop through the footnotes
  foreach ($footnotes as $fn) {
    if(!is_array( $fn['ref_id'])) {
      // Output normal footnote
      $str .= '<li class="footnote" id="' . $fn['fn_id'] .'"><span class="footnote-number">' . $fn['value'] . '.</span>';
      $str .= $fn['text'] . '  |  <a class="footnote-link" href="#' . $fn['ref_id'] . '">' . t("Back to Text") . '</a>' . "</li>\n";
    }
    else {
      // Output footnote that has more than one reference to it in the body.
      // The only difference is to insert backlinks to all references.
      // Helper: we need to enumerate a, b, c...
      $abc = str_split("abcdefghijklmnopqrstuvwxyz"); $i = 0;

      $str .= '<li class="footnote" id="' . $fn['fn_id'] .'"><span class="footnote-number">' . $fn['value'] . '.</span>';
      foreach ($fn['ref_id'] as $ref) {
        $str .= '<a class="footnote-multi" href="#' . $ref . '">' . $abc[$i] . '.</a> ';
        $i++;
      }
      $str .= $fn['text'] . "</li>\n";
    }
  }
  $str .= "</ul>\n";
  return $str;
}
/**
 * Override the file link field so that files will open in a new tab.
 */
function gsb_theme_file_link($variables) {
  $file = $variables['file'];
  $icon_directory = $variables['icon_directory'];

  $url = file_create_url($file->uri);
  $icon = theme('file_icon', array('file' => $file, 'icon_directory' => $icon_directory));

  // Set options as per anchor format described at
  // http://microformats.org/wiki/file-format-examples
  $options = array(
    'attributes' => array(
      'type' => $file->filemime . '; length=' . $file->filesize,
      'target' => '_blank',
    ),
  );

  // Use the description as the link text if available.
  if (empty($file->description)) {
    $link_text = $file->filename;
  }
  else {
    $link_text = $file->description;
    $options['attributes']['title'] = check_plain($file->filename);
  }

  return '<span class="file">' . $icon . ' ' . l($link_text, $url, $options) . '</span>';
}

/**
 * Implements hook_block_list_alter().
 *
 * Removes the 'Section Menu: Alumni' menu block
 * from the alumni/help or alumni/help/* pages
 */
function gsb_theme_block_list_alter(&$blocks) {
  $alias = drupal_get_path_alias(current_path());
  $pos = strpos($alias, 'alumni/help');
  // Check if we on the alumni/help page or an alumni/help/* subpage
  if ($pos !== false && $pos == 0) {
    foreach($blocks as $key => $value) {
      if ($value->delta == 'section-13071') {
        // remove the menu block
        unset($blocks[$value->bid]);
      }
    }
  }
}

/**
 * Implements hook_field_group_pre_render_alter().
 *
 * Adding group wrapper css classes for all field groups
 * Also, adds 'hide_this' class if element is a 'related' group wrapper and has no children
 */
function gsb_theme_field_group_pre_render_alter(&$element, $group, & $form) {
  // Adding group wrapper css classes for all field groups
  $group_children = array(
    'group_wrapper_related' => array(
      'field_related_faculty'
    ),
    'group_wrapper_faculty' => array(
      'field_faculty_1',
      'field_faculty_2',
      'field_faculty_directors',
      'field_guest_speakers_advisors_fc'
    )
  );
  $group_class = str_replace('_', '-', $group->group_name);
  if (!empty($element['#attributes']['class']) && !in_array($group_class, $element['#attributes']['class'])) {
    $element['#attributes']['class'][] = $group_class;
  }
  else {
    $element['#attributes'] = array('class' => array($group_class));
  }
  // Add 'hide_this' class if group wrapper is in $group_children and has no children
  if (in_array($group->group_name, array_keys($group_children))) {
    $found_child = false;
    foreach ($group->children as $child) {
      if (!empty($element[$child]['#field_type']) && $element[$child]['#field_type'] == 'ds') {
        continue;
      }
      if (in_array($child, $group_children[$group->group_name])) {
        $first_item = $element[$child]['#items'][0]['value'];
        $first_entity = $element[$child][0]['entity']['field_collection_item'][$first_item]['#entity'];
        if (!empty($first_entity->field_person_fac_single_ref)) {
          $found_child = TRUE;
          break;
        }
      }
      else if (!empty($element[$child]) && $element[$child] != NULL) {
        $found_child = TRUE;
        break;
      }
    }
    if (!$found_child) {
      if (!empty($element['#attributes']['class'])) {
        $element['#attributes']['class'][] = 'hide_this';
      }
      else {
        $element['#attributes'] = array('class' => array('hide_this'));
      }
    }
  }
}
