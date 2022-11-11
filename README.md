# PHP Development Environment

A ready to use development environment for PHP.

## Includes

- PHP 8.1
- Nginx
- MySQL
- RabbitMQ

## Pre-requisites

This environment requires the following to be installed:

- Docker Desktop
- PHP
- Composer

## Installation & Setup

First of all, ensure you have Docker Desktop installed and running.

To download this development environment, use Composer:

```
composer global require danielwinning/php-environment
```

Make a note of the path to your global composer vendor directory which will be displayed
when installing the package.

Add 'danielwinning/php-environment/docker' in the aforementioned vendor directory to your
systems path. On Windows, hit the Windows key and search for "environment variables".

> **Mac Users**:
> Add the path to the docker directory to your path by running the command: `sudo nano /etc/paths'
>
> You may need to make the environment up script executable by navigating to the docker directory and
> running `chmod +x envup`

## Running Your Code

Create a new project, which includes a `public` directory and an `index.php` file.

Open a new terminal and run the command:

```
envup --name=project_name --path=/path/to/project
```

This command expects an absolute path, like the examples below:

```
envup --name=windows_project --path=C:/Users/Danny/Development/windows_project
envup --name=mac_project --path=/Users/danny/Development/mac_project
```