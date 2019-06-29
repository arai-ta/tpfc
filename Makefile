
server:
	./artisan serve

test:
	./vendor/bin/phpunit

DB_CONTAINER_NAME = tpfc-db

db:
	mysql -h127.0.0.1 -p3306 -uroot -psecret

db-init:
	docker run --name $(DB_CONTAINER_NAME) -e MYSQL_ROOT_PASSWORD=secret -d -p 3306:3306 mysql:5.7

db-start:
	docker start $(DB_CONTAINER_NAME)

db-stop:
	docker stop $(DB_CONTAINER_NAME)

db-apply:
	./artisan migrate

MAIL_CONTAINER_NAME = tpfc-smtp

mail-init:
	docker run --name $(MAIL_CONTAINER_NAME) -d --rm -p 1025:1025 -p 8025:8025 mailhog/mailhog

mail-start:
	docker start $(MAIL_CONTAINER_NAME)

mail-stop:
	docker stop $(MAIL_CONTAINER_NAME)
