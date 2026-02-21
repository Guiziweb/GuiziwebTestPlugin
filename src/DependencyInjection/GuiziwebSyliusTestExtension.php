<?php

declare(strict_types=1);

namespace Guiziweb\SyliusTestPlugin\DependencyInjection;

use Guiziweb\SyliusTestPlugin\Entity\Book;
use Guiziweb\SyliusTestPlugin\Form\Type\BookType;
use Sylius\Bundle\CoreBundle\DependencyInjection\PrependDoctrineMigrationsTrait;
use Sylius\Bundle\ResourceBundle\DependencyInjection\Extension\AbstractResourceExtension;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

final class GuiziwebSyliusTestExtension extends AbstractResourceExtension implements PrependExtensionInterface
{
    use PrependDoctrineMigrationsTrait;

    /** @psalm-suppress UnusedVariable */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $config = $this->processConfiguration($this->getConfiguration([], $container), $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../../config'));

        $loader->load('services.xml');

        $this->registerResources('guiziweb_sylius_test', SyliusResourceBundle::DRIVER_DOCTRINE_ORM, $config['resources'], $container);
    }

    public function prepend(ContainerBuilder $container): void
    {
        $this->prependDoctrineMigrations($container);

        $container->prependExtensionConfig('doctrine', [
            'orm' => [
                'entity_managers' => [
                    'default' => [
                        'mappings' => [
                            'GuiziwebSyliusTestPlugin' => [
                                'is_bundle' => false,
                                'type' => 'attribute',
                                'dir' => dirname(__DIR__) . '/Entity',
                                'prefix' => 'Guiziweb\SyliusTestPlugin\Entity',
                                'alias' => 'GuiziwebSyliusTestPlugin',
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }

    protected function getMigrationsNamespace(): string
    {
        return 'DoctrineMigrations';
    }

    protected function getMigrationsDirectory(): string
    {
        return '@GuiziwebSyliusTestPlugin/src/Migrations';
    }

    protected function getNamespacesOfMigrationsExecutedBefore(): array
    {
        return [
            'Sylius\Bundle\CoreBundle\Migrations',
        ];
    }
}
