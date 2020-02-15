<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200215222042 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE prywatne_dzielo (id INT AUTO_INCREMENT NOT NULL, dzielo_id INT DEFAULT NULL, uzytkownik_id INT DEFAULT NULL, INDEX IDX_3C82ED1B3A86BFBA (dzielo_id), INDEX IDX_3C82ED1B31D6FDE9 (uzytkownik_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prywatne_dzielo ADD CONSTRAINT FK_3C82ED1B3A86BFBA FOREIGN KEY (dzielo_id) REFERENCES dzielo (id)');
        $this->addSql('ALTER TABLE prywatne_dzielo ADD CONSTRAINT FK_3C82ED1B31D6FDE9 FOREIGN KEY (uzytkownik_id) REFERENCES uzytkownik (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE prywatne_dzielo');
    }
}
