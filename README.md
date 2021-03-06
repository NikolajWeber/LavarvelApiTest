## Laravel Api Test

Run API with<br>

```
php artisan serve
```

<br>
add .env file with correct mysql connection<br>
<br>
Run database migration and seeder with<br>
There will be seeded a API user for test requests
<br>
<br>

```
php artisan migrate --seed
```

<br>
All routes except 'login' requires headers<br>
- Authorization : 'Bearer {token}'<br>
- Accept : 'application/json'<br>
- Content-Type : 'application/json'<br>

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
- get http://127.0.0.1:8000/api/v1/transactions/list/{accountId}

## Payloads

- User {string: 'email', string: 'password'}
- Account {string: 'name'}
- Transaction {int: 'account_id', string: 'description', double: 'amount'}

## Tests

Run test with<br><br>

```
php artisan test
```

<br>

- api login
- sign in api for test
- account create
- transaction create