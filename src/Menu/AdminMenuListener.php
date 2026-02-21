<?php

declare(strict_types=1);

namespace Guiziweb\SyliusTestPlugin\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $catalog = $menu->getChild('catalog');

        if (null === $catalog) {
            $catalog = $menu
                ->addChild('catalog')
                ->setLabel('sylius.menu.admin.main.catalog.header')
            ;
        }

        $catalog
            ->addChild('books', [
                'route' => 'guiziweb_sylius_test_admin_book_index',
            ])
            ->setLabel('guiziweb_sylius_test.ui.books')
            ->setLabelAttribute('icon', 'book')
        ;
    }
}
