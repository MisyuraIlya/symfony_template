<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231115180030 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent_objective ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE agent_objective ADD CONSTRAINT FK_4EC2774519EB6921 FOREIGN KEY (client_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_4EC2774519EB6921 ON agent_objective (client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent_objective DROP FOREIGN KEY FK_4EC2774519EB6921');
        $this->addSql('DROP INDEX IDX_4EC2774519EB6921 ON agent_objective');
        $this->addSql('ALTER TABLE agent_objective DROP client_id');
    }
}
