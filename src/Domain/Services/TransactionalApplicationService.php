<?php
/**
 * Created by PhpStorm.
 * User: jamespi
 * Date: 2021/12/16
 * Time: 18:01
 */

namespace Jamespi\LaravelDdd\Domain\Services;


class TransactionalApplicationService implements ApplicationService
{
    /**
     * @var ApplicationService
     */
    protected $service;
    /**
     * @var TransactionalSession
     */
    protected $session;

    /**
     * TransactionalApplicationService constructor.
     * @param ApplicationService $service
     * @param TransactionalSession $session
     */
    public function __construct(ApplicationService $service, TransactionalSession $session)
    {
        $this->service = $service;
        $this->session = $session;
    }


    public function execute($request = null)
    {
        if (empty($this->service)){
            throw new ('必须指定实例');
        }
        $operation = function () use($request) {
            $this->service->execute($request);
        };

        $this->session->executeAtomically($operation);
    }
}