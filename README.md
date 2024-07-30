# Popular GitHub Repositories

A Laravel application to find and export to excel popular GitHub repositories.

## Requirements

- PHP 8.2
- Composer

## Setup

1. Clone the repository:

```bash
git clone https://github.com/ahmedateftefa17/popular-github-repositories.git
cd github-repo-finder
```

2. Copy `.env.example` to `.env` and update database credentials if necessary:

```bash
cp .env.example .env
```

3. Install PHP dependencies:

```bash
composer install
```

4. Generate application key:

```bash
php artisan key:generate
```

5. Serve the application

```bash
php artisan serve
```

6. Access the application:

    Visit http://127.0.0.1:8000 in your browser.


## Running Tests

To run tests, execute the following command:

```bash
vendor/bin/phpunit
```

## Exporting Data

To export the list of repositories to an Excel file, use the Export button on the web interface.
