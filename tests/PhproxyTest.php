<?php

namespace Borkness\Phproxy\Tests;

class PhproxyTest extends \PHPUnit\Framework\TestCase
{
    public function testContainerCanBeSetAsInstanceResolver()
    {
        $container = new \DI\Container();
        \Borkness\Phproxy\Phproxy::setInstanceResolver($container);
        $this->assertInstanceOf(\DI\Container::class, \Borkness\Phproxy\Phproxy::getInstanceResolver());
    }

    public function testClassCanBeProxied()
    {
        $container = new \DI\Container();
        $container->set('cow', \DI\create(Cow::class));
        \Borkness\Phproxy\Phproxy::setInstanceResolver($container);

        $cowGoes = CowProxy::moo();

        $this->assertEquals('MOOOOOOOOO', $cowGoes);
    }
}
