## Laravel Api Test

Run API with<br>
```
php artisan serve
```
<br>
add .env file with correct mysql connection<br>
<br>
Run database migration and seeder with<br>
```
php artisan migrate --seed
```
<br>
All routes except 'login' requires headers<br>
- Authorization : 'Bearer {token}'
- Accept : 'application/json'
- Content-Type : 'application/json'

## Routes for JWT login

- post http://127.0.0.1:8000/api/login
- post http://127.0.0.1:8000/api/logout
- post http://127.0.0.1:8000/api/refresh
- post http://127.0.0.1:8000/api/me

## Routes for API

- get http://127.0.0.1:8000/api/v1/accounts
- get http://127.0.0.1:8000/api/v1/accounts/{id}
- post http://127.0.0.1:8000/api/v1/accounts

- get http://127.0.0.1:8000/api/v1/transactions
- get http://127.0.0.1:8000/api/v1/transactions/{id}
- post http://127.0.0.1:8000/api/v1/transactions

## Payloads

- User {string: 'email', string: 'password'}
- Account {string: 'name'}
- Transaction {int: 'account_id', string: 'description', double: 'amount'}