## REST API Методы для работы с пользователями

### Создание пользователя

Метод: POST

Endpoint: `/api/users`

Пример запроса:

```json
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password"
}
```

Обновление информации пользователя
Метод: PUT

Endpoint: /api/users/{id}

Пример запроса:
```json
{
  "name": "Updated Name",
  "email": "updated@example.com"
}
```

Удаление пользователя
Метод: DELETE

Endpoint: /api/users/{id}

Авторизация пользователя
Метод: POST

Endpoint: /api/login
Пример запроса:
```json
{
  "email": "john@example.com",
  "password": "password"
}
```
Получить информацию о пользователе
Метод: GET
Endpoint: /api/user
