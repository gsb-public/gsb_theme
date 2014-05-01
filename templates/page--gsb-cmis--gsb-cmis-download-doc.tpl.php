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
    	<?php print $messages; ?>
    	<?php print render($page['content']['system_main']); ?>
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
