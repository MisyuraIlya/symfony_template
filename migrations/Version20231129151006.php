<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231129151006 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE price_list_user (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, price_list_id_id INT DEFAULT NULL, expired_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_4BEC3A5C9D86650F (user_id_id), INDEX IDX_4BEC3A5C125F0550 (price_list_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE price_list_user ADD CONSTRAINT FK_4BEC3A5C9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE price_list_user ADD CONSTRAINT FK_4BEC3A5C125F0550 FOREIGN KEY (price_list_id_id) REFERENCES price_list (id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6495688DED7');
        $this->addSql('DROP INDEX IDX_8D93D6495688DED7 ON user');
        $this->addSql('ALTER TABLE user DROP price_list_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE price_list_user DROP FOREIGN KEY FK_4BEC3A5C9D86650F');
        $this->addSql('ALTER TABLE price_list_user DROP FOREIGN KEY FK_4BEC3A5C125F0550');
        $this->addSql('DROP TABLE price_list_user');
        $this->addSql('ALTER TABLE user ADD price_list_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6495688DED7 FOREIGN KEY (price_list_id) REFERENCES price_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8D93D6495688DED7 ON user (price_list_id)');
    }
}
