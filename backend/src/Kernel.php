<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Yaml\Yaml;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    // Підключаємо сервіси з PARSE_CUSTOM_TAGS
    protected function build(ContainerBuilder $container): void
    {
        parent::build($container);

        $loader = new YamlFileLoader($container, new FileLocator($this->getProjectDir() . '/config'));
        $loader->load('services.yaml', 'yaml', Yaml::PARSE_CUSTOM_TAGS);
    }

    // Якщо ще є configureContainer/Routes, залишаємо їх
}
