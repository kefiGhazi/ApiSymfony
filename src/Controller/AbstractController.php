<?php
declare(strict_types=1);

namespace App\Controller;

use App\Presentation\Adapter\RequestAdapterInterface;
use App\Presentation\Request\RequestHandlerInterface;
use App\Presentation\Response\ResponseHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AbstractController
 * @package App\Controller
 */
Abstract class AbstractController implements AbstractControllerInterface
{
    protected RequestHandlerInterface $request;
    protected RequestAdapterInterface $adapter;
    protected EntityManagerInterface $em;
    protected ResponseHandlerInterface $response;

    /**
     * PostSubscription constructor.
     * @param RequestHandlerInterface $request
     * @param RequestAdapterInterface $adapter
     * @param EntityManagerInterface $em
     * @param ResponseHandlerInterface $response
     */
    public function __construct(
        RequestHandlerInterface $request,
        RequestAdapterInterface $adapter,
        EntityManagerInterface $em,
        ResponseHandlerInterface $response
    )
    {
        $this->request = $request;
        $this->adapter = $adapter;
        $this->em = $em;
        $this->response = $response;
    }

    /**
     * @return Response
     */
    abstract public function processAction(): Response;
}