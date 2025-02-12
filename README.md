# Asylum-loot

[Asylum](https://github.com/HelsinkiHacklab/asylum) is the membership
management solution for [Helsinki Hacklab](https://helsinki.hacklab.fi/).
This tool extracts member data from Asylum to SQLite to ease
cross-tabulation and other housekeeping tasks.

## Requirements

Way to steal cookies from a browser. For firefox, install
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

Asylum data:

1. Steal cookies from your browser and place them to `cookies.txt`
in this directory. Use a browser add-on instructed above.
2. Run `./asylum-to-sqlite`
3. Run `sqlite3 members.sqlite3` and enjoy!

Slack users:

1. Download user CSV from Slack admin panel
2. Run: `./slack-to-sqlite <slack-helsinkihacklab-members.csv`

## Useful queries

Get user name, email and nicks on both Asylum and Slack:

```sqlite
SELECT m.name, m.email, m.nick, s.username FROM member m LEFT JOIN slack s ON s.email=m.email;
```
