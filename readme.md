# Visitor Tracking Package for Laravel

The `0vinod/visitor-tracking` package provides an easy way to track and analyze visitor activity in Laravel applications.

<img width="718" height="2560" alt="Screenshot" src="https://github.com/user-attachments/assets/02faecdd-b299-4d48-bd37-24b65afcdcbd" />


## Features

- Total visitors
- Unique visitors
- Top visited pages
- Country tracking
- Operating system detection
- Device tracking
- Dashboard analytics widgets
- Blade components support

---

## Installation

Install the package via Composer:

```bash
composer require 0vinod/visitor-tracking
```

---

## Publish Assets (Optional)

```bash
php artisan vendor:publish --provider="Vinod\VisitorTracking\VisitorTrackingServiceProvider"
```

---

## Run Migrations

```bash
php artisan migrate
```

---

## Usage

### Visitor Counter Component

Display visitor counter anywhere on your website:

```blade
<x-visitor::visit-counter startCount="10000" />
```

or

```blade
<x-visitor::visit-counter />
```

---

## Dashboard Widgets

### Country Analytics Widget

```blade
<x-visitor::country-widget />
```

### Visitor Settings Widget

```blade
<x-visitor::visitor-setting />
```

---

## Features Included

- Live visitor counting
- Country analytics
- Browser tracking
- Device tracking
- Dashboard widgets
- Configurable visitor counter
- Middleware-based tracking

---

## Requirements

- PHP 8+
- Laravel 9 / 10 / 11

---

## License

MIT License