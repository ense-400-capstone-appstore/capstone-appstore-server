# Capstone Appstore Server

> Laravel backend for Capstone Appstore

This server application hosts both the API and the administrator panel for the Capstone Appstore Project.

## Installing / Getting started

Follow the steps below to install the application for local development:

```shell
# Install php7.2, php7.2-sqlite3, php7.2-gd, nodejs using your OS package manager

# Install composer from https://getcomposer.org/

# Clone this repository to your device
git clone git@github.com:ense-400-capstone-appstore/capstone-appstore-server.git
cd capstone-appstore-server

# Install PHP dependencies
composer install

# Run the application's installation script for development
php artisan app:install

# OR

# Run the application's installation script for production
php artisan app:build

# For development, copy the `.env.development` file to a file called `.env`
# For production, copy the `.env.production` file to a file called `.env`
cp .env.development .env

# Edit `.env` to suit your environment.
# For development, you will mostly want to change the `DB_DATABASE` variable
# to point to the absolute path of your local sqlite3 `database.sqlite` file.
#
# The result should be similar to the following:
#   DB_DATABASE=/home/USERNAME/capstone-appstore-server/database/database.sqlite
```

See `app/Console/Commands/AppInstall.php` for detailed information on what the local installation script does.

## Developing

### Built With

-   [Laravel](https://laravel.com/) - PHP Web Framework

### Prerequisites

**TODO:** Add information on dependencies.

### Building

**TODO:** Add instructions for building the application for production.

### Deploying / Publishing

**TODO:** Add instructions for deploying the application.

## Versioning

We can maybe use [SemVer](http://semver.org/) for versioning.

For the versions available, see [releases](./releases).

## Tests

**TODO:** Describe how to run tests.

## Style guide

**TODO:** Add style guide.

## API Reference

**TODO:** Add link to API Reference.
