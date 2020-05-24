<?php
declare(strict_types=1);

namespace App\Presentation\Request;

use Symfony\Component\HttpFoundation\Request;

/**
 * Interface RequestHandlerInterface
 *
 * @package TestApiSymfony\Presentation
 * @subpackage Request\Generalisation
 */
interface RequestHandlerInterface
{
    /**
     * Gets the request send through the constructor.
     * @return Request
     */
    public function getRequest(): Request;
}
