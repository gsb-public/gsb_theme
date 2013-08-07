<?php
/**
 * @file
 * Default theme implementation for the html structure of a not found page
 */
?><!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <?php print $head; ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--  Mobile viewport optimized: j.mp/bplateviewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php print $head_title; ?></title>
    <?php print $styles; ?>
  </head>
  <body class="<?php print $classes; ?> page-not-found" <?php print $attributes; ?>>
    <div id="header-wrapper">
      <div id="header">
        <div class="section clearfix">
          <a id="search-touch-button"></a>
          <a href="/" title="Home" rel="home" id="logo">
            <img src="/<?php print drupal_get_path('theme', 'gsb_theme'); ?>/images/logo.png" alt="Home">
          </a>
        </div>
      </div>
    </div>
    <div id="skip-link">
      <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
    </div>
    <div id="content-wrapper">
      <div id="content">
        <div id="main">
          <div class="left"><h1 class="page-title">404 <span>Page Not Found</span></h1></div>
          <div class="error-wrapper not-found">
            <p class="larger-text">Oops...The page you are looking for could not be found</p>
            <p>But we are here to help in your <a href="/search" title="Search">Search</a>.</p>
            <p>The <a href="/" title="Stanford Graduate School of Business">Stanford Graduate School of Business</a> website is constantly evolving and the links you followed are possibly no longer available, or have moved. Maybe you want to learn about <a href="/programs" title="Our Programs">Our Programs</a> or look into our <a href="/business-insights" title="News and Insights">News &amp; Insights</a>.</p>
            <div class="menu-wrapper">
              <h2>Site Links</h2>
              <ul class="menu">
                <li><a href="/" title="Home">Home</a></li>
                <li><a href="/stanford-gsb-experience" title="Stanford GSB Experience">Stanford GSB Experience</a></li>
                <li><a href="/programs" title="Our Programs">Our Programs</a></li>
                <li><a href="/faculty-research" title="Faculty and Research">Faculty &amp; Research</a></li>
                <li><a href="/business-insights" title="News and Insights">News &amp; Insights</a></li>
              </ul>
            </div>
            <div class="menu-wrapper">
              <h2>About Us</h2>
              <ul class="menu"><li class="first leaf"><a href="/newsroom" title="Newsroom">Newsroom</a></li>
                <li><a href="/visit" title="Visit Us">Visit Us</a></li>
                <li><a href="/contact" title="Contact Us">Contact Us</a></li>
                <li><a href="/jobs" title="Jobs">Jobs</a></li>
                <li><a href="http://mygsb.stanford.edu" title="Log In">Log In</a></li>
              </ul>
            </div>
            <div class="menu-wrapper">
              <h2>Other Sites</h2>
              <ul class="menu"><li class="first leaf"><a href="http://alumni.gsb.stanford.edu/" title="Alumni">Alumni</a></li>
                <li><a href="http://www.gsb.stanford.edu/giving" title="Giving">Giving</a></li>
                <li><a href="http://www.gsb.stanford.edu/corporate" title="Recruiters and Corporate Partners">Recruiters &amp; Corporate Partners</a></li>
                <li><a href="/stanford-university-community" title="Stanford University Community">Stanford University Community</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="legal" class="clearfix"><div class="section">
          <div class="region region-legal">
            <div id="block-menu-menu-footer-3" class="block block-menu">
              <div class="content">
                <ul class="menu"><li class="first leaf"><a href="/privacy-policy" title="Privacy Policy" class="active">Privacy Policy</a></li>
                  <li class="leaf"><a href="http://www.stanford.edu/site/terms.html" title="Terms of Use">Terms of Use</a></li>
                  <li class="last leaf"><a href="http://www.stanford.edu" title="Stanford University">Stanford University</a></li>
                </ul>  </div>
            </div>
            <div id="block-block-11" class="block block-block">
              <div class="content">
                <div class="gsb-copyright">Copyright © Stanford Graduate School of Business</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
