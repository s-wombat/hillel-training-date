build:
	make up
	make composer

up:
	docker-compose up -d
composer:
	composer install