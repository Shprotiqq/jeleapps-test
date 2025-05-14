# Тестовое задание для компании "JeLeApps"

## Цель задания:
 - Разработка API-приложения с возможностью регистрации пользователей и просмотра данных по ним

## Требуемый функционал:
 - Разработать метод API - "Регистрация нового юзера" с адресом `/api/registration` и списком принимаемых параметров:
   - email;
   - password;
   - gender.
 - Разработать метод API с адресом `/api/profile` по которому выдаются данные о пользователе

## Порядок тестирования:
### Установка
   - `make install`
   - Импортировать коллекцию `jeleapps-test.postman_collection.json` в Postman
### Последующие тесты
   - `php artisan serve`

## Примеры ответов
 - `/api/registration` 
   Принимает параметры:
   - email
   - password
   - gender

   И возвращает данные созданного сотрудника в формате JSON
   ```
   {
       "message": "Пользователь успешно создан",
       "user": {
           "name": "test121",
           "email": "test121@example.com",
           "gender": "male",
           "updated_at": "2025-05-14T10:34:55.000000Z",
           "created_at": "2025-05-14T10:34:55.000000Z",
           "id": 4
       },
       "token": "4|5MYti9KAiY1TDPK1SLVoL2ivKPXzMRnGATRapnAc1fb32775"
      }
   ```
 - `/api/profile` Принимает в заголовках токен юзера и возвращает данные в формате JSON
   ```
   {
       "user": {
           "id": 4,
           "name": "test121",
           "email": "test121@example.com",
           "email_verified_at": null,
           "gender": "male",
           "created_at": "2025-05-14T10:34:55.000000Z",
           "updated_at": "2025-05-14T10:34:55.000000Z"
       }
   }
   ```

## Список использованных технологий:
 - PHP 8.4
 - Laravel 12.14.1
 - Laravel Sanctum