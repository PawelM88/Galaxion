<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240820115353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spaceship DROP FOREIGN KEY FK_AA708C8E4F5B3969');
        $this->addSql('DROP TABLE special');
        $this->addSql('ALTER TABLE armor CHANGE modifier modifier SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE cockpit CHANGE modifier modifier LONGTEXT NOT NULL COMMENT \'(DC2Type:simple_array)\'');
        $this->addSql('ALTER TABLE defence_system CHANGE modifier modifier SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE energy_shield CHANGE modifier modifier SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE energy_weapon CHANGE modifier modifier SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE engine CHANGE modifier modifier LONGTEXT NOT NULL COMMENT \'(DC2Type:simple_array)\'');
        $this->addSql('ALTER TABLE rocket_weapon CHANGE modifier modifier SMALLINT NOT NULL');
        $this->addSql('DROP INDEX IDX_AA708C8E4F5B3969 ON spaceship');
        $this->addSql('ALTER TABLE spaceship DROP special_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE special (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, modifier VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE armor CHANGE modifier modifier VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE cockpit CHANGE modifier modifier VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE defence_system CHANGE modifier modifier VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE energy_shield CHANGE modifier modifier VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE energy_weapon CHANGE modifier modifier VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE engine CHANGE modifier modifier VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE rocket_weapon CHANGE modifier modifier VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE spaceship ADD special_id INT NOT NULL');
        $this->addSql('ALTER TABLE spaceship ADD CONSTRAINT FK_AA708C8E4F5B3969 FOREIGN KEY (special_id) REFERENCES special (id)');
        $this->addSql('CREATE INDEX IDX_AA708C8E4F5B3969 ON spaceship (special_id)');
    }
}
