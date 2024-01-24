<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240124131715 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE education_program_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE education_program (id INT NOT NULL, education_level_id INT DEFAULT NULL, education_form_id INT DEFAULT NULL, education_profile_id INT DEFAULT NULL, education_program_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8EC9185CD7A5352E ON education_program (education_level_id)');
        $this->addSql('CREATE INDEX IDX_8EC9185C43D2F4A5 ON education_program (education_form_id)');
        $this->addSql('CREATE INDEX IDX_8EC9185C9106E595 ON education_program (education_profile_id)');
        $this->addSql('ALTER TABLE education_program ADD CONSTRAINT FK_8EC9185CD7A5352E FOREIGN KEY (education_level_id) REFERENCES education_level (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE education_program ADD CONSTRAINT FK_8EC9185C43D2F4A5 FOREIGN KEY (education_form_id) REFERENCES education_form (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE education_program ADD CONSTRAINT FK_8EC9185C9106E595 FOREIGN KEY (education_profile_id) REFERENCES education_profile (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE education_program_id_seq CASCADE');
        $this->addSql('ALTER TABLE education_program DROP CONSTRAINT FK_8EC9185CD7A5352E');
        $this->addSql('ALTER TABLE education_program DROP CONSTRAINT FK_8EC9185C43D2F4A5');
        $this->addSql('ALTER TABLE education_program DROP CONSTRAINT FK_8EC9185C9106E595');
        $this->addSql('DROP TABLE education_program');
    }
}
