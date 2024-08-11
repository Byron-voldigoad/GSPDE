/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de cr�ation :  18/09/2023 20:02:50                      */
/*==============================================================*/

drop database if exists GSPDE;
create database if not exists GSPDE;
use GSPDE;


/*==============================================================*/
/* Table : ATRIBUT                                              */
/*==============================================================*/
create table ATRIBUT
(
   id_enseignant        int not null,
   N_OBSERVATION        int not null,
   primary key (id_enseignant, N_OBSERVATION)
);

/*==============================================================*/
/* Table : CALENDRIER                                           */
/*==============================================================*/
create table CALENDRIER
(
   id                   int not null AUTO_INCREMENT,
   id_enseignant        int not null,
   title                varchar(255) not null,
   start_datetime datetime NOT NULL,
   end_datetime datetime DEFAULT NULL,
   description text NOT NULL,
   primary key (id)
);
/*==============================================================*/
/* Table : notes                                           */
/*==============================================================*/
CREATE TABLE notes (
     id_note      INT NOT NULL AUTO_INCREMENT,
     N_ELEVE      VARCHAR(255) NOT NULL,
     ID_MATIERE   VARCHAR(255) NOT NULL,
     note         REAL NOT NULL,
     PRIMARY KEY (id_note)
);

/*==============================================================*/
/* Table : DISPENSE                                             */
/*==============================================================*/
create table DISPENSE
(
   id_enseignant        int not null,
   ID_MATIERE           varchar(255) not null,
   primary key (id_enseignant, ID_MATIERE)
);

/*==============================================================*/
/* Table : ELEVE                                                */
/*==============================================================*/
create table ELEVE
(
   N_ELEVE              int not null AUTO_INCREMENT,
   N_OBSERVATION        int not null,
   ID_PARENT            varchar(255) not null,
   id_enseignant        int not null,
   NOM_ELEVE            varchar(255),
   PRENOM_ELEVE         varchar(255),
   DATE_DE_NAISSANCE_ELEVE date,
   LIEU_DE_NAISSANCE_ELEVE varchar(255),
   SEXE_ELEVE           varchar(10),
   TEL_ELEVE            int,
   DISCIPLINE           varchar(255),
   primary key (N_ELEVE)
);

/*==============================================================*/
/* Table : ENSEIGNANT                                           */
/*==============================================================*/
create table ENSEIGNANT
(
   id_enseignant        int not null AUTO_INCREMENT,
   MATRICULE            varchar(255) not null,
   id_unique_E          int(10) not null,
   NOM_ENSEIGNANT       varchar(255),
   PRENOM_ENSEIGNANT    varchar(255),
   SEXE_ENSEIGNANT      varchar(10),
   TEL_ENSEIGNANT       varchar(10),
   ROLE                 varchar(10),
   PHOTO_E              varchar(400),
   primary key (id_enseignant)
);

/*==============================================================*/
/* Table : MATIERE                                              */
/*==============================================================*/
create table MATIERE
(
   ID_MATIERE           varchar(255) not null,
   NOM_MATIERE          varchar(255),
   primary key (ID_MATIERE)
);

/*==============================================================*/
/* Table : NOTIFICATION                                         */
/*==============================================================*/
-- create table NOTIFICATION
-- (
--    ID_NOTIFICATION      varchar(255) not null,
--    MATRICULE            varchar(255) not null,
--    ID_PARENT            varchar(255) not null,
--    TEXTE_NOTIFICATION   longtext,
--    DATE_D_ENVOI         date,
--    primary key (ID_NOTIFICATION)
-- );
CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;


/*==============================================================*/
/* Table : OBSERVATION                                          */
/*==============================================================*/
create table OBSERVATION
(
   N_OBSERVATION        int not null,
   DATE_OBSERVATION     date,
   TEXTE                longtext,
   primary key (N_OBSERVATION)
);

/*==============================================================*/
/* Table : PARENT                                               */
/*==============================================================*/
create table PARENT
(
   ID_PARENT            varchar(255) not null,
   id_unique_p          int(10) not null,
   NOM_PARENT           varchar(255),
   PRENOM_PARENT        varchar(256),
   TEL_PARENT           int,
   SEXE_PARENT          varchar(10),
   MOT_DE_PASSE_PARENT  varchar(255),
   PHOTO_P              varchar(400),
   primary key (ID_PARENT)
);

alter table ATRIBUT add constraint FK_ATRIBUT foreign key (id_enseignant)
      references ENSEIGNANT (id_enseignant) on delete restrict on update restrict;

alter table ATRIBUT add constraint FK_ATRIBUT2 foreign key (N_OBSERVATION)
      references OBSERVATION (N_OBSERVATION) on delete restrict on update restrict;

alter table CALENDRIER add constraint FK_CREE foreign key (id_enseignant)
      references ENSEIGNANT (id_enseignant) on delete restrict on update restrict;

alter table DISPENSE add constraint FK_DISPENSE foreign key (id_enseignant)
      references ENSEIGNANT (id_enseignant) on delete restrict on update restrict;

alter table DISPENSE add constraint FK_DISPENSE2 foreign key (ID_MATIERE)
      references MATIERE (ID_MATIERE) on delete restrict on update restrict;

alter table ELEVE add constraint FK_A foreign key (ID_PARENT)
      references PARENT (ID_PARENT) on delete restrict on update restrict;

alter table ELEVE add constraint FK_INSCRIT foreign key (id_enseignant)
      references ENSEIGNANT (id_enseignant) on delete restrict on update restrict;

alter table ELEVE add constraint FK_RECOIS foreign key (N_OBSERVATION)
      references OBSERVATION (N_OBSERVATION) on delete restrict on update restrict;

alter table notes add constraint FK_notes foreign key (ID_MATIERE)
      references MATIERE (ID_MATIERE) on delete restrict on update restrict;

alter table notes add constraint FK_notes2 foreign key (N_ELEVE)
      references ELEVE (N_ELEVE) on delete restrict on update restrict;


INSERT INTO `CALENDRIER` (`id_enseignant`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
(1, 'Sample 101', 'This is a sample schedule only.', '2022-01-10 10:30:00', '2022-01-11 18:00:00'),
(2, 'Sample 102', 'Sample Description 102', '2022-01-08 09:30:00', '2022-01-08 11:30:00'),
(4, 'Sample 102', 'Sample Description', '2022-01-12 14:00:00', '2022-01-12 17:00:00');

SELECT*FROM CALENDRIER ;

INSERT into ENSEIGNANT(MATRICULE,id_unique_E,NOM_ENSEIGNANT,PRENOM_ENSEIGNANT,SEXE_ENSEIGNANT,TEL_ENSEIGNANT,ROLE)
      VALUES("AZERTY",1509009185,"QWERTY","QWERTZ","Masculin",258963,"Admin");

SELECT*FROM ENSEIGNANT ;

INSERT INTO `eleve`(`N_OBSERVATION`, `ID_PARENT`, `id_enseignant`, `NOM_ELEVE`, `PRENOM_ELEVE`) 
      VALUES (1,1,1,"bro","tk");

SELECT*FROM eleve;