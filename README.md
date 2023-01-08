# Setup instructions

- run `git clone ...`

open IDE Project from existing files in this directory
- `cp .env.example .env`
- set DB_PASSWORD in .env
- `docker compose up -d`
  
Wait until docker build.

- Inside php container
  - run `composer install`
  - run `php artisan key:generate`
  - run `php artisan migrate`
  - run `php artisan optimize`

- Inside node container
  - run `npm i`
  - run `npm build`
  - run `npm dev` for local development
  
## to open php container
run `docker exec -it taskboard-local-api bash`

## to open node container
run `docker exec -it taskboard-local-node sh`
