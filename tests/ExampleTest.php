<?php

namespace Vitorhugodotpt\NovaViewMiddleware\Tests;

use Orchestra\Testbench\TestCase;
use Vitorhugodotpt\NovaViewMiddleware\NovaViewMiddlewareServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [NovaViewMiddlewareServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
