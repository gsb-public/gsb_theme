<?php

/**
 * @file
 * Default theme implementation to display an error page.
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
            <div class="event-and-search"><a href="/events" class="event-calendar">Event Calendar</a><?php
              $search_block = module_invoke('google_appliance', 'block_view', 'ga_block_search_form');
              print render($search_block['content']);
             ?></div><div id="menu-main-footer">
              <?php
                $footer_1 = module_invoke('menu', 'block_view', 'menu-footer-1');
                $footer_2 = module_invoke('menu', 'block_view', 'menu-footer-2');
                print render($footer_1['content']);
                print render($footer_2['content']);
              ?>
          </div></div></div>
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
