### Настройки

Клиент 1с

## Подключения в composer.json

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/fandeco/client-1c"
    }
  ],
  "require": {
    "fandeco/client-1c": "^1.0.0"
  }
}
```

## Глобальные настройки

```php
// Настройки авторизации для серверов

if (!defined('FC_REST_URL')) {
    define('FC_REST_URL', ""); // Адрес основного rest сервера
}
if (!defined('FC_REST_TOKEN')) {
    define('FC_REST_TOKEN', ""); // Токе если IP в не разрешенных находиться
}


//Удаления просроченного кеша
use Fc\CacheDelete;
use Fc\Methods\SubmitToSite;

CacheDelete::getInstance();


$Clinet = new SubmitToSite();
$Clinet
    ->to1c() // Для отправки запроса напрямую в 1с
    ->site('fandeco.ru')
    ->submit()
    ->setTimeOut(20) // Время ожидания ответа от сервера
    ->get();


echo '<pre>';
print_r($Clinet->getResponse());
print_r($Clinet->getAllErrors());
die;

```

### Запуск тестов
