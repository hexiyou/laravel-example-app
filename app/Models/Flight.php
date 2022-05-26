<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    /**
     * 与模型关联的数据表.
     *
     * @var string
     */
    protected $table = 'my_flights';

    /**
     * 与数据表关联的主键.
     *
     * @var string
     */
    protected $primaryKey = 'flight_id';

    /**
     * 指明模型的 ID 不是自增。
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * 自增 ID 的数据类型。
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * 指示模型是否主动维护时间戳。
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * 模型日期字段的存储格式。
     *
     * @var string
     */
    protected $dateFormat = 'U';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';

    /**
     * 设置当前模型使用的数据库连接名。
     *
     * @var string
     */
    protected $connection = 'sqlite';

    /**
     * 模型的属性默认值。
     *
     * @var array
     */
    protected $attributes = [
        'delayed' => false,
    ];
}
