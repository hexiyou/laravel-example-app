<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Websocket handler for onOpen and onClose callback
    | Replace this handler if you want to customize your websocket handler
    |--------------------------------------------------------------------------
    */
    //onOpen 和 onClose 回调函数的 Websocket 处理程序
    'handler' => SwooleTW\Http\Websocket\SocketIO\WebsocketHandler::class,

    /*
    |--------------------------------------------------------------------------
    | Default frame parser
    | Replace it if you want to customize your websocket payload
    |--------------------------------------------------------------------------
    */
    //默认 websocket 解析器
    'parser' => SwooleTW\Http\Websocket\SocketIO\SocketIOParser::class,

    /*
    |--------------------------------------------------------------------------
    | Websocket route file path
    |--------------------------------------------------------------------------
    */
    //Websocket路由文件路径
    'route_file' => base_path('routes/websocket.php'),

    /*
    |--------------------------------------------------------------------------
    | Default middleware for on connect request
    |--------------------------------------------------------------------------
    */
    //连接请求的默认中间件
    'middleware' => [
        // SwooleTW\Http\Websocket\Middleware\DecryptCookies::class,
        // SwooleTW\Http\Websocket\Middleware\StartSession::class,
        // SwooleTW\Http\Websocket\Middleware\Authenticate::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Websocket handler for customized onHandShake callback
    |--------------------------------------------------------------------------
    */
    //自定义Websocket握手回调函数
    'handshake' => [
        'enabled' => false,
        'handler' => SwooleTW\Http\Websocket\HandShakeHandler::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Default websocket driver
    |--------------------------------------------------------------------------
    */
    //默认 websocket 房间驱动
    'default' => 'table',

    /*
    |--------------------------------------------------------------------------
    | Websocket client's heartbeat interval (ms)
    |--------------------------------------------------------------------------
    */
    //Websocket客户端的心跳间隔（ms）
    'ping_interval' => 25000,

    /*
    |--------------------------------------------------------------------------
    | Websocket client's heartbeat interval timeout (ms)
    |--------------------------------------------------------------------------
    */
    //Websocket客户端的心跳间隔超时（ms）
    'ping_timeout' => 60000,

    /*
    |--------------------------------------------------------------------------
    | Room drivers mapping
    |--------------------------------------------------------------------------
    */
    //房间驱动映射
    'drivers' => [
        'table' => SwooleTW\Http\Websocket\Rooms\TableRoom::class,
        'redis' => SwooleTW\Http\Websocket\Rooms\RedisRoom::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Room drivers settings
    |--------------------------------------------------------------------------
    */
    //房间驱动程序设置
    'settings' => [

        'table' => [
            'room_rows' => 4096,
            'room_size' => 2048,
            'client_rows' => 8192,
            'client_size' => 2048,
        ],

        'redis' => [
            'server' => [
                'host' => env('REDIS_HOST', '127.0.0.1'),
                'password' => env('REDIS_PASSWORD', null),
                'port' => env('REDIS_PORT', 6379),
                'database' => 0,
                'persistent' => true,
            ],
            'options' => [
                //
            ],
            'prefix' => 'swoole:',
        ],
    ],
];
