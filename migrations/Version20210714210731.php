<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210714210731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE demande (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, type_demande_id INT NOT NULL, numero_registre INT NOT NULL, date_demande DATE NOT NULL, etat VARCHAR(255) NOT NULL, date_recuperation DATE NOT NULL, nombre_copies INT NOT NULL, INDEX IDX_2694D7A567B3B43D (users_id), INDEX IDX_2694D7A59DEA883D (type_demande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A567B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A59DEA883D FOREIGN KEY (type_demande_id) REFERENCES type_demande (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE demande');
    }
}
