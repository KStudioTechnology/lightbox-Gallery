# PHP Lightbox Gallery

Prosta galeria obrazków i wideo z funkcją lightbox, stworzona w PHP, MySQL i JavaScript.  

## Funkcje

- Wyświetlanie obrazów i wideo w siatce (`grid`)
- Lightbox z nawigacją:
  - Przyciskami `<` / `>`  
  - Strzałkami klawiatury (`←` / `→`)
  - Zamknięcie `Esc` lub `×`
- Upload nowych plików (`JPG`, `PNG`, `GIF`, `WEBP`, `MP4`)
- Automatyczne zapisywanie w folderze `/images` i rejestracja w bazie danych

## Technologie

- PHP & MySQL
- JavaScript
- HTML / CSS

## Instalacja

1. Skopiuj repozytorium do lokalnego serwera z PHP.
2. Utwórz bazę danych `galeria` z tabelą `images`:

```sql
CREATE TABLE images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255),
    path VARCHAR(255),
    type VARCHAR(50)
);
