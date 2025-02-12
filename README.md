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

Steps:

1. Steal cookies from your browser and place them to `cookies.txt`
in this directory. Use a browser add-on instructed above.
2. Run `./asylum-to-sqlite`
3. File `database members.sqlite3` is populated. Examine it with `sqlite3` or other tools.


