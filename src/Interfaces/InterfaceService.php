<?php
/**
 * Created by PhpStorm.
 * User: jamespi
 * Date: 2021/12/16
 * Time: 16:18
 */

namespace Jamespi\LaravelDdd\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\AbstractPaginator;
use Jamespi\LaravelDdd\Infrastructures\Model\DddModel;
abstract class InterfaceService
{
    /**
     * PO数据转换成DTO
     * @param array $data
     * @return array|AbstractPaginator|Collection
     */
    public function response(array $data = []){
        if ($data instanceof DddModel) {
            $dtoClass = get_class($data);
            $response = new $dtoClass($data->getAttributes());
        } elseif ($data instanceof Collection) {
            $dtoClass = get_class($data->first());
            $response = new Collection;
            foreach ($data->getIterator() as $row) {
                $response->add(new $dtoClass($row->getAttributes()));
            }
        } elseif ($data instanceof AbstractPaginator) {
            $dtoClass = get_class($data->first());
            $collection = new Collection;
            foreach ($data->getIterator() as $row) {
                $collection->add(new $dtoClass($row->getAttributes()));
            }
            $data->setCollection($collection);
            $response = $data;
        } else {
            $response = $data;
        }
        return $response;
    }
}