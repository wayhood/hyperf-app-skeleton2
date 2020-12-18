<?php

declare(strict_types=1);
namespace App\Action\Test;

use Hyperf\DB\DB;
use Wayhood\HyperfAction\Annotation\Action;
use Wayhood\HyperfAction\Annotation\Category;
use Wayhood\HyperfAction\Annotation\Description;
use Wayhood\HyperfAction\Annotation\RequestParam;
use Wayhood\HyperfAction\Annotation\ResponseParam;
use Wayhood\HyperfAction\Annotation\Usable;
use Wayhood\HyperfAction\Annotation\ErrorCode;
use Wayhood\HyperfAction\Annotation\Token;
use Wayhood\HyperfAction\Action\AbstractAction;

/**
 * @Action("test.get")
 *
 * 以下注解用于生成文档校验数据类型和过滤响应输出
 *
 * 分类
 * @Category("测试")
 *
 * 描述
 * @Description("测试请求")
 *
 * 请求参数
 * 格式:  name="名称",  type="类型", require=是否必须, example=示例值, description="描述"
 * 简写:  n="名称",  t="类型", r=是否必须, e=示例值, d="描述"
 * @RequestParam(name="nick", type="string", require=true, example="test", description="用户昵称")
 * @RequestParam(n="a",       t="string", r=true, e="a",  d="请求参数a")
 * @RequestParam(n="b",       t="int",   r=true, e=1,   d="请求参数b")
 * @RequestParam(n="c",       t="float", r=true, e=0.1, d="请求参数c")
 *
 * 响应参数
 * 格式:  name="名称",  type="类型", example=示例值, description="描述"
 * 简写:  n="名称",  t="类型", e=示例值, d="描述"
 * @ResponseParam(n="user",           t="map",      e="无",          d="返回用户信息")
 * @ResponseParam(n="user.name",      t="string",   e="syang",       d="返回用户名称")
 * @ResponseParam(n="user.age",       t="int",      e=40,            d="返回用户年龄")
 * @ResponseParam(n="user.tel",       t="string",   e="12345789001", d="返回用户电话")
 *
 * 错误代码
 * 格式: code=错误代码, message="描述"
 * 简写: c=错误代码, m="描述"
 * @ErrorCode(code=1000, message="不知道")
 *
 * 是否可用 true可用 false不可用
 * @Usable(true)
 *
 * 是否需要Token 必须传Token false不做要求
 * @Token(false)
 */
class GetAction extends AbstractAction
{
    public function run($params, $extras, $headers) {
        return $this->successReturn([
            'user' => [
                'name' => 'syang',
                'age' => 40,
                'tel' => '1234567890'
            ]
        ]);
    }
}