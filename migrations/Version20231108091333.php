<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231108091333 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE custom_made_formation DROP CONSTRAINT fk_f79d356d571edda');
        $this->addSql('DROP INDEX idx_f79d356d571edda');
        $this->addSql('ALTER TABLE custom_made_formation DROP homepage_id');
        $this->addSql('ALTER TABLE owner_presentation DROP CONSTRAINT fk_9fbb2a59571edda');
        $this->addSql('DROP INDEX idx_9fbb2a59571edda');
        $this->addSql('ALTER TABLE owner_presentation DROP homepage_id');
        $this->addSql('ALTER TABLE partnership_formation DROP CONSTRAINT fk_556277bb571edda');
        $this->addSql('DROP INDEX idx_556277bb571edda');
        $this->addSql('ALTER TABLE partnership_formation DROP homepage_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE owner_presentation ADD homepage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE owner_presentation ADD CONSTRAINT fk_9fbb2a59571edda FOREIGN KEY (homepage_id) REFERENCES homepage (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_9fbb2a59571edda ON owner_presentation (homepage_id)');
        $this->addSql('ALTER TABLE partnership_formation ADD homepage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE partnership_formation ADD CONSTRAINT fk_556277bb571edda FOREIGN KEY (homepage_id) REFERENCES homepage (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_556277bb571edda ON partnership_formation (homepage_id)');
        $this->addSql('ALTER TABLE custom_made_formation ADD homepage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE custom_made_formation ADD CONSTRAINT fk_f79d356d571edda FOREIGN KEY (homepage_id) REFERENCES homepage (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_f79d356d571edda ON custom_made_formation (homepage_id)');
    }
}
