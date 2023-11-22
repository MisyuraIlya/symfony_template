<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231119195124 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE history (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, error_id INT DEFAULT NULL, agent_id INT DEFAULT NULL, order_ext_id VARCHAR(255) DEFAULT NULL, delivery_date DATE DEFAULT NULL, discount INT DEFAULT NULL, total DOUBLE PRECISION DEFAULT NULL, order_comment VARCHAR(255) DEFAULT NULL, order_status VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivery_price INT DEFAULT NULL, document_type VARCHAR(255) NOT NULL, is_buy_by_credit_card TINYINT(1) NOT NULL, is_send_erp TINYINT(1) NOT NULL, send_erp_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_27BA704BA76ED395 (user_id), INDEX IDX_27BA704B836088D7 (error_id), INDEX IDX_27BA704B3414710B (agent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE history_detailed (id INT AUTO_INCREMENT NOT NULL, history_id INT DEFAULT NULL, product_id INT DEFAULT NULL, single_price INT DEFAULT NULL, quantity INT DEFAULT NULL, discount INT DEFAULT NULL, total INT DEFAULT NULL, INDEX IDX_C9A1DF641E058452 (history_id), INDEX IDX_C9A1DF644584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE history ADD CONSTRAINT FK_27BA704BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE history ADD CONSTRAINT FK_27BA704B836088D7 FOREIGN KEY (error_id) REFERENCES error (id)');
        $this->addSql('ALTER TABLE history ADD CONSTRAINT FK_27BA704B3414710B FOREIGN KEY (agent_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE history_detailed ADD CONSTRAINT FK_C9A1DF641E058452 FOREIGN KEY (history_id) REFERENCES history (id)');
        $this->addSql('ALTER TABLE history_detailed ADD CONSTRAINT FK_C9A1DF644584665A FOREIGN KEY (product_id) REFERENCES product (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE history DROP FOREIGN KEY FK_27BA704BA76ED395');
        $this->addSql('ALTER TABLE history DROP FOREIGN KEY FK_27BA704B836088D7');
        $this->addSql('ALTER TABLE history DROP FOREIGN KEY FK_27BA704B3414710B');
        $this->addSql('ALTER TABLE history_detailed DROP FOREIGN KEY FK_C9A1DF641E058452');
        $this->addSql('ALTER TABLE history_detailed DROP FOREIGN KEY FK_C9A1DF644584665A');
        $this->addSql('DROP TABLE history');
        $this->addSql('DROP TABLE history_detailed');
    }
}
