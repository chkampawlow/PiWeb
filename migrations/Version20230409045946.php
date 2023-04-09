<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230409045946 extends AbstractMigration
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
        $this->addSql('CREATE TABLE participategroupe (id INT AUTO_INCREMENT NOT NULL, idgroupe_id INT DEFAULT NULL, iduser INT NOT NULL, INDEX IDX_3F3ACBFA45E9C79 (idgroupe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participatecamp (id INT AUTO_INCREMENT NOT NULL, idcamp_id INT DEFAULT NULL, iduser INT NOT NULL, INDEX IDX_7C101866A80308D5 (idcamp_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE camping ADD CONSTRAINT FK_81A904E445E9C79 FOREIGN KEY (idgroupe_id) REFERENCES groupe (id)');
        $this->addSql('ALTER TABLE participategroupe ADD CONSTRAINT FK_3F3ACBFA45E9C79 FOREIGN KEY (idgroupe_id) REFERENCES groupe (id)');
        $this->addSql('ALTER TABLE participatecamp ADD CONSTRAINT FK_7C101866A80308D5 FOREIGN KEY (idcamp_id) REFERENCES camping (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE camping DROP FOREIGN KEY FK_81A904E445E9C79');
        $this->addSql('ALTER TABLE participategroupe DROP FOREIGN KEY FK_3F3ACBFA45E9C79');
        $this->addSql('ALTER TABLE participatecamp DROP FOREIGN KEY FK_7C101866A80308D5');
        $this->addSql('DROP TABLE camping');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE participategroupe');
        $this->addSql('DROP TABLE participatecamp');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
