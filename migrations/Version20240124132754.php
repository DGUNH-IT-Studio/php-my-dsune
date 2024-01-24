<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240124132754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE schedule_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE schedule (id INT NOT NULL, term_id INT DEFAULT NULL, teacher_id INT DEFAULT NULL, classroom_id INT DEFAULT NULL, lesson_type_id INT DEFAULT NULL, date_start DATE DEFAULT NULL, date_end DATE DEFAULT NULL, week INT NOT NULL, weekday INT NOT NULL, lesson_num INT DEFAULT NULL, lesson_title VARCHAR(255) NOT NULL, reference TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5A3811FBE2C35FC ON schedule (term_id)');
        $this->addSql('CREATE INDEX IDX_5A3811FB41807E1D ON schedule (teacher_id)');
        $this->addSql('CREATE INDEX IDX_5A3811FB6278D5A8 ON schedule (classroom_id)');
        $this->addSql('CREATE INDEX IDX_5A3811FB3030DE34 ON schedule (lesson_type_id)');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FBE2C35FC FOREIGN KEY (term_id) REFERENCES term (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB41807E1D FOREIGN KEY (teacher_id) REFERENCES teacher (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB6278D5A8 FOREIGN KEY (classroom_id) REFERENCES classroom (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB3030DE34 FOREIGN KEY (lesson_type_id) REFERENCES lesson_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE schedule_id_seq CASCADE');
        $this->addSql('ALTER TABLE schedule DROP CONSTRAINT FK_5A3811FBE2C35FC');
        $this->addSql('ALTER TABLE schedule DROP CONSTRAINT FK_5A3811FB41807E1D');
        $this->addSql('ALTER TABLE schedule DROP CONSTRAINT FK_5A3811FB6278D5A8');
        $this->addSql('ALTER TABLE schedule DROP CONSTRAINT FK_5A3811FB3030DE34');
        $this->addSql('DROP TABLE schedule');
    }
}
