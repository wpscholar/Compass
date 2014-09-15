# Flagship Compass

A WordPress Starter Theme Using Hybrid Core, Bourbon, Neat, and the Theme Hook Alliance.

## Project Development

### Ruby and Sass

This project uses [Ruby](https://www.ruby-lang.org/en/) and Sass to build the `.scss` files into a CSS file. [Install Ruby](https://www.ruby-lang.org/en/installation/) and then run `gem install sass` to install Sass. You may need to use sudo (for OSX, *nix, BSD etc) or run your command shell as Administrator (for Windows) to do this

### Composer

This project uses [Composer](https://getcomposer.org/) to manage PHP dependencies such as [Hybrid Core](https://github.com/justintadlock/hybrid-core) and [Theme Hook Alliance](https://github.com/zamoose/themehookalliance) support. [Install Composer](https://getcomposer.org/doc/00-intro.md) to enable this functionality.

### Node, NPM and Grunt

This project also uses Node.js to run the Grunt task runner, so [download Node.js](http://nodejs.org/download/) and install it.

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
- On the command line, `cd` into the new project directory and run `npm install`.
- Run `grunt newtheme`. This will replace instances of `incipio` and `Incipio` for function names, class names, text domains, enqueued script and style handles, README, and so on. It will then run a build process to generate everything needed for the theme.

It doesn't change filenames, so avoid theme-specific filenames in the original project.

## Things for the future

### Genericons

If Genericons gets Bower support, then pull it as a dependency via Bower, and update the rename task accordingly. There is likely to be a replace for the path to font files too.

