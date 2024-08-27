<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240827145424 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spaceship ADD base_hp SMALLINT NOT NULL, ADD base_armor SMALLINT NOT NULL, ADD base_energy_shield SMALLINT NOT NULL, ADD base_rocket_weapon SMALLINT NOT NULL, ADD base_energy_weapon SMALLINT NOT NULL, ADD base_accuracy SMALLINT NOT NULL, ADD base_initiative SMALLINT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spaceship DROP base_hp, DROP base_armor, DROP base_energy_shield, DROP base_rocket_weapon, DROP base_energy_weapon, DROP base_accuracy, DROP base_initiative');
    }
}
