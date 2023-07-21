<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230701115026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place ADD light_state BOOLEAN DEFAULT NULL');
        $this->addSql('ALTER TABLE place ADD warm_state BOOLEAN DEFAULT NULL');
        $this->addSql('ALTER TABLE place ADD clim_state BOOLEAN DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE place DROP light_state');
        $this->addSql('ALTER TABLE place DROP warm_state');
        $this->addSql('ALTER TABLE place DROP clim_state');
    }
}
