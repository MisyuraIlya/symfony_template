<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231130151606 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pack_main (id INT AUTO_INCREMENT NOT NULL, ext_id VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, quantity INT DEFAULT NULL, barcode VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pack_products (id INT AUTO_INCREMENT NOT NULL, pack_id INT DEFAULT NULL, product_id INT DEFAULT NULL, INDEX IDX_9D351E4B1919B217 (pack_id), INDEX IDX_9D351E4B4584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pack_products ADD CONSTRAINT FK_9D351E4B1919B217 FOREIGN KEY (pack_id) REFERENCES pack_main (id)');
        $this->addSql('ALTER TABLE pack_products ADD CONSTRAINT FK_9D351E4B4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pack_products DROP FOREIGN KEY FK_9D351E4B1919B217');
        $this->addSql('ALTER TABLE pack_products DROP FOREIGN KEY FK_9D351E4B4584665A');
        $this->addSql('DROP TABLE pack_main');
        $this->addSql('DROP TABLE pack_products');
    }
}
