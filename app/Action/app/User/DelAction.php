<?php

declare(strict_types=1);

namespace App\Action\app\User;

use Hyperf\Di\Annotation\Inject;
use App\Service\app\User as Service;
use App\Contract\AbstractAction;
use Wayhood\HyperfAction\Annotation\Action;
use Wayhood\HyperfAction\Annotation\Category;
use Wayhood\HyperfAction\Annotation\Description;
use Wayhood\HyperfAction\Annotation\ErrorCode;
use Wayhood\HyperfAction\Annotation\RequestParam;
use Wayhood\HyperfAction\Annotation\ResponseParam;
use Wayhood\HyperfAction\Annotation\Token;
use Wayhood\HyperfAction\Annotation\Usable;

/**
 * @Action("app.User.Del")
 *
 * 以下注解用于生成文档校验数据类型和过滤响应输出
 *
 * 分类
 * @Category("会员表")
 *
 * 描述
 * @Description("删除|批量删除")
 *
 * 请求参数
 * 格式:  name="名称",  type="类型", require=是否必须, example=示例值, description="描述"
 * 简写:  n="名称",  t="类型", r=是否必须, e=示例值, d="描述"
 * @RequestParam(n="ids",t="array",r=true,e="[1,2,3]",d="会员表 ids")

 *
 * 响应参数
 * 格式:  name="名称",  type="类型", example=示例值, description="描述"
 * 简写:  n="名称",  t="类型", e=示例值, d="描述"
 * @ResponseParam(n="status",                t="bool",    e="true",     d="是否成功")

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
class DelAction extends AbstractAction
{
    /**
     * @Inject
     * @var Service
     */
    protected $service;

    public function run($params, $extras, $headers)
    {
        return $this->successReturn($this->service->delete($params));
    }
}
