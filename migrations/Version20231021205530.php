<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231021205530 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agent (id INT AUTO_INCREMENT NOT NULL, ext_id VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, mail VARCHAR(255) DEFAULT NULL, is_registered TINYINT(1) NOT NULL, is_blocked TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_super_user TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE history ADD is_agent_id INT DEFAULT NULL, ADD document_type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE history ADD CONSTRAINT FK_27BA704BA1BD070F FOREIGN KEY (is_agent_id) REFERENCES agent (id)');
        $this->addSql('CREATE INDEX IDX_27BA704BA1BD070F ON history (is_agent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE history DROP FOREIGN KEY FK_27BA704BA1BD070F');
        $this->addSql('DROP TABLE agent');
        $this->addSql('DROP INDEX IDX_27BA704BA1BD070F ON history');
        $this->addSql('ALTER TABLE history DROP is_agent_id, DROP document_type');
    }
}
