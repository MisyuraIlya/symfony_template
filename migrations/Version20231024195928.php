<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231024195928 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_attributes DROP FOREIGN KEY FK_1785CE0EE9E2FE4E');
        $this->addSql('DROP INDEX IDX_1785CE0EE9E2FE4E ON category_attributes');
        $this->addSql('ALTER TABLE category_attributes DROP attribute_main_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_attributes ADD attribute_main_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category_attributes ADD CONSTRAINT FK_1785CE0EE9E2FE4E FOREIGN KEY (attribute_main_id) REFERENCES attribute_main (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_1785CE0EE9E2FE4E ON category_attributes (attribute_main_id)');
    }
}
