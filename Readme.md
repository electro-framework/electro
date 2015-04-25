# Selene Framework Starter Project

> Selene is a web framework for the rapid development of web applications and websites using the PHP language.

**This repository contains the scaffolding files and folders that should be used as a foundation for building projects based on Selene..**

Use it to bootstrap your application development by starting from a working prototype that you can easily modify and extend to meet your needs.

## Installation

#### Runtime requirements

-  PHP >= 5.4
-  Composer

#### Development-time requirements

-  Node.js >= 0.10
-  NPM
-  Bower

#### Install Composer

Selene utilises [Composer](http://getcomposer.org) to manage its dependencies. So, before using Selene, you will need to make sure you have Composer installed on your machine.


#### Install the project

On the parent folder where the project folder will be created, issue the `composer create-project` command on your terminal.

Ex: this will install the starter project into the `your-project-name` folder:


```shell
cd parent-folder
composer create-project -s dev selene-framework/starter-project your-project-name
```

Upon completing the installation, Composer will ask you:

```
Do you want to remove the existing VCS (.git, .svn..) history? [Y,n]?
```

You should type `n` to keep the Git history, so that later on, you can easily merge updates from the `starter-project` into your project (this is optional, of course).

#### Check if it's working

After installation, the project should be ready to run.

> You'll need a local Apache web server to run it.

Open the localhost URL corresponding to the project's `public_html` folder on your browser.

You should see a welcome page.

> This is the only page available on this starter project. It is meant to give you a visual confirmation that the installed project is working.

### Using a build system

There is no need for an additional build step when launching the starter project for the first time.

Nevertheless, once you starting adding files that need compilation (like LESS stylesheets, for instance) you will need to setup the build tools.

Projects that extend `starter-project` (like `selene-shell`, for instance) usually require a build system.

#### Install Node.js

Donwload Node.js from [nodejs.org](https://nodejs.org) or, if running on Linux, install it from your package management tools (apt-get, yum, etc).

#### Install the build tools:

On your project folder:

```shell
npm install
bower install
```

#### Build the project

The starter project comes preconfigured to build a LESS stylesheet found at `private/resources/assets/less/main.less`. The supplied `main.less` is empty, so there is no need to build it until you actually start making use of it, which is optional.

Once you start installing additional selene packages, `package.json` will be modified to incorporate additional build steps, as dictated by the packages' requirements.

To (re)build the project, while on your project folder, type:

```shell
npm run build
```


### Rebuilding the project during development

To rebuild stylesheets, scripts and/or assets, type:

```shell
npm run build
```

To install/uninstall/update PHP packages or reconfigure the PHP class autoloader, type:

```shell
composer update
```

## License

The Selene Framework is open-source software licensed under the [MIT license](http://opensource.org/licenses/MIT).

**Selene Framework** - Copyright &copy; Impactwave, Lda.
