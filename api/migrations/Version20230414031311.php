<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230414031311 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE greeting_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE author_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE book_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE customer_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE purchase_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE author (id INT NOT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE book (id INT NOT NULL, author_id INT DEFAULT NULL, isbn VARCHAR(13) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, summary VARCHAR(255) DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_CBE5A331F675F31B ON book (author_id)');
        $this->addSql('CREATE TABLE customer (id INT NOT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE purchase (id INT NOT NULL, book_id INT NOT NULL, customer_id INT DEFAULT NULL, purchase_date DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6117D13B16A2B381 ON purchase (book_id)');
        $this->addSql('CREATE INDEX IDX_6117D13B9395C3F3 ON purchase (customer_id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331F675F31B FOREIGN KEY (author_id) REFERENCES author (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE purchase ADD CONSTRAINT FK_6117D13B16A2B381 FOREIGN KEY (book_id) REFERENCES book (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE purchase ADD CONSTRAINT FK_6117D13B9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE greeting');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE author_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE book_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE customer_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE purchase_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE greeting_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE greeting (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE book DROP CONSTRAINT FK_CBE5A331F675F31B');
        $this->addSql('ALTER TABLE purchase DROP CONSTRAINT FK_6117D13B16A2B381');
        $this->addSql('ALTER TABLE purchase DROP CONSTRAINT FK_6117D13B9395C3F3');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE purchase');
    }
}
