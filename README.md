![Matryoshka Logo](./public/images/brand/256h/Logo_x256.png)

# Matryoshka Server &middot; [![CircleCI](https://circleci.com/gh/matryoshkadoll/matryoshka-server.svg?style=svg)](https://circleci.com/gh/matryoshkadoll/matryoshka-server) [![Maintainability](https://api.codeclimate.com/v1/badges/017b845d676b8e20e28f/maintainability)](https://codeclimate.com/github/matryoshkadoll/matryoshka-server/maintainability) [![Test Coverage](https://api.codeclimate.com/v1/badges/017b845d676b8e20e28f/test_coverage)](https://codeclimate.com/github/matryoshkadoll/matryoshka-server/test_coverage)

> Laravel backend powering the Matryoshka website and API

This server application hosts both the API and the administrator panel for the Matryoshka Project.

## Installing / Getting started

> **NOTE:** Some dependencies have Operating System-specific installation instructions that are difficult to collate in this document. Please refer to the official documentation when possible for the latest official instructions for your OS.

Follow the steps below to install the application for local development:

```shell
# Please see the Laravel documentation for the latest requirements
# https://laravel.com/docs/installation

# Install PHP 7 from http://www.php.net/

# Enable or install the following PHP extensions:
# GD2, OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON, BCMath, ZIP

# Install composer from https://getcomposer.org/

# Install Node.js from https://nodejs.org/en/

# Install MySQL from https://www.mysql.com/

# Clone this repository to your device
git clone git@github.com:matryoshkadoll/matryoshka-server.git
cd matryoshka-server

# Install dependencies
composer install # for development
composer install --optimize-autoloader --no-dev # for production

# Copy one of our environment files to a new file called `.env`
# For development, copy the `.env.development` file
# For production, copy the `.env.production` file
cp .env.development .env

# Edit `.env` to suit your environment. For example, set the database credentials.

# Run the application's installation script
php artisan app:install --clean-install # Run with '-h' option for other options

# And done! You're good to go!

# Start your local server at 127.0.0.1:8000
php artisan serve
```

See `app/Console/Commands/Install.php` for detailed information on what the local installation script does.

## Developing

### Built With

-   [Laravel](https://laravel.com/) - PHP Web Framework

### Deploying / Publishing

See the deployment section in our docs:

https://docs.matryoshkadoll.me/docs/en/server/getting_started

## Versioning

This application uses [SemVer](http://semver.org/) for versioning.

For the versions available, see [releases](/releases).

## Tests

This application uses [PHPUnit](https://phpunit.de/) to run tests.

```shell
# To run all application tests, simply run:
phpunit
```

A test coverage report in HTML format is generated in the `phpunit` directory after running tests.

## Style guide

This application's code style strives to follow the [PSR-2](https://www.php-fig.org/psr/psr-2/) style guide and is enforced with an `.editorconfig` file.

## API Reference

See the API section in our docs:

https://docs.matryoshkadoll.me/docs/en/server/getting_started
