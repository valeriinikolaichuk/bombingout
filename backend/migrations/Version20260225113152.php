<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260225113152 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sessions_table ADD users_id INT NOT NULL');
        $this->addSql('ALTER TABLE sessions_table ADD CONSTRAINT FK_1B673A6B67B3B43D FOREIGN KEY (users_id) REFERENCES user_reg (id)');
        $this->addSql('CREATE INDEX IDX_1B673A6B67B3B43D ON sessions_table (users_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sessions_table DROP FOREIGN KEY FK_1B673A6B67B3B43D');
        $this->addSql('DROP INDEX IDX_1B673A6B67B3B43D ON sessions_table');
        $this->addSql('ALTER TABLE sessions_table DROP users_id');
    }
}
