CONTAINER_PATH:=/var/www/app
DOCKER_COMPOSE:=docker compose
UP:=up -d --build
DOWN:=stop
CONTAINER_NAME:=riot_back
DB_NAME:=db_riot
EXEC:=docker exec
BIN:=${EXEC} -w ${CONTAINER_PATH} ${CONTAINER_NAME} php bin/console
CACHE:=cache:clear
OS:=mac
$ENTITY:=User


init: start
ifeq (${OS}, mac)
	${EXEC} -w ${CONTAINER_PATH} ${CONTAINER_NAME} composer install
else ifeq (${OS}, lin)
	${EXEC} -w ${CONTAINER_PATH} ${CONTAINER_NAME} composer install
endif

start:
ifeq (${OS}, mac)
	${DOCKER_COMPOSE} ${UP}
else ifeq (${OS}, lin)
	${DOCKER_COMPOSE} ${UP}
endif

stop:
ifeq (${OS}, mac)
	${DOCKER_COMPOSE} ${DOWN}
else ifeq (${OS}, lin)
	${DOCKER_COMPOSE} ${DOWN}
endif

prune:
	docker volume prune

bash: start
	${EXEC} -ti ${CONTAINER_NAME} bash

db: start
	${EXEC} -ti ${DB_NAME} psql -U riot -d RIOT -w

cache-clear:
	${BIN} ${CACHE}

database-create:
	${BIN} doctrine:database:create --if-not-exists

migration:
	$(BIN) make:migration

migrate:
	$(BIN) d:m:m --no-interaction

database-drop:
	${BIN} d:d:d --force --if-exists

entity:
	${BIN} make:entity ${ENTITY}


