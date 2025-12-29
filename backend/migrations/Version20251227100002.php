<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251227100002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql(
            'ALTER TABLE computer_status
                MODIFY users_ID INT DEFAULT 0, 
                MODIFY comp_status VARCHAR(60) DEFAULT "", 
                MODIFY comp_id INT DEFAULT 0, 
                MODIFY sessions_name VARCHAR(60) DEFAULT "", 
                MODIFY discipline VARCHAR(60) DEFAULT "", 
                MODIFY attempt INT DEFAULT 0, 
                MODIFY users_status VARCHAR(45) DEFAULT "", 
                MODIFY lang VARCHAR(45) DEFAULT "", 
                MODIFY grp_page VARCHAR(120) DEFAULT "", 
                MODIFY realtime DATETIME DEFAULT NULL, 
                MODIFY ip_address VARCHAR(45) DEFAULT NULL, 
                MODIFY user_agent VARCHAR(255) DEFAULT NULL'
        );
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql(
            'ALTER TABLE computer_status 
                MODIFY users_ID INT NOT NULL, 
                MODIFY comp_status VARCHAR(60) NOT NULL, 
                MODIFY comp_id INT NOT NULL, 
                MODIFY sessions_name VARCHAR(60) NOT NULL, 
                MODIFY discipline VARCHAR(60) NOT NULL, 
                MODIFY attempt INT NOT NULL, 
                MODIFY users_status VARCHAR(45) NOT NULL, 
                MODIFY lang VARCHAR(45) NOT NULL, 
                MODIFY grp_page VARCHAR(120) NOT NULL, 
                MODIFY realtime DATETIME NOT NULL, 
                MODIFY ip_address VARCHAR(45) NOT NULL, 
                MODIFY user_agent VARCHAR(255) NOT NULL'
        );
    }
}
