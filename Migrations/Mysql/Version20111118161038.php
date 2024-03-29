<?php
namespace TYPO3\FLOW3\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
	Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20111118161038 extends AbstractMigration {

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function up(Schema $schema) {
			// this up() migration is autogenerated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
		
		$this->addSql("CREATE TABLE admindemo_domain_model_annotations_addresses_join (admindemo_annotations VARCHAR(40) NOT NULL, admindemo_address VARCHAR(40) NOT NULL, INDEX IDX_FC1ECAC74E26E6BB (admindemo_annotations), INDEX IDX_FC1ECAC7942C0B5 (admindemo_address), PRIMARY KEY(admindemo_annotations, admindemo_address)) ENGINE = InnoDB");
		$this->addSql("ALTER TABLE admindemo_domain_model_annotations_addresses_join ADD CONSTRAINT FK_FC1ECAC74E26E6BB FOREIGN KEY (admindemo_annotations) REFERENCES admindemo_domain_model_annotations(flow3_persistence_identifier)");
		$this->addSql("ALTER TABLE admindemo_domain_model_annotations_addresses_join ADD CONSTRAINT FK_FC1ECAC7942C0B5 FOREIGN KEY (admindemo_address) REFERENCES admindemo_domain_model_address(flow3_persistence_identifier)");
		$this->addSql("ALTER TABLE admindemo_domain_model_annotations DROP FOREIGN KEY FK_59E787E06FCA7516");
		$this->addSql("DROP INDEX IDX_59E787E06FCA7516 ON admindemo_domain_model_annotations");
		$this->addSql("ALTER TABLE admindemo_domain_model_annotations DROP addresses");
	}

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function down(Schema $schema) {
			// this down() migration is autogenerated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
		
		$this->addSql("DROP TABLE admindemo_domain_model_annotations_addresses_join");
		$this->addSql("ALTER TABLE admindemo_domain_model_annotations ADD addresses VARCHAR(40) DEFAULT NULL");
		$this->addSql("ALTER TABLE admindemo_domain_model_annotations ADD CONSTRAINT FK_59E787E06FCA7516 FOREIGN KEY (addresses) REFERENCES admindemo_domain_model_address(flow3_persistence_identifier)");
		$this->addSql("CREATE INDEX IDX_59E787E06FCA7516 ON admindemo_domain_model_annotations (addresses)");
	}
}

?>