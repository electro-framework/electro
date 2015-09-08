# Selene Framework 

> Selene is a web framework for the rapid development of web applications and websites using the PHP language.

**This repository provides a standard installation of the framework. Use it as a starting point for developing a project based on Selene.**

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

Selene utilises [Composer](http://getcomposer.org) to manage its dependencies. So, before using Selene, you will need to make sure you have Composer installed on your machine.

#### Install the project

On the parent folder where the project folder will be created, issue the `composer create-project` command on your terminal.

For example, this will install a working Selene prototype project into the `your-project-name` folder:


```shell
cd parent-folder
composer create-project -s dev selene-framework/selene your-project-name
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

#### Check if it's working

After installation, the project should be ready to run.

> You'll need a local Apache web server to run it.

Open the localhost URL corresponding to the project's folder on your browser.

You should see a welcome page.

#### Developing

Besides using the Composer commands to install/uninstall/update PHP packages and Selene plugins, you can also use the Selene Task Runner. Type:

```shell
selene
```

You'll get a list of available commands.  
Refer to the framework documentation for an explanation of each available command.

## Security Vulnerabilities

If you discover a security vulnerability, please contact the main developer directly at claudio.silva@impactwave.com. All security vulnerabilities will be promptly addressed.

## License

The Selene Framework is open-source software licensed under the [MIT license](http://opensource.org/licenses/MIT).

**Selene Framework** - Copyright &copy; Impactwave, Lda.
