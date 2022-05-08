<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220508175002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bloc (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blog_post (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE code_postal (id INT AUTO_INCREMENT NOT NULL, code_postal VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commune (id INT AUTO_INCREMENT NOT NULL, commune VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favori (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favori_prestataires (favori_id INT NOT NULL, prestataires_id INT NOT NULL, INDEX IDX_7F426407FF17033F (favori_id), INDEX IDX_7F426407B2CAA6B8 (prestataires_id), PRIMARY KEY(favori_id, prestataires_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favori_internaut (favori_id INT NOT NULL, internaut_id INT NOT NULL, INDEX IDX_8C16E90FFF17033F (favori_id), INDEX IDX_8C16E90F9FE1F53D (internaut_id), PRIMARY KEY(favori_id, internaut_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE internaut (id INT AUTO_INCREMENT NOT NULL, frist_name VARCHAR(10) NOT NULL, last_name VARCHAR(255) NOT NULL, newsletter SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE localite (id INT AUTO_INCREMENT NOT NULL, localite VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, location VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_item (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE municipality (id INT AUTO_INCREMENT NOT NULL, municipality VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newsletter (id INT AUTO_INCREMENT NOT NULL, publish_date DATE NOT NULL, title VARCHAR(255) NOT NULL, document_pdf VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE position (id INT AUTO_INCREMENT NOT NULL, number_asc INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE position_internaut (position_id INT NOT NULL, internaut_id INT NOT NULL, INDEX IDX_D249506ADD842E46 (position_id), INDEX IDX_D249506A9FE1F53D (internaut_id), PRIMARY KEY(position_id, internaut_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE position_bloc (position_id INT NOT NULL, bloc_id INT NOT NULL, INDEX IDX_D4E0BB04DD842E46 (position_id), INDEX IDX_D4E0BB045582E9C0 (bloc_id), PRIMARY KEY(position_id, bloc_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestataire (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, siteweb VARCHAR(255) NOT NULL, num_tel VARCHAR(12) NOT NULL, num_tva VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestataire_categorie_de_services (prestataire_id INT NOT NULL, categorie_de_services_id INT NOT NULL, INDEX IDX_603DD9ABBE3DB2B7 (prestataire_id), INDEX IDX_603DD9AB4A81A587 (categorie_de_services_id), PRIMARY KEY(prestataire_id, categorie_de_services_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestataires_categorys_categorys (prestataires_categorys_id INT NOT NULL, categorys_id INT NOT NULL, INDEX IDX_DA1F49532DD500B (prestataires_categorys_id), INDEX IDX_DA1F495A96778EC (categorys_id), PRIMARY KEY(prestataires_categorys_id, categorys_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestataires_categorys_prestataires (prestataires_categorys_id INT NOT NULL, prestataires_id INT NOT NULL, INDEX IDX_13299E4232DD500B (prestataires_categorys_id), INDEX IDX_13299E42B2CAA6B8 (prestataires_id), PRIMARY KEY(prestataires_categorys_id, prestataires_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE propose (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE favori_prestataires ADD CONSTRAINT FK_7F426407FF17033F FOREIGN KEY (favori_id) REFERENCES favori (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favori_prestataires ADD CONSTRAINT FK_7F426407B2CAA6B8 FOREIGN KEY (prestataires_id) REFERENCES prestataires (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favori_internaut ADD CONSTRAINT FK_8C16E90FFF17033F FOREIGN KEY (favori_id) REFERENCES favori (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favori_internaut ADD CONSTRAINT FK_8C16E90F9FE1F53D FOREIGN KEY (internaut_id) REFERENCES internaut (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE position_internaut ADD CONSTRAINT FK_D249506ADD842E46 FOREIGN KEY (position_id) REFERENCES position (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE position_internaut ADD CONSTRAINT FK_D249506A9FE1F53D FOREIGN KEY (internaut_id) REFERENCES internaut (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE position_bloc ADD CONSTRAINT FK_D4E0BB04DD842E46 FOREIGN KEY (position_id) REFERENCES position (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE position_bloc ADD CONSTRAINT FK_D4E0BB045582E9C0 FOREIGN KEY (bloc_id) REFERENCES bloc (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataire_categorie_de_services ADD CONSTRAINT FK_603DD9ABBE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataire_categorie_de_services ADD CONSTRAINT FK_603DD9AB4A81A587 FOREIGN KEY (categorie_de_services_id) REFERENCES categorie_de_services (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataires_categorys_categorys ADD CONSTRAINT FK_DA1F49532DD500B FOREIGN KEY (prestataires_categorys_id) REFERENCES prestataires_categorys (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataires_categorys_categorys ADD CONSTRAINT FK_DA1F495A96778EC FOREIGN KEY (categorys_id) REFERENCES categorys (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataires_categorys_prestataires ADD CONSTRAINT FK_13299E4232DD500B FOREIGN KEY (prestataires_categorys_id) REFERENCES prestataires_categorys (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataires_categorys_prestataires ADD CONSTRAINT FK_13299E42B2CAA6B8 FOREIGN KEY (prestataires_id) REFERENCES prestataires (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE propose_prestataires');
        $this->addSql('DROP TABLE propose_service_category');
        $this->addSql('DROP TABLE stage_prestataires');
        $this->addSql('ALTER TABLE categorie_de_services DROP enAvant, DROP is_valid, DROP is_visible_homepage, CHANGE nom nom VARCHAR(30) NOT NULL, CHANGE description description VARCHAR(10) NOT NULL, CHANGE en_avant en_avant TINYINT(1) NOT NULL, CHANGE valide valide TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE categorys CHANGE name name VARCHAR(50) NOT NULL, CHANGE url_img url_img VARCHAR(255) NOT NULL, CHANGE description description VARCHAR(255) NOT NULL, CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE categorys ADD CONSTRAINT FK_F76B7134A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F76B7134A76ED395 ON categorys (user_id)');
        $this->addSql('ALTER TABLE images CHANGE ordre ordre INT NOT NULL, CHANGE image image LONGBLOB NOT NULL');
        $this->addSql('ALTER TABLE prestataires DROP nom, DROP siteweb, DROP num_tel, DROP num_tva, DROP description, DROP img_logo, DROP name_street, DROP services, DROP img, CHANGE num_comment num_comment INT NOT NULL, CHANGE is_public is_public TINYINT(1) NOT NULL, CHANGE name name VARCHAR(50) NOT NULL, CHANGE website website VARCHAR(125) NOT NULL, CHANGE number_phone number_phone VARCHAR(20) DEFAULT NULL, CHANGE number_tva number_tva VARCHAR(25) DEFAULT NULL, CHANGE url_logo url_logo VARCHAR(255) NOT NULL, CHANGE desc_short desc_short LONGTEXT NOT NULL, CHANGE desc_long desc_long LONGTEXT NOT NULL, CHANGE date_create date_create DATETIME NOT NULL, CHANGE price price INT NOT NULL, CHANGE category_service category_service VARCHAR(255) NOT NULL, CHANGE num_street num_street INT NOT NULL, CHANGE name_city name_city VARCHAR(255) NOT NULL, CHANGE name_steet name_steet VARCHAR(255) NOT NULL, CHANGE country country VARCHAR(255) NOT NULL, CHANGE num_postal num_postal VARCHAR(255) NOT NULL, CHANGE num_like num_like INT NOT NULL');
        $this->addSql('ALTER TABLE prestataires ADD CONSTRAINT FK_F6D6EE4FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F6D6EE4FA76ED395 ON prestataires (user_id)');
        $this->addSql('ALTER TABLE prestataires_categorys CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE service_category DROP name, DROP descript, DROP enAvant, DROP is_valid, DROP is_visible_homepage');
        $this->addSql('ALTER TABLE services DROP nom, DROP siteweb, DROP num_tel, DROP num_tva, DROP img_logo, DROP is_public, DROP website, DROP number_phone, DROP number_tva, DROP url_logo, DROP desc_short, DROP desc_long, DROP date_create, CHANGE descript descript VARCHAR(255) NOT NULL, CHANGE name name VARCHAR(255) NOT NULL, CHANGE is_visible_homepage is_visible_homepage TINYINT(1) NOT NULL, CHANGE is_valid is_valid TINYINT(1) NOT NULL, CHANGE img img VARCHAR(1000) NOT NULL, CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE services ADD CONSTRAINT FK_7332E169A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_7332E169A76ED395 ON services (user_id)');
        $this->addSql('ALTER TABLE sliders CHANGE url_img url_img VARCHAR(255) NOT NULL, CHANGE en_avant en_avant TINYINT(1) NOT NULL, CHANGE descript descript LONGTEXT NOT NULL, CHANGE name name VARCHAR(100) NOT NULL, CHANGE nanme nanme VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE user DROP localite_id, DROP code_postal_id, DROP commune_id, CHANGE email email VARCHAR(180) NOT NULL, CHANGE is_verified is_verified TINYINT(1) NOT NULL, CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', CHANGE adresse adresse VARCHAR(255) NOT NULL, CHANGE adresse_num adresse_num INT DEFAULT NULL, CHANGE inscription inscription DATETIME DEFAULT NULL, CHANGE type_utilisateur type_utilisateur VARCHAR(10) DEFAULT NULL, CHANGE nb_essais_infructueux nb_essais_infructueux INT DEFAULT NULL, CHANGE banni banni TINYINT(1) NOT NULL, CHANGE inscript_confirm inscript_confirm TINYINT(1) NOT NULL, CHANGE img img VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE position_bloc DROP FOREIGN KEY FK_D4E0BB045582E9C0');
        $this->addSql('ALTER TABLE favori_prestataires DROP FOREIGN KEY FK_7F426407FF17033F');
        $this->addSql('ALTER TABLE favori_internaut DROP FOREIGN KEY FK_8C16E90FFF17033F');
        $this->addSql('ALTER TABLE favori_internaut DROP FOREIGN KEY FK_8C16E90F9FE1F53D');
        $this->addSql('ALTER TABLE position_internaut DROP FOREIGN KEY FK_D249506A9FE1F53D');
        $this->addSql('ALTER TABLE position_internaut DROP FOREIGN KEY FK_D249506ADD842E46');
        $this->addSql('ALTER TABLE position_bloc DROP FOREIGN KEY FK_D4E0BB04DD842E46');
        $this->addSql('ALTER TABLE prestataire_categorie_de_services DROP FOREIGN KEY FK_603DD9ABBE3DB2B7');
        $this->addSql('CREATE TABLE propose_prestataires (id INT DEFAULT NULL) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE propose_service_category (id INT DEFAULT NULL) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE stage_prestataires (id INT DEFAULT NULL) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE bloc');
        $this->addSql('DROP TABLE blog_post');
        $this->addSql('DROP TABLE code_postal');
        $this->addSql('DROP TABLE commune');
        $this->addSql('DROP TABLE favori');
        $this->addSql('DROP TABLE favori_prestataires');
        $this->addSql('DROP TABLE favori_internaut');
        $this->addSql('DROP TABLE internaut');
        $this->addSql('DROP TABLE localite');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE menu_item');
        $this->addSql('DROP TABLE municipality');
        $this->addSql('DROP TABLE newsletter');
        $this->addSql('DROP TABLE position');
        $this->addSql('DROP TABLE position_internaut');
        $this->addSql('DROP TABLE position_bloc');
        $this->addSql('DROP TABLE prestataire');
        $this->addSql('DROP TABLE prestataire_categorie_de_services');
        $this->addSql('DROP TABLE prestataires_categorys_categorys');
        $this->addSql('DROP TABLE prestataires_categorys_prestataires');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE propose');
        $this->addSql('DROP TABLE stage');
        $this->addSql('ALTER TABLE categorie_de_services ADD enAvant TINYINT(1) DEFAULT NULL, ADD is_valid TINYINT(1) DEFAULT NULL, ADD is_visible_homepage INT DEFAULT NULL, CHANGE nom nom VARCHAR(10) DEFAULT NULL, CHANGE description description VARCHAR(10) DEFAULT NULL, CHANGE en_avant en_avant INT DEFAULT NULL, CHANGE valide valide INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorys DROP FOREIGN KEY FK_F76B7134A76ED395');
        $this->addSql('DROP INDEX IDX_F76B7134A76ED395 ON categorys');
        $this->addSql('ALTER TABLE categorys CHANGE name name VARCHAR(50) DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE url_img url_img TEXT DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE images CHANGE ordre ordre INT DEFAULT 1, CHANGE image image TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE prestataires DROP FOREIGN KEY FK_F6D6EE4FA76ED395');
        $this->addSql('DROP INDEX IDX_F6D6EE4FA76ED395 ON prestataires');
        $this->addSql('ALTER TABLE prestataires ADD nom VARCHAR(255) DEFAULT NULL, ADD siteweb TEXT DEFAULT NULL, ADD num_tel VARCHAR(10) DEFAULT NULL, ADD num_tva VARCHAR(50) DEFAULT \'0\', ADD description VARCHAR(250) DEFAULT NULL, ADD img_logo TEXT DEFAULT NULL, ADD name_street TEXT DEFAULT NULL, ADD services TEXT DEFAULT NULL, ADD img TEXT DEFAULT NULL, CHANGE name name VARCHAR(50) DEFAULT NULL, CHANGE website website TEXT DEFAULT NULL, CHANGE number_phone number_phone VARCHAR(50) DEFAULT NULL, CHANGE number_tva number_tva VARCHAR(50) DEFAULT NULL, CHANGE url_logo url_logo TEXT DEFAULT NULL, CHANGE desc_short desc_short TINYTEXT DEFAULT NULL, CHANGE desc_long desc_long TINYTEXT DEFAULT NULL, CHANGE date_create date_create DATETIME DEFAULT NULL, CHANGE is_public is_public TINYINT(1) DEFAULT NULL, CHANGE price price INT DEFAULT NULL, CHANGE category_service category_service TEXT DEFAULT NULL, CHANGE num_street num_street INT DEFAULT NULL, CHANGE name_city name_city VARCHAR(50) DEFAULT NULL, CHANGE name_steet name_steet VARCHAR(255) DEFAULT NULL, CHANGE country country VARCHAR(50) DEFAULT NULL, CHANGE num_postal num_postal VARCHAR(50) DEFAULT NULL, CHANGE num_like num_like INT DEFAULT NULL, CHANGE num_comment num_comment VARCHAR(250) DEFAULT NULL');
        $this->addSql('ALTER TABLE prestataires_categorys MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE prestataires_categorys DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE prestataires_categorys CHANGE id id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service_category ADD name VARCHAR(10) DEFAULT NULL, ADD descript VARCHAR(10) DEFAULT NULL, ADD enAvant TINYINT(1) DEFAULT NULL, ADD is_valid TINYINT(1) DEFAULT NULL, ADD is_visible_homepage INT DEFAULT NULL');
        $this->addSql('ALTER TABLE services DROP FOREIGN KEY FK_7332E169A76ED395');
        $this->addSql('DROP INDEX IDX_7332E169A76ED395 ON services');
        $this->addSql('ALTER TABLE services ADD nom VARCHAR(255) DEFAULT NULL, ADD siteweb VARCHAR(255) DEFAULT NULL, ADD num_tel VARCHAR(10) DEFAULT NULL, ADD num_tva VARCHAR(50) DEFAULT \'0\', ADD img_logo TEXT DEFAULT NULL, ADD is_public TINYINT(1) DEFAULT NULL, ADD website TEXT DEFAULT NULL, ADD number_phone INT DEFAULT NULL, ADD number_tva VARCHAR(50) DEFAULT NULL, ADD url_logo TEXT DEFAULT NULL, ADD desc_short MEDIUMTEXT DEFAULT NULL, ADD desc_long LONGTEXT DEFAULT NULL, ADD date_create DATETIME DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE name name VARCHAR(50) DEFAULT NULL, CHANGE descript descript VARCHAR(250) DEFAULT NULL, CHANGE is_visible_homepage is_visible_homepage INT DEFAULT NULL, CHANGE is_valid is_valid INT DEFAULT NULL, CHANGE img img TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE sliders CHANGE en_avant en_avant INT DEFAULT NULL, CHANGE nanme nanme TEXT DEFAULT NULL, CHANGE name name VARCHAR(50) DEFAULT \'\', CHANGE url_img url_img TEXT DEFAULT NULL, CHANGE descript descript TEXT DEFAULT NULL');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user ADD localite_id INT DEFAULT NULL, ADD code_postal_id INT DEFAULT NULL, ADD commune_id INT DEFAULT NULL, CHANGE email email VARCHAR(70) NOT NULL, CHANGE roles roles TEXT DEFAULT NULL, CHANGE adresse_num adresse_num INT DEFAULT 0, CHANGE adresse adresse TEXT DEFAULT NULL, CHANGE inscription inscription DATE DEFAULT NULL, CHANGE type_utilisateur type_utilisateur INT DEFAULT NULL, CHANGE nb_essais_infructueux nb_essais_infructueux INT DEFAULT 0, CHANGE banni banni TINYINT(1) DEFAULT 0, CHANGE inscript_confirm inscript_confirm TINYINT(1) DEFAULT 0, CHANGE is_verified is_verified TINYINT(1) DEFAULT 0, CHANGE img img TEXT DEFAULT NULL');
    }
}
