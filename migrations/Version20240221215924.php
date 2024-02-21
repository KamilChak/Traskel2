<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240221215924 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cadeaux (id INT AUTO_INCREMENT NOT NULL, nom_cad VARCHAR(255) NOT NULL, descrp_cad VARCHAR(255) DEFAULT NULL, photo_cad VARCHAR(255) NOT NULL, point_cad INT NOT NULL, id_user_id INT DEFAULT NULL, INDEX IDX_C15356EF79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE categorie_prod (id INT AUTO_INCREMENT NOT NULL, categorie_prod VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE categoriecad (id INT AUTO_INCREMENT NOT NULL, categorie_cad VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE checkdon (id INT AUTO_INCREMENT NOT NULL, check_don TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, adresse_cmd VARCHAR(255) NOT NULL, statut_cmd VARCHAR(255) NOT NULL, prix_cmd DOUBLE PRECISION NOT NULL, delais_cmd VARCHAR(255) NOT NULL, id_panier_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_6EEAA67D77482E5B (id_panier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE don (id INT AUTO_INCREMENT NOT NULL, image_don VARCHAR(255) NOT NULL, quantite_don DOUBLE PRECISION NOT NULL, descrp_don VARCHAR(255) DEFAULT NULL, adresse_don VARCHAR(255) NOT NULL, point_don INT DEFAULT NULL, user_ident_id INT DEFAULT NULL, userident_id INT DEFAULT NULL, check_don_id INT DEFAULT NULL, INDEX IDX_F8F081D936949423 (user_ident_id), INDEX IDX_F8F081D9FA5C8F54 (userident_id), INDEX IDX_F8F081D9ECC69CE (check_don_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE don_cadeaux (don_id INT NOT NULL, cadeaux_id INT NOT NULL, INDEX IDX_EFFE39667B3C9061 (don_id), INDEX IDX_EFFE3966DA7CA8F0 (cadeaux_id), PRIMARY KEY(don_id, cadeaux_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, id_membre_id INT DEFAULT NULL, INDEX IDX_A60C9F1FEAAC4B6D (id_membre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, nbr_prods INT DEFAULT NULL, total_prix DOUBLE PRECISION NOT NULL, livraison_id INT DEFAULT NULL, INDEX IDX_24CC0DF28E54FB25 (livraison_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, nom_prod VARCHAR(255) NOT NULL, descrp_prod VARCHAR(10000) DEFAULT NULL, photo_prod VARCHAR(255) NOT NULL, type_prod TINYINT(1) NOT NULL, prix_prod DOUBLE PRECISION NOT NULL, id_user_id INT DEFAULT NULL, id_cat_id INT DEFAULT NULL, panier_id INT DEFAULT NULL, INDEX IDX_29A5EC2779F37AE5 (id_user_id), INDEX IDX_29A5EC27C09A1CAE (id_cat_id), INDEX IDX_29A5EC27F77D927C (panier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom_user VARCHAR(255) NOT NULL, prenom_user VARCHAR(255) NOT NULL, adresse_user VARCHAR(255) DEFAULT NULL, tel_user VARCHAR(255) DEFAULT NULL, points_user INT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE cadeaux ADD CONSTRAINT FK_C15356EF79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D77482E5B FOREIGN KEY (id_panier_id) REFERENCES panier (id)');
        $this->addSql('ALTER TABLE don ADD CONSTRAINT FK_F8F081D936949423 FOREIGN KEY (user_ident_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE don ADD CONSTRAINT FK_F8F081D9FA5C8F54 FOREIGN KEY (userident_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE don ADD CONSTRAINT FK_F8F081D9ECC69CE FOREIGN KEY (check_don_id) REFERENCES checkdon (id)');
        $this->addSql('ALTER TABLE don_cadeaux ADD CONSTRAINT FK_EFFE39667B3C9061 FOREIGN KEY (don_id) REFERENCES don (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE don_cadeaux ADD CONSTRAINT FK_EFFE3966DA7CA8F0 FOREIGN KEY (cadeaux_id) REFERENCES cadeaux (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1FEAAC4B6D FOREIGN KEY (id_membre_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF28E54FB25 FOREIGN KEY (livraison_id) REFERENCES livraison (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2779F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27C09A1CAE FOREIGN KEY (id_cat_id) REFERENCES categorie_prod (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27F77D927C FOREIGN KEY (panier_id) REFERENCES panier (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cadeaux DROP FOREIGN KEY FK_C15356EF79F37AE5');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D77482E5B');
        $this->addSql('ALTER TABLE don DROP FOREIGN KEY FK_F8F081D936949423');
        $this->addSql('ALTER TABLE don DROP FOREIGN KEY FK_F8F081D9FA5C8F54');
        $this->addSql('ALTER TABLE don DROP FOREIGN KEY FK_F8F081D9ECC69CE');
        $this->addSql('ALTER TABLE don_cadeaux DROP FOREIGN KEY FK_EFFE39667B3C9061');
        $this->addSql('ALTER TABLE don_cadeaux DROP FOREIGN KEY FK_EFFE3966DA7CA8F0');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1FEAAC4B6D');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF28E54FB25');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2779F37AE5');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27C09A1CAE');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27F77D927C');
        $this->addSql('DROP TABLE cadeaux');
        $this->addSql('DROP TABLE categorie_prod');
        $this->addSql('DROP TABLE categoriecad');
        $this->addSql('DROP TABLE checkdon');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE don');
        $this->addSql('DROP TABLE don_cadeaux');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
