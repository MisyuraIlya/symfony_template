<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231028084424 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_attributes DROP FOREIGN KEY FK_1785CE0E12469DE2');
        $this->addSql('ALTER TABLE category_attributes DROP FOREIGN KEY FK_1785CE0E2788BC83');
        $this->addSql('DROP TABLE category_attributes');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_attributes (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, attribute_sub_id INT DEFAULT NULL, INDEX IDX_1785CE0E12469DE2 (category_id), INDEX IDX_1785CE0E2788BC83 (attribute_sub_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE category_attributes ADD CONSTRAINT FK_1785CE0E12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE category_attributes ADD CONSTRAINT FK_1785CE0E2788BC83 FOREIGN KEY (attribute_sub_id) REFERENCES sub_attribute (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
