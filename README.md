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
Primjer ubaciti u
- Body:
{
    "total_price": "{{total_price}}",
    "products": [
        {
            "name": "Salata",
            "price": 1.36,
            "quantity": 2
        },
        {
            "name": "Paprika",
            "price": 2.50,
            "quantity": 1
        },
        {
            "name": "Sol",
            "price": 1.30,
            "quantity": 1
        },
        {
            "name": "Prasak za rublje",
            "price": 45,
            "quantity": 2
        },
        {
            "name": "Cigarete",
            "price": 5.60,
            "quantity": 3
        }

    ],
    "stopa_poreza": 0.25,
    "popust": "{{popust}}",
    "ime_prezime": "Monika Mikec",
    "email": "monikamikec03@gmail.com",
    "broj_telefona": "0993371858",
    "adresa": "Cugovec 41",
    "grad": "Gradec",
    "drzava": "Hrvatska",
    "created_at": "2024-02-19 10:40:00",
    "updated_at": "2024-02-19 10:45:00"
}
- Pre-request Script:
try {
    const requestBody = JSON.parse(pm.request.data);
    const totalPrice = requestBody.products.reduce((sum, product) => {
        return sum + (product.price * product.quantity);
    }, 0);

    pm.environment.set('total_price', totalPrice.toFixed(2));

    if (totalPrice > 100) {
        pm.environment.set('popust', '10.00');
    } else {
        pm.environment.set('popust', '0.00');
    }

    requestBody.total_price = pm.environment.get('total_price');
    requestBody.popust = pm.environment.get('popust');
    pm.request.data = JSON.stringify(requestBody);

} catch (error) {
    console.error("Error parsing JSON:", error.message);
}


Sadržaj
Izvorni kod: https://github.com/monikamikec03/Factory-LaravelWebshopAPI/tree/development
Baza podataka: wehshopapi.sql
Postman kolekcija: Factory - WebshopAPI.postman_collection.json
EER dijagram: EER - Factory.mwb

