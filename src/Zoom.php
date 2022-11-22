<?php

namespace MacsiDigital\Zoom;

use Exception;
use Illuminate\Support\Str;
use MacsiDigital\Zoom\Interfaces\PrivateApplication;

class Zoom
{
    public $client;

    public function __construct(array $config, $type = 'Private')
    {
        $function = 'boot'.ucfirst($type).'Application';
        if (method_exists($this, $function)) {
            $this->$function($config);
        } else {
            throw new Exception('Application Interface type not known');
        }
    }

    public function bootPrivateApplication(array $config)
    {
        $this->client = (new PrivateApplication($config));
    }

    public function __get($key)
    {
        return $this->getNode($key);
    }

    public function getNode($key)
    {
        $class = 'MacsiDigital\Zoom\\'.Str::studly($key);
        if (class_exists($class)) {
            return new $class();
        }
        throw new Exception('Wrong method');
    }
}
