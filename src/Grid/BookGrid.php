<?php

declare(strict_types=1);

namespace Guiziweb\SyliusTestPlugin\Grid;

use Guiziweb\SyliusTestPlugin\Entity\Book;
use Sylius\Bundle\GridBundle\Builder\Action\CreateAction;
use Sylius\Bundle\GridBundle\Builder\Action\DeleteAction;
use Sylius\Bundle\GridBundle\Builder\Action\UpdateAction;
use Sylius\Bundle\GridBundle\Builder\ActionGroup\BulkActionGroup;
use Sylius\Bundle\GridBundle\Builder\ActionGroup\ItemActionGroup;
use Sylius\Bundle\GridBundle\Builder\ActionGroup\MainActionGroup;
use Sylius\Bundle\GridBundle\Builder\Field\StringField;
use Sylius\Bundle\GridBundle\Builder\GridBuilderInterface;
use Sylius\Bundle\GridBundle\Grid\AbstractGrid;
use Sylius\Component\Grid\Attribute\AsGrid;

#[AsGrid(
    resourceClass: Book::class,
    name: 'guiziweb_sylius_test_book',
)]
final class BookGrid extends AbstractGrid
{
    public function __invoke(GridBuilderInterface $gridBuilder): void
    {
        $gridBuilder
            ->addField(
                StringField::create('title')
                    ->setLabel('guiziweb_sylius_test.ui.title')
                    ->setSortable(true),
            )
            ->addField(
                StringField::create('author')
                    ->setLabel('guiziweb_sylius_test.ui.author')
                    ->setSortable(true),
            )
            ->addField(
                StringField::create('isbn')
                    ->setLabel('guiziweb_sylius_test.ui.isbn')
                    ->setSortable(true),
            )
            ->addField(
                StringField::create('price')
                    ->setLabel('guiziweb_sylius_test.ui.price')
                    ->setSortable(true),
            )
            ->addActionGroup(
                MainActionGroup::create(
                    CreateAction::create(),
                ),
            )
            ->addActionGroup(
                ItemActionGroup::create(
                    UpdateAction::create(),
                    DeleteAction::create(),
                ),
            )
            ->addActionGroup(
                BulkActionGroup::create(
                    DeleteAction::create(),
                ),
            )
        ;
    }
}
