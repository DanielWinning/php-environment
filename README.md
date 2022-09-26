A basic PHP Docker environment; Nginx, PHP 8.1, MySQL

### Installation

You will need Docker and Composer installed on your machine. To create
a new project using this setup, run:

```
composer create-project danielwinning/php-environment project-name
cd project-name
```

### How to run

This setup is configured to work straight out of the box, to start the
services run:

```
cd docker
docker-compose up --build -d
```

This will start up your services, you'll be able to access `src/index.php`
now in your browser by visiting `http://localhost`.

To stop your containers, use the command:

```
docker-compose stop
```

You can stop and remove your containers by using:

```
docker-compose down
```

#### Configuring

To change your document root to something like 'public', update the value
in 'docker/nginx/conf.d/default.conf' on line 4: `root /var/www/html/public`

Then in your projects `src` directory, create a new 'public' directory containing
an `index.php` file to test that it's working.

By default the Docker Compose command above will start up a new container
group called 'docker' - if you want to use a different name, use the following
command:

```
# Start
docker-compose -p project-name up --build -d
# Stop
docker-compose -p project-name stop
docker-compose -p project-name down
```