<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel Logger Language Lines - Global
    |--------------------------------------------------------------------------
    */
    'userTypes' => [
        'guest'      => 'Гость',
        'registered' => 'Зарегистрированный',
        'crawler'    => 'Краулер',
    ],

    'verbTypes' => [
        'created'    => 'Создан',
        'edited'     => 'Редактирован',
        'deleted'    => 'Удален',
        'viewed'     => 'Просмотрено',
        'crawled'    => 'Краулед',
    ],

    'tooltips' => [
        'viewRecord' => 'Просмотр детали записи',
    ],

    /*
    |--------------------------------------------------------------------------
    | Laravel Logger Admin Dashboard Language Lines
    |--------------------------------------------------------------------------
    */
    'dashboard' => [
        'title'     => 'Журнал действий',
        'subtitle'  => 'События',

        'labels'    => [
            'id'            => 'id',
            'time'          => 'Время',
            'description'   => 'Описание',
            'user'          => 'Пользователь',
            'method'        => 'Метод',
            'route'         => 'Роут',
            'ipAddress'     => 'Ip <span class="hidden-sm hidden-xs">Адрес</span>',
            'agent'         => '<span class="hidden-sm hidden-xs">Пользватель </span>Agent',
            'deleteDate'    => '<span class="hidden-sm hidden-xs">Дата </span>Deleted',
        ],

        'menu'      => [
            'alt'           => 'Меню Журнала действий',
            'clear'         => 'Очистить лог',
            'show'          => 'Показать очищенные логи',
            'back'          => 'Вернуться к Журналу',
        ],

        'search'    => [
            'all'           => 'Все',
            'search'        => 'Поиск',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Laravel Logger Admin Drilldown Language Lines
    |--------------------------------------------------------------------------
    */

    'drilldown' => [
        'title'                 => 'Лог :id',
        'title-details'         => 'Детали события',
        'title-ip-details'      => 'Детали Ip Арреса',
        'title-user-details'    => 'Детали пользователя',
        'title-user-activity'   => 'Дополнительные детали пользователя',

        'buttons'   => [
            'back'      => '<span class="hidden-xs hidden-sm">Вернуться к</span><span class="hidden-xs">Журналу действий</span>',
        ],

        'labels' => [
            'userRoles'     => 'Пользовательские права',
            'userLevel'     => 'Уровень',
        ],

        'list-group' => [
            'labels'    => [
                'id'            => 'Activity Log ID:',
                'ip'            => 'Ip Address',
                'description'   => 'Описание',
                'userType'      => 'User Type',
                'userId'        => 'User Id',
                'route'         => 'Route',
                'agent'         => 'User Agent',
                'locale'        => 'Locale',
                'referer'       => 'Referer',

                'methodType'    => 'Тип Метода',
                'createdAt'     => 'Время события',
                'updatedAt'     => 'Обновлено в',
                'deletedAt'     => 'Удалено в',
                'timePassed'    => 'Time Passed',
                'userName'      => 'Имя',
                'userFirstName' => 'Имя',
                'userLastName'  => 'Фамилия',
                'userFulltName' => 'Полное имя',
                'userEmail'     => 'Email Пользователя',
                'userSignupIp'  => 'Signup Ip',
                'userCreatedAt' => 'Создано',
                'userUpdatedAt' => 'Обновлено',
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Laravel Logger Modals
    |--------------------------------------------------------------------------
    */

    'modals' => [
        'shared' => [
            'btnCancel'     => 'Cancel',
            'btnConfirm'    => 'Confirm',
        ],
        'clearLog' => [
            'title'     => 'Clear Activity Log',
            'message'   => 'Are you sure you want to clear the activity log?',
        ],
        'deleteLog' => [
            'title'     => 'Permanently Delete Activity Log',
            'message'   => 'Are you sure you want to permanently DELETE the activity log?',
        ],
        'restoreLog' => [
            'title'     => 'Restore Cleared Activity Log',
            'message'   => 'Are you sure you want to restore the cleared activity logs?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Laravel Logger Flash Messages
    |--------------------------------------------------------------------------
    */

    'messages' => [
        'logClearedSuccessfuly'   => 'Activity log cleared successfully',
        'logDestroyedSuccessfuly' => 'Activity log deleted successfully',
        'logRestoredSuccessfuly'  => 'Activity log restored successfully',
    ],

    /*
    |--------------------------------------------------------------------------
    | Laravel Logger Cleared Dashboard Language Lines
    |--------------------------------------------------------------------------
    */

    'dashboardCleared' => [
        'title'     => 'Cleared Activity Logs',
        'subtitle'  => 'Cleared Events',

        'menu'      => [
            'deleteAll'  => 'Delete All Activity Logs',
            'restoreAll' => 'Restore All Activity Logs',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Laravel Logger Pagination Language Lines
    |--------------------------------------------------------------------------
    */
    'pagination' => [
        'countText' => 'Showing :firstItem - :lastItem of :total results <small>(:perPage per page)</small>',
    ],

];