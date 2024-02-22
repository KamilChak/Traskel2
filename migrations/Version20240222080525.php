<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240222080525 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE livraisons_cadeaux (id INT AUTO_INCREMENT NOT NULL, membre_id INT NOT NULL, livreur_id INT NOT NULL, INDEX IDX_7222303F6A99F74A (membre_id), INDEX IDX_7222303FF8646701 (livreur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE livraisons_cadeaux_cadeaux (livraisons_cadeaux_id INT NOT NULL, cadeaux_id INT NOT NULL, INDEX IDX_88E34483435010F8 (livraisons_cadeaux_id), INDEX IDX_88E34483DA7CA8F0 (cadeaux_id), PRIMARY KEY(livraisons_cadeaux_id, cadeaux_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE livraisons_cadeaux ADD CONSTRAINT FK_7222303F6A99F74A FOREIGN KEY (membre_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE livraisons_cadeaux ADD CONSTRAINT FK_7222303FF8646701 FOREIGN KEY (livreur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE livraisons_cadeaux_cadeaux ADD CONSTRAINT FK_88E34483435010F8 FOREIGN KEY (livraisons_cadeaux_id) REFERENCES livraisons_cadeaux (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livraisons_cadeaux_cadeaux ADD CONSTRAINT FK_88E34483DA7CA8F0 FOREIGN KEY (cadeaux_id) REFERENCES cadeaux (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraisons_cadeaux DROP FOREIGN KEY FK_7222303F6A99F74A');
        $this->addSql('ALTER TABLE livraisons_cadeaux DROP FOREIGN KEY FK_7222303FF8646701');
        $this->addSql('ALTER TABLE livraisons_cadeaux_cadeaux DROP FOREIGN KEY FK_88E34483435010F8');
        $this->addSql('ALTER TABLE livraisons_cadeaux_cadeaux DROP FOREIGN KEY FK_88E34483DA7CA8F0');
        $this->addSql('DROP TABLE livraisons_cadeaux');
        $this->addSql('DROP TABLE livraisons_cadeaux_cadeaux');
    }
}
