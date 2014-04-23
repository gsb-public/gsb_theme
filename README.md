# GSB Theme - gsb_theme

A custom Drupal theme that provides the look and feel for the public [Stanford Graduate School of Business](http://www.gsb.stanford.edu/) site.

## Dependencies

### Drupal

This is a Drupal theme, and requires the gsb_theme.info file.
Further documentation is available on [Drupal.org](https://drupal.org/node/171205).

### Ruby

The theme requires a Ruby version in the Gemfile.

### Ruby gems

- [Bundler](http://bundler.io/)
- [Sass](http://sass-lang.com/)
- [Compass](http://compass-style.org/)
- [Breakpoint](http://breakpoint-sass.com/)
- [Font Custom](http://fontcustom.com/)

#### Bundler

This project requires [Bundler](http://bundler.io/) to manage ruby and ruby gem dependencies and versions.
Bundler includes a Gemfile and Gemfile.lock in the theme's root.

##### Installing Bundler

If you do not already have Bundler on your system, you can install it by running the command `sudo gem install bundler` from the command line.

##### Installing the bundle

To install the project's bundle for the first time, from the gsb_theme directory run `bundle install`.
This command should then download the gems the project requires.
The bundle only needs to be installed once.

##### Using the bundle

Once the bundle is installed, in order to use it, you must use the executable `bundle exec` before any commands.
For example `bundle exec compass compile` or `bundle exec compass watch`.

##### Updating the bundle

From time to time you may need to update or add ruby gems.
The gem name should be added to the Gemfile, and then run the command `bundle update`.
Commit the changes made to the Gemfile, along with the resulting changes made to Gemfile.lock.

#### Sass

This project uses the CSS extension language Sass to author CSS, specifically, the indented Sass syntax.
The Sass syntax is white-space sensitive, and will not allow `{}` or `;`.
In some cases, newer features have not been implemented for the Sass syntax to date, in which case Scss is needed.
The Sass settings are configured in `config.rb`.

#### Compass

- This project is compiled using Compass, and also uses some mixins that are provided by the framework.
- Please check-in both the Sass and resulting compiled CSS changes together in the same commit to version control.

#### Breakpoint

- This project uses Breakpoint to manage media queries.
- Variables for the media queries are created in `sass/partials/base/00-variables/_base`.

#### Font Custom

We are using Font Custom to generate our icon font based on the method outlined by [Jayden Seric](http://jaydenseric.com/blog/font-icons-like-a-boss-with-sass-and-font-custom).

##### Modifications

- Not using the `%icon` extend, in order to use the icon mixin nested under an `@media` query.
- Moved the `@font-face` set up into `sass/partials/base/04-defaults/_font-face`.

##### Adding or changing icons

- The icon font only needs to be compiled if a new icon is being added, or we need to change and existing icon.
- Using the icon template, export an svg, and place it in the `images/icons` directory.
- In the `font/icons` directory run `fontcustom compile`.

## Organization

### CSS

- The `CSS` directory contains the compiled CSS sheets from the Sass directory.
- The CSS should not be edited directly, as those changes will be removed upon compiling.
- Global CSS should be added in the `.info` file, and conditional CSS should be added in `template.php`.

### Fonts

- The font files that are used for the theme are in the `fonts` directory.
- This directory also contains an `icons` directory, which is where the font custom generated icon font and its configuration is.
- Fonts are added using `@font-face` in `sass/partials/base/04-defaults/font-face`.

### Images

- All images used in the theme are in the `images` directory.
- This includes the icon svg files in a sub-directory called `icons`.

### JavaScripts

- JavaScript used by the theme is in the `js` directory.
- If it is an external library it is in the `libs` directory.

### Layouts

Custom panels layouts directory.

### Sass

- Within the `sass` directory, there is a `conditionals` directory and a `partials` directory.
- The `conditionals` directory contains Sass sheets that compile to their own individual CSS sheets.
- The `partials` directory contains a `base` directory, a `design` directory and style.sass sheet.
- The `base` directory contains partials that set up our theme including variables, mixins, extends, defaults, and layouts.
- The `design` directory contains partials that apply globally to the theme, and all are imported in the `style.sass` sheet.

### Templates

- Overridden and customized templates are in the `templates` directory.
- Avoid use of template (.tpl.php) files whenever possible.
- When overriding a template file, copy the original and rename as appropriate, and then commit it.
- Make the actual changes to the file in a separate commit.
- Favor preprocess hooks over theme functions over template files.

## Process

### Declarations

- Declarations should be in alphabetical order, except for positioning with top, right, bottom, left which can follow the position declaration.
- List parent-specific declarations directly under the class selector, then list parent states
- List the indented child selectors last

### Naming conventions

- Partials are named by the machine name of the content type.
- Selectors should be `.hyphen-delimited`.

### Legacy browser support

- Browser specific changes for IE are made by using a class.
- For example, use `.ie8 &` under the element that you need to adjust, with declarations nested beneath the browser class.
