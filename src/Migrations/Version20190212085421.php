<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190212085421 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE booth (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, adress LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dish (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price NUMERIC(5, 2) NOT NULL, vegetarian TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dish_booth (id INT AUTO_INCREMENT NOT NULL, booth_id INT NOT NULL, dish_id INT NOT NULL, INDEX IDX_671ECFAD18707CED (booth_id), INDEX IDX_671ECFAD148EB0CB (dish_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rating (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, booth_id INT NOT NULL, note INT NOT NULL, comment LONGTEXT NOT NULL, INDEX IDX_D8892622A76ED395 (user_id), INDEX IDX_D889262218707CED (booth_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dish_booth ADD CONSTRAINT FK_671ECFAD18707CED FOREIGN KEY (booth_id) REFERENCES booth (id)');
        $this->addSql('ALTER TABLE dish_booth ADD CONSTRAINT FK_671ECFAD148EB0CB FOREIGN KEY (dish_id) REFERENCES dish (id)');
        $this->addSql('ALTER TABLE rating ADD CONSTRAINT FK_D8892622A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rating ADD CONSTRAINT FK_D889262218707CED FOREIGN KEY (booth_id) REFERENCES booth (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE dish_booth DROP FOREIGN KEY FK_671ECFAD18707CED');
        $this->addSql('ALTER TABLE rating DROP FOREIGN KEY FK_D889262218707CED');
        $this->addSql('ALTER TABLE dish_booth DROP FOREIGN KEY FK_671ECFAD148EB0CB');
        $this->addSql('DROP TABLE booth');
        $this->addSql('DROP TABLE dish');
        $this->addSql('DROP TABLE dish_booth');
        $this->addSql('DROP TABLE rating');
    }
}
