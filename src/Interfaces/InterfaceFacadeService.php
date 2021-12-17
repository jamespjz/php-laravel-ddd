<?php
/**
 * Created by PhpStorm.
 * User: jamespi
 * Date: 2021/12/17
 * Time: 11:20
 */

namespace Jamespi\LaravelDdd\Interfaces;

use Jamespi\LaravelDdd\Application\Services\TransactionalApplicationService;
use Jamespi\LaravelDdd\Infrastructures\Application\Services\AdodbSession;
abstract class InterfaceFacadeService
{
    public function __construct()
    {
        $txSignInUserService = new TransactionalApplicationService(
            new SignInUserService(
                $em->getRepository('MyBC\Domain\Model\User\User')
            ),
            new AdodbSession($em)
        );
    }
}