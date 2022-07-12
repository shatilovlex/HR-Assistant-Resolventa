<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220712084022 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE UNIQUE INDEX UNIQ_595AAE345E237E06 ON grade (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_431909CD5E237E06 ON group_competence (name)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_595AAE345E237E06 ON grade');
        $this->addSql('DROP INDEX UNIQ_431909CD5E237E06 ON group_competence');
    }
}
