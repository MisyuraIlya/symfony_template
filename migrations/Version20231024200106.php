<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231024200106 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_attributes ADD attribute_sub_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category_attributes ADD CONSTRAINT FK_1785CE0E2788BC83 FOREIGN KEY (attribute_sub_id) REFERENCES sub_attribute (id)');
        $this->addSql('CREATE INDEX IDX_1785CE0E2788BC83 ON category_attributes (attribute_sub_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_attributes DROP FOREIGN KEY FK_1785CE0E2788BC83');
        $this->addSql('DROP INDEX IDX_1785CE0E2788BC83 ON category_attributes');
        $this->addSql('ALTER TABLE category_attributes DROP attribute_sub_id');
    }
}
