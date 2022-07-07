<?php

declare(strict_types=1);

namespace App\Action\User;

use Hyperf\Di\Annotation\Inject;
use App\Service\User as Service;
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
 * @Action("User.Search")
 *
 * 以下注解用于生成文档校验数据类型和过滤响应输出
 *
 * 分类
 * @Category("会员表")
 *
 * 描述
 * @Description("搜索")
 *
 * 请求参数
 * 格式:  name="名称",  type="类型", require=是否必须, example=示例值, description="描述"
 * 简写:  n="名称",  t="类型", r=是否必须, e=示例值, d="描述"
 * @RequestParam(n="search",t="array",r=false,e="search[]",d="搜索条件")
 * @RequestParam(n="search.id",t="array",r=false,e="['>|<|!=|=',123]",d="序号")
 * @RequestParam(n="search.username",t="array",r=false,e="['like|=','xxx']",d="用户账号")
 * @RequestParam(n="search.nickname",t="array",r=false,e="['like|=','xxx']",d="昵称")
 * @RequestParam(n="search.password",t="array",r=false,e="['like|=','xxx']",d="密码")
 * @RequestParam(n="search.avatar",t="array",r=false,e="['like|=','xxx']",d="头像")
 * @RequestParam(n="search.is_lock",t="array",r=false,e="['like|=','xxx']",d="账号状态")
 * @RequestParam(n="search.created_at",t="array",r=false,e="['start_date','end_date']",d="创建时间")
 * @RequestParam(n="search.updated_at",t="array",r=false,e="['start_date','end_date']",d="更新时间")
 * @RequestParam(n="per_page",t="int",r=false,e="10",d="每页数量")
 * @RequestParam(n="page",t="int",r=false,e="1",d="当前多少页")

 * 响应参数
 * 格式:  name="名称",  type="类型", example=示例值, description="描述"
 * 简写:  n="名称",  t="类型", e=示例值, d="描述"
 * @ResponseParam(n="id",                t="int",    e="1",     d="序号")
 * @ResponseParam(n="username",                t="string",    e="xxx",     d="用户账号")
 * @ResponseParam(n="nickname",                t="string",    e="xxx",     d="昵称")
 * @ResponseParam(n="password",                t="string",    e="xxx",     d="密码")
 * @ResponseParam(n="avatar",                t="string",    e="xxx",     d="头像")
 * @ResponseParam(n="is_lock",                t="string",    e="xxx",     d="账号状态")
 * @ResponseParam(n="created_at",                t="string",    e="2020-07-01 12:00:00",     d="创建时间")
 * @ResponseParam(n="updated_at",                t="string",    e="2020-07-01 12:00:00",     d="更新时间")
%
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
class SearchAction extends AbstractAction
{
    /**
     * @Inject
     * @var Service
     */
    protected $service;

    public function run($params, $extras, $headers)
    {
        return $this->service->list($params);
    }
}
