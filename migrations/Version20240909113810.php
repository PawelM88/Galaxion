<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240909113810 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE foe (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, class VARCHAR(255) NOT NULL, description VARCHAR(500) NOT NULL, hp SMALLINT NOT NULL, armor SMALLINT NOT NULL, energy_shield SMALLINT NOT NULL, rocket_weapon SMALLINT NOT NULL, energy_weapon SMALLINT NOT NULL, accuracy SMALLINT NOT NULL, initiative SMALLINT NOT NULL, defence_system SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE foes');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE foes (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, class VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description VARCHAR(500) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, hp SMALLINT NOT NULL, armor SMALLINT NOT NULL, energy_shield SMALLINT NOT NULL, rocket_weapon SMALLINT NOT NULL, energy_weapon SMALLINT NOT NULL, accuracy SMALLINT NOT NULL, initiative SMALLINT NOT NULL, defence_system SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE foe');
    }
}
