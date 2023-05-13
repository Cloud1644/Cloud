<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230221084528 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE export_order (id INT AUTO_INCREMENT NOT NULL, ex_user_id INT NOT NULL, time DATETIME NOT NULL, INDEX IDX_C2D7195E293B2B0E (ex_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE export_order_detail (id INT AUTO_INCREMENT NOT NULL, exorder_id INT NOT NULL, expro_id INT NOT NULL, ex_quantity INT NOT NULL, INDEX IDX_6797DC6D778274DE (exorder_id), INDEX IDX_6797DC6D50DBAAE3 (expro_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE import_order_detail (id INT AUTO_INCREMENT NOT NULL, imorder_id INT NOT NULL, impro_id INT NOT NULL, im_quantity INT NOT NULL, INDEX IDX_4D07F1F58BE9936E (imorder_id), INDEX IDX_4D07F1F532920CC5 (impro_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE export_order ADD CONSTRAINT FK_C2D7195E293B2B0E FOREIGN KEY (ex_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE export_order_detail ADD CONSTRAINT FK_6797DC6D778274DE FOREIGN KEY (exorder_id) REFERENCES export_order (id)');
        $this->addSql('ALTER TABLE export_order_detail ADD CONSTRAINT FK_6797DC6D50DBAAE3 FOREIGN KEY (expro_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE import_order_detail ADD CONSTRAINT FK_4D07F1F58BE9936E FOREIGN KEY (imorder_id) REFERENCES import_order (id)');
        $this->addSql('ALTER TABLE import_order_detail ADD CONSTRAINT FK_4D07F1F532920CC5 FOREIGN KEY (impro_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE import_order ADD im_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE import_order ADD CONSTRAINT FK_187C3C56D550CCBE FOREIGN KEY (im_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_187C3C56D550CCBE ON import_order (im_user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE export_order DROP FOREIGN KEY FK_C2D7195E293B2B0E');
        $this->addSql('ALTER TABLE export_order_detail DROP FOREIGN KEY FK_6797DC6D778274DE');
        $this->addSql('ALTER TABLE export_order_detail DROP FOREIGN KEY FK_6797DC6D50DBAAE3');
        $this->addSql('ALTER TABLE import_order_detail DROP FOREIGN KEY FK_4D07F1F58BE9936E');
        $this->addSql('ALTER TABLE import_order_detail DROP FOREIGN KEY FK_4D07F1F532920CC5');
        $this->addSql('DROP TABLE export_order');
        $this->addSql('DROP TABLE export_order_detail');
        $this->addSql('DROP TABLE import_order_detail');
        $this->addSql('ALTER TABLE import_order DROP FOREIGN KEY FK_187C3C56D550CCBE');
        $this->addSql('DROP INDEX IDX_187C3C56D550CCBE ON import_order');
        $this->addSql('ALTER TABLE import_order DROP im_user_id');
    }
}
