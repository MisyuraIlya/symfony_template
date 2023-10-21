<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231021140846 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ADD default_image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD3BE11523 FOREIGN KEY (default_image_id) REFERENCES product_images (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D34A04AD3BE11523 ON product (default_image_id)');
        $this->addSql('ALTER TABLE product_images DROP FOREIGN KEY FK_8263FFCE3BE11523');
        $this->addSql('DROP INDEX UNIQ_8263FFCE3BE11523 ON product_images');
        $this->addSql('ALTER TABLE product_images DROP default_image_id, DROP created_at, DROP updated_at, DROP image_path');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD3BE11523');
        $this->addSql('DROP INDEX UNIQ_D34A04AD3BE11523 ON product');
        $this->addSql('ALTER TABLE product DROP default_image_id');
        $this->addSql('ALTER TABLE product_images ADD default_image_id INT DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD image_path VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE product_images ADD CONSTRAINT FK_8263FFCE3BE11523 FOREIGN KEY (default_image_id) REFERENCES media_object (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8263FFCE3BE11523 ON product_images (default_image_id)');
    }
}
