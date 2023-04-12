<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230411142853 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE camping (id INT AUTO_INCREMENT NOT NULL, idgroupe_id INT DEFAULT NULL, namecamp VARCHAR(255) NOT NULL, descamp VARCHAR(1000) DEFAULT NULL, placecamp VARCHAR(255) NOT NULL, datecamp DATE NOT NULL, ndaycamp INT DEFAULT NULL, INDEX IDX_81A904E445E9C79 (idgroupe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe (id INT AUTO_INCREMENT NOT NULL, namegroupe VARCHAR(255) NOT NULL, desgroupe VARCHAR(1000) NOT NULL, typegroupe VARCHAR(10) NOT NULL, membremax INT DEFAULT NULL, iduser INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscgroupe (id INT AUTO_INCREMENT NOT NULL, grp_id INT DEFAULT NULL, iduser INT NOT NULL, INDEX IDX_7723F073D51E9150 (grp_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partcamping (id INT AUTO_INCREMENT NOT NULL, camp_id INT DEFAULT NULL, iduser INT NOT NULL, INDEX IDX_410A23F277075ABB (camp_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE camping ADD CONSTRAINT FK_81A904E445E9C79 FOREIGN KEY (idgroupe_id) REFERENCES groupe (id)');
        $this->addSql('ALTER TABLE inscgroupe ADD CONSTRAINT FK_7723F073D51E9150 FOREIGN KEY (grp_id) REFERENCES groupe (id)');
        $this->addSql('ALTER TABLE partcamping ADD CONSTRAINT FK_410A23F277075ABB FOREIGN KEY (camp_id) REFERENCES camping (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE camping DROP FOREIGN KEY FK_81A904E445E9C79');
        $this->addSql('ALTER TABLE inscgroupe DROP FOREIGN KEY FK_7723F073D51E9150');
        $this->addSql('ALTER TABLE partcamping DROP FOREIGN KEY FK_410A23F277075ABB');
        $this->addSql('DROP TABLE camping');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE inscgroupe');
        $this->addSql('DROP TABLE partcamping');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
