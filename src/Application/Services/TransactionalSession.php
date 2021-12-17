<?php

namespace Jamespi\LaravelDdd\Application\Services;

/**
 * Interface TransactionalSession
 * @package Ddd\Application\Service
 */
interface TransactionalSession
{
    /**
     * @param  callable $operation
     * @return mixed
     */
    public function executeAtomically(callable $operation);
}
