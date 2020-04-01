# dictionary

## Development setting

- Step 1: Create .env file
```bash
cp /server/.env.example /server/.env
```

- Step 2: Start docker-compose services
```bash
./up.sh
```

- Step 3: Generate Laravel's key
```bash
./generate-laravel-key.sh
```

## Init Database
```bash
./init-db.sh
```

## Stop
```bash
./down.sh
```

## Account Admin
```bash
email: admin.sgt@gmail.com
```
```bash
password: 123456
```
Please run: 'php artisan db:seed' before login admin

