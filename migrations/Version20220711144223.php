<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220711144223 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employee_position ADD expectation_level_id INT DEFAULT NULL, ADD final_score INT NOT NULL');
        $this->addSql('ALTER TABLE employee_position ADD CONSTRAINT FK_D613B532EDA0CCCC FOREIGN KEY (expectation_level_id) REFERENCES expectation_level (id)');
        $this->addSql('CREATE INDEX IDX_D613B532EDA0CCCC ON employee_position (expectation_level_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employee_position DROP FOREIGN KEY FK_D613B532EDA0CCCC');
        $this->addSql('DROP INDEX IDX_D613B532EDA0CCCC ON employee_position');
        $this->addSql('ALTER TABLE employee_position DROP expectation_level_id, DROP final_score');
    }
}
