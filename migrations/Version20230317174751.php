<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230317174751 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE medico (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) DEFAULT NULL, dateborn DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paciente (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) DEFAULT NULL, dateborn DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patologiadetectada (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, deacription VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sessionvaloracion (id INT AUTO_INCREMENT NOT NULL, medico_id INT DEFAULT NULL, paciente_id INT DEFAULT NULL, patologia1_id INT DEFAULT NULL, patologia2_id INT DEFAULT NULL, patologia3_id INT DEFAULT NULL, fecha DATETIME NOT NULL, INDEX IDX_634304E3A7FB1C0C (medico_id), INDEX IDX_634304E37310DAD4 (paciente_id), INDEX IDX_634304E3CFD355A8 (patologia1_id), INDEX IDX_634304E3DD66FA46 (patologia2_id), INDEX IDX_634304E365DA9D23 (patologia3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sessionvaloracion ADD CONSTRAINT FK_634304E3A7FB1C0C FOREIGN KEY (medico_id) REFERENCES medico (id)');
        $this->addSql('ALTER TABLE sessionvaloracion ADD CONSTRAINT FK_634304E37310DAD4 FOREIGN KEY (paciente_id) REFERENCES paciente (id)');
        $this->addSql('ALTER TABLE sessionvaloracion ADD CONSTRAINT FK_634304E3CFD355A8 FOREIGN KEY (patologia1_id) REFERENCES patologiadetectada (id)');
        $this->addSql('ALTER TABLE sessionvaloracion ADD CONSTRAINT FK_634304E3DD66FA46 FOREIGN KEY (patologia2_id) REFERENCES patologiadetectada (id)');
        $this->addSql('ALTER TABLE sessionvaloracion ADD CONSTRAINT FK_634304E365DA9D23 FOREIGN KEY (patologia3_id) REFERENCES patologiadetectada (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sessionvaloracion DROP FOREIGN KEY FK_634304E3A7FB1C0C');
        $this->addSql('ALTER TABLE sessionvaloracion DROP FOREIGN KEY FK_634304E37310DAD4');
        $this->addSql('ALTER TABLE sessionvaloracion DROP FOREIGN KEY FK_634304E3CFD355A8');
        $this->addSql('ALTER TABLE sessionvaloracion DROP FOREIGN KEY FK_634304E3DD66FA46');
        $this->addSql('ALTER TABLE sessionvaloracion DROP FOREIGN KEY FK_634304E365DA9D23');
        $this->addSql('DROP TABLE medico');
        $this->addSql('DROP TABLE paciente');
        $this->addSql('DROP TABLE patologiadetectada');
        $this->addSql('DROP TABLE sessionvaloracion');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
