<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230707135820 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place ADD heater_state INT DEFAULT NULL');
        $this->addSql('ALTER TABLE place DROP warm_state');
        $this->addSql('ALTER TABLE place ALTER COLUMN ac_state TYPE INTEGER USING ac_state::integer');
        $this->addSql('ALTER TABLE place ALTER COLUMN vent_state TYPE INTEGER USING vent_state::integer');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE place ADD warm_state BOOLEAN DEFAULT NULL');
        $this->addSql('ALTER TABLE place DROP heater_state');
        $this->addSql('ALTER TABLE place ALTER ac_state TYPE BOOLEAN');
        $this->addSql('ALTER TABLE place ALTER vent_state TYPE BOOLEAN');
    }
}
