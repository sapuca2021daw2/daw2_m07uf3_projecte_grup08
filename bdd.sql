use mysql;
create database if not exists bdong;
use bdong;
create table if not exists users(
	id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
	name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	email varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	password varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	nom varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	cognoms varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	mobil varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	horaEntrada datetime DEFAULT NULL,
	horaSortida datetime DEFAULT NULL,
	rol int(11) NOT NULL,
	remember_token varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  	PRIMARY KEY (id),
  	UNIQUE KEY users_email_unique (email)
);
create table if not exists socis(
	id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
	nifSoci varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	nomSoci varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	cognomsSoci varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	adrecaSoci varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	poblacioSoci varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	comarcaSoci varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	fixeSoci varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	mobilSoci varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	correuSoci varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  	PRIMARY KEY (id),
  	UNIQUE KEY socis_nifsoci_unique (nifSoci)
);
create table if not exists associacio(
	id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
	cif varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	nomAssociacio varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	adrecaAssociacio varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	poblacioAssociacio varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	comarcaAssociacio varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	tipus varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	esDeclarada tinyint(1) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE KEY associacio_cif_unique (cif)
);

create table if not exists tenir(
	id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
	soci_id bigint(20) unsigned NOT NULL,
	associacio_id bigint(20) unsigned NOT NULL,
	dataAltaSoci date NOT NULL,
	quotaMensual double(5,2) NOT NULL,
	aportacioAnual double(10,2) NOT NULL,
  	PRIMARY KEY (id),
  	KEY tenirs_soci_id_foreign (soci_id),
  	KEY tenirs_associacio_id_foreign (associacio_id),
  	CONSTRAINT tenirs_associacio_id_foreign FOREIGN KEY (associacio_id) REFERENCES associacio (id),
  	CONSTRAINT tenirs_soci_id_foreign FOREIGN KEY (soci_id) REFERENCES socis (id)
);

create table if not exists treballador(
	id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
	nifTreballador varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	nomTreballador varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	cognomsTreballador varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	adrecaTreballador varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	poblacioTreballador varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	comarcaTreballador varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	fixeTreballador varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	mobilTreballador varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	correuTreballador varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	dataIngresTreballador date NOT NULL,
	associacio_id bigint(20) unsigned NOT NULL,
	PRIMARY KEY (id),
	UNIQUE KEY treballador_niftreballador_unique (nifTreballador),
	KEY treballador_associacio_id_foreign (associacio_id),
	CONSTRAINT treballador_associacio_id_foreign FOREIGN KEY (associacio_id) REFERENCES associacio (id) ON DELETE CASCADE
);

create table if not exists professional(
	id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
	treballador_id bigint(20) unsigned NOT NULL,
	carrec varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	seguretatSocial varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	percentatgeIRPF varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	PRIMARY KEY (id),
	KEY professional_treballador_id_foreign (treballador_id),
	CONSTRAINT professional_treballador_id_foreign FOREIGN KEY (treballador_id) REFERENCES treballador (id) ON DELETE CASCADE
);

create table if not exists voluntari(
	id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
	treballador_id bigint(20) unsigned NOT NULL,
	edat varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	professio varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	horesDedicades varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	PRIMARY KEY (id),
	KEY voluntari_treballador_id_foreign (treballador_id),
	CONSTRAINT voluntari_treballador_id_foreign FOREIGN KEY (treballador_id) REFERENCES treballador (id) ON DELETE CASCADE
);

insert into users(name, email, password, nom, cognoms, mobil, horaEntrada, horaSortida, rol) values("sara", "sapuca2021daw2@protonmail.com", "$2y$10$MT2W7hVRk68ShymH0PMbrOIQ5FTZHlj477no6gdb9Vp66RKOdy8UW", "Sara", "Puig Cabruja",  "631284502", null, null, 1);

create user if not exists 'sara'@'localhost' identified by "Daw2021@";

grant all on bdong.users to 'sara'@'localhost';
grant all on bdong.socis to 'sara'@'localhost';
grant all on bdong.associacio to 'sara'@'localhost';
grant all on bdong.tenir to 'sara'@'localhost';
grant all on bdong.treballador to 'sara'@'localhost';
grant all on bdong.professional to 'sara'@'localhost';
grant all on bdong.voluntari to 'sara'@'localhost';
