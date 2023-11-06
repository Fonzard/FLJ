<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106135544 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE article_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE custom_made_formation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE formation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE formation_content_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE partner_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE partnership_formation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE presentation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE project_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE contact (id INT NOT NULL, email VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, message TEXT NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE custom_made_formation (id INT NOT NULL, title VARCHAR(255) NOT NULL, content TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE formation (id INT NOT NULL, info_id_id INT NOT NULL, partner_id_id INT NOT NULL, formation_content_id_id INT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, type BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_404021BF751D5BA2 ON formation (info_id_id)');
        $this->addSql('CREATE INDEX IDX_404021BF6C783232 ON formation (partner_id_id)');
        $this->addSql('CREATE INDEX IDX_404021BFCD25A964 ON formation (formation_content_id_id)');
        $this->addSql('CREATE TABLE formation_content (id INT NOT NULL, objectif TEXT NOT NULL, démarche TEXT NOT NULL, contributor TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE homepage (id INT NOT NULL, title VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE info (id INT NOT NULL, date VARCHAR(255) NOT NULL, duration VARCHAR(255) DEFAULT NULL, place VARCHAR(255) DEFAULT NULL, cost VARCHAR(255) DEFAULT NULL, educational_cost VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE partner (id INT NOT NULL, image VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE partnership_formation (id INT NOT NULL, title VARCHAR(255) NOT NULL, content TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE presentation (id INT NOT NULL, name VARCHAR(255) NOT NULL, description_title VARCHAR(255) NOT NULL, description TEXT NOT NULL, short_presentation TEXT NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE presentation_project (presentation_id INT NOT NULL, project_id INT NOT NULL, PRIMARY KEY(presentation_id, project_id))');
        $this->addSql('CREATE INDEX IDX_B2C090B7AB627E8B ON presentation_project (presentation_id)');
        $this->addSql('CREATE INDEX IDX_B2C090B7166D1F9C ON presentation_project (project_id)');
        $this->addSql('CREATE TABLE project (id INT NOT NULL, title VARCHAR(255) NOT NULL, content TEXT NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, token_registration VARCHAR(255) DEFAULT NULL, token_registration_life_time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, is_verified BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('COMMENT ON COLUMN messenger_messages.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.available_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.delivered_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF751D5BA2 FOREIGN KEY (info_id_id) REFERENCES info (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF6C783232 FOREIGN KEY (partner_id_id) REFERENCES partner (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFCD25A964 FOREIGN KEY (formation_content_id_id) REFERENCES formation_content (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE presentation_project ADD CONSTRAINT FK_B2C090B7AB627E8B FOREIGN KEY (presentation_id) REFERENCES presentation (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE presentation_project ADD CONSTRAINT FK_B2C090B7166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE custom_made_formation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE formation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE formation_content_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE partner_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE partnership_formation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE presentation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE project_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE article_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('ALTER TABLE formation DROP CONSTRAINT FK_404021BF751D5BA2');
        $this->addSql('ALTER TABLE formation DROP CONSTRAINT FK_404021BF6C783232');
        $this->addSql('ALTER TABLE formation DROP CONSTRAINT FK_404021BFCD25A964');
        $this->addSql('ALTER TABLE presentation_project DROP CONSTRAINT FK_B2C090B7AB627E8B');
        $this->addSql('ALTER TABLE presentation_project DROP CONSTRAINT FK_B2C090B7166D1F9C');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE custom_made_formation');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE formation_content');
        $this->addSql('DROP TABLE homepage');
        $this->addSql('DROP TABLE info');
        $this->addSql('DROP TABLE partner');
        $this->addSql('DROP TABLE partnership_formation');
        $this->addSql('DROP TABLE presentation');
        $this->addSql('DROP TABLE presentation_project');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
