<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20251123XXXXXX extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add ip_address and user_agent до таблиці computer_status';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE computer_status ADD ip_address VARCHAR(45) NOT NULL, ADD user_agent VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE computer_status DROP COLUMN ip_address, DROP COLUMN user_agent');
    }
}
