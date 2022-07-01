<?php

declare(strict_types=1);
namespace App\Validate\Test;

use DeathSatan\Hyperf\Validate\Lib\AbstractValidate as BaseValidate;

class GetValidate extends BaseValidate
{
    /**
     * @var array 自定义场景
     */
    protected $scenes =[
        'demo'=>[
            'nick'
        ]
    ];

    /**
     * 规则
     * @return array
     */
    protected function rules():array
    {
        return [
            'nick'=>['required'],
            'a'=>['required'],
            'b'=>'required',
            'c'=>'required'
        ];
    }

    /**
     * 自定义错误消息
     * @return array
     */
    protected function messages():array
    {
        return [];
    }

    /**
     * 自定义验证属性
     * @return array
     */
    protected function attributes():array
    {
        return [];
    }
}
