## Laravel Api Test

Run API with php artisan serve<br>
add .env file with correct mysql connection<br>

## Routes for testing

- get http://127.0.0.1:8000/api/v1/accounts
- get http://127.0.0.1:8000/api/v1/accounts/{id}
- post http://127.0.0.1:8000/api/v1/accounts

- get http://127.0.0.1:8000/api/v1/transactions
- get http://127.0.0.1:8000/api/v1/transactions/{id}
- post http://127.0.0.1:8000/api/v1/transactions

## Payloads

- Account {string: 'name'}
- Transaction {int: 'account_id', string: 'description', double: 'amount'}