gsb_theme
=========

Theme to provide the look and feel for the public Stanford Graduate School of Business site.


Bundler
=======

This theme uses Bundler (http://bundler.io/) to manage ruby gem dependencies and versions. The project includes a Gemfile and Gemfile.lock in the theme's root. If you do not already have bundler installed, you can install it using the command "gem install bundler" from the command line. To install the project bundle for the first time, from the gsb_theme folder run "bundle install". This command should then download the gems the project requires. The bundle only needs to be installed once.

Once the bundle is installed, in order to use it, you must use the executable "bundle exec" before any compile commands. For example "bundle exec compass compile" or "bundle exec compass watch".


Github
======

This project is a public repository on Github. Please check in Sass and resulting CSS changes together in the same commit. If you are working on a task that has an associated Jira ticket, please create a branch for the issue using the issue number as the name of the branch, for example, WP-100. Please also include the issue number in each commit message in order to associate it to the task.


Legacy browser support
======================

Browser specific changes for IE are made inline using a class. For example ".ie8 &" under the element that you need to adjust, with the changes nested beneath the browser class.
