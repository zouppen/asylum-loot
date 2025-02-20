# Asylum-loot

[Asylum](https://github.com/HelsinkiHacklab/asylum) is the membership
management solution for [Helsinki Hacklab](https://helsinki.hacklab.fi/).
This tool extracts member data from Asylum to SQLite to ease
cross-tabulation and other housekeeping tasks.

This uses scraping to read data from Django since Asylum member API
pagination is broken and misses members and gives out duplicates. API
variant is in the `api` branch.

## Requirements

Way to steal cookies from a browser. For Firefox, install
[cookies.txt Firefox add-on](https://addons.mozilla.org/fi/firefox/addon/cookies-txt).

### Fedora

```sh
sudo dnf install php-cli php-pdo php-xml
```

### Debian

```sh
sudo apt install php-cli php-sqlite3 php-xml
```

## Usage

Run Slack first, then Asylum, to get Slack IDs to match
with members.

Slack users:

1. Download user CSV from Slack admin panel
2. Run: `./slack-to-sqlite <slack-helsinkihacklab-members.csv`

Asylum data:

1. Steal cookies from your browser and place them to `cookies.txt`
in this directory. Use a browser add-on instructed above.
2. Run `./asylum-to-sqlite`

The scripts populate an SQLite database. Run `sqlite3 members.sqlite3`
and enjoy! In case you want to start over, you may just re-run the
scripts.

## Useful queries

Get user name, email and nicks on both Asylum and Slack:

```sqlite
SELECT m.name, m.email, m.nick, s.username FROM member m LEFT JOIN slack s ON s.email_norm=m.email_norm WHERE status !='Deactivated';
```

Get list of Slack usernames which don't match membership registry:

```sqlite
SELECT username FROM slack s LEFT JOIN member m ON m.email_norm=s.email_norm WHERE status NOT IN('Deactivated','Bot') AND m.email IS NOT NULL;
```
