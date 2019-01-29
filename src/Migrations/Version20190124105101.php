<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190124105101 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE training_module (training_id INT NOT NULL, module_id INT NOT NULL, INDEX IDX_3FC8E147BEFD98D1 (training_id), INDEX IDX_3FC8E147AFC2B591 (module_id), PRIMARY KEY(training_id, module_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE training_module ADD CONSTRAINT FK_3FC8E147BEFD98D1 FOREIGN KEY (training_id) REFERENCES training (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE training_module ADD CONSTRAINT FK_3FC8E147AFC2B591 FOREIGN KEY (module_id) REFERENCES module (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE training_module');
    }
}
