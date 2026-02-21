<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260221101700 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create guiziweb_book table';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable('guiziweb_book');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('title', 'string', ['length' => 255]);
        $table->addColumn('author', 'string', ['length' => 255]);
        $table->addColumn('isbn', 'string', ['length' => 13]);
        $table->addColumn('price', 'integer');
        $table->addColumn('createdAt', 'datetime', ['notnull' => false]);
        $table->addColumn('updatedAt', 'datetime', ['notnull' => false]);
        $table->setPrimaryKey(['id']);
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('guiziweb_book');
    }
}
