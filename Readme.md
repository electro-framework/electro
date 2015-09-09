# Selenia Framework

> Selenia is a web framework for the rapid development of web applications and websites using the PHP language.

**This repository provides a standard installation of the framework. Use it as a starting point for developing a project based on Selenia.**

## Installation

#### Runtime requirements

- PHP >= 5.4 < 7.0
- Composer
- PHP Extensions:
  - PDO
  - CURL
  - Mcrypt
  - GD2

#### Install Composer

Selenia utilises [Composer](http://getcomposer.org) to manage its dependencies. So, before using Selenia, you will need to make sure you have Composer installed on your machine.

#### Install the project

On the parent folder where the project folder will be created, issue the `composer create-project` command on your terminal.

For example, this will install a working Selenia prototype project into the `your-project-name` folder:


```shell
cd parent-folder
composer create-project -s dev selenia/selenia your-project-name
```

Upon completing the installation, Composer will ask you:

```
Do you want to remove the existing VCS (.git, .svn..) history? [Y,n]?
```

You should type `y` to remove the Git history. You may then create your own VCS repository to hold your project.

For example, to create an empty Git repository, type:

```shell
git init
```

#### Follow the Configuration Wizard

At the end of the installation procedure, the Configuration Wizard automatically runs to perform the final installation steps.

The Wizard scaffolds some of the application's directory structure and then it proceeds to setting up the application's configuration.

Answer the Wizard's questions to customize the application to your needs.

#### Check if it's working

After installation, the project should be ready to run.

> You'll need a local Apache web server to run it.

Open the localhost URL corresponding to the project's folder on your browser.

You should see a welcome page.

#### Developing

Besides using the Composer commands to install/uninstall/update PHP packages and Selenia plugins, you can also use the Selenia CLI (Command-Line Interface).

Type:

```shell
selenia
```

You'll get a list of available commands.
Refer to the framework documentation for an explanation of each available command.

## Contributing

Selenia is an open source, community-driven project. We welcome your contribution, either by submitting [pull-requests](https://github.com/selenia-framework/selenia/pulls) or by reporting issues on the [issue tracker](https://github.com/selenia-framework/selenia/issues).

We don't have a formal contribution guide at this time. We're working on that.

## Security Vulnerabilities

If you have found a security vulnerability, please contact the main developer directly at claudio.silva@impactwave.com.
All security vulnerabilities will be promptly addressed.

## License

The Selenia framework is open-source software licensed under the [MIT license](http://opensource.org/licenses/MIT).

**Selenia framework** - Copyright &copy; 2015 Impactwave, Lda.
