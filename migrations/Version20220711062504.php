<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220711062504 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE expectation_level ADD competence_id INT DEFAULT NULL, ADD score INT NOT NULL');
        $this->addSql('ALTER TABLE expectation_level ADD CONSTRAINT FK_95EC0EFC15761DAB FOREIGN KEY (competence_id) REFERENCES competence (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_95EC0EFC15761DAB ON expectation_level (competence_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE expectation_level DROP FOREIGN KEY FK_95EC0EFC15761DAB');
        $this->addSql('DROP INDEX UNIQ_95EC0EFC15761DAB ON expectation_level');
        $this->addSql('ALTER TABLE expectation_level DROP competence_id, DROP score');
    }
}
