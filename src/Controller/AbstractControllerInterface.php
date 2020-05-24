<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 * Interface AbstractControllerInterface
 * @package App\Controller
 */
interface AbstractControllerInterface
{
    /**
     * @return Response
     */
    public function processAction(): Response;
}