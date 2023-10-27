<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231024203110 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sub_attribute DROP FOREIGN KEY FK_E877A9454584665A');
        $this->addSql('DROP INDEX IDX_E877A9454584665A ON sub_attribute');
        $this->addSql('ALTER TABLE sub_attribute DROP product_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sub_attribute ADD product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sub_attribute ADD CONSTRAINT FK_E877A9454584665A FOREIGN KEY (product_id) REFERENCES product (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_E877A9454584665A ON sub_attribute (product_id)');
    }
}
