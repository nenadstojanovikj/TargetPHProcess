<?php

use Symfony\Component\Console\Application;
use Symfony\Component\DependencyInjection\ContainerBuilder;

function load_commands_to_app(Application $app, ContainerBuilder $container)
{
    $ids = $container->findTaggedServiceIds('console.command');
    foreach ($ids as $service => $id) {
        /** @var \Symfony\Component\Console\Command\Command $command */
        $command = $container->get($service);
        $app->add($command);
    }
}
