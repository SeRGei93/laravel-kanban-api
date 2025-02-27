## Install project
- Add database
- docker compose run --rm composer install
- Add .env and configure
- docker compose run --rm artisan key:generate
- docker compose run --rm artisan storage:link
- docker compose run --rm artisan migrate
- docker compose run --rm npm --service-ports install
- docker compose run --rm npm --service-ports run dev
