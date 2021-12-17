<?php
/**
 * Created by PhpStorm.
 * User: jamespi
 * Date: 2021/12/17
 * Time: 11:20
 */

namespace Jamespi\LaravelDdd\Application\Services;

abstract class AppInterfaceService implements ApplicationService
{

    abstract public function execute($request = null);
}