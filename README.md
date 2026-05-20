# Vehicle Stories

A PHP-based web application that allows users to browse, filter, and view detailed listings for vehicles. The platform includes user authentication, account management, a media gallery, a news system, and an admin panel — built on a MySQL + XAMPP stack.

---

## Features

- **Vehicle Listings** — Browse vehicles with a filterable search (by make, model, year, etc.)
- **Vehicle Details Page** — Full detail view per vehicle with a Ninja Slider image gallery
- **User Accounts** — Register, log in, activate via email, recover passwords, and manage your profile
- **Admin Panel** — Manage vehicles, users, and site content from a dedicated admin area
- **News System** — Date-triggered news popups displayed to visitors on the homepage
- **Gallery Page** — Dedicated media gallery for vehicle images
- **Cookie Consent** — GDPR-style cookie preference banner with session-based persistence
- **Contact Page** — Contact form with email delivery via configurable credentials
- **RODO / Rules Pages** — Legal/policy pages (RODO = Polish data protection regulation)
- **Responsive Design** — Separate mobile stylesheet for phone-friendly layouts
- **Custom 404 Page** — Graceful error handling for missing routes
- **`.htaccess` Routing** — Clean URL handling via Apache rewrite rules

---

## Tech Stack

| Layer        | Technology                                  |
|--------------|---------------------------------------------|
| Backend      | PHP                                         |
| Database     | MySQL                                       |
| Frontend     | HTML, CSS, JavaScript (jQuery, Swiper.js)   |
| Image Slider | Ninja Slider (thumbnail + main slider)      |
| Icons        | FontAwesome                                 |
| Fonts        | Google Fonts (Roboto)                       |
| Date Helpers | Moment.js, jQuery Year Picker               |
| Server       | Apache (XAMPP / WAMP)                       |

---

## Requirements

- XAMPP (or any Apache + PHP server)
- MySQL database

---

## Setup

1. **Clone the repository** into your web server's root directory (e.g. `htdocs`):
   ```bash
   git clone https://github.com/krispymango/vehicle-stories.git
   ```

2. **Import the database** — upload `vehicle_stories.sql` into your MySQL instance via phpMyAdmin or the CLI:
   ```bash
   mysql -u root -p vehicle_stories < vehicle_stories.sql
   ```

3. **Set the base URL** — open `path.php` and set your `BASE_URL` to match your local or live domain:
   ```php
   define('BASE_URL', 'http://localhost/vehicle-stories');
   ```

4. **Configure the database connection** — edit the connection file at:
   ```
   app/database/connection/conn.php
   ```
   Replace the host, username, password, and database name with your own MySQL credentials.

5. **Configure email credentials** — fill in the SMTP/email details used for account activation and password recovery at:
   ```
   controllers/credential.php
   ```

6. **Visit the app** in your browser:
   ```
   http://localhost/vehicle-stories/
   ```

---

## Project Structure

```
vehicle-stories/
├── activation/                  # Email activation flow
├── admin/                       # Admin panel pages and logic
├── app/
│   ├── database/
│   │   ├── connection/
│   │   │   └── conn.php         # DB connection credentials
│   │   └── db/
│   │       └── db.php           # DB initialization
│   ├── helpers/
│   │   └── api/
│   │       └── properties.json  # App config flags (cookie, news toggles)
│   └── includes/                # Reusable PHP template partials
│       ├── menuBarContent.php
│       ├── headerContent.php
│       ├── mobileHeaderContent.php
│       ├── footerContent.php
│       ├── sliderCarouselContent.php
│       ├── filterBoxContent.php
│       ├── filteredVehiclesContent.php
│       └── vehicleDetailsContent.php
├── assets/
│   ├── css/                     # Stylesheets (desktop, mobile, gallery, carousel)
│   ├── js/                      # JavaScript files (jQuery, form.js, etc.)
│   ├── img/                     # Images and media
│   └── 3/                       # Ninja Slider assets
├── controllers/
│   ├── credential.php           # Email credentials
│   └── UserActivity.php         # Session/user activity tracking
├── user/                        # User-facing account pages/logic
├── index.php                    # Homepage
├── vehicle_details.php          # Individual vehicle detail page
├── account.php                  # User account page
├── account_recovery.php         # Password recovery
├── profile.php                  # User profile
├── gallery.php                  # Photo gallery
├── news.php                     # News listing
├── about.php                    # About page
├── contact.php                  # Contact form
├── cookie_consent.php           # Cookie policy
├── rodo.php                     # Data protection (RODO)
├── rules.php                    # Site rules
├── logout.php                   # Session logout
├── 404.php                      # Custom error page
├── path.php                     # ROOT_PATH and BASE_URL definitions
├── .htaccess                    # Apache URL rewriting
└── vehicle_stories.sql          # MySQL database dump
```

---

## How It Works

- `path.php` defines `ROOT_PATH` and `BASE_URL` constants used throughout the app for includes and asset URLs.
- `app/database/db/db.php` establishes the MySQL connection using credentials from `conn.php`.
- All pages follow a consistent pattern: include `path.php`, connect to the DB, include reusable partials from `app/includes/`.
- `properties.json` stores feature toggle values (e.g. whether to show the cookie banner or news popup) read by `index.php` at runtime.
- The `controllers/UserActivity.php` tracks session state and user activity across page loads.
- Email-based flows (account activation, password recovery) rely on credentials set in `controllers/credential.php`.

---

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you'd like to change.

---

## License

No license is currently specified. All rights reserved by the author unless otherwise noted.
