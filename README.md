# Interchange
A simple Q&A site built with Laravel and Bootstrap. Followed the practice of test driven development. Work in progress.

# Getting Started
## Installation
Install dependencies

```
composer install
```

Run database migrations and seeding

```
php artisan migrate
php artisan db:seed
```

Create .env and generate application key

```
cp .env.example .env
php artisan key:generate
```

Create .env.testing

```
cp .env .env.testing
```
Edit .env.testing to have a different database than the one in .env

Start local development server

```
php artisan serve
```

## Running Tests
Run all tests

```
./vendor/bin/phpunit
```

Run a specific test e.g. RegisterTest

```
./vendor/bin/phpunit --filter RegisterTest
```
