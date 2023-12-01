<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231201132656 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE advertisement (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, moto_id INT NOT NULL, title VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, creadted_at DATETIME NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_C95F6AEEA76ED395 (user_id), INDEX IDX_C95F6AEE78B8F2AC (moto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1C52F9585E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_moto (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B646C6A35E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images_advert (id INT AUTO_INCREMENT NOT NULL, advertisement_id INT NOT NULL, path VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_960B334DB548B0F (path), INDEX IDX_960B334DA1FBF71B (advertisement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model_moto (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, brand_id INT NOT NULL, name VARCHAR(255) NOT NULL, year INT NOT NULL, engine INT NOT NULL, INDEX IDX_108A900312469DE2 (category_id), INDEX IDX_108A900344F5D008 (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, profile_picture VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(20) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D64986CC499D (pseudo), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE advertisement ADD CONSTRAINT FK_C95F6AEEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE advertisement ADD CONSTRAINT FK_C95F6AEE78B8F2AC FOREIGN KEY (moto_id) REFERENCES model_moto (id)');
        $this->addSql('ALTER TABLE images_advert ADD CONSTRAINT FK_960B334DA1FBF71B FOREIGN KEY (advertisement_id) REFERENCES advertisement (id)');
        $this->addSql('ALTER TABLE model_moto ADD CONSTRAINT FK_108A900312469DE2 FOREIGN KEY (category_id) REFERENCES category_moto (id)');
        $this->addSql('ALTER TABLE model_moto ADD CONSTRAINT FK_108A900344F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE advertisement DROP FOREIGN KEY FK_C95F6AEEA76ED395');
        $this->addSql('ALTER TABLE advertisement DROP FOREIGN KEY FK_C95F6AEE78B8F2AC');
        $this->addSql('ALTER TABLE images_advert DROP FOREIGN KEY FK_960B334DA1FBF71B');
        $this->addSql('ALTER TABLE model_moto DROP FOREIGN KEY FK_108A900312469DE2');
        $this->addSql('ALTER TABLE model_moto DROP FOREIGN KEY FK_108A900344F5D008');
        $this->addSql('DROP TABLE advertisement');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE category_moto');
        $this->addSql('DROP TABLE images_advert');
        $this->addSql('DROP TABLE model_moto');
        $this->addSql('DROP TABLE user');
    }
}
