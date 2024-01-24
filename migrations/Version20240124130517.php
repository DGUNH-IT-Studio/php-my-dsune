<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240124130517 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE schedule_ring_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE schedule_ring (id INT NOT NULL, education_form_id INT DEFAULT NULL, lesson_num INT NOT NULL, time_start TIME(0) WITHOUT TIME ZONE DEFAULT NULL, time_end TIME(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6F94D52D43D2F4A5 ON schedule_ring (education_form_id)');
        $this->addSql('ALTER TABLE schedule_ring ADD CONSTRAINT FK_6F94D52D43D2F4A5 FOREIGN KEY (education_form_id) REFERENCES education_form (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE schedule_ring_id_seq CASCADE');
        $this->addSql('ALTER TABLE schedule_ring DROP CONSTRAINT FK_6F94D52D43D2F4A5');
        $this->addSql('DROP TABLE schedule_ring');
    }
}
