<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211221181138 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prestataires ADD url_logo LONGTEXT NOT NULL COMMENT \'(DC2Type:object)\', ADD desc_short LONGTEXT NOT NULL, ADD desc_long LONGTEXT NOT NULL, ADD date_create DATETIME NOT NULL, CHANGE name name VARCHAR(50) NOT NULL, CHANGE website website VARCHAR(125) NOT NULL, CHANGE number_phone number_phone VARCHAR(20) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prestataires_categories DROP FOREIGN KEY FK_6B3A4385A21214B7');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE prestataires_categories');
        $this->addSql('ALTER TABLE prestataires DROP url_logo, DROP desc_short, DROP desc_long, DROP date_create, CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE website website VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE number_phone number_phone VARCHAR(18) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
