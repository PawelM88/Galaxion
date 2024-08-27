<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240825215334 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE armor CHANGE description description VARCHAR(500) NOT NULL');
        $this->addSql('ALTER TABLE cockpit CHANGE description description VARCHAR(500) NOT NULL');
        $this->addSql('ALTER TABLE defence_system CHANGE description description VARCHAR(500) NOT NULL');
        $this->addSql('ALTER TABLE energy_shield CHANGE description description VARCHAR(500) NOT NULL');
        $this->addSql('ALTER TABLE energy_weapon CHANGE description description VARCHAR(500) NOT NULL');
        $this->addSql('ALTER TABLE engine CHANGE description description VARCHAR(500) NOT NULL');
        $this->addSql('ALTER TABLE rocket_weapon CHANGE description description VARCHAR(500) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE armor CHANGE description description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE cockpit CHANGE description description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE defence_system CHANGE description description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE energy_shield CHANGE description description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE energy_weapon CHANGE description description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE engine CHANGE description description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE rocket_weapon CHANGE description description VARCHAR(255) NOT NULL');
    }
}
