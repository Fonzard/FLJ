<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231117150015 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact ADD full_name VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE contact ADD subject VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE contact ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE contact DROP first_name');
        $this->addSql('ALTER TABLE contact DROP last_name');
        $this->addSql('ALTER TABLE contact DROP date');
        $this->addSql('ALTER TABLE contact ALTER email TYPE VARCHAR(180)');
        $this->addSql('COMMENT ON COLUMN contact.created_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE contact ADD first_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE contact ADD last_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE contact ADD date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE contact DROP full_name');
        $this->addSql('ALTER TABLE contact DROP subject');
        $this->addSql('ALTER TABLE contact DROP created_at');
        $this->addSql('ALTER TABLE contact ALTER email TYPE VARCHAR(255)');
    }
}
