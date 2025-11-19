<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251109085244 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE computer_status (id_status INT AUTO_INCREMENT NOT NULL, users_ID INT NOT NULL, comp_status VARCHAR(60) NOT NULL, comp_id INT NOT NULL, sessions_name VARCHAR(60) NOT NULL, discipline VARCHAR(60) NOT NULL, attempt INT NOT NULL, users_status VARCHAR(45) NOT NULL, lang VARCHAR(45) NOT NULL, grp_page VARCHAR(120) NOT NULL, realtime DATETIME DEFAULT NULL, PRIMARY KEY(id_status)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE computer_status');
    }
}
