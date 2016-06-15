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

> You can check your current path by typing:

>        echo $PATH

#### Install the project

On the parent folder where the project folder will be created, issue the `composer create-project` command on your terminal.

For example, this will install a working Electro prototype project into the `your-project-name` folder:


```bash
cd parent-folder
composer create-project -s dev electro/electro your-project-name
```

Upon completing the installation, Composer may ask you:

```
Do you want to remove the existing VCS (.git, .svn..) history? [Y,n]?
```

You should type `y` to remove the Git history. You may then create your own VCS repository to hold your project.

For example, to create an empty Git repository, type:

```bash
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

Besides using the Composer commands to install/uninstall/update PHP packages and Electro plugins, you can also use the Electro CLI (Command-Line Interface).

Type:

```bash
workman
```

You'll get a list of available commands.
Refer to the framework documentation for an explanation of each available command.

## Contributing

Electro is an open source, community-driven project. We welcome your contribution, either by submitting [pull-requests](https://github.com/electro-framework/electro/pulls) or by reporting issues on the [issue tracker](https://github.com/electro-framework/electro/issues).

We don't have a formal contribution guide at this time. We're working on that.

## Security Vulnerabilities

If you have found a security vulnerability, please contact the main developer directly at claudio.silva@impactwave.com.
All security vulnerabilities will be promptly addressed.

## License

The Electro framework is open-source software licensed under the [MIT license](http://opensource.org/licenses/MIT).

**Electro framework** - Copyright &copy; Cláudio Silva and Impactwave, Lda.
