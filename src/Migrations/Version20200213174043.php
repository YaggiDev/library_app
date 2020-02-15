<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200213174043 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE dzielo ADD kategoria_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE dzielo ADD CONSTRAINT FK_8DB2FDA1359B0684 FOREIGN KEY (kategoria_id) REFERENCES kategoria (id)');
        $this->addSql('CREATE INDEX IDX_8DB2FDA1359B0684 ON dzielo (kategoria_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE dzielo DROP FOREIGN KEY FK_8DB2FDA1359B0684');
        $this->addSql('DROP INDEX IDX_8DB2FDA1359B0684 ON dzielo');
        $this->addSql('ALTER TABLE dzielo DROP kategoria_id');
    }
}
