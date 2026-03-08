<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260308173133 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // drop foreign key
        $this->addSql('ALTER TABLE main_table DROP FOREIGN KEY FK_55753C004D0D3BCB');

        // change column types
        $this->addSql('ALTER TABLE competitions CHANGE comp_id comp_id CHAR(36) NOT NULL');
        $this->addSql('ALTER TABLE main_table CHANGE comp_id comp_id CHAR(36) NOT NULL');
        $this->addSql('ALTER TABLE computer_status CHANGE comp_id comp_id CHAR(36) NOT NULL');
        $this->addSql('ALTER TABLE sessions_table CHANGE comp_id comp_id CHAR(36) NOT NULL');

        // recreate foreign key
        $this->addSql('ALTER TABLE main_table ADD CONSTRAINT FK_55753C004D0D3BCB FOREIGN KEY (comp_id) REFERENCES competitions (comp_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE main_table DROP FOREIGN KEY FK_55753C004D0D3BCB');

        $this->addSql('ALTER TABLE competitions CHANGE comp_id comp_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE main_table CHANGE comp_id comp_id INT NOT NULL');
        $this->addSql('ALTER TABLE computer_status CHANGE comp_id comp_id INT NOT NULL');
        $this->addSql('ALTER TABLE sessions_table CHANGE comp_id comp_id INT NOT NULL');

        $this->addSql('ALTER TABLE main_table ADD CONSTRAINT FK_55753C004D0D3BCB FOREIGN KEY (comp_id) REFERENCES competitions (comp_id)');
    }
}
