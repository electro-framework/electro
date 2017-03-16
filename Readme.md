# electro framework

> *Electro* is a modern PHP web framework for developing web applications and websites.

**This repository provides a standard installation of the framework.
Use it as a starting point for developing a project based on Electro.**

## Installation

#### Runtime requirements

- PHP >= 5.6
- Composer
- PHP Extensions:
  - PDO
  - CURL
  - Mcrypt
  - GD2

#### Install Composer

Electro uses [Composer](http://getcomposer.org) to manage its dependencies. So, before using Electro, you will need to make sure you have Composer installed on your machine.

#### Configure your environment

You should add `./bin` to your environment's PATH variable, so that Electro commands can be run easily on the terminal.
> Examples on the framework's documentation and Readme files assume your PATH is configured this way. Failure to do this will cause errors when running the examples.

##### Configuring the path

Add this to your *shell environment*:

	export PATH=./bin:$PATH

> Put this line at the end of one of these files: `~/.bash_profile`, `~/.bashrc` or `~/.profile`, depending on you operating system type and configuration.

**You only have to do this once**. Also, first make sure your path isn't already configured this way.

> Note: you can check your current path by typing: `echo $PATH`

#### Install the project

On the parent folder where the project folder will be created, issue the `composer create-project` command on your terminal.

For example, this will install a working Electro prototype project into the `your-project-name` folder:


```bash
cd parent-folder
composer create-project electro/electro your-project-name
```

#### Follow the Configuration Wizard

At the end of the installation procedure, the Configuration Wizard automatically runs to perform the final installation steps.

The Wizard scaffolds some of the application's directory structure and then proceeds to setting up the application's configuration.

Answer the Wizard's questions to customize the application to your needs.

#### Check if it's working

After installation, the project should be ready to run.

It is recommended to have a local Apache web server to run it. Alternatively, you may use the built-in development server (see below).

If you have Apache installed, all you have to do now is to open the localhost URL corresponding to the project's folder on your browser.

You should see a welcome page.

#### Using the built-in development server

The framework comes with its own built-in web server, suitable for development only. If you do not whish to install Apache on your computer, you may use it instead.

To start the server type:

```bash
workman server:start
```

The application will be available at `http://localhost:8000`.

## Managing the installation

### Using the framework's Command Line Interface (workman)

Electro comes with a command line interface (CLI), called `workman`, that allows you to perform several tasks from the command line.

> The tasks/commands that are available depend on which plugins are installed. Your application may also provide its own commands.

On your project's root directory, type:

```bash
workman
```

You'll get a list of available commands.

Refer to the framework documentation for an explanation of each available command.

### Creating modules

Electro is a highly modular framework; as such, even your application's core code must be a module (or several modules).

Modules may be **private modules**, **plugins** or **templates**.

> Read the framework's documentation for a thorough explanation about each module type.

**Before you can start developing your application, you must create, at least, one private module for it.**

Type:

```bash
workman make:module
```

Follow the interactive instructions. Workman will generate a ready to use scaffold with routing, navigation and module configuration, which you may use as a base for a general purpose module.

Alternatively, if you intend to use the Matisse templating engine plugin for developing a website or a web application, you may use this command instead:

```bash
workman make:matisse-module
```

Workman will install the required packages and generate a ready to use scaffold with base templates, routing, navigation and module configuration.

### Installing/removing plugins, templates and Composer packages

#### Installing packages

Type:

```bash
workman install
```

Follow the interactive instructions. You may also call the command with additional arguments for installing packages non-interactively.

**Do not use `composer require` for installing packages.** Instead, you should run `workman install` and select the kind of package you whish to install (a plugin, a template or a standalone, non-electro Composer package). The last option is the equivalent of running a `composer require` command for an arbitrary package, but it registers it on a specific module of your application (chosen by you) and then rebuilds the root `composer.json` before running Composer to perform that actual installation.

#### Uninstalling packages

Type:

```bash
workman uninstall
```
or
```bash
workman remove
```

Follow the interactive instructions. You may also call the command with additional arguments for uninstalling packages non-interactively.

### A short introduction to private modules

Private modules have their own `composer.json` and behave the same way as packages, but they are an integrant part of your application. As such, they are committed to your project's VCS repository directly and not installed from external sources, unlike other package types which are published on Packagist (or other private sources) and installable by Composer.

As private modules are not true Composer packages, to make their `composer.json` configurations available to Composer, the framework must manage the project's root `composer.json` file itself, so that, at any time, that file reflects the configurations inherited from all private modules.

This means the root `composer.json` is automatically generated from `workman` commands that install or remove packages. Therefore, **you should not directly modify the `composer.json` at the root directory of your project**. If you do, you will loose your changes whenever it is automatically rebuilt.

To install or remove plugins, templates and other Composer packages, you should use the relevant `workman` commands (see above).

#### How private modules are integrated with Composer

To make Composer aware of the project's private modules' configuration and dependencies, the root `composer.json`'s content is generated by merging the `composer.root.json` template file with each of the application's private modules `composer.json`.

You might be tempted to register dependencies on the `composer.root.json` file, but we also advise against that. We recommend that, instead, you always register dependencies on the modules that require them. That way, your application will be more modular and the `workman install/remove` commands will work as intedend.

#### Using Composer directly

If you whish to install/remove packages without using the respective `workman` commands, you can modify your application's private modules' `composer.json` files directly, but you still need to rebuild the project's main `composer.json` by issuing:

```bash
workman composer:update
```

This will also run `composer update` automatically, after updating the json file.

## Contributing

Electro is an open source, community-driven project. We welcome your contribution, either by submitting [pull-requests](https://github.com/electro-framework/electro/pulls) or by reporting issues on the [issue tracker](https://github.com/electro-framework/electro/issues).

We don't have a formal contribution guide **at this time**.

Meanwhile, all contributions to the project, when accepted, will automatically transfer copyright to the project's copyright holders mentioned below (if not explicitly, it will be implicit) and they will be published under the same license as the project's license (see licensing details below).

If you are not confortable with these terms, please do not contribute. If you contribute, you are accepting these terms.

## Security Vulnerabilities

If you have found a security vulnerability, please contact the main developer directly at claudio.silva@impactwave.com.
All security vulnerabilities will be promptly addressed.

## License

The Electro framework is open-source software licensed under the [MIT license](http://opensource.org/licenses/MIT).

**Electro framework** - Copyright &copy; Cláudio Silva and Impactwave, Lda.
