# Environment Variables

TravelVista reads its database connection details from environment variables.
Set these in your hosting provider's dashboard (e.g. Render → Environment).

## Required Variables

| Variable  | Description                          | Example value              |
|-----------|--------------------------------------|----------------------------|
| `DB_HOST` | MySQL hostname                        | `ballast.proxy.rlwy.net`   |
| `DB_PORT` | MySQL port (default `3306`)           | `30799`                    |
| `DB_USER` | MySQL username                        | `root`                     |
| `DB_PASS` | MySQL password                        | `<your password>`          |
| `DB_NAME` | Database / schema name               | `railway`                  |

## Local Development Defaults

If a variable is not set, `includes/config.php` falls back to:

```
DB_HOST = localhost
DB_PORT = 3306
DB_USER = root
DB_PASS = (empty)
DB_NAME = travel
```

## Railway MySQL Public URL

Railway exposes MySQL via a public proxy.  The host and port can be found in
**Railway → MySQL service → Variables**:

- `MYSQL_PUBLIC_URL`  e.g. `mysql://root:<password>@ballast.proxy.rlwy.net:30799/railway`

Break this into individual Render env vars:

```
DB_HOST = ballast.proxy.rlwy.net
DB_PORT = 30799        ← important: Railway uses a non-standard port
DB_USER = root
DB_PASS = <password from Railway>
DB_NAME = railway
```

> **Security note:** never commit database passwords to source control.
> Always set them as environment variables in your hosting dashboard.
