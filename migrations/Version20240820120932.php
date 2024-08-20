<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240820120932 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spaceship CHANGE armor_id armor_id INT DEFAULT NULL, CHANGE cockpit_id cockpit_id INT DEFAULT NULL, CHANGE defence_system_id defence_system_id INT DEFAULT NULL, CHANGE energy_shield_id energy_shield_id INT DEFAULT NULL, CHANGE energy_weapon_id energy_weapon_id INT DEFAULT NULL, CHANGE engine_id engine_id INT DEFAULT NULL, CHANGE rocket_weapon_id rocket_weapon_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spaceship CHANGE armor_id armor_id INT NOT NULL, CHANGE cockpit_id cockpit_id INT NOT NULL, CHANGE defence_system_id defence_system_id INT NOT NULL, CHANGE energy_shield_id energy_shield_id INT NOT NULL, CHANGE energy_weapon_id energy_weapon_id INT NOT NULL, CHANGE engine_id engine_id INT NOT NULL, CHANGE rocket_weapon_id rocket_weapon_id INT NOT NULL');
    }
}
