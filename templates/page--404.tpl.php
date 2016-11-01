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
            <h2>Try our <a href="/search" title="Search">site search</a> or explore our site using the links below.</h2>
            <div class="menu-wrapper" width="25%">
              <h3><a href="http://www.gsb.stanford.edu/">Home</a></h3>
              <ul class="menu">
                <li><a href="/programs" title="Our Programs">The Programs</a></li>
                <li><a href="/exec-ed" title="Executive Education">Executive Education</a></li>
                <li><a href="/programs/stanford-ignite" title="Stanford Ignite">Stanford Ignite</a></li>
                <li><a href="/faculty-research" title="Faculty and Research">Faculty &amp; Research</a></li>
                <li><a href="/seed" title="Stanford Seed">Stanford Seed</a></li>
                <li><a href="/insights" title="Insights by Stanford Business">Insights by <em>Stanford Business</em></a></li>
              </ul>
            </div>
            <div class="menu-wrapper" width="25%">
              <h3>About Stanford GSB</h3>
              <ul class="menu">
                <li><a href="/stanford-gsb-experience/news-history" title="School News & History">School News & History</a></li>
                <li><a href="/stanford-gsb-experience" title="The Experience">The Experience</a></li>
                <li><a href="/visit" title="Visit Us">Visit Us</a></li>
                <li><a href="/contact" title="Contact Us">Contact Us</a></li>
                <li><a href="/jobs" title="Jobs">Jobs</a></li>
              </ul>
            </div>
            <div class="menu-wrapper" width="25%">
              <h3>Connect With Stanford GSB</h3>
              <ul class="menu">
                <li><a href="/events" title="Events">Events</a></li>
                <li><a href="/alumni" title="Alumni">Alumni</a></li>
                <li><a href="/alumni/giving" title="Giving">Giving</a></li>
                <li><a href="/organizations" title="Companies, Organizations and Recruiters">Companies, Organizations &amp; Recruiters</a></li>
                <li><a href="/stanford-university-community" title="Stanford University Community">Stanford University Community</a></li>
                <li><a href="/newsroom" title="Newsroom">Newsroom</a></li>
                <li><a href="/library" title="Business Library">Business Library</a></li>
              </ul>
            </div>
            <div class="menu-wrapper" width="25%">
              <h3><a href="http://mygsb.stanford.edu" title="MyGSB">Log In to MyGSB</a></h3>
            </div>

          </div></div> <!-- /.error-wrapper, /#main -->

      </div> <!-- /#content -->

    </div> <!-- /#content-wrapper -->

    <div id="footer-wrapper">

      <?php if ($page['legal']): ?>
        <div id="legal" class="clearfix"><div class="section">
          <div class="region region-legal">
            <div id="block-menu-menu-footer-3" class="block block-menu">
              <div class="content">
                <ul class="menu">
                  <li class="first leaf"><a href="http://www.stanford.edu/site/accessibility" target="_blank">Accessibility</a></li>
                  <li class="leaf"><a href="/privacy-policy">Privacy Policy</a></li>
                  <li class="leaf"><a href="http://www.stanford.edu/site/terms.html" target="_blank">Terms of Use</a></li>
                  <li class="last leaf"><a href="http://www.stanford.edu/" target="_blank">Stanford University</a></li>
                </ul>
              </div>
            </div>
            <div id="block-block-1" class="block block-block">
              <div class="content">
                <div class="gsb-footer-meta">
                  <div class="copyright">Copyright © Stanford Graduate School of Business</div>
                  <div class="address">655 Knight Way, Stanford, CA 94305</div>
                </div>
              </div>
            </div>
          </div>
        </div></div> <!-- /.section, /#legal -->
      <?php endif; ?>

    </div> <!-- /#footer-wrapper -->

  </div></div></div></div> <!-- /#page, /#page-wrapper -->
