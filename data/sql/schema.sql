CREATE TABLE action (id INT, intitule VARCHAR(45) NOT NULL, module_id INT NOT NULL, INDEX module_id_idx (module_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE adresse (id INT AUTO_INCREMENT, ville_id INT, personne_id INT, groupe_id INT, rue VARCHAR(45) NOT NULL, rue_cptl VARCHAR(45) NOT NULL, cp VARCHAR(5) NOT NULL, ville VARCHAR(45) NOT NULL, INDEX ville_id_idx (ville_id), INDEX personne_id_idx (personne_id), INDEX groupe_id_idx (groupe_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE categorie (id INT AUTO_INCREMENT, libelle VARCHAR(45) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE contactPro (id INT AUTO_INCREMENT, personne_id INT, groupe_id INT, fonction_id INT, PRIMARY KEY(id, personne_id, groupe_id, fonction_id)) ENGINE = INNODB;
CREATE TABLE departement (id INT AUTO_INCREMENT, region_id INT NOT NULL, nom VARCHAR(45) NOT NULL, INDEX region_id_idx (region_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE email (id INT AUTO_INCREMENT, personne_id INT, groupe_id INT, email VARCHAR(45) NOT NULL, INDEX personne_id_idx (personne_id), INDEX groupe_id_idx (groupe_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE fax (id INT AUTO_INCREMENT, personne_id INT, groupe_id INT, numero VARCHAR(45) NOT NULL, INDEX personne_id_idx (personne_id), INDEX groupe_id_idx (groupe_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE fonction (id INT AUTO_INCREMENT, intitule VARCHAR(45) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE groupe (id INT AUTO_INCREMENT, parent_id INT, type_id INT NOT NULL, intitule VARCHAR(45) NOT NULL, description TEXT, categorie_id INT NOT NULL, INDEX type_id_idx (type_id), INDEX categorie_id_idx (categorie_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE mail (id INT AUTO_INCREMENT, personne_id INT, groupe_id INT, email VARCHAR(45) NOT NULL, INDEX groupe_id_idx (groupe_id), INDEX personne_id_idx (personne_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE module (id INT, nom VARCHAR(45) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE personne (id INT AUTO_INCREMENT, nom VARCHAR(45) NOT NULL, prenom VARCHAR(45) NOT NULL, civ VARCHAR(45), date_naissance DATE, photo VARCHAR(45), sf_guard_user_id INT, INDEX sf_guard_user_id_idx (sf_guard_user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE product (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, price DECIMAL(18, 2) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE product_photo (id BIGINT AUTO_INCREMENT, product_id BIGINT, filename VARCHAR(255), caption VARCHAR(255) NOT NULL, INDEX product_id_idx (product_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE region (id INT AUTO_INCREMENT, nom VARCHAR(45) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id INT AUTO_INCREMENT, name VARCHAR(255), description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id INT, permission_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id INT AUTO_INCREMENT, name VARCHAR(255), description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id INT AUTO_INCREMENT, user_id INT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id, ip_address)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id INT AUTO_INCREMENT, username VARCHAR(128) NOT NULL, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT DEFAULT '1', is_super_admin TINYINT DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id INT, group_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id INT, permission_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
CREATE TABLE telephone (id INT AUTO_INCREMENT, personne_id INT, groupe_id INT, numero VARCHAR(45) NOT NULL, INDEX personne_id_idx (personne_id), INDEX groupe_id_idx (groupe_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE type (id INT AUTO_INCREMENT, libelle VARCHAR(45) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE ville (id INT AUTO_INCREMENT, departement_id INT NOT NULL, nom VARCHAR(45) NOT NULL, INDEX departement_id_idx (departement_id), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE action ADD CONSTRAINT action_module_id_module_id FOREIGN KEY (module_id) REFERENCES module(id);
ALTER TABLE adresse ADD CONSTRAINT adresse_ville_id_ville_id FOREIGN KEY (ville_id) REFERENCES ville(id);
ALTER TABLE adresse ADD CONSTRAINT adresse_personne_id_personne_id FOREIGN KEY (personne_id) REFERENCES personne(id);
ALTER TABLE adresse ADD CONSTRAINT adresse_groupe_id_groupe_id FOREIGN KEY (groupe_id) REFERENCES groupe(id);
ALTER TABLE contactPro ADD CONSTRAINT contactPro_personne_id_personne_id FOREIGN KEY (personne_id) REFERENCES personne(id);
ALTER TABLE contactPro ADD CONSTRAINT contactPro_groupe_id_groupe_id FOREIGN KEY (groupe_id) REFERENCES groupe(id);
ALTER TABLE contactPro ADD CONSTRAINT contactPro_fonction_id_fonction_id FOREIGN KEY (fonction_id) REFERENCES fonction(id);
ALTER TABLE departement ADD CONSTRAINT departement_region_id_region_id FOREIGN KEY (region_id) REFERENCES region(id);
ALTER TABLE email ADD CONSTRAINT email_personne_id_personne_id FOREIGN KEY (personne_id) REFERENCES personne(id);
ALTER TABLE email ADD CONSTRAINT email_groupe_id_groupe_id FOREIGN KEY (groupe_id) REFERENCES groupe(id);
ALTER TABLE fax ADD CONSTRAINT fax_personne_id_personne_id FOREIGN KEY (personne_id) REFERENCES personne(id);
ALTER TABLE fax ADD CONSTRAINT fax_groupe_id_groupe_id FOREIGN KEY (groupe_id) REFERENCES groupe(id);
ALTER TABLE groupe ADD CONSTRAINT groupe_type_id_type_id FOREIGN KEY (type_id) REFERENCES type(id);
ALTER TABLE groupe ADD CONSTRAINT groupe_categorie_id_categorie_id FOREIGN KEY (categorie_id) REFERENCES categorie(id);
ALTER TABLE mail ADD CONSTRAINT mail_personne_id_personne_id FOREIGN KEY (personne_id) REFERENCES personne(id);
ALTER TABLE mail ADD CONSTRAINT mail_groupe_id_groupe_id FOREIGN KEY (groupe_id) REFERENCES groupe(id);
ALTER TABLE personne ADD CONSTRAINT personne_sf_guard_user_id_sf_guard_user_id FOREIGN KEY (sf_guard_user_id) REFERENCES sf_guard_user(id);
ALTER TABLE product_photo ADD CONSTRAINT product_photo_product_id_product_id FOREIGN KEY (product_id) REFERENCES product(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id);
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id);
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id);
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id);
ALTER TABLE telephone ADD CONSTRAINT telephone_personne_id_personne_id FOREIGN KEY (personne_id) REFERENCES personne(id);
ALTER TABLE telephone ADD CONSTRAINT telephone_groupe_id_groupe_id FOREIGN KEY (groupe_id) REFERENCES groupe(id);
ALTER TABLE ville ADD CONSTRAINT ville_departement_id_departement_region_id FOREIGN KEY (departement_id) REFERENCES departement(region_id);
