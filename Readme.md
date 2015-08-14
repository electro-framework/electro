# Selene Framework Starter Project

> Selene is a web framework for the rapid development of web applications and websites using the PHP language.

**This repository contains the scaffolding files and folders that should be used as a foundation for building projects based on Selene..**

Use it to bootstrap your application development by starting from a working prototype that you can easily modify and extend to meet your needs.

## Installation

#### Runtime requirements

-  PHP >= 5.4
-  Composer

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

You should type `y` to remove the Git history.

#### Check if it's working

After installation, the project should be ready to run.

> You'll need a local Apache web server to run it.

Open the localhost URL corresponding to the project's folder on your browser.

You should see a welcome page.

#### Developing

To install/uninstall/update PHP packages or reconfigure the PHP class autoloader, type:

```shell
composer update
```

## License

The Selene Framework is open-source software licensed under the [MIT license](http://opensource.org/licenses/MIT).

**Selene Framework** - Copyright &copy; Impactwave, Lda.
