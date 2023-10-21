<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231020165223 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_images ADD media_object_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_images ADD CONSTRAINT FK_8263FFCE64DE5A5 FOREIGN KEY (media_object_id) REFERENCES media_object (id)');
        $this->addSql('CREATE INDEX IDX_8263FFCE64DE5A5 ON product_images (media_object_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_images DROP FOREIGN KEY FK_8263FFCE64DE5A5');
        $this->addSql('DROP INDEX IDX_8263FFCE64DE5A5 ON product_images');
        $this->addSql('ALTER TABLE product_images DROP media_object_id');
    }
}
