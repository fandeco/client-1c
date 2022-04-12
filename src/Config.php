<?php

namespace Fc;

class Config
{
    private static $instances = null;

    public static $config = [
        "FC_REST_URL" => "",
        "FC_REST_LOGIN" => "",
        "FC_REST_PASSWORD" => "",
        "FC_SERVER" => [
            "region" => "",
            "retail" => "",
            "test" => "",
            "crm" => ""
        ],
        "FC_METHODS" => [
            "Fc\Methods\LinksUpdate" => [
                "name" => "Отправка изображений",
                "server" => "region",
                "method" => "POST"
            ],
            "Fc\Methods\PropertyReference" => [
                "name" => "Справочник свойств",
                "server" => "region",
                "method" => "POST"
            ],
            "Fc\Methods\Products" => [
                "name" => "Получение свойств",
                "server" => "region",
                "method" => "POST"
            ],
            "Fc\Methods\SubmitToSite" => [
                "name" => "Получение свойства Передавать на сайт",
                "server" => "region",
                "method" => "POST"
            ],
            "Fc\Methods\OrderExist" => [
                "name" => "Проверка существования заказа в базе данных",
                "server" => "region",
                "method" => "POST"
            ],
            "Fc\Methods\OrderSend" => [
                "name" => "Отправка заказа",
                "server" => "region",
                "method" => "POST"
            ],
            "Fc\Methods\OperationCheck" => [
                "name" => "Проверка заявки на наличие операций",
                "server" => "region",
                "method" => "POST"
            ],
            "Fc\Methods\OrderPayment" => [
                "name" => "Сообщение в 1с что поступила оплата",
                "server" => "region",
                "method" => "POST"
            ],
            "Fc\Methods\Marketplace" => [
                "name" => "Метод для проверки цен",
                "server" => "region",
                "method" => "POST"
            ],
            "Fc\Methods\Prices" => [
                "name" => "Цена",
                "server" => "retail",
                "method" => "POST"
            ],
            "Fc\Methods\Stocks" => [
                "name" => "Получение Остатков",
                "server" => "retail",
                "method" => "POST"
            ],
            "Fc\Methods\GetVendors" => [
                "name" => "Получение производителей",
                "server" => "retail",
                "method" => "POST"
            ],
            "Fc\Methods\GetGoodsForFandeco" => [
                "name" => "Получение свойства Передавать на сайт",
                "server" => "retail",
                "method" => "POST"
            ],
            "Fc\Methods\PropertiesWarehouse" => [
                "name" => "",
                "server" => "retail",
                "method" => "POST"
            ],
            "Fc\Methods\ChangeStatusCheck" => [
                "name" => "",
                "server" => "test",
                "method" => "POST"
            ],
            "Fc\Methods\ChangeStatusOrder" => [
                "name" => "",
                "server" => "test",
                "method" => "POST"
            ],



            // crm - итилиум
            "Fc\Methods\GetUsers" => [
                "name" => "Список пользователей",
                "server" => "crm",
                "method" => "POST"
            ],

            "Fc\Methods\GetTickets" => [
                "name" => "Список тикетов",
                "server" => "crm",
                "method" => "POST"
            ],

            "Fc\Methods\GetTasks" => [
                "name" => "Список нарядов",
                "server" => "crm",
                "method" => "POST"
            ],
            "Fc\Methods\GetTaskData" => [
                "name" => "Получения наряда",
                "server" => "crm",
                "method" => "POST"
            ],

            "Fc\Methods\EditSolutionTask" => [
                "name" => "Редактировать наряд решения",
                "server" => "crm",
                "method" => "POST"
            ],

            "Fc\Methods\ChangeResponsible" => [
                "name" => "Смена ответственного",
                "server" => "crm",
                "method" => "POST"
            ],

            "Fc\Methods\ChangeStateTask" => [
                "name" => "Смена статуса наряда",
                "server" => "crm",
                "method" => "POST"
            ],

            "Fc\Methods\GetTicketsImplementer" => [
                "name" => "Список обращений",
                "server" => "crm",
                "method" => "POST"
            ],

            "Fc\Methods\GetServices" => [
                "name" => "Список каких то сервисов",
                "server" => "crm",
                "method" => "POST"
            ],

            "Fc\Methods\GetSubordinatesManager" => [
                "name" => "---",
                "server" => "crm",
                "method" => "POST"
            ],
            "Fc\Methods\GetStaffDepartment" => [
                "name" => "---",
                "server" => "crm",
                "method" => "POST"
            ],
        ]
    ];

    protected function __construct($config)
    {
        self::$config = array_merge($config, self::$config);
    }

    protected function __clone()
    {
    }

    public function __wakeup()
    {
    }

    public static function getInstance($config = []): Config
    {
        if (is_null(self::$instances)) {
            self::$instances = new static($config);
        }
        return self::$instances;
    }

    public function get()
    {
        return self::$config;
    }
}
