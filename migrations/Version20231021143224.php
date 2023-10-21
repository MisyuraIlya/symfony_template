<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231021143224 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD3BE11523');
        $this->addSql('DROP INDEX UNIQ_D34A04AD3BE11523 ON product');
        $this->addSql('ALTER TABLE product ADD default_image VARCHAR(255) DEFAULT NULL, DROP default_image_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ADD default_image_id INT DEFAULT NULL, DROP default_image');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD3BE11523 FOREIGN KEY (default_image_id) REFERENCES product_images (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D34A04AD3BE11523 ON product (default_image_id)');
    }
}
