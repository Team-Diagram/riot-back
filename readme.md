# Riot is back

## Prerequisite
- Docker
- Php 8.1.2
- Composer
- symphony 5
- Make

## Env
`cp .env .env.local`

Dans le .env.local changer la variable 'API_MQTT' par
- Pour mac M1 : http://host.docker.internal:8585/sensor
- Autre : http://localhost:8585/sensor

## Run docker run !!!
`make init` <br>
`make migrate` <br>
`make insert-data`
