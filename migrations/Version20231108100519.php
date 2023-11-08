<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231108100519 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE custom_made_formation ADD is_active BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE homepage ADD is_active BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE owner_presentation ADD is_active BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE partnership_formation ADD is_active BOOLEAN NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE homepage DROP is_active');
        $this->addSql('ALTER TABLE owner_presentation DROP is_active');
        $this->addSql('ALTER TABLE custom_made_formation DROP is_active');
        $this->addSql('ALTER TABLE partnership_formation DROP is_active');
    }
}
