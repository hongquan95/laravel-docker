
## Guide
```
docker-compose build
docker-up -d
cp .env.example .env
docker-compose exec app composer install
docker-compose exec app  php artisan key:generate
```
Test: http://localhost:8000

- [Reference link](https://www.digitalocean.com/community/tutorials/how-to-containerize-a-laravel-application-for-development-with-docker-compose-on-ubuntu-18-04).
