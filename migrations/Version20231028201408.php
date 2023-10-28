<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231028201408 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE error (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT DEFAULT NULL, json LONGTEXT DEFAULT NULL, function_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE history ADD error_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE history ADD CONSTRAINT FK_27BA704B836088D7 FOREIGN KEY (error_id) REFERENCES error (id)');
        $this->addSql('CREATE INDEX IDX_27BA704B836088D7 ON history (error_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE history DROP FOREIGN KEY FK_27BA704B836088D7');
        $this->addSql('DROP TABLE error');
        $this->addSql('DROP INDEX IDX_27BA704B836088D7 ON history');
        $this->addSql('ALTER TABLE history DROP error_id');
    }
}
