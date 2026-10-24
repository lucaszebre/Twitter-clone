# Twitter Clone

A Twitter-style social network written in plain PHP (no framework) with MySQL and jQuery/AJAX. School project, 2024.

## What it does

- Register, log in, log out (PHP sessions)
- Post tweets with an optional image, reply, retweet, like
- Follow / unfollow users; follower and following lists
- Hashtags and a search page (users and tweets) with autocompletion
- Direct messages (one-to-one and group conversations)
- Profile page with editable name, bio, avatar and banner
- Delete account

## Stack

- PHP 8.x with `pdo_mysql`, organised as models / controllers / views under `src/`
- MySQL 8.0+ (schema in `globe.sql`; it uses `utf8mb4_0900_ai_ci`, which MariaDB rejects on import)
- Front end: jQuery 3.7 + jQuery Validate (CDN), Tailwind Play CDN, Font Awesome (CDN). No build step.

## Run locally

Requirements: PHP 8.x with the `pdo_mysql` extension, a MySQL 8 server.

1. Create the database and import the schema (the dump does not create the database itself):

   ```sh
   mysql -u root -p -e "CREATE DATABASE twitter CHARACTER SET utf8mb4;"
   mysql -u root -p twitter < globe.sql
   ```

2. Configure the connection. Copy `.env.example` to `.env` and fill in `DB_HOST`, `DB_PORT`, `DB_NAME`, `DB_USER`, `DB_PASSWORD`. There is no dotenv loader, so export the variables into the shell before starting PHP. If none are set, `config/dbh.classes.php` falls back to its original local defaults.

3. Start the built-in server **from the repository root** (uploads are written to `<document root>/images/`, so the doc root must be the repo and `images/` must be writable):

   ```sh
   set -a; . ./.env; set +a
   php -d output_buffering=4096 -S localhost:8000
   ```

   The `-d output_buffering=4096` flag matters: the pages print HTML before calling `session_start()` / `header()`, which only works with output buffering on (Apache/XAMPP enable it by default; the built-in server does not).

4. Open <http://localhost:8000>, register an account and log in. The seed users in `globe.sql` cannot be used to log in (their password fields are placeholders).

### With Docker

The official `php:*-cli` image ships without `pdo_mysql`, so build a small image first. The two containers share a Docker network:

```sh
docker network create tcnet
docker run --rm -d --name tc-db --network tcnet \
  -e MYSQL_ROOT_PASSWORD=root -e MYSQL_DATABASE=twitter mysql:8
until docker exec tc-db mysqladmin -h127.0.0.1 -uroot -proot ping --silent 2>/dev/null; do sleep 2; done
docker exec -i tc-db mysql -uroot -proot twitter < globe.sql

printf 'FROM php:8.3-cli\nRUN docker-php-ext-install pdo_mysql\n' | docker build -t twitter-clone-php -
docker run --rm -it --name tc-web --network tcnet -v "$PWD":/app -w /app -p 8000:8000 \
  -e DB_HOST=tc-db -e DB_USER=root -e DB_PASSWORD=root -e DB_NAME=twitter \
  twitter-clone-php php -d output_buffering=4096 -S 0.0.0.0:8000
```

## Status

Built in early 2024 as a school project; not actively maintained. Known limitations: passwords are hashed with unsalted RIPEMD-160 (not `password_hash`), the Tailwind Play CDN is a development-only build, and pages emit "undefined array key" warnings on PHP 8 when visited logged out.
