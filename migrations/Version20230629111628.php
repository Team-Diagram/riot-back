<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230629111628 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE notification (id UUID NOT NULL, message JSONB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN notification.id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER INDEX idx_8007192566ef0cab RENAME TO IDX_80071925460D9FD7');
        $this->addSql('ALTER INDEX idx_857fe845d6328574 RENAME TO IDX_857FE845DA6A219');
        $this->addSql('ALTER INDEX idx_857fe8452f68b530 RENAME TO IDX_857FE845FE54D947');
        $this->addSql('ALTER INDEX idx_105699a366ef0cab RENAME TO IDX_105699A3460D9FD7');
        $this->addSql('ALTER INDEX idx_d499bff6d6328574 RENAME TO IDX_D499BFF6DA6A219');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE notification');
        $this->addSql('ALTER INDEX idx_105699a3460d9fd7 RENAME TO idx_105699a366ef0cab');
        $this->addSql('ALTER INDEX idx_857fe845fe54d947 RENAME TO idx_857fe8452f68b530');
        $this->addSql('ALTER INDEX idx_857fe845da6a219 RENAME TO idx_857fe845d6328574');
        $this->addSql('ALTER INDEX idx_d499bff6da6a219 RENAME TO idx_d499bff6d6328574');
        $this->addSql('ALTER INDEX idx_80071925460d9fd7 RENAME TO idx_8007192566ef0cab');
    }
}
