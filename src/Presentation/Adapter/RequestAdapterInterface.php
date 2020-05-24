<?php
declare(strict_types=1);

namespace  App\Presentation\Adapter;

use Symfony\Component\HttpFoundation\Request;

/**
 * Interface RequestAdapterInterface
 * @package App\Request\Presentation\Adapter
 */
interface RequestAdapterInterface
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function buildCommandFromRequest(Request $request);
}