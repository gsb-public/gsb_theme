# Require Rubygems and Bundler
require 'rubygems'
require 'bundler/setup'

# Require Sass and Compass
require 'sass'
require 'compass'

# Require additional gems
require 'breakpoint'

# Set this to the root of your project when deployed:
http_path = '/'
css_dir = 'css'
sass_dir = 'sass'
fonts_dir = 'fonts'
images_dir = 'images'
javascripts_dir = 'js'

# Enable relative paths to assets
relative_assets = true

# Disable debugging comments
line_comments = false

# Indented syntax
preferred_syntax = :sass

# Add cache buster
asset_cache_buster :none
