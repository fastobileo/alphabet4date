<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230728091436 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE date DROP image_original_name');
        $this->addSql('ALTER TABLE date DROP image_mime_type');
        $this->addSql('ALTER TABLE date DROP image_dimensions');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE date ADD image_original_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE date ADD image_mime_type VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE date ADD image_dimensions TEXT DEFAULT NULL');
        $this->addSql('COMMENT ON COLUMN date.image_dimensions IS \'(DC2Type:simple_array)\'');
    }
}
