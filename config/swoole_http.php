<?php

return [
    /*
    |--------------------------------------------------------------------------
    | HTTP server configurations.
    |--------------------------------------------------------------------------
    |
    | @see https://www.swoole.co.uk/docs/modules/swoole-server/configuration
    |
    */
    //Lonelyer注：See Also：https://github.com/swooletw/laravel-swoole/wiki/5.-Configuration
    'server' => [
        //服务器绑定监听的主机地址
        'host' => env('SWOOLE_HTTP_HOST', '127.0.0.1'),
        //服务器的监听端口
        'port' => env('SWOOLE_HTTP_PORT', '1215'),
        //项目的公用文件夹路径
        'public_path' => base_path('public'),
        // Determine if to use swoole to respond request for static files
        //侦测是否使用 Swoole 响应静态文件请求
        'handle_static_files' => env('SWOOLE_HANDLE_STATIC', true),
        //确定是否在控制台输出访问日志
        'access_log' => env('SWOOLE_HTTP_ACCESS_LOG', false),
        // You must add --enable-openssl while compiling Swoole
        // Put `SWOOLE_SOCK_TCP | SWOOLE_SSL` if you want to enable SSL
        //Socket类型
        'socket_type' => SWOOLE_SOCK_TCP,
        'process_type' => SWOOLE_PROCESS,
        //swoole server 附加配置，参考：https://github.com/swooletw/laravel-swoole/wiki/5.-Configuration
        'options' => [
            'pid_file' => env('SWOOLE_HTTP_PID_FILE', base_path('storage/logs/swoole_http.pid')),
            'log_file' => env('SWOOLE_HTTP_LOG_FILE', base_path('storage/logs/swoole_http.log')),
            'daemonize' => env('SWOOLE_HTTP_DAEMONIZE', false),
            // Normally this value should be 1~4 times larger according to your cpu cores.
            'reactor_num' => env('SWOOLE_HTTP_REACTOR_NUM', swoole_cpu_num()),
            'worker_num' => env('SWOOLE_HTTP_WORKER_NUM', swoole_cpu_num()),
            'task_worker_num' => env('SWOOLE_HTTP_TASK_WORKER_NUM', swoole_cpu_num()),
            // The data to receive can't be larger than buffer_output_size.
            'package_max_length' => 20 * 1024 * 1024,
            // The data to send can't be larger than buffer_output_size.
            'buffer_output_size' => 10 * 1024 * 1024,
            // Max buffer size for socket connections
            'socket_buffer_size' => 128 * 1024 * 1024,
            // Worker will restart after processing this number of requests
            'max_request' => 3000,
            // Enable coroutine send
            'send_yield' => true,
            // You must add --enable-openssl while compiling Swoole
            'ssl_cert_file' => null,
            'ssl_key_file' => null,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Enable to turn on websocket server.
    |--------------------------------------------------------------------------
    */
    'websocket' => [
        //确定是否启用 websocket 服务器
        'enabled' => env('SWOOLE_HTTP_WEBSOCKET', false),
    ],

    /*
    |--------------------------------------------------------------------------
    | Hot reload configuration
    |--------------------------------------------------------------------------
    */
    'hot_reload' => [
        //确定是否为开发启用热重载。
        'enabled' => env('SWOOLE_HOT_RELOAD_ENABLE', false),
        //确定是否递归扫描目录。
        'recursively' => env('SWOOLE_HOT_RELOAD_RECURSIVELY', true),
        //热重载的基本路径。
        'directory' => env('SWOOLE_HOT_RELOAD_DIRECTORY', base_path()),
        //确定是否在控制台输出重载状态
        'log' => env('SWOOLE_HOT_RELOAD_LOG', true),
        //用于热重载的过滤器。默认为.php。
        'filter' => env('SWOOLE_HOT_RELOAD_FILTER', '.php'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Console output will be transferred to response content if enabled.
    |--------------------------------------------------------------------------
    */
    //如果启用，控制台输出将被传输到响应内容。
    'ob_output' => env('SWOOLE_OB_OUTPUT', true),

    /*
    |--------------------------------------------------------------------------
    | Pre-resolved instances here will be resolved when sandbox created.
    |--------------------------------------------------------------------------
    */
    //此处的预解析实例将在创建沙箱时解析。
    'pre_resolved' => [
        'view', 'files', 'session', 'session.store', 'routes',
        'db', 'db.factory', 'cache', 'cache.store', 'config', 'cookie',
        'encrypter', 'hash', 'router', 'translator', 'url', 'log',
    ],

    /*
    |--------------------------------------------------------------------------
    | Instances here will be cleared on every request.
    |--------------------------------------------------------------------------
    */
    //每次请求都会清除此处的实例
    'instances' => [
        'auth',
    ],

    /*
    |--------------------------------------------------------------------------
    | Providers here will be registered on every request.
    |--------------------------------------------------------------------------
    */
    //此处的服务提供商将在每次请求时重新注册。
    'providers' => [
        Illuminate\Pagination\PaginationServiceProvider::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetters for sandbox app.
    |--------------------------------------------------------------------------
    */
    'resetters' => [
        SwooleTW\Http\Server\Resetters\ResetConfig::class,
        SwooleTW\Http\Server\Resetters\ResetSession::class,
        SwooleTW\Http\Server\Resetters\ResetCookie::class,
        SwooleTW\Http\Server\Resetters\ClearInstances::class,
        SwooleTW\Http\Server\Resetters\BindRequest::class,
        SwooleTW\Http\Server\Resetters\RebindKernelContainer::class,
        SwooleTW\Http\Server\Resetters\RebindRouterContainer::class,
        SwooleTW\Http\Server\Resetters\RebindViewContainer::class,
        SwooleTW\Http\Server\Resetters\ResetProviders::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Define your swoole tables here.
    |
    | @see https://www.swoole.co.uk/docs/modules/swoole-table
    |--------------------------------------------------------------------------
    */
    //可以在此处定义数据共享跨进程的 swoole 表。
    'tables' => [
        // 'table_name' => [
        //     'size' => 1024,
        //     'columns' => [
        //         ['name' => 'column_name', 'type' => Table::TYPE_STRING, 'size' => 1024],
        //     ]
        // ],
    ],
];
