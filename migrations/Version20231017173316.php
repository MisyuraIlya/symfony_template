<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231017173316 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE attribute_main (id INT AUTO_INCREMENT NOT NULL, ext_id VARCHAR(255) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, is_published TINYINT(1) NOT NULL, orden INT DEFAULT NULL, is_in_product_card TINYINT(1) NOT NULL, is_in_filter TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, ext_id VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, is_published TINYINT(1) NOT NULL, image VARCHAR(255) DEFAULT NULL, orden INT DEFAULT NULL, lvl_number INT DEFAULT NULL, INDEX IDX_64C19C1727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE history (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, order_ext_id VARCHAR(255) DEFAULT NULL, delivery_date DATE DEFAULT NULL, discount INT DEFAULT NULL, total INT DEFAULT NULL, order_comment VARCHAR(255) DEFAULT NULL, order_status VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivery_price INT DEFAULT NULL, INDEX IDX_27BA704BA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE history_detailed (id INT AUTO_INCREMENT NOT NULL, history_id INT DEFAULT NULL, product_id INT DEFAULT NULL, single_price INT DEFAULT NULL, quantity INT DEFAULT NULL, discount INT DEFAULT NULL, total INT DEFAULT NULL, INDEX IDX_C9A1DF641E058452 (history_id), INDEX IDX_C9A1DF644584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_object (id INT AUTO_INCREMENT NOT NULL, file_path VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', source VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE migvan (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, sku_id INT DEFAULT NULL, is_published TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_B1EB65FAA76ED395 (user_id), INDEX IDX_B1EB65FA1777D41C (sku_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE price_list (id INT AUTO_INCREMENT NOT NULL, ext_id VARCHAR(255) NOT NULL, title VARCHAR(255) DEFAULT NULL, discount INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE price_list_detailed (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, price_list_id INT DEFAULT NULL, price INT NOT NULL, discount INT DEFAULT NULL, INDEX IDX_94C53FFB4584665A (product_id), INDEX IDX_94C53FFB5688DED7 (price_list_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, category_lvl1_id INT DEFAULT NULL, category_lvl2_id INT DEFAULT NULL, category_lvl3_id INT DEFAULT NULL, sku VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, barcode VARCHAR(255) DEFAULT NULL, is_published TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', base_price INT DEFAULT NULL, final_price INT DEFAULT NULL, stock INT NOT NULL, pack_quantity INT DEFAULT NULL, discount INT DEFAULT NULL, INDEX IDX_D34A04AD468C4EE7 (category_lvl1_id), INDEX IDX_D34A04AD5439E109 (category_lvl2_id), INDEX IDX_D34A04ADEC85866C (category_lvl3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_images (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', image_path VARCHAR(255) NOT NULL, INDEX IDX_8263FFCE4584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_info (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, kosher TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_466113F64584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE refresh_token (id INT AUTO_INCREMENT NOT NULL, refresh_token VARCHAR(128) NOT NULL, username VARCHAR(255) NOT NULL, valid DATETIME NOT NULL, UNIQUE INDEX UNIQ_C74F2195C74F2195 (refresh_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sub_attribute (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, attribute_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, INDEX IDX_E877A9454584665A (product_id), INDEX IDX_E877A945B6E62EFA (attribute_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sub_product (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, sku VARCHAR(255) NOT NULL, title VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, barcode VARCHAR(255) DEFAULT NULL, is_published TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_AC925859727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sub_user (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, email VARCHAR(180) DEFAULT NULL, roles JSON NOT NULL, password VARCHAR(255) DEFAULT NULL, is_registered TINYINT(1) NOT NULL, name VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, ext_id VARCHAR(255) DEFAULT NULL, is_blocked TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', recovery VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_AA054988E7927C74 (email), INDEX IDX_AA054988A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, price_list_id INT DEFAULT NULL, email VARCHAR(180) DEFAULT NULL, roles JSON NOT NULL, password VARCHAR(255) DEFAULT NULL, is_registered TINYINT(1) NOT NULL, name VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, ext_id VARCHAR(255) NOT NULL, is_blocked TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', recovery VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D6495688DED7 (price_list_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_info (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, hp VARCHAR(255) DEFAULT NULL, contact_name VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, town VARCHAR(255) DEFAULT NULL, zip VARCHAR(255) DEFAULT NULL, max_obligo INT DEFAULT NULL, min_price INT DEFAULT NULL, balance INT DEFAULT NULL, passport INT DEFAULT NULL, shotef VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_B1087D9EA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1727ACA70 FOREIGN KEY (parent_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE history ADD CONSTRAINT FK_27BA704BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE history_detailed ADD CONSTRAINT FK_C9A1DF641E058452 FOREIGN KEY (history_id) REFERENCES history (id)');
        $this->addSql('ALTER TABLE history_detailed ADD CONSTRAINT FK_C9A1DF644584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE migvan ADD CONSTRAINT FK_B1EB65FAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE migvan ADD CONSTRAINT FK_B1EB65FA1777D41C FOREIGN KEY (sku_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE price_list_detailed ADD CONSTRAINT FK_94C53FFB4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE price_list_detailed ADD CONSTRAINT FK_94C53FFB5688DED7 FOREIGN KEY (price_list_id) REFERENCES price_list (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD468C4EE7 FOREIGN KEY (category_lvl1_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD5439E109 FOREIGN KEY (category_lvl2_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADEC85866C FOREIGN KEY (category_lvl3_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE product_images ADD CONSTRAINT FK_8263FFCE4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_info ADD CONSTRAINT FK_466113F64584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE sub_attribute ADD CONSTRAINT FK_E877A9454584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE sub_attribute ADD CONSTRAINT FK_E877A945B6E62EFA FOREIGN KEY (attribute_id) REFERENCES attribute_main (id)');
        $this->addSql('ALTER TABLE sub_product ADD CONSTRAINT FK_AC925859727ACA70 FOREIGN KEY (parent_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE sub_user ADD CONSTRAINT FK_AA054988A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6495688DED7 FOREIGN KEY (price_list_id) REFERENCES price_list (id)');
        $this->addSql('ALTER TABLE user_info ADD CONSTRAINT FK_B1087D9EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1727ACA70');
        $this->addSql('ALTER TABLE history DROP FOREIGN KEY FK_27BA704BA76ED395');
        $this->addSql('ALTER TABLE history_detailed DROP FOREIGN KEY FK_C9A1DF641E058452');
        $this->addSql('ALTER TABLE history_detailed DROP FOREIGN KEY FK_C9A1DF644584665A');
        $this->addSql('ALTER TABLE migvan DROP FOREIGN KEY FK_B1EB65FAA76ED395');
        $this->addSql('ALTER TABLE migvan DROP FOREIGN KEY FK_B1EB65FA1777D41C');
        $this->addSql('ALTER TABLE price_list_detailed DROP FOREIGN KEY FK_94C53FFB4584665A');
        $this->addSql('ALTER TABLE price_list_detailed DROP FOREIGN KEY FK_94C53FFB5688DED7');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD468C4EE7');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD5439E109');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADEC85866C');
        $this->addSql('ALTER TABLE product_images DROP FOREIGN KEY FK_8263FFCE4584665A');
        $this->addSql('ALTER TABLE product_info DROP FOREIGN KEY FK_466113F64584665A');
        $this->addSql('ALTER TABLE sub_attribute DROP FOREIGN KEY FK_E877A9454584665A');
        $this->addSql('ALTER TABLE sub_attribute DROP FOREIGN KEY FK_E877A945B6E62EFA');
        $this->addSql('ALTER TABLE sub_product DROP FOREIGN KEY FK_AC925859727ACA70');
        $this->addSql('ALTER TABLE sub_user DROP FOREIGN KEY FK_AA054988A76ED395');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6495688DED7');
        $this->addSql('ALTER TABLE user_info DROP FOREIGN KEY FK_B1087D9EA76ED395');
        $this->addSql('DROP TABLE attribute_main');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE history');
        $this->addSql('DROP TABLE history_detailed');
        $this->addSql('DROP TABLE media_object');
        $this->addSql('DROP TABLE migvan');
        $this->addSql('DROP TABLE price_list');
        $this->addSql('DROP TABLE price_list_detailed');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_images');
        $this->addSql('DROP TABLE product_info');
        $this->addSql('DROP TABLE refresh_token');
        $this->addSql('DROP TABLE sub_attribute');
        $this->addSql('DROP TABLE sub_product');
        $this->addSql('DROP TABLE sub_user');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_info');
    }
}
