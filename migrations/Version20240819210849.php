<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240819210849 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cockpit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, modifier VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE defence_system (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, modifier VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE energy_shield (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, modifier VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE energy_weapon (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, modifier VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE engine (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, modifier VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rocket_weapon (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, modifier VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE special (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, modifier VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE spaceship ADD cockpit_id INT NOT NULL, ADD defence_system_id INT NOT NULL, ADD energy_shield_id INT NOT NULL, ADD energy_weapon_id INT NOT NULL, ADD engine_id INT NOT NULL, ADD rocket_weapon_id INT NOT NULL, ADD special_id INT NOT NULL');
        $this->addSql('ALTER TABLE spaceship ADD CONSTRAINT FK_AA708C8E6F081523 FOREIGN KEY (cockpit_id) REFERENCES cockpit (id)');
        $this->addSql('ALTER TABLE spaceship ADD CONSTRAINT FK_AA708C8E1679151A FOREIGN KEY (defence_system_id) REFERENCES defence_system (id)');
        $this->addSql('ALTER TABLE spaceship ADD CONSTRAINT FK_AA708C8EBE336F16 FOREIGN KEY (energy_shield_id) REFERENCES energy_shield (id)');
        $this->addSql('ALTER TABLE spaceship ADD CONSTRAINT FK_AA708C8E30336C30 FOREIGN KEY (energy_weapon_id) REFERENCES energy_weapon (id)');
        $this->addSql('ALTER TABLE spaceship ADD CONSTRAINT FK_AA708C8EE78C9C0A FOREIGN KEY (engine_id) REFERENCES engine (id)');
        $this->addSql('ALTER TABLE spaceship ADD CONSTRAINT FK_AA708C8E7EE9452F FOREIGN KEY (rocket_weapon_id) REFERENCES rocket_weapon (id)');
        $this->addSql('ALTER TABLE spaceship ADD CONSTRAINT FK_AA708C8E4F5B3969 FOREIGN KEY (special_id) REFERENCES special (id)');
        $this->addSql('CREATE INDEX IDX_AA708C8E6F081523 ON spaceship (cockpit_id)');
        $this->addSql('CREATE INDEX IDX_AA708C8E1679151A ON spaceship (defence_system_id)');
        $this->addSql('CREATE INDEX IDX_AA708C8EBE336F16 ON spaceship (energy_shield_id)');
        $this->addSql('CREATE INDEX IDX_AA708C8E30336C30 ON spaceship (energy_weapon_id)');
        $this->addSql('CREATE INDEX IDX_AA708C8EE78C9C0A ON spaceship (engine_id)');
        $this->addSql('CREATE INDEX IDX_AA708C8E7EE9452F ON spaceship (rocket_weapon_id)');
        $this->addSql('CREATE INDEX IDX_AA708C8E4F5B3969 ON spaceship (special_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spaceship DROP FOREIGN KEY FK_AA708C8E6F081523');
        $this->addSql('ALTER TABLE spaceship DROP FOREIGN KEY FK_AA708C8E1679151A');
        $this->addSql('ALTER TABLE spaceship DROP FOREIGN KEY FK_AA708C8EBE336F16');
        $this->addSql('ALTER TABLE spaceship DROP FOREIGN KEY FK_AA708C8E30336C30');
        $this->addSql('ALTER TABLE spaceship DROP FOREIGN KEY FK_AA708C8EE78C9C0A');
        $this->addSql('ALTER TABLE spaceship DROP FOREIGN KEY FK_AA708C8E7EE9452F');
        $this->addSql('ALTER TABLE spaceship DROP FOREIGN KEY FK_AA708C8E4F5B3969');
        $this->addSql('DROP TABLE cockpit');
        $this->addSql('DROP TABLE defence_system');
        $this->addSql('DROP TABLE energy_shield');
        $this->addSql('DROP TABLE energy_weapon');
        $this->addSql('DROP TABLE engine');
        $this->addSql('DROP TABLE rocket_weapon');
        $this->addSql('DROP TABLE special');
        $this->addSql('DROP INDEX IDX_AA708C8E6F081523 ON spaceship');
        $this->addSql('DROP INDEX IDX_AA708C8E1679151A ON spaceship');
        $this->addSql('DROP INDEX IDX_AA708C8EBE336F16 ON spaceship');
        $this->addSql('DROP INDEX IDX_AA708C8E30336C30 ON spaceship');
        $this->addSql('DROP INDEX IDX_AA708C8EE78C9C0A ON spaceship');
        $this->addSql('DROP INDEX IDX_AA708C8E7EE9452F ON spaceship');
        $this->addSql('DROP INDEX IDX_AA708C8E4F5B3969 ON spaceship');
        $this->addSql('ALTER TABLE spaceship DROP cockpit_id, DROP defence_system_id, DROP energy_shield_id, DROP energy_weapon_id, DROP engine_id, DROP rocket_weapon_id, DROP special_id');
    }
}
