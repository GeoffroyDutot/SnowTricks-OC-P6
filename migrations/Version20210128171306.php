<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210128171306 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE trick ADD user_author_id INT NOT NULL, ADD user_editor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE trick ADD CONSTRAINT FK_D8F0A91EF6957EFF FOREIGN KEY (user_author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE trick ADD CONSTRAINT FK_D8F0A91E697521A8 FOREIGN KEY (user_editor_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D8F0A91EF6957EFF ON trick (user_author_id)');
        $this->addSql('CREATE INDEX IDX_D8F0A91E697521A8 ON trick (user_editor_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE trick DROP FOREIGN KEY FK_D8F0A91EF6957EFF');
        $this->addSql('ALTER TABLE trick DROP FOREIGN KEY FK_D8F0A91E697521A8');
        $this->addSql('DROP INDEX IDX_D8F0A91EF6957EFF ON trick');
        $this->addSql('DROP INDEX IDX_D8F0A91E697521A8 ON trick');
        $this->addSql('ALTER TABLE trick DROP user_author_id, DROP user_editor_id');
    }
}
