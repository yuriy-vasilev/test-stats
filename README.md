## Требования к PHP
* версия `^7.3|^8.0`
* модуль `ext-redis`

## Настрока Redis
необходимо в .env указать:
* `REDIS_HOST`
* `REDIS_PASSWORD`
* `REDIS_PORT`
* `REDIS_DB`

## Endpoints
* GET: `/api/add/{countryCode}`
* GET: `/api/list`
