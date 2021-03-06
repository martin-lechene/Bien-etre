<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220508182450 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie_de_services (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorys (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, description VARCHAR(255) NOT NULL, url_img LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_F76B7134A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, ordre INT NOT NULL, image LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestataires (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, website VARCHAR(125) NOT NULL, number_phone VARCHAR(20) NOT NULL, number_tva VARCHAR(25) NOT NULL, url_logo VARCHAR(255) NOT NULL, desc_short LONGTEXT NOT NULL, desc_long LONGTEXT NOT NULL, date_create DATETIME NOT NULL, is_public TINYINT(1) NOT NULL, price INT NOT NULL, category_service VARCHAR(255) NOT NULL, num_street INT DEFAULT NULL, name_city VARCHAR(255) NOT NULL, name_steet VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, num_postal VARCHAR(255) NOT NULL, num_like INT NOT NULL, num_comment INT NOT NULL, INDEX IDX_F6D6EE4FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service_category (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sliders (id INT AUTO_INCREMENT NOT NULL, en_avant TINYINT(1) NOT NULL, nanme VARCHAR(100) DEFAULT NULL, name VARCHAR(100) NOT NULL, url_img VARCHAR(255) NOT NULL, descript LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, inscription DATETIME NOT NULL, type_utilisateur VARCHAR(10) DEFAULT NULL, nb_essais_infructueux INT NOT NULL, banni TINYINT(1) NOT NULL, inscript_confirm TINYINT(1) NOT NULL, is_verified TINYINT(1) NOT NULL, price INT NOT NULL, img VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorys ADD CONSTRAINT FK_F76B7134A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE prestataires ADD CONSTRAINT FK_F6D6EE4FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorys DROP FOREIGN KEY FK_F76B7134A76ED395');
        $this->addSql('ALTER TABLE prestataires DROP FOREIGN KEY FK_F6D6EE4FA76ED395');
        $this->addSql('DROP TABLE bloc');
        $this->addSql('DROP TABLE blog_post');
        $this->addSql('DROP TABLE categorie_de_services');
        $this->addSql('DROP TABLE categorys');
        $this->addSql('DROP TABLE code_postal');
        $this->addSql('DROP TABLE commune');
        $this->addSql('DROP TABLE favori');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE internaut');
        $this->addSql('DROP TABLE localite');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE menu_item');
        $this->addSql('DROP TABLE municipality');
        $this->addSql('DROP TABLE newsletter');
        $this->addSql('DROP TABLE position');
        $this->addSql('DROP TABLE prestataire');
        $this->addSql('DROP TABLE prestataires');
        $this->addSql('DROP TABLE prestataires_categorys');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE propose');
        $this->addSql('DROP TABLE service_category');
        $this->addSql('DROP TABLE services');
        $this->addSql('DROP TABLE sliders');
        $this->addSql('DROP TABLE stage');
        $this->addSql('DROP TABLE user');
    }
}
