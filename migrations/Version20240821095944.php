<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240821095944 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE armor ADD cost SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE cockpit ADD cost SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE defence_system ADD cost SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE energy_shield ADD cost SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE energy_weapon ADD cost SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE engine ADD cost SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE rocket_weapon ADD cost SMALLINT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE armor DROP cost');
        $this->addSql('ALTER TABLE cockpit DROP cost');
        $this->addSql('ALTER TABLE defence_system DROP cost');
        $this->addSql('ALTER TABLE energy_shield DROP cost');
        $this->addSql('ALTER TABLE energy_weapon DROP cost');
        $this->addSql('ALTER TABLE engine DROP cost');
        $this->addSql('ALTER TABLE rocket_weapon DROP cost');
    }
}
