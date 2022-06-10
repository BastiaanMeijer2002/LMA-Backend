<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220610101827 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE geolocation (id INT AUTO_INCREMENT NOT NULL, station_name VARCHAR(255) NOT NULL, country_code VARCHAR(255) DEFAULT NULL, island VARCHAR(255) DEFAULT NULL, county VARCHAR(255) DEFAULT NULL, place VARCHAR(255) DEFAULT NULL, hamlet VARCHAR(255) DEFAULT NULL, town VARCHAR(255) DEFAULT NULL, municipality VARCHAR(255) DEFAULT NULL, state_district VARCHAR(255) DEFAULT NULL, administrative VARCHAR(255) NOT NULL, state VARCHAR(255) DEFAULT NULL, village VARCHAR(255) DEFAULT NULL, region VARCHAR(255) DEFAULT NULL, province VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, locality VARCHAR(255) DEFAULT NULL, postcode VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE geolocation');
    }
}
