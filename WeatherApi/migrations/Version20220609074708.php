<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220609074708 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE weather_data ADD wind_speed DOUBLE PRECISION DEFAULT NULL, CHANGE geolocation geolocation INT NOT NULL, CHANGE temperature temperature DOUBLE PRECISION DEFAULT NULL, CHANGE dew_point dew_point DOUBLE PRECISION DEFAULT NULL, CHANGE station_pressure station_pressure DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE weather_data DROP wind_speed, CHANGE geolocation geolocation VARCHAR(255) NOT NULL, CHANGE temperature temperature VARCHAR(5) DEFAULT NULL, CHANGE dew_point dew_point VARCHAR(255) DEFAULT NULL, CHANGE station_pressure station_pressure VARCHAR(255) DEFAULT NULL');
    }
}
