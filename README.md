# Minimal Blog

A lightweight, open-source blogging platform built for personal use with Laravel 12 and Livewire 3.

[![Run Tests](https://github.com/minhajul/blog/actions/workflows/tests.yml/badge.svg)](https://github.com/minhajul/blog/actions/workflows/tests.yml)
[![PHPStan](https://github.com/minhajul/blog/actions/workflows/phpstan.yml/badge.svg)](https://github.com/minhajul/blog/actions/workflows/phpstan.yml)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)

## Features

- **Blog management** — Create, edit, publish, draft, and archive blog posts with a rich text editor
- **Newsletter** — Built-in subscriber management with email verification
- **Contact form** — Receive and manage contact messages from visitors
- **Projects showcase** — Display your projects on a dedicated page
- **Experiences** — Share your professional experiences
- **Dashboard** — Admin panel to manage all content, contacts, and subscribers
- **Authentication** — Full auth flow with login and registration

## Tech Stack

| Layer     | Technology                                             |
|-----------|--------------------------------------------------------|
| Backend   | PHP 8.4, Laravel 12                                   |
| Frontend  | Livewire 3, Volt, Alpine.js, Tailwind CSS 4, Flux UI  |
| Database  | MySQL                                                  |
| Testing   | Pest 4, PHPStan (Larastan)                             |
| Tooling   | Vite 7, Bun, Laravel Pint, Laravel Sail                |

## Prerequisites

- PHP 8.4+
- Composer
- Bun (or Node.js & npm)
- MySQL

## Getting Started

### 1. Clone the repository

```sh
git clone https://github.com/minhajul/blog.git
cd blog
```

### 2. Install dependencies

```sh
composer install
bun install
```

### 3. Configure the environment

```sh
cp .env.example .env
php artisan key:generate
```

Update `.env` with your database credentials:

```env
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### 4. Run migrations and seed data

```sh
php artisan migrate --seed
```

### 5. Build frontend assets

```sh
bun run build
```

### 6. Start the application

```sh
composer run dev
```

This starts the web server, queue worker, log viewer, and Vite dev server concurrently. The application will be accessible at `http://127.0.0.1:8000`.

Alternatively, run just the server:

```sh
php artisan serve
```

## Testing

Run the full test suite:

```sh
php artisan test
```

Run a specific test:

```sh
php artisan test --filter=HomeControllerTest
```

## Code Quality

**Linting** with Laravel Pint:

```sh
vendor/bin/pint
```

**Static analysis** with PHPStan (Larastan):

```sh
composer analyse
```

## Project Structure

```
app/
├── Console/         # Artisan commands
├── Enums/           # Application enums (BlogStatus)
├── Http/            # Controllers, requests, middleware
├── Livewire/        # Livewire components (pages & dashboard)
├── Mail/            # Mailable classes
├── Models/          # Eloquent models (Blog, Contact, Experience, Project, Subscriber, User)
└── Providers/       # Service providers
resources/views/
├── components/      # Reusable Blade components
├── dashboard/       # Admin dashboard views
├── frontend/        # Public-facing pages (about, projects, experiences)
├── livewire/        # Livewire component views
└── flux/            # Flux UI component overrides
tests/
├── Feature/         # Feature tests (controllers, auth, dashboard, models)
└── Unit/            # Unit tests
```

## Contributing

Contributions are welcome! Please read the [Code of Conduct](CODE_OF_CONDUCT.md) before contributing.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License — see the [LICENSE](LICENSE) file for details.

## Author

Made with ❤️ by [Minhajul](https://github.com/minhajul)
