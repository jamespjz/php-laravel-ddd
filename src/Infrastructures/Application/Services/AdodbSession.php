<?php
/**
 * Created by PhpStorm.
 * User: jamespi
 * Date: 2021/12/17
 * Time: 10:36
 */

namespace Jamespi\LaravelDdd\Infrastructures\Application\Services;

use Jamespi\LaravelDdd\Infrastructures\Repository\InterfaceRepository;
use Jamespi\LaravelDdd\Application\Services\TransactionalSession;
class AdodbSession implements TransactionalSession
{
    private $connection;

    public function __construct(InterfaceRepository $model)
    {
        $this->connection = $model;
    }

    public function executeAtomically(callable $operation)
    {
        $this->connection->beginTransaction();
        try{
            $outcome = $operation();
            $this->connection->commit();

            return $outcome;
        }catch (\Exception $e){
            $this->connection->rollback();
            throw $e;
        }
    }
}