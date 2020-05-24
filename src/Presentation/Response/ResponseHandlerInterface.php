<?php
declare(strict_types=1);

namespace App\Presentation\Response;

use Symfony\Component\HttpFoundation\Response;

/**
 * Interface ResponseHandlerInterface
 *
 * @package App\Presentation\Response
 */
interface ResponseHandlerInterface
{
    /**
     * Create the Symfony response object to return it.
     *
     * @param mixed $content
     * @param int $status
     * @param null|string[] $headers
     * @return Response
     */
    public function build($content, int $status, ?array $headers = null): Response;
}
