<?php
namespace TYPO3\FLOW3\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
	Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20111126121927 extends AbstractMigration {

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function up(Schema $schema) {
			// this up() migration is autogenerated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
		
		$this->addSql("ALTER TABLE admindemo_domain_model_address DROP FOREIGN KEY FK_301E68F64FBF094F");
		$this->addSql("ALTER TABLE admindemo_domain_model_note DROP FOREIGN KEY FK_8A8D94954FBF094F");
		$this->addSql("ALTER TABLE admindemo_domain_model_company DROP FOREIGN KEY FK_72EF0E3811BA68C");
		$this->addSql("ALTER TABLE admindemo_domain_model_todo_projects_join DROP FOREIGN KEY FK_DAB1A983172789B3");
		$this->addSql("DROP TABLE admindemo_domain_model_company");
		$this->addSql("DROP TABLE admindemo_domain_model_contact");
		$this->addSql("DROP TABLE admindemo_domain_model_note");
		$this->addSql("DROP TABLE admindemo_domain_model_project_users_join");
		$this->addSql("DROP TABLE admindemo_domain_model_todo");
		$this->addSql("DROP TABLE admindemo_domain_model_todo_projects_join");
		$this->addSql("DROP INDEX IDX_301E68F64FBF094F ON admindemo_domain_model_address");
		$this->addSql("ALTER TABLE admindemo_domain_model_address DROP company");
		$this->addSql("ALTER TABLE admindemo_domain_model_annotations ADD optionsprovider VARCHAR(255) DEFAULT NULL");
		$this->addSql("ALTER TABLE admindemo_domain_model_message ADD sender VARCHAR(40) DEFAULT NULL, ADD subject VARCHAR(255) DEFAULT NULL, ADD content VARCHAR(255) DEFAULT NULL");
		$this->addSql("ALTER TABLE admindemo_domain_model_message ADD CONSTRAINT FK_8BED37085F004ACF FOREIGN KEY (sender) REFERENCES admindemo_domain_model_person(flow3_persistence_identifier)");
		$this->addSql("ALTER TABLE admindemo_domain_model_message ADD CONSTRAINT FK_8BED370821E3D446 FOREIGN KEY (flow3_persistence_identifier) REFERENCES admin_core_domain_magic(flow3_persistence_identifier) ON DELETE CASCADE");
		$this->addSql("CREATE INDEX IDX_8BED37085F004ACF ON admindemo_domain_model_message (sender)");
		$this->addSql("ALTER TABLE admindemo_domain_model_widgets DROP FOREIGN KEY FK_A008E3B6CB893157");
		$this->addSql("DROP INDEX IDX_A008E3B6CB893157 ON admindemo_domain_model_widgets");
		$this->addSql("ALTER TABLE admindemo_domain_model_widgets DROP info");
	}

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function down(Schema $schema) {
			// this down() migration is autogenerated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
		
		$this->addSql("CREATE TABLE admindemo_domain_model_company (flow3_persistence_identifier VARCHAR(40) NOT NULL, notes VARCHAR(40) DEFAULT NULL, addresses VARCHAR(40) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, INDEX IDX_72EF0E3811BA68C (notes), INDEX IDX_72EF0E386FCA7516 (addresses), PRIMARY KEY(flow3_persistence_identifier)) ENGINE = InnoDB");
		$this->addSql("CREATE TABLE admindemo_domain_model_contact (flow3_persistence_identifier VARCHAR(40) NOT NULL, PRIMARY KEY(flow3_persistence_identifier)) ENGINE = InnoDB");
		$this->addSql("CREATE TABLE admindemo_domain_model_note (flow3_persistence_identifier VARCHAR(40) NOT NULL, company VARCHAR(40) DEFAULT NULL, content VARCHAR(255) DEFAULT NULL, INDEX IDX_8A8D94954FBF094F (company), PRIMARY KEY(flow3_persistence_identifier)) ENGINE = InnoDB");
		$this->addSql("CREATE TABLE admindemo_domain_model_project_users_join (admindemo_project VARCHAR(40) NOT NULL, security_security_user VARCHAR(40) NOT NULL, INDEX IDX_A611B6382BBF7FDA (admindemo_project), INDEX IDX_A611B638DB6BE496 (security_security_user), PRIMARY KEY(admindemo_project, security_security_user)) ENGINE = InnoDB");
		$this->addSql("CREATE TABLE admindemo_domain_model_todo (flow3_persistence_identifier VARCHAR(40) NOT NULL, name VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(flow3_persistence_identifier)) ENGINE = InnoDB");
		$this->addSql("CREATE TABLE admindemo_domain_model_todo_projects_join (admindemo_todo VARCHAR(40) NOT NULL, admindemo_project VARCHAR(40) NOT NULL, INDEX IDX_DAB1A983172789B3 (admindemo_todo), INDEX IDX_DAB1A9832BBF7FDA (admindemo_project), PRIMARY KEY(admindemo_todo, admindemo_project)) ENGINE = InnoDB");
		$this->addSql("ALTER TABLE admindemo_domain_model_company ADD CONSTRAINT FK_72EF0E3821E3D446 FOREIGN KEY (flow3_persistence_identifier) REFERENCES admin_core_domain_magic(flow3_persistence_identifier) ON DELETE CASCADE");
		$this->addSql("ALTER TABLE admindemo_domain_model_company ADD CONSTRAINT FK_72EF0E3811BA68C FOREIGN KEY (notes) REFERENCES admindemo_domain_model_note(flow3_persistence_identifier)");
		$this->addSql("ALTER TABLE admindemo_domain_model_company ADD CONSTRAINT FK_72EF0E386FCA7516 FOREIGN KEY (addresses) REFERENCES admindemo_domain_model_address(flow3_persistence_identifier)");
		$this->addSql("ALTER TABLE admindemo_domain_model_note ADD CONSTRAINT FK_8A8D94954FBF094F FOREIGN KEY (company) REFERENCES admindemo_domain_model_company(flow3_persistence_identifier)");
		$this->addSql("ALTER TABLE admindemo_domain_model_project_users_join ADD CONSTRAINT FK_A611B638DB6BE496 FOREIGN KEY (security_security_user) REFERENCES admin_security_user(flow3_persistence_identifier)");
		$this->addSql("ALTER TABLE admindemo_domain_model_project_users_join ADD CONSTRAINT FK_A611B6382BBF7FDA FOREIGN KEY (admindemo_project) REFERENCES admindemo_domain_model_project(flow3_persistence_identifier)");
		$this->addSql("ALTER TABLE admindemo_domain_model_todo_projects_join ADD CONSTRAINT FK_DAB1A9832BBF7FDA FOREIGN KEY (admindemo_project) REFERENCES admindemo_domain_model_project(flow3_persistence_identifier)");
		$this->addSql("ALTER TABLE admindemo_domain_model_todo_projects_join ADD CONSTRAINT FK_DAB1A983172789B3 FOREIGN KEY (admindemo_todo) REFERENCES admindemo_domain_model_todo(flow3_persistence_identifier)");
		$this->addSql("ALTER TABLE admindemo_domain_model_address ADD company VARCHAR(40) DEFAULT NULL");
		$this->addSql("ALTER TABLE admindemo_domain_model_address ADD CONSTRAINT FK_301E68F64FBF094F FOREIGN KEY (company) REFERENCES admindemo_domain_model_company(flow3_persistence_identifier)");
		$this->addSql("CREATE INDEX IDX_301E68F64FBF094F ON admindemo_domain_model_address (company)");
		$this->addSql("ALTER TABLE admindemo_domain_model_annotations DROP optionsprovider");
		$this->addSql("ALTER TABLE admindemo_domain_model_message DROP FOREIGN KEY FK_8BED37085F004ACF");
		$this->addSql("ALTER TABLE admindemo_domain_model_message DROP FOREIGN KEY FK_8BED370821E3D446");
		$this->addSql("DROP INDEX IDX_8BED37085F004ACF ON admindemo_domain_model_message");
		$this->addSql("ALTER TABLE admindemo_domain_model_message DROP sender, DROP subject, DROP content");
		$this->addSql("ALTER TABLE admindemo_domain_model_widgets ADD info VARCHAR(40) DEFAULT NULL");
		$this->addSql("ALTER TABLE admindemo_domain_model_widgets ADD CONSTRAINT FK_A008E3B6CB893157 FOREIGN KEY (info) REFERENCES admindemo_domain_model_address(flow3_persistence_identifier)");
		$this->addSql("CREATE INDEX IDX_A008E3B6CB893157 ON admindemo_domain_model_widgets (info)");
	}
}

?>