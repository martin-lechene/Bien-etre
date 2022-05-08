<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220508181435 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Source file of database';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorys (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NOT NULL, name VARCHAR(50) NULL, description VARCHAR(255) NULL, url_img VARCHAR(255) NULL, created_at DATETIME NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_F76B7134A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestataires (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NOT NULL, name VARCHAR(50) NOT NULL, website VARCHAR(125) NULL, number_phone VARCHAR(20) NULL, number_tva VARCHAR(25) NULL, url_logo VARCHAR(255) NULL, desc_short LONGTEXT NULL, desc_long LONGTEXT NULL, date_create DATETIME NULL, is_public TINYINT(1) NULL, price INT NULL, category_service VARCHAR(255) NULL, num_street INT NULL, name_city VARCHAR(255) NULL, name_steet VARCHAR(255) NULL, country VARCHAR(255) NULL, num_postal VARCHAR(255) NULL, num_like INT NULL, num_comment INT NULL, INDEX IDX_F6D6EE4FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestataires_categorys (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sliders (id INT AUTO_INCREMENT NOT NULL, en_avant TINYINT(1) NULL, nanme VARCHAR(100) NULL, name VARCHAR(100) NULL, url_img VARCHAR(255) NULL, descript LONGTEXT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NULL, roles LONGTEXT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NULL, inscription DATETIME NULL, type_utilisateur VARCHAR(10) NULL, nb_essais_infructueux INT NULL, banni TINYINT(1) NULL, inscript_confirm TINYINT(1) NULL, is_verified TINYINT(1) NULL, price INT NULL, img VARCHAR(255) NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorys ADD CONSTRAINT FK_F76B7134A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE prestataires ADD CONSTRAINT FK_F6D6EE4FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorys DROP FOREIGN KEY FK_F76B7134A76ED395');
        $this->addSql('ALTER TABLE prestataires DROP FOREIGN KEY FK_F6D6EE4FA76ED395');
        $this->addSql('DROP TABLE categorys');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE prestataires');
        $this->addSql('DROP TABLE sliders');
        $this->addSql('DROP TABLE user');
    }
}
