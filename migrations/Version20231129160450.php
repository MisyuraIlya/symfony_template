<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231129160450 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE price_list_user DROP FOREIGN KEY FK_4BEC3A5C9D86650F');
        $this->addSql('ALTER TABLE price_list_user DROP FOREIGN KEY FK_4BEC3A5C125F0550');
        $this->addSql('DROP INDEX IDX_4BEC3A5C9D86650F ON price_list_user');
        $this->addSql('DROP INDEX IDX_4BEC3A5C125F0550 ON price_list_user');
        $this->addSql('ALTER TABLE price_list_user ADD user_id INT DEFAULT NULL, ADD price_list_id INT DEFAULT NULL, DROP user_id_id, DROP price_list_id_id');
        $this->addSql('ALTER TABLE price_list_user ADD CONSTRAINT FK_4BEC3A5CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE price_list_user ADD CONSTRAINT FK_4BEC3A5C5688DED7 FOREIGN KEY (price_list_id) REFERENCES price_list (id)');
        $this->addSql('CREATE INDEX IDX_4BEC3A5CA76ED395 ON price_list_user (user_id)');
        $this->addSql('CREATE INDEX IDX_4BEC3A5C5688DED7 ON price_list_user (price_list_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE price_list_user DROP FOREIGN KEY FK_4BEC3A5CA76ED395');
        $this->addSql('ALTER TABLE price_list_user DROP FOREIGN KEY FK_4BEC3A5C5688DED7');
        $this->addSql('DROP INDEX IDX_4BEC3A5CA76ED395 ON price_list_user');
        $this->addSql('DROP INDEX IDX_4BEC3A5C5688DED7 ON price_list_user');
        $this->addSql('ALTER TABLE price_list_user ADD user_id_id INT DEFAULT NULL, ADD price_list_id_id INT DEFAULT NULL, DROP user_id, DROP price_list_id');
        $this->addSql('ALTER TABLE price_list_user ADD CONSTRAINT FK_4BEC3A5C9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE price_list_user ADD CONSTRAINT FK_4BEC3A5C125F0550 FOREIGN KEY (price_list_id_id) REFERENCES price_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_4BEC3A5C9D86650F ON price_list_user (user_id_id)');
        $this->addSql('CREATE INDEX IDX_4BEC3A5C125F0550 ON price_list_user (price_list_id_id)');
    }
}
