# PHP Development Environment

A ready to use development environment for PHP.

## Includes

- PHP 8.1
- Nginx
- MySQL

## Pre-requisites

This environment requires the following to be installed:

- Docker Desktop
- PHP
- Composer

## Installation

To download this development environment, use Composer:

```
composer create-project danielwinning/php-environment project-name
```

Then run initial setup:

```
cd project-name && composer install
```

## Running a local project

### Point to your project directory

Now you've got the environment downloaded, you'll need to edit `/docker/.env`. You can either
open this up in your IDE/text editor or use something like nano to speed things up:

```
nano docker/.env
```

Replace the commented out code with the path to your project. So, the path might look something like this:

```
# Windows
PROJECTDIR=/c/Development/project-name

# MacOS
PROJECTDIR=/Users/danny/Development/project-name
```

By default, this environment is set to use the root of your project as your document root. To change this,
(to something like `project-name/public`) update the `root` value inside `/docker/nginx/conf.d/default.conf`:

```
server {
    ...
    root /var/www/html/public
    ...
}
```

### Building your environment

-- Work in progress --