Technical TEST Plus Que Pro
========

Make sur to have docker installed on your machine.
Make sur you don't have docker on ports 2525 or 9702
## Installation:

build your image:
`docker compose build`

up your docker containers:
`docker compose up -d`

Init dependencies:
`docker compose exec php composer install`

init databasee:
`docker compose exec php bin/console doctrine:database:create`
`docker compose exec php bin/console doctrine:schema:create`

Ready to Go http://localhost:2525

Backend : http://localhost:9702/api

Add to your /etc/hosts (optional)

`127.0.0.1       pqp.dev.io` and now you can access with http://pqp.dev.io

Access to container bash:
`docker-compose exec php bash`


##PhpMyAdmin:

http://localhost:9702
