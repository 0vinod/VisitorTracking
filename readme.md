# Visitor Tracking Package for Laravel

The `vinod/visitor-tracking` package provides an easy way to track and analyze visitor activity in Laravel applications.

Features include:

* Total visitors
* Unique visitors
* Top visited pages
* Country tracking
* Operating system detection
* Device tracking
* Dashboard analytics widgets

---

# Installation

## Step 1: Add Repository Paths

Add the following inside your application's `composer.json` file:

```json
"repositories": [
    {
        "type": "composer",
        "url": "http://packages.captcha.com"
    },
    {
        "type": "path",
        "url": "packages/Omninet/VisitorTracking",
        "options": {
            "symlink": true
        }
    }
]
```

---

## Step 2: Install Package

Run the following command:

```bash
composer require omninet/visitor-tracking
```

---

# Usage

## Visitor Counter Component

Display the visitor counter anywhere on your website:

```blade
<x-visitor::visit-counter startCount="10000" />
```

or

```blade
<x-visitor::visit-counter />
```

---

# Admin Dashboard Components

## Country Analytics Widget

```blade
<x-visitor::country-widget />
```

---

## Visitor Settings Component

```blade
<x-visitor::visitor-setting />
```

---

# Features

* Live visitor counting
* Country analytics
* Device analytics
* Browser tracking
* Admin dashboard widgets
* Configurable visitor counter
* Laravel Blade components support

---

# Requirements

* PHP 8+
* Laravel 9 / 10 / 11

---

# License

MIT License
