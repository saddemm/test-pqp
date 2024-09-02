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

Get movies from api to local database:
`docker compose exec php bin/console app:movies`

Ready to Go http://localhost:2525/api/docs


Access to container bash:
`docker compose exec php bash`


##PhpMyAdmin:
Auths : root:my_secret_password
http://localhost:9702
