<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231119211351 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE history ADD agent_approved_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE history ADD CONSTRAINT FK_27BA704B5E9F256F FOREIGN KEY (agent_approved_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_27BA704B5E9F256F ON history (agent_approved_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE history DROP FOREIGN KEY FK_27BA704B5E9F256F');
        $this->addSql('DROP INDEX IDX_27BA704B5E9F256F ON history');
        $this->addSql('ALTER TABLE history DROP agent_approved_id');
    }
}
