<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220614133714 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE geolocation DROP FOREIGN KEY fk_geolocation_country_code');
        $this->addSql('ALTER TABLE nearestlocation DROP FOREIGN KEY fk_nearestlocation_country_code');
        $this->addSql('ALTER TABLE geolocation DROP FOREIGN KEY fk_geolocation_station_name');
        $this->addSql('ALTER TABLE nearestlocation DROP FOREIGN KEY fk_nearestlocation_station_name');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE nearestlocation');
        $this->addSql('DROP TABLE station');
        $this->addSql('DROP INDEX fk_geolocation_country_code ON geolocation');
        $this->addSql('DROP INDEX fk_geolocation_station_name ON geolocation');
        $this->addSql('ALTER TABLE geolocation CHANGE station_name station_name VARCHAR(255) NOT NULL, CHANGE country_code country_code VARCHAR(255) DEFAULT NULL, CHANGE island island VARCHAR(255) DEFAULT NULL, CHANGE county county VARCHAR(255) DEFAULT NULL, CHANGE place place VARCHAR(255) DEFAULT NULL, CHANGE hamlet hamlet VARCHAR(255) DEFAULT NULL, CHANGE town town VARCHAR(255) DEFAULT NULL, CHANGE municipality municipality VARCHAR(255) DEFAULT NULL, CHANGE state_district state_district VARCHAR(255) DEFAULT NULL, CHANGE administrative administrative VARCHAR(255) NOT NULL, CHANGE state state VARCHAR(255) DEFAULT NULL, CHANGE village village VARCHAR(255) DEFAULT NULL, CHANGE region region VARCHAR(255) DEFAULT NULL, CHANGE province province VARCHAR(255) DEFAULT NULL, CHANGE city city VARCHAR(255) DEFAULT NULL, CHANGE locality locality VARCHAR(255) DEFAULT NULL, CHANGE postcode postcode VARCHAR(255) DEFAULT NULL, CHANGE country country VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country (country_code VARCHAR(2) CHARACTER SET utf16 NOT NULL COLLATE `utf16_general_ci`, country VARCHAR(45) CHARACTER SET utf16 NOT NULL COLLATE `utf16_general_ci`, PRIMARY KEY(country_code)) DEFAULT CHARACTER SET utf16 COLLATE `utf16_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE nearestlocation (id INT AUTO_INCREMENT NOT NULL, station_name VARCHAR(10) CHARACTER SET utf16 NOT NULL COLLATE `utf16_general_ci`, country_code VARCHAR(2) CHARACTER SET utf16 NOT NULL COLLATE `utf16_general_ci`, name VARCHAR(100) CHARACTER SET utf16 DEFAULT NULL COLLATE `utf16_general_ci`, administrative_region1 VARCHAR(100) CHARACTER SET utf16 DEFAULT NULL COLLATE `utf16_general_ci`, administrative_region2 VARCHAR(100) CHARACTER SET utf16 DEFAULT NULL COLLATE `utf16_general_ci`, longitude DOUBLE PRECISION NOT NULL, latitude DOUBLE PRECISION NOT NULL, INDEX fk_nearestlocation_country_code (country_code), INDEX fk_nearestlocation_station_name (station_name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf16 COLLATE `utf16_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE station (name VARCHAR(10) CHARACTER SET utf16 NOT NULL COLLATE `utf16_general_ci`, longitude DOUBLE PRECISION NOT NULL, latitude DOUBLE PRECISION NOT NULL, elevation DOUBLE PRECISION NOT NULL, PRIMARY KEY(name)) DEFAULT CHARACTER SET utf16 COLLATE `utf16_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE nearestlocation ADD CONSTRAINT fk_nearestlocation_country_code FOREIGN KEY (country_code) REFERENCES country (country_code) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE nearestlocation ADD CONSTRAINT fk_nearestlocation_station_name FOREIGN KEY (station_name) REFERENCES station (name) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE geolocation CHANGE station_name station_name VARCHAR(10) NOT NULL, CHANGE country_code country_code VARCHAR(2) NOT NULL, CHANGE island island VARCHAR(100) DEFAULT NULL, CHANGE county county VARCHAR(100) DEFAULT NULL, CHANGE place place VARCHAR(100) DEFAULT NULL, CHANGE hamlet hamlet VARCHAR(100) DEFAULT NULL, CHANGE town town VARCHAR(100) DEFAULT NULL, CHANGE municipality municipality VARCHAR(100) DEFAULT NULL, CHANGE state_district state_district VARCHAR(100) DEFAULT NULL, CHANGE administrative administrative VARCHAR(100) DEFAULT NULL, CHANGE state state VARCHAR(100) DEFAULT NULL, CHANGE village village VARCHAR(100) DEFAULT NULL, CHANGE region region VARCHAR(100) DEFAULT NULL, CHANGE province province VARCHAR(100) DEFAULT NULL, CHANGE city city VARCHAR(100) DEFAULT NULL, CHANGE locality locality VARCHAR(100) DEFAULT NULL, CHANGE postcode postcode VARCHAR(100) DEFAULT NULL, CHANGE country country VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE geolocation ADD CONSTRAINT fk_geolocation_country_code FOREIGN KEY (country_code) REFERENCES country (country_code) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE geolocation ADD CONSTRAINT fk_geolocation_station_name FOREIGN KEY (station_name) REFERENCES station (name) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX fk_geolocation_country_code ON geolocation (country_code)');
        $this->addSql('CREATE INDEX fk_geolocation_station_name ON geolocation (station_name)');
    }
}
