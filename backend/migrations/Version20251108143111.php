<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251108143111 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competitions (comp_id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, competition_name VARCHAR(150) DEFAULT NULL, country VARCHAR(60) DEFAULT NULL, city VARCHAR(60) DEFAULT NULL, start_date DATE DEFAULT NULL, end_date DATE DEFAULT NULL, division VARCHAR(8) DEFAULT NULL, age_group VARCHAR(15) DEFAULT NULL, sex VARCHAR(15) DEFAULT NULL, type VARCHAR(30) DEFAULT NULL, categories VARCHAR(30) DEFAULT NULL, nomination VARCHAR(45) DEFAULT NULL, preliminary DATE DEFAULT NULL, final DATE DEFAULT NULL, INDEX IDX_A7DD463D67B3B43D (users_id), PRIMARY KEY(comp_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_reg (id INT AUTO_INCREMENT NOT NULL, user VARCHAR(30) DEFAULT NULL, password VARCHAR(30) DEFAULT NULL, status VARCHAR(12) DEFAULT NULL, nominations_id INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competitions ADD CONSTRAINT FK_A7DD463D67B3B43D FOREIGN KEY (users_id) REFERENCES user_reg (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competitions DROP FOREIGN KEY FK_A7DD463D67B3B43D');
        $this->addSql('DROP TABLE competitions');
        $this->addSql('DROP TABLE user_reg');
    }
}
