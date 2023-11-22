<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231114173019 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agent_objective (id INT AUTO_INCREMENT NOT NULL, agent_id INT DEFAULT NULL, is_completed TINYINT(1) NOT NULL, completed_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', title VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, week1 TINYINT(1) NOT NULL, week2 TINYINT(1) NOT NULL, week3 TINYINT(1) NOT NULL, week4 TINYINT(1) NOT NULL, hour_from VARCHAR(255) DEFAULT NULL, hour_to VARCHAR(255) DEFAULT NULL, choosed_day VARCHAR(255) DEFAULT NULL, date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', objective_type VARCHAR(255) NOT NULL, INDEX IDX_4EC277453414710B (agent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agent_target (id INT AUTO_INCREMENT NOT NULL, agent_id INT DEFAULT NULL, month VARCHAR(255) DEFAULT NULL, year VARCHAR(255) DEFAULT NULL, current_value INT NOT NULL, target_value INT NOT NULL, is_completed TINYINT(1) NOT NULL, INDEX IDX_188878DA3414710B (agent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agent_objective ADD CONSTRAINT FK_4EC277453414710B FOREIGN KEY (agent_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE agent_target ADD CONSTRAINT FK_188878DA3414710B FOREIGN KEY (agent_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent_objective DROP FOREIGN KEY FK_4EC277453414710B');
        $this->addSql('ALTER TABLE agent_target DROP FOREIGN KEY FK_188878DA3414710B');
        $this->addSql('DROP TABLE agent_objective');
        $this->addSql('DROP TABLE agent_target');
    }
}
