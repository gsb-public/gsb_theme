<?php

/**
 * 404 Page
 */
?>

  <div id="page-wrapper"><div id="page">
    <div id="header-wrapper"><div id="header"><div class="section clearfix">

      <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
          <img src="/<?php print drupal_get_path('theme', 'gsb_theme'); ?>/images/logo-print.jpg" alt="Home">
        </a>
      <?php endif; ?>

      <?php if ($page['header']): ?>
        <?php print render($page['header']); ?>
      <?php endif; ?>

    </div></div></div> <!-- /.section, /#header, /#header-wrapper -->

    <?php print $messages; ?>

    <div id="content-wrapper" class="clearfix">

      <div id="content" class="clearfix">

        <div id="main">
          <div class="error-wrapper">
            <h1>Sorry! The page you are looking for could not be found</h1>
            <h2>Please try our site search, or explore the links below.</h2>

            <div class="search-wrapper"><?php print render($global_search); ?></div>

            <div class="menu-wrapper">
              <h3>Site Links</h3>
              <ul class="menu">
                <li><a href="/" title="Home">Home</a></li>
                <li><a href="/stanford-gsb-experience" title="The Experience">The Experience</a></li>
                <li><a href="/programs" title="Our Programs">The Programs</a></li>
                <li><a href="/faculty-research" title="Faculty and Research">Faculty &amp; Research</a></li>
                <li><a href="/insights" title="Insights by Stanford Business">Insights by Stanford Business</a></li>
                <li><a href="/alumni" title="Alumni">Alumni</a></li>
                <li><a href="/organizations" title="Companies, Organizations and Recruiters">Companies, Organizations &amp; Recruiters</a></li>
                <li><a href="/stanford-university-community" title="Stanford University Community">Stanford University Community</a></li>
                <li><a href="/library" title="library">Library</a></li>
              </ul>
            </div>

            <div class="menu-wrapper">
              <h3>About Us</h3>
              <ul class="menu">
                <li><a href="/events" title="Events">Events</a></li>
                <li><a href="/newsroom" title="Newsroom">Newsroom</a></li>
                <li><a href="/visit" title="Visit Us">Visit Us</a></li>
                <li><a href="/contact" title="Contact Us">Contact Us</a></li>
                <li><a href="/jobs" title="Jobs">Jobs</a></li>
                <li><a href="http://mygsb.stanford.edu" title="MyGSB">MyGSB</a></li>
              </ul>
            </div>

          </div></div> <!-- /.error-wrapper, /#main -->

      </div> <!-- /#content -->

    </div> <!-- /#content-wrapper -->

    <div id="footer-wrapper">

      <?php if ($page['legal']): ?>
        <div id="legal" class="clearfix"><div class="section">
          <?php print render($page['legal']); ?>
        </div></div> <!-- /.section, /#legal -->
      <?php endif; ?>

    </div> <!-- /#footer-wrapper -->

  </div></div></div></div> <!-- /#page, /#page-wrapper -->
