<?php

namespace MacsiDigital\Zoom\Interfaces;

use MacsiDigital\Zoom\Support\Request;

class PrivateApplication extends Base
{
    protected $request;

    public function __construct(array $config)
    {
        $this->request = (new Request)->bootPrivateApplication($config);
    }
}
