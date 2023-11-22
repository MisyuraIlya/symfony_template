<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231119184931 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE history ADD agent_id INT DEFAULT NULL, DROP is_agent_order');
        $this->addSql('ALTER TABLE history ADD CONSTRAINT FK_27BA704B3414710B FOREIGN KEY (agent_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_27BA704B3414710B ON history (agent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE history DROP FOREIGN KEY FK_27BA704B3414710B');
        $this->addSql('DROP INDEX IDX_27BA704B3414710B ON history');
        $this->addSql('ALTER TABLE history ADD is_agent_order TINYINT(1) NOT NULL, DROP agent_id');
    }
}
