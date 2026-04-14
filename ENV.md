# Environment Variables

This application reads database credentials from environment variables at runtime.
Set these variables in your deployment platform (e.g. Render) or in your local shell for development.

## Required Variables

| Variable  | Description                              | Example                        |
|-----------|------------------------------------------|--------------------------------|
| `DB_HOST`  | MySQL server hostname                   | `ballast.proxy.rlwy.net`       |
| `DB_PORT`  | MySQL server port                       | `30799`                        |
| `DB_USER`  | MySQL username                          | `root`                         |
| `DB_PASS`  | MySQL password                          | `your_password`                |
| `DB_NAME`  | MySQL database name                     | `railway`                      |

## Local Development Defaults

If no environment variables are set, the application falls back to these defaults:

| Variable  | Default value |
|-----------|---------------|
| `DB_HOST`  | `localhost`   |
| `DB_PORT`  | `3306`        |
| `DB_USER`  | `root`        |
| `DB_PASS`  | *(empty)*     |
| `DB_NAME`  | `travel`      |

## Setting Variables on Render

1. Open your Render service dashboard.
2. Go to **Environment** → **Environment Variables**.
3. Add each variable from the table above with the values from your Railway MySQL service.

### Finding Railway connection details

In Railway → your project → **MySQL** service → **Connect** tab → look for the **Public** connection variables:

- `MYSQL_HOST` → use as `DB_HOST`
- `MYSQL_PORT` → use as `DB_PORT`
- `MYSQL_USER` → use as `DB_USER`
- `MYSQL_PASSWORD` → use as `DB_PASS`
- `MYSQLATABASE` (or `MYSQL_DATABASE`) → use as `DB_NAME` (usually `railway`)

## Setting Variables for Local Development

You can export them in your shell before starting PHP:

```bash
export DB_HOST=localhost
export DB_PORT=3306
export DB_USER=root
export DB_PASS=yourpassword
export DB_NAME=travel
```

Or create a `.env` file and source it (note: the app reads native environment variables, not a `.env` file directly):

```bash
source .env
```
