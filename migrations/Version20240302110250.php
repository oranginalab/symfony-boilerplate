<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240302110250 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE greeting ADD mood_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\'');
        $this->addSql('ALTER TABLE greeting ADD CONSTRAINT FK_46E3A4ABB889D33E FOREIGN KEY (mood_id) REFERENCES mood (id)');
        $this->addSql('CREATE INDEX IDX_46E3A4ABB889D33E ON greeting (mood_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE greeting DROP FOREIGN KEY FK_46E3A4ABB889D33E');
        $this->addSql('DROP INDEX IDX_46E3A4ABB889D33E ON greeting');
        $this->addSql('ALTER TABLE greeting DROP mood_id');
    }
}
