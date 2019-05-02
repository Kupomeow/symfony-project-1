<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190502090022 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE personnage (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_skill (personnage_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_F46EE84D5E315342 (personnage_id), INDEX IDX_F46EE84D5585C142 (skill_id), PRIMARY KEY(personnage_id, skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_role (personnage_id INT NOT NULL, role_id INT NOT NULL, INDEX IDX_E29EF045E315342 (personnage_id), INDEX IDX_E29EF04D60322AC (role_id), PRIMARY KEY(personnage_id, role_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, element VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personnage_skill ADD CONSTRAINT FK_F46EE84D5E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage_skill ADD CONSTRAINT FK_F46EE84D5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage_role ADD CONSTRAINT FK_E29EF045E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage_role ADD CONSTRAINT FK_E29EF04D60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE personnage_skill DROP FOREIGN KEY FK_F46EE84D5E315342');
        $this->addSql('ALTER TABLE personnage_role DROP FOREIGN KEY FK_E29EF045E315342');
        $this->addSql('ALTER TABLE personnage_role DROP FOREIGN KEY FK_E29EF04D60322AC');
        $this->addSql('ALTER TABLE personnage_skill DROP FOREIGN KEY FK_F46EE84D5585C142');
        $this->addSql('DROP TABLE personnage');
        $this->addSql('DROP TABLE personnage_skill');
        $this->addSql('DROP TABLE personnage_role');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE skill');
    }
}
