# Docker for HR-assistant-resolventa

1. Скопируйте репозиторий командой `git clone https://github.com/shatilovlex/HR-Assistant-Resolventa.git`
2. Перейдите в директорию `docker` командой `cd docker`
3. Скопируйте файл `.env.example` в `.env` командой `cp .env.example .env`
4. Запустите docker контейнеры командой `docker-compose up -d --build`
5. Запустите установку зависимостей проекта командой `docker exec -itu1000 hr_assistant_php-fpm_1 composer install`
7. Вернитесь в рабочую директорию `cd ..`
8. Перейдите на [страницу приветствия Symfony](http://localhost/)
