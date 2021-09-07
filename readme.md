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
use Fc\Config;
Config::getInstance([
    // Данные авторизации по секрверам
    "FC_AUTH" => [ 
        "region" => [
            "login" => "",
            "password" => "",
        ],
        "retail" => [
            "login" => "",
            "password" => "",
        ],
        "test" => [
            "login" => "",
            "password" => "",
        ],
        "crm" => [
            "login" => "",
            "password" => "",
        ]
    ],
    // Полный путь для кеша
    "FC_CACHE_DIR" => "/fc_cache",
    // Время жизни кеша в сикундах
    "FC_CACHE_TIME" => 300
]);

//Удаления просроченного кеша
use Fc\CacheDelete;
use Fc\Methods\SubmitToSite;

CacheDelete::getInstance();


$Clinet = new SubmitToSite();
$Clinet
    ->site('fandeco.ru')
    ->submit()
    ->cache() // Включает кеш
    ->cacheTime(300) // Задать время кеша
    ->setTimeOut(20) // Время ожидания ответа от сервера
    ->get();


echo '<pre>';
print_r($Clinet->getResponse());
print_r($Clinet->getAllErrors());
die;

```


### Запуск тестов
