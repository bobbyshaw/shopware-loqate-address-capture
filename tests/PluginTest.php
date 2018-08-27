<?php

namespace BobbyshawLoqateAddressCapture\Tests;

use BobbyshawLoqateAddressCapture\BobbyshawLoqateAddressCapture as Plugin;
use Shopware\Components\Test\Plugin\TestCase;

class PluginTest extends TestCase
{
    protected static $ensureLoadedPlugins = [
        'BobbyshawLoqateAddressCapture' => []
    ];

    public function testCanCreateInstance()
    {
        /** @var Plugin $plugin */
        $plugin = Shopware()->Container()->get('kernel')->getPlugins()['BobbyshawLoqateAddressCapture'];

        $this->assertInstanceOf(Plugin::class, $plugin);
    }
}
