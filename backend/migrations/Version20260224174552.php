<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260224174552 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE main_table ADD users_id INT NOT NULL, CHANGE comp_id comp_id INT NOT NULL');
        $this->addSql('ALTER TABLE main_table ADD CONSTRAINT FK_55753C004D0D3BCB FOREIGN KEY (comp_id) REFERENCES competitions (comp_id)');
        $this->addSql('ALTER TABLE main_table ADD CONSTRAINT FK_55753C0067B3B43D FOREIGN KEY (users_id) REFERENCES user_reg (id)');
        $this->addSql('CREATE INDEX IDX_55753C004D0D3BCB ON main_table (comp_id)');
        $this->addSql('CREATE INDEX IDX_55753C0067B3B43D ON main_table (users_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE main_table DROP FOREIGN KEY FK_55753C004D0D3BCB');
        $this->addSql('ALTER TABLE main_table DROP FOREIGN KEY FK_55753C0067B3B43D');
        $this->addSql('DROP INDEX IDX_55753C004D0D3BCB ON main_table');
        $this->addSql('DROP INDEX IDX_55753C0067B3B43D ON main_table');
        $this->addSql('ALTER TABLE main_table DROP users_id, CHANGE comp_id comp_id INT DEFAULT NULL');
    }
}
