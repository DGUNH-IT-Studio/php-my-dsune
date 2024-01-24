<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240124132048 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE education_group_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE education_group (id INT NOT NULL, education_program_id INT DEFAULT NULL, course INT NOT NULL, num INT NOT NULL, subnum INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D14C5E626344F027 ON education_group (education_program_id)');
        $this->addSql('ALTER TABLE education_group ADD CONSTRAINT FK_D14C5E626344F027 FOREIGN KEY (education_program_id) REFERENCES education_program (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE education_group_id_seq CASCADE');
        $this->addSql('ALTER TABLE education_group DROP CONSTRAINT FK_D14C5E626344F027');
        $this->addSql('DROP TABLE education_group');
    }
}
