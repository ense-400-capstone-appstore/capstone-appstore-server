# Matryoshka Server

> Laravel backend powering the Matryoshka website and API

![Matryoshka Logo](./public/images/brand/256h/Logo_x256.png)

[![Maintainability](https://api.codeclimate.com/v1/badges/017b845d676b8e20e28f/maintainability)](https://codeclimate.com/github/matryoshkadoll/matryoshka-server/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/017b845d676b8e20e28f/test_coverage)](https://codeclimate.com/github/matryoshkadoll/matryoshka-server/test_coverage)
[![CircleCI](https://circleci.com/gh/matryoshkadoll/matryoshka-server.svg?style=svg)](https://circleci.com/gh/matryoshkadoll/matryoshka-server)

This server application hosts both the API and the administrator panel for the Matryoshka Project.

## Installing / Getting started

Follow the steps below to install the application for local development:

```shell
# Install the following using your OS package manager:
#   - php7.2
#   - php7.2-sqlite3
#   - php7.2-gd
#   - php7.2-mbstring
#   - php7.2-xml
#   - php7.2-zip
#   - nodejs

# Install composer from https://getcomposer.org/

# Clone this repository to your device
git clone git@github.com:matryoshkadoll/matryoshka-server.git
cd matryoshka-doll

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
#   DB_DATABASE=/home/USERNAME/matryoshka-server/database/database.sqlite

# For database visualization, it may be helpful to install one of several
# graphical clients such as "sqliteman or "DBeaver"

# Install sqliteman on RHEL-based linux
sudo yum install sqliteman

# or download DBeaver: https://dbeaver.io/download/
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
