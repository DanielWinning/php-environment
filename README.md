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

To start your services, move into the `docker` directory and run the command to build your container:

```
docker-compose up -p project-name --build -d
```

This builds and runs a new Docker container, using the `-p` flag to pass in a name for your container (`project-name`). 
The `--build` command forces Docker to build the images (services) before starting the container, while the `-d` flag
makes your container run in the background (*detached mode*).

Your project should now be available at `http://localhost`.

To stop your server, use the stop command and pass the project name:

```
docker-compose stop -p project-name
```

To restart an already built container, use the up command without `--build`:

```
docker-compose up -p project-name -d
```

## Limitations

Currently, in addition to needing to update the `docker/.env` file with the path to your project, each project will use
the same ports - this means that you won't be able to run two environments at once *unless* you update the ports set in
`docker/docker-compose.yaml`, `docker/nginx/Dockerfile`, `docker/nginx/conf.d/default.conf` which is obviously less than 
ideal. 

The simplest solution currently is to ensure that only 1 container is running at a time. Commands will be added in a
future release to help make this process easier.