<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220711151341 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employee_position ADD employee_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE employee_position ADD CONSTRAINT FK_D613B5328C03F15C FOREIGN KEY (employee_id) REFERENCES employees (id)');
        $this->addSql('CREATE INDEX IDX_D613B5328C03F15C ON employee_position (employee_id)');
        $this->addSql('ALTER TABLE employees ADD employee_positions_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE employees ADD CONSTRAINT FK_BA82C3005626F6EE FOREIGN KEY (employee_positions_id) REFERENCES employee_position (id)');
        $this->addSql('CREATE INDEX IDX_BA82C3005626F6EE ON employees (employee_positions_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employee_position DROP FOREIGN KEY FK_D613B5328C03F15C');
        $this->addSql('DROP INDEX IDX_D613B5328C03F15C ON employee_position');
        $this->addSql('ALTER TABLE employee_position DROP employee_id');
        $this->addSql('ALTER TABLE employees DROP FOREIGN KEY FK_BA82C3005626F6EE');
        $this->addSql('DROP INDEX IDX_BA82C3005626F6EE ON employees');
        $this->addSql('ALTER TABLE employees DROP employee_positions_id');
    }
}
