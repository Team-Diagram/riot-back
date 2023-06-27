<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230627122034 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE "group" (id UUID NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN "group".id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE measure (id UUID NOT NULL, node_id_id UUID NOT NULL, time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, value JSONB NOT NULL, sensor_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8007192566EF0CAB ON measure (node_id_id)');
        $this->addSql('COMMENT ON COLUMN measure.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN measure.node_id_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE node (id UUID NOT NULL, place_id_id UUID DEFAULT NULL, group_id_id UUID DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_857FE845D6328574 ON node (place_id_id)');
        $this->addSql('CREATE INDEX IDX_857FE8452F68B530 ON node (group_id_id)');
        $this->addSql('COMMENT ON COLUMN node.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN node.place_id_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN node.group_id_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE node_meta (id UUID NOT NULL, node_id_id UUID NOT NULL, meta_key VARCHAR(255) NOT NULL, meta_value VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_105699A366EF0CAB ON node_meta (node_id_id)');
        $this->addSql('COMMENT ON COLUMN node_meta.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN node_meta.node_id_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE place (id UUID NOT NULL, name VARCHAR(255) NOT NULL, people_count INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN place.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE planning (id UUID NOT NULL, place_id_id UUID NOT NULL, start_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, end_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D499BFF6D6328574 ON planning (place_id_id)');
        $this->addSql('COMMENT ON COLUMN planning.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN planning.place_id_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE "user" (id UUID NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, admin BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('COMMENT ON COLUMN "user".id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE measure ADD CONSTRAINT FK_8007192566EF0CAB FOREIGN KEY (node_id_id) REFERENCES node (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE node ADD CONSTRAINT FK_857FE845D6328574 FOREIGN KEY (place_id_id) REFERENCES place (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE node ADD CONSTRAINT FK_857FE8452F68B530 FOREIGN KEY (group_id_id) REFERENCES "group" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE node_meta ADD CONSTRAINT FK_105699A366EF0CAB FOREIGN KEY (node_id_id) REFERENCES node (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE planning ADD CONSTRAINT FK_D499BFF6D6328574 FOREIGN KEY (place_id_id) REFERENCES place (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE measure DROP CONSTRAINT FK_8007192566EF0CAB');
        $this->addSql('ALTER TABLE node DROP CONSTRAINT FK_857FE845D6328574');
        $this->addSql('ALTER TABLE node DROP CONSTRAINT FK_857FE8452F68B530');
        $this->addSql('ALTER TABLE node_meta DROP CONSTRAINT FK_105699A366EF0CAB');
        $this->addSql('ALTER TABLE planning DROP CONSTRAINT FK_D499BFF6D6328574');
        $this->addSql('DROP TABLE "group"');
        $this->addSql('DROP TABLE measure');
        $this->addSql('DROP TABLE node');
        $this->addSql('DROP TABLE node_meta');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP TABLE planning');
        $this->addSql('DROP TABLE "user"');
    }
}
