<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211221182243 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prestataires CHANGE name name VARCHAR(50) NOT NULL, CHANGE website website VARCHAR(125) NOT NULL, CHANGE number_phone number_phone VARCHAR(20) NOT NULL, CHANGE url_logo url_logo LONGTEXT NOT NULL, CHANGE desc_short desc_short LONGTEXT NOT NULL, CHANGE desc_long desc_long LONGTEXT NOT NULL, CHANGE date_create date_create DATETIME NOT NULL');
        $this->addSql('ALTER TABLE prestataires_categories ADD prestataires_id INT NOT NULL, ADD categories_id INT NOT NULL, DROP id_prestataires, DROP id_categories, ADD PRIMARY KEY (prestataires_id, categories_id)');
        $this->addSql('ALTER TABLE prestataires_categories ADD CONSTRAINT FK_6B3A4385B2CAA6B8 FOREIGN KEY (prestataires_id) REFERENCES prestataires (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataires_categories ADD CONSTRAINT FK_6B3A4385A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_6B3A4385B2CAA6B8 ON prestataires_categories (prestataires_id)');
        $this->addSql('CREATE INDEX IDX_6B3A4385A21214B7 ON prestataires_categories (categories_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prestataires_categories DROP FOREIGN KEY FK_6B3A4385A21214B7');
        $this->addSql('DROP TABLE categories');
        $this->addSql('ALTER TABLE prestataires CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE website website VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE number_phone number_phone VARCHAR(18) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE url_logo url_logo VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE desc_short desc_short TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE desc_long desc_long TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_create date_create VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prestataires_categories DROP FOREIGN KEY FK_6B3A4385B2CAA6B8');
        $this->addSql('DROP INDEX IDX_6B3A4385B2CAA6B8 ON prestataires_categories');
        $this->addSql('DROP INDEX IDX_6B3A4385A21214B7 ON prestataires_categories');
        $this->addSql('ALTER TABLE prestataires_categories DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE prestataires_categories ADD id_prestataires INT NOT NULL, ADD id_categories INT NOT NULL, DROP prestataires_id, DROP categories_id');
    }
}
