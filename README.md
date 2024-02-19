Webshop API
Laravel
BACKEND ZADATAK
________________

Potrebno je upaliti XAMPP Server radi potreba testiranja.

Instalacija baze
Za izradu ovog projekta koristila sam mysql bazu podataka lokalno: webshopapi
Sve tablice moguće kreirati pomoću migracija: php artisan migrate


Popunjavanje baze
Umetanje podataka u tablicu: php artisan db:seed


Testiranje aplikacije
Pokretanje servera: php artisan serve
Prikaz svih proizvoda: http://127.0.0.1:8000/products (na ovom urlu je moguće testirati filtriranje proizvoda ovisno o kategoriji, minimalnoj i maksimalnoj cijeni, nazivu kao i sortiranje po nazivu i cijeni)
Prikaz pojedinačnog proizvoda: http://127.0.0.1:8000/products/1
Kreiranje narudžbe putem postmana: http://127.0.0.1:8000/store
Primjer ubaciti u Postman/raw/json:
{
    "total_price": 150.50,
    "products": [
        {
            "name": "Product A",
            "price": 20.00,
            "quantity": 2
        },
        {
            "name": "Product B",
            "price": 30.50,
            "quantity": 1
        }
    ],
    "stopa_poreza": 0.25,
    "popust": 10.00,
    "ime_prezime": "John Doe",
    "email": "john.doe@example.com",
    "broj_telefona": "123-456-789",
    "adresa": "123 Main Street",
    "grad": "City",
    "drzava": "Country",
    "created_at": "2024-02-16 12:00:00",
    "updated_at": "2024-02-16 12:30:00"
}


Sadržaj
Izvorni kod: [https://github.com/monikamikec03/LaravelWebshopAPI/tree/master](https://github.com/monikamikec03/Factory-LaravelWebshopAPI/tree/development)
Baza podataka: wehshopapi.sql
Postman kolekcija: Factory - WebshopAPI.postman_collection.json
EER dijagram: EER - Factory.mwb

