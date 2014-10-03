# Flagship Compass

The most advanced WordPress Starter theme ever created. Compass will revolutionize your theme development workflow by removing all the guesswork and letting you focus on the fun stuff. Built using the latest and  greatest web development tools like Grunt, Sass, Bourbon, and Hybrid Core.

## Project Development

This documentation is by no means complete and will be expanded upon in the near future. In order to get up and running, you'll need to install a few key components. We've put together a screencast which will walk you through the setup process and we also have an entire pulic [forum dedicated to Compass](http://community.flagshipwp.com/category/themes/compass) where you can register and learn from other developers who are using it to build cool stuff.

### Ruby and Sass

Compass uses [Ruby](https://www.ruby-lang.org/en/) and Sass to build the `.scss` files into a CSS file. [Install Ruby](https://www.ruby-lang.org/en/installation/) and then run `gem install sass` to install Sass. You may need to use sudo (for OSX, *nix, BSD etc) or run your command shell as Administrator (for Windows) to do this.

### Composer

Compass also uses [Composer](https://getcomposer.org/) to manage PHP dependencies such as [Hybrid Core](https://github.com/justintadlock/hybrid-core) and [Theme Hook Alliance](https://github.com/zamoose/themehookalliance) support. [Install Composer](https://getcomposer.org/doc/00-intro.md) to enable this functionality.

### Node, NPM and Grunt

Finally, Compass requires Node.js to run the Grunt task runner, so [download Node.js](http://nodejs.org/download/) and install it.

Some Grunt tasks use external command-line applications, so you'll need them installed as global (not specific to this project) Node.js packages. Open up a terminal and run the following. You may need to use sudo (for OSX, *nix, BSD etc) or run your command shell as Administrator (for Windows) to do this.

~~~sh
npm install -g bower
npm install -g csscomb
npm install -g cssjanus
npm install -g cssjanus
npm install -g grunt-cli
npm install -g jscs
npm install -g jshint
~~~

After unzipping or cloning this repo, `cd` into it and run `npm install`. This will then install all of the project-specific tasks.

To check everything appears to have installed, run `grunt check`. This will perform a series of checks on the project code to verify its health for syntax errors and code standards.

You'll also need to [install Composer](https://getcomposer.org/doc/00-intro.md).

### Troubleshooting
If, when running a task (`grunt ...`) you get an error about _Cannot find module 'rimraf'_, then do the following:

~~~sh
npm uninstall grunt-phplint
npm install grunt-phplint
~~~

There's apparently a package dependency issue that means the _grunt-phplint_ package needs installing last.

## Create A New Theme

1. Clone or manually copy this repo to a new directory. 
- Update `name` and `capitalname` in `package.json`.
  _At this stage, keep the theme name to a single word with no non-alphanumerical characters. The lowercase version is used for function name prefixes, and the upper case for class names (amongst other things), so spaces and punctuation will cause syntax errors._
- On the command line, `cd` into the new project directory and run `npm install`.
- Run `grunt newtheme`. This will replace instances of `compass` and `Compass` for function names, class names, text domains, enqueued script and style handles, README, and so on. It will then run a build process to generate everything needed for the theme.

It doesn't change filenames, so avoid theme-specific filenames in the original project.

## Tasks

Grunt has two types of tasks - basic tasks which are provided by the node packages, and virtual tasks which are a shortcut for running multiple basic tasks in order.

In this project, basic tasks are stored in individual JavaScript files inside the `grunt/config/` directory. i.e. The `jscs` task for checking JavaScript code standards is found at [grunt/config/jscs.js](grunt/config/jscs.js).

The list of virtual tasks is stored in [grunt/config/aliases.yaml](grunt/config/aliases.yaml).

This approach is different to how most grunt configurations are setup, which usually have a single `Gruntfile.js` with all of the task configs inside. The `Gruntfile.js` that this project has is noticeably small, and just sets some variables for the project path structure and filesets. You should update this if your project directory structure changes, or you change the name of the author's assets directory. It then includes all task configs inside the `grunt/configs/` directory, so nothing there needs to be updated when a new task is added.

The advantages of having the Grunt configs in separate modular files are:

* Less tweaking needed when re-using the same modules in other theme (or plugin) projects.
* Easy to delete modules that will not be used on new projects.
* Fewer lines of code means better readability and it becomes less scary for less confident coders to edit.
* Cleaner version control history, since it's only a few lines.
* Ability to be more granular with the JavaScript checks run against the modules, i.e. no need to require camel case properties for Grunt tasks, since that is set by the package author, while still allowing it for other JavaScript files.

Tasks contain one or more targets, and these can be referenced in the aliases file or on the command line in the form of _task:target_. If a task does not specify a target, then all targets inside that task are run.

Since the act of running `grunt newtheme` will also trigger a full build, let's break that task down. 

## Build Tasks (`grunt build`)

The build task is a virtual task made up of cleaning the previous build files and directories, then building the CSS, the font, the images, the JavaScript, and the internationalization (i18n).

### Build Dependencies (`grunt build:dependencies`)

Each of the programming language build targets (`build:css`, `build:js` and `build:php`) have dependencies on third-party code. This code is pulled in via Bower or Composer. The Bower dependencies are listed in `bower.json` in the project root, and then moved to the right place in the `assets/bower/` directory via targets in the `bowercopy` task (see `grunt/config/bowercopy.js`).

The default CSS dependencies are _normalize.css_ (to provide a normalization of styles across all modern browsers), _Bourbon_ (Sass framework of mixins) and _Neat_ (Sass grid layout for _Bourbon_).

There is a instance of _Genericons_ that is handled as part of the CSS dependencies, though it's not yet handled by Bower.

The default JavaScript dependencies are _fitvids_ for adjusting videos to fit the available size, _sidr_ for mobile navigation and a jQuery plugin for adding keyboard accessibility to the non-mobile navigation menu.

The default PHP dependencies, listed in `composer.json` are pulled in via the `composer task` into `assets/composer/` are the _Hybrid Core_ framework and the _Theme Hook Alliance_ library. Each time the `build:dependencies:php` task is run, the old instances of these dependencies are deleted and the new versions are copied into the right place in the `theme/` directory.

### Build CSS (`grunt build:css`)

The building of the CSS is made up of several small tasks that do incremental changes from the source asset files to the end files. These are:

* Pulling in the CSS dependencies as already mentioned above.
* Renaming `normalize.css` to `_normalize.scss` so it can be referenced as a Sass partial.
* Building the Sass. This looks at the `style.scss` inside the `assets` author directory, and follows the chain of `@import`'s to pull in the dependencies, mixins, placeholders, variables and modular partials to generate a `style.css`. The banner with the style sheet file headers is also added at this point, and it takes values from the `package.json` file. The generated style sheet file is held in a temporary directory called `tmp/` since it then undergoes further changes.
* Apply autoprefixing. Vendor prefixes may be needed for some CSS properties, but knowing which are needed for which browser and version, and having to manually update them if the minimum requirements change, is a pain. The autoprefixer task is configured with the browser requirements such as IE >= 8, the last two versions of all other browsers, and browsers with at least 1% market usage. See `grunt/config/autoprefixer.js` for this projects requirements. When the task is run, it updates the `style.css` by adding or removing vendor-prefixed properties as needed.
* Tidy up `style.css` to match the WordPress Coding Standards. The `wpcss` grunt package is a wrapper for CSSComb. This fixes up the whitespace and linebreaks, checks for certain property values like colors using lowercase and short hexadecimal values, and re-orders properties. The default for this project is `alphabetical` ordering, but this can be changed in `grunt/config/wpcss` to `default` which provides a more pragmatic order.
* A quick replacement of the _normalize.css_ headings format so it matches the rest of the file.
* Generate the right-to-left (RTL) style sheet. At this point, the `style.css` is copied to `style-rtl.css` and this new file has certain values reversed for the benefit of languages using a RTL script such as Arabic or Hebrew. Values of `left` are switch to `right`, unsymmetrical padding, margin and borders are reversed, and percentage values are changed to their complement from `100%`, etc. Some PHP ensures that only the `style-rtl.css` version of the file is enqueued when the site is using an RTL language script.
* The style sheets are minified to remove comments and whitespace. The two style sheet files now become four, as each is minified to save on bytes. The minified style sheets are used in production by default, to minimze the number of bytes being transferred to the end user. The un-minified versions are used when the WordPress constants of `WP_DEBUG` or `SCRIPT_DEBUG` are defined as true.
* A quick fix for the minified style sheets, to add a line break between the style sheet banner and the minified styles.
* All four style sheet files are then copied from the `/tmp` directory and into the `theme/` directory.

### Build Font (`grunt build:font`)

This is a simple task - it copies the _Genericons_ icon fonts from the `assets/genericons` directory into the `theme/font` directory so it can be referenced by the `@font-face` rule that appears in the generated `style.css`.

### Build Images (`grunt build:images`)

All images in the author's image directory inside `assets/` are optimised and saved temporarily in `tmp/images`. This optimisation removes un-needed meta data from the image files, and may compress images in a more efficient way to save bytes, so that fewer bytes are sent to the visitors browser, resulting an a faster site.

After that, the `screenshot.png` file is copied to the `theme/` directory, and any other images are copied to `theme/images` where they can be referenced by `style.css`.

### Build JavaScript (`grunt build:js`)

The build process for JavaScript starts off by cleaning up any previous build  files.

It then takes the sets of JavaScript files defined in `grunt/config/concat.js` which come from multiple dependencies, including a theme-specific script file which may initialise the jQuery plugins, and concatenates them (merges them into one file, in order) and saves the file in the `theme/` directory.

This file is then minified with the `uglify` task, to remove the whitespace, linebreaks and comments. This may often rename internal variables and function calls to single characters to save bytes too. This is then saved with `.min.js` extension. This minified file is enqueued by PHP by default for production, and the non-minified version is used when the WP constant `SCRIPT_DEBUG` is defined and true.

Both files are then validated by the `grunt jsvalidate:theme` task and target to ensure that no syntax errors are present.

### Build I18n (`grunt build:i18n`)

Themes should include a Portable Object Template file as a template for all internationalized strings in the theme. The `makepot` task looks over all of the PHP files for these strings, and places them in to the `.pot` file inside `theme/languages` with the headers that are populated from values in the `package.json`. Users can then create language-specific versions of these files, such as `en_GB.po` and `en_GB.mo` which is then used by WordPress to show strings from other languages.

An i18n task that is _not_ run as part of the build is the `grunt addtextdomain` task. This can be configured in `grunt/config/addtextdomain.js` to set up replacement of incorrect textdomains, or add textdomains when none are present in the standard i18n functions.

## Check Task (`grunt check`)

(To be written)

### Pre-Commit Hook

(To be written)

## Package (`grunt package`)

(To be written)
