<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

  <div id="page-wrapper"><div id="page">
    <div id="header-wrapper"><div id="header"><div class="section clearfix">
      <a id="search-touch-button"></a>
      <?php if ($page['navigation']): ?>
        <div id="nav-touch-wrapper">
          <a id="nav-touch-button"></a>
          <div id="navigation"><div class="section">
            <?php print render($page['navigation']); ?>
            <div class="se"><a href="/events" class="event-calendar">Event Calendar</a>
              <?php
              $search_block = module_invoke('google_appliance', 'block_view', 'ga_block_search_form');
              print render($search_block['content']);
              ?>
            </div>
            <div id="menu-main-footer">
              <?php
                $footer_1 = module_invoke('menu', 'block_view', 'menu-footer-1');
                $footer_2 = module_invoke('menu', 'block_view', 'menu-footer-2');
                print render($footer_1['content']);
                print render($footer_2['content']);
              ?>
            </div>
          </div></div> <!-- /.section, /#navigation -->
        </div> <!-- /#nav-touch-wrapper-->
      <?php endif;
        if ($site_slogan): ?>
        <div id="site-slogan"><?php print $site_slogan; ?></div>
      <?php endif;
        print render($page['header']);
        if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"></a>
      <?php endif; ?>
    </div></div></div> <!-- /.section, /#header, /#header-wrapper -->

    <?php print $messages; ?>


    <div id="content-wrapper" class="clearfix">

      <?php if ($page['banner']): ?>
        <div id="banner" class="clearfix"><div class="section">
          <div class="banner-content">
            <?php print render($page['banner']); ?>
          </div> <!-- /.banner-content -->
        </div></div> <!-- /.section, /#banner -->
      <?php endif; ?>

      <div id="content" class="clearfix">

        <?php if ($page['sidebar_first']): ?>
          <div id="sidebar" class="column"><div class="section">
            <div class="sidebar">
              <?php print render($page['sidebar_first']); ?>
            </div> <!-- /.sidebar -->
          </div></div> <!-- /.section, /#sidebar -->
        <?php endif; ?>

        <div id="main" class="column"><div class="section">
          <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
          <a id="main-content"></a>
          <?php if (!isset($page['banner']['gsb_public_custom_blocks_gpcb_breadcrumbs'])): ?>
          <?php print $breadcrumb; ?>
          <?php endif; ?>
          <?php print render($title_prefix); ?>
          <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
          <?php print render($title_suffix); ?>
          <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
          <?php print render($page['help']); ?>
          <?php print render($page['content']); ?>
          <?php print $feed_icons; ?>
        </div></div> <!-- /.section, /#main -->

      </div> <!-- /#content -->

    </div> <!-- /#content-wrapper -->

    <?php if ($page['content_bottom']): ?>
      <div id="bottom" class="clearfix"><div class="section">
        <div class="bottom-content">
          <?php print render($page['content_bottom']); ?>
        </div> <!-- /.bottom-content -->
      </div></div> <!-- /.section, /#bottom -->
    <?php endif; ?>

    <div id="footer-wrapper"><div id="footer"><div class="section">
      <?php print render($page['footer']); ?>
    </div></div> <!-- /.section, /#footer, /#footer-wrapper -->

    <?php if ($page['legal']): ?>
      <div id="legal" class="clearfix"><div class="section">
        <?php print render($page['legal']); ?>
      </div></div> <!-- /.section, /#legal -->
    <?php endif; ?>

  </div></div></div></div> <!-- /#page, /#page-wrapper -->
