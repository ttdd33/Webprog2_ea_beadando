# Net Pizzéria – Web-programozás II. Laravel beadandó

Szerver oldali webalkalmazás **Laravel 12** keretrendszerrel, a *Pizza* (3 táblás) adatbázis felhasználásával.
Kiinduló projekt: Portable-Laravel-12.25-with Auth (React starter kit), erre épül az AUTENTIKÁCIÓ fejezet megoldása.

**Készítették:**
- Harmatiné Pásztor Éva (JBDAQO) – GitHub: `harmatinepasztoreva`
- Deák Dávid (OPFHRV) – GitHub: `ttdd33`

## Munkamegosztás

| Feladatrész | Készítette |
|---|---|
| Alap projekt feltöltése (Portable-Laravel-12.25-with Auth) | Deák Dávid |
| Autentikáció (AUTENTIKÁCIÓ fejezet megoldása), szerepkörök (látogató / regisztrált látogató / admin), admin middleware, magyar belépési oldalak | Harmatiné Pásztor Éva |
| Reszponzív téma (Start Bootstrap – Modern Business), Dynamic layout design, menü, lábléc | Harmatiné Pásztor Éva |
| Főoldal, Kapcsolat menü (szerver oldali validáció, mentés), Üzenetek menü | Harmatiné Pásztor Éva |
| Migrációk, adatfájlok, Seederek, Eloquent modellek (kategoria, pizza, rendeles) | Deák Dávid |
| Adatbázis menü, Diagram menü (Chart.js), CRUD menü (pizza tábla) | Deák Dávid |
| Tárhelyre telepítés előkészítése (védett /run-migrations útvonal, .env.example) | Deák Dávid |
| README | Harmatiné Pásztor Éva |

### Feltöltések (commitok) sorrendje

| # | Ki | Commit |
|---|---|---|
| 1 | Deák Dávid | Alap projekt: Portable-Laravel-12.25-with Auth |
| 2 | Harmatiné Pásztor Éva | Autentikáció: szerepkörök, admin middleware, magyar belépési oldalak |
| 3 | Deák Dávid | Pizza adatbázis: migrációk és adatfájlok |
| 4 | Deák Dávid | Eloquent modellek kapcsolatokkal és seederek |
| 5 | Harmatiné Pásztor Éva | Reszponzív téma és Dynamic layout |
| 6 | Harmatiné Pásztor Éva | Főoldal |
| 7 | Deák Dávid | Adatbázis menü |
| 8 | Harmatiné Pásztor Éva | Kapcsolat menü |
| 9 | Deák Dávid | Diagram menü |
| 10 | Harmatiné Pásztor Éva | Üzenetek menü |
| 11 | Deák Dávid | CRUD menü |
| 12 | Deák Dávid | Tárhely előkészítése |
| 13 | Harmatiné Pásztor Éva | README |

Összesen: Deák Dávid 7 commit, Harmatiné Pásztor Éva 6 commit.

## Menük és jogosultságok

| Menü | Látogató | Regisztrált látogató | Admin |
|---|:-:|:-:|:-:|
| Főoldal, Adatbázis, Kapcsolat, Diagram | ✔ | ✔ | ✔ |
| Bejelentkezés, Regisztráció | ✔ | | |
| Üzenetek | | ✔ | ✔ |
| CRUD | | | ✔ |
| Kijelentkezés | | ✔ | ✔ |

## Telepítés helyben

```
composer install        (a Portable zip-ben a vendor mappa már benne van)
npm install             (a Portable zip-ben a node_modules mappa már benne van)
copy .env.example .env  és állítsa be az adatbázist
php artisan key:generate
php artisan migrate:fresh --seed
npm run build
php artisan serve
```

## Telepítés tárhelyre

1. `npm run build`, majd a `.env` fájlban a tárhely adatai (`APP_ENV=production`, `APP_DEBUG=false`, `APP_URL`, `DB_*`) és egy saját `MIGRATE_KEY`.
2. A projekt feltöltése FTP-vel (a `node_modules` és a `.git` mappa nélkül), a webcím könyvtára: `public`, PHP 8.3.
3. Az adatbázis létrehozása és feltöltése böngészőből: `/run-migrations?kulcs=<MIGRATE_KEY>`

## Belépési adatok

- Admin: `admin@netpizza.hu` / `admin1234`
- Regisztrált látogató: `user@netpizza.hu` / `user1234`
