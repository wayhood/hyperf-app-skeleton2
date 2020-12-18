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
 * @Action("test.list")
 *
 * 以下注解用于生成文档校验数据类型和过滤响应输出
 *
 * 分类
 * @Category("测试")
 *
 * 描述
 * @Description("测试列表")
 *
 * 请求参数
 * 格式:  name="名称",  type="类型", require=是否必须, example=示例值, description="描述"
 * 简写:  n="名称",  t="类型", r=是否必须, e=示例值, d="描述"
 * @RequestParam(name="start", type="int", require=false, example=0, description="起始位置, 默认从0开始")
 * @RequestParam(n="limit",    t="int", r=false, e=10,  d="获取记录条数, 默认10条")
 *
 * 响应参数
 * 格式:  name="名称",  type="类型", example=示例值, description="描述"
 * 简写:  n="名称",  t="类型", e=示例值, d="描述"
 * @ResponseParam(n="users",                t="array",    e="users[]",     d="用户数组")
 * @ResponseParam(n="users.0",              t="map",      e="无",          d="用户对象")
 * @ResponseParam(n="users.0.id",           t="int",      e=1,             d="id")
 * @ResponseParam(n="users.0.mobile_phone", t="string",   e="12345789001", d="电话")
 * @ResponseParam(n="users.0.password",     t="string",   e="opxxxxxx",    d="密码")
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
class ListAction extends AbstractAction
{
    public function run($params, $extras, $headers) {
        $start = 0;
        $limit = 10;
        if (isset($params['start'])) {
            $start = intval($params['start']);
        }

        if (isset($params['limit'])) {
            $limit = intval($params['limit']);
        }

        // $res = DB::query("SELECT * FROM `account` LIMIT ?,?", [$start, $limit]);
        return $this->errorReturn(1000);
        return $this->successReturn([
            'users' => []
        ]);
    }
}