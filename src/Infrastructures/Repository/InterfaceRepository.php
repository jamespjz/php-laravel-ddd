<?php
/**
 * Created by PhpStorm.
 * User: jamespi
 * Date: 2021/12/17
 * Time: 16:07
 */

namespace Jamespi\LaravelDdd\Infrastructures\Repository;

use Jamespi\LaravelDdd\Infrastructures\Model\DddModel;
interface InterfaceRepository
{
    /**
     * InterfaceRepository constructor.
     * @param DddModel $model
     */
    public function __construct(DddModel $model);
    /**
     * 单条查询
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * 列表查询
     * @return mixed
     */
    public function all();

    /**
     * 新增
     * @return mixed
     */
    public function insert();

    /**
     * 修改
     * @return mixed
     */
    public function update();

    /**
     * 删除
     * @return mixed
     */
    public function delete();
}