<?php

namespace App\Console\Commands\Traits;

use ReflectionClass;
use ReflectionMethod;

trait SystemServiceProviderInjector
{
    public function injectCodeToRegisterMethod($appServiceProviderFile, $codeToAdd)
    {
        $reflectionClass = new ReflectionClass(\App\Providers\AppServiceProvider::class);
        $reflectionMethod = $reflectionClass->getMethod('register');

        $methodBody = file($appServiceProviderFile);

        $startLine = $reflectionMethod->getStartLine() - 1;
        $endLine = $reflectionMethod->getEndLine() - 1;

        array_splice($methodBody, $endLine, 0, $codeToAdd);
        $modifiedCode = implode('', $methodBody);

        file_put_contents($appServiceProviderFile, $modifiedCode);
    }
}