<?php

namespace Nexmo\Laravel\Tests;

use Nexmo\Client;

class TestNoNexmoConfiguration extends AbstractTestCase
{
    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('nexmo.api_key', 'my_api_key');
    }

    /**
     * Test that when we do not supply Nexmo configuration
     * a Runtime exception is generated.
     *
     * @return void
     *
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Please provide Nexmo API credentials. Possible combinations: api_key + api_secret, api_key + signature_secret, private_key + application_id, api_key + api_secret + private_key + application_id, api_key + signature_secret + private_key + application_id
     */
    public function testWhenNoConfigurationIsGivenExceptionIsRaised()
    {
        app(Client::class);
    }
}
