<?php

namespace Jamespi\LaravelDdd\Application\Services;

/**
 * Interface ApplicationService
 * @package Ddd\Application\Service
 */
interface ApplicationService
{
    /**
     * @param $request
     * @return mixed
     */
    public function execute($request = null);
}
