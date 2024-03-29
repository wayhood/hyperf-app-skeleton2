<?php
declare(strict_types=1);

namespace App\Service;

use Hyperf\Utils\Arr;
use Wayhood\HyperfAction\Util\BaseService;

use App\Contract\AbstractService;


class User extends AbstractService
{
    use BaseService;

    protected $model = \App\Model\User::class;

    //查询详情
    public function get($params)
    {
        $search = $params['search'] ?? [];
        $model = $this->model();
        $query = $this->getWhere($model, $search);
        return $query->first();
    }



    //搜索列表
    public function list($params)
    {
        $search = $params['search'] ?? [];
        $model = $this->model();
        $per_page = $params['per_page'] ?? 10;
        $query = $this->getWhere($model, $search);
        $list = $query->paginate($per_page, ['*']);
        return [
            'current_page' => $list->currentPage(),
            'list' => $list->items(),
            'total' => $list->total(),
        ];
    }

    // 根据id删除单条或者多条数据
    public function delete($params)
    {
        $result = $this->del($params['ids']);
        return [
            'status'=>(bool)$result
        ];
    }

    // 根据ids批量更改或者单条更改数据
    public function set($params)
    {
        $ids = $params['ids'];
        $data = Arr::except($params,'ids');
        $result = $this->update($ids,$data);
        return [
            'status'=>(bool)$result
        ];
    }
}