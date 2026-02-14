<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260214164922 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE main_table (main_id INT AUTO_INCREMENT NOT NULL, surname_name VARCHAR(150) DEFAULT NULL, date_of_birth VARCHAR(100) DEFAULT NULL, bodyweight NUMERIC(5, 2) DEFAULT NULL, category VARCHAR(45) DEFAULT NULL, category_num INT DEFAULT NULL, grp INT NOT NULL, lot INT DEFAULT NULL, rank_class VARCHAR(45) DEFAULT NULL, region VARCHAR(45) DEFAULT NULL, city VARCHAR(45) DEFAULT NULL, club VARCHAR(45) DEFAULT NULL, trener_1 VARCHAR(100) DEFAULT NULL, trener_2 VARCHAR(100) DEFAULT NULL, trener_3 VARCHAR(100) DEFAULT NULL, trener_4 VARCHAR(100) DEFAULT NULL, titles VARCHAR(255) DEFAULT NULL, personally INT DEFAULT NULL, out_of_comp INT DEFAULT NULL, md INT DEFAULT NULL, dbl INT DEFAULT NULL, squat_nom NUMERIC(4, 1) NOT NULL, bench_press_nom NUMERIC(4, 1) NOT NULL, deadlift_nom NUMERIC(4, 1) NOT NULL, total_nom NUMERIC(5, 1) NOT NULL, squat_1 NUMERIC(4, 1) NOT NULL, squat_1_res NUMERIC(4, 1) NOT NULL, squat_1_css VARCHAR(100) NOT NULL, squat_1_fcst NUMERIC(4, 1) NOT NULL, squat_2 NUMERIC(4, 1) NOT NULL, squat_2_res NUMERIC(4, 1) NOT NULL, squat_2_css VARCHAR(100) NOT NULL, squat_2_fcst NUMERIC(4, 1) NOT NULL, squat_3 NUMERIC(4, 1) NOT NULL, squat_3_res NUMERIC(4, 1) NOT NULL, squat_3_css VARCHAR(100) NOT NULL, squat_3_fcst NUMERIC(4, 1) NOT NULL, squat_4 NUMERIC(4, 1) NOT NULL, squat_4_res NUMERIC(4, 1) NOT NULL, squat_4_css VARCHAR(100) NOT NULL, squat_4_fcst NUMERIC(4, 1) NOT NULL, squat_res NUMERIC(4, 1) NOT NULL, squat_fcst NUMERIC(4, 1) NOT NULL, bench_press_1 NUMERIC(4, 1) NOT NULL, bench_press_1_res NUMERIC(4, 1) NOT NULL, bench_press_1_css VARCHAR(100) NOT NULL, bench_press_1_fcst NUMERIC(4, 1) NOT NULL, bench_press_2 NUMERIC(4, 1) NOT NULL, bench_press_2_res NUMERIC(4, 1) NOT NULL, bench_press_2_css VARCHAR(100) NOT NULL, bench_press_2_fcst NUMERIC(4, 1) NOT NULL, bench_press_3 NUMERIC(4, 1) NOT NULL, bench_press_3_res NUMERIC(4, 1) NOT NULL, bench_press_3_css VARCHAR(100) NOT NULL, bench_press_3_fcst NUMERIC(4, 1) NOT NULL, bench_press_4 NUMERIC(4, 1) NOT NULL, bench_press_4_res NUMERIC(4, 1) NOT NULL, bench_press_4_css VARCHAR(100) NOT NULL, bench_press_4_fcst NUMERIC(4, 1) NOT NULL, bench_press_res NUMERIC(4, 1) NOT NULL, bench_press_fcst NUMERIC(4, 1) NOT NULL, deadlift_1 NUMERIC(4, 1) NOT NULL, deadlift_1_res NUMERIC(4, 1) NOT NULL, deadlift_1_css VARCHAR(100) NOT NULL, deadlift_1_fcst NUMERIC(4, 1) NOT NULL, deadlift_2 NUMERIC(4, 1) NOT NULL, deadlift_2_res NUMERIC(4, 1) NOT NULL, deadlift_2_css VARCHAR(100) NOT NULL, deadlift_2_fcst NUMERIC(4, 1) NOT NULL, deadlift_3 NUMERIC(4, 1) NOT NULL, deadlift_3_res NUMERIC(4, 1) NOT NULL, deadlift_3_css VARCHAR(100) NOT NULL, deadlift_3_fcst NUMERIC(4, 1) NOT NULL, deadlift_4 NUMERIC(4, 1) NOT NULL, deadlift_4_res NUMERIC(4, 1) NOT NULL, deadlift_4_css VARCHAR(100) NOT NULL, deadlift_4_fcst NUMERIC(4, 1) NOT NULL, deadlift_res NUMERIC(4, 1) NOT NULL, deadlift_fcst NUMERIC(4, 1) NOT NULL, total_1_att NUMERIC(5, 1) NOT NULL, total NUMERIC(5, 1) NOT NULL, total_fcst NUMERIC(5, 1) NOT NULL, coef NUMERIC(5, 4) NOT NULL, coef_squat NUMERIC(5, 2) NOT NULL, coef_squat_fcst NUMERIC(5, 2) NOT NULL, coef_bench_press NUMERIC(5, 2) NOT NULL, coef_bench_press_fcst NUMERIC(5, 2) NOT NULL, coef_deadlift NUMERIC(5, 2) NOT NULL, coef_deadlift_fcst NUMERIC(5, 2) NOT NULL, coef_total NUMERIC(6, 2) NOT NULL, coef_total_fcst NUMERIC(6, 2) NOT NULL, squat_rnk INT DEFAULT NULL, squat_rnk_fcst INT DEFAULT NULL, bench_press_rnk INT DEFAULT NULL, bench_press_rnk_fcst INT DEFAULT NULL, deadlift_rnk INT DEFAULT NULL, deadlift_rnk_fcst INT DEFAULT NULL, ranking INT DEFAULT NULL, rnk_fcst INT DEFAULT NULL, points INT DEFAULT NULL, points_bp INT DEFAULT NULL, comp_id INT DEFAULT NULL, PRIMARY KEY(main_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE computer_status CHANGE users_ID users_ID INT DEFAULT 0 NOT NULL, CHANGE comp_status comp_status VARCHAR(60) DEFAULT \'\' NOT NULL, CHANGE comp_id comp_id INT DEFAULT 0 NOT NULL, CHANGE sessions_name sessions_name VARCHAR(60) DEFAULT \'\' NOT NULL, CHANGE discipline discipline VARCHAR(60) DEFAULT \'\' NOT NULL, CHANGE attempt attempt INT DEFAULT 0 NOT NULL, CHANGE users_status users_status VARCHAR(45) DEFAULT \'\' NOT NULL, CHANGE lang lang VARCHAR(45) DEFAULT \'\' NOT NULL, CHANGE grp_page grp_page VARCHAR(120) DEFAULT \'\' NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE main_table');
        $this->addSql('ALTER TABLE computer_status CHANGE users_ID users_ID INT DEFAULT 0, CHANGE comp_status comp_status VARCHAR(60) DEFAULT \'\', CHANGE comp_id comp_id INT DEFAULT 0, CHANGE sessions_name sessions_name VARCHAR(60) DEFAULT \'\', CHANGE discipline discipline VARCHAR(60) DEFAULT \'\', CHANGE attempt attempt INT DEFAULT 0, CHANGE users_status users_status VARCHAR(45) DEFAULT \'\', CHANGE lang lang VARCHAR(45) DEFAULT \'\', CHANGE grp_page grp_page VARCHAR(120) DEFAULT \'\'');
    }
}
