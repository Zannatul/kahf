<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class ServiceInterfaceMakeCommand extends GeneratorCommand
{
    protected $signature = 'make:service_interface {name}';
    protected $description = 'Create a new Interface class';

    protected function getStub()
    {
        return __DIR__ . '/stubs/interface.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\\Services\\ServiceInterfaces';
    }
}
