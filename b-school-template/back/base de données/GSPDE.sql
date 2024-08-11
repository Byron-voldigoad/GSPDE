-- Active: 1683569877947@@127.0.0.1@3306@gspde
/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de cr�ation :  18/09/2023 20:02:50                      */
/*==============================================================*/

drop database if exists GSPDE;
create database if not exists GSPDE;
use GSPDE;


/*==============================================================*/
/* Table : ANNEE                                              */
/*==============================================================*/
create table ANNEE
(
   id_annee        int not null AUTO_INCREMENT,
   dateDebut       int,
   dateFin         int,
   statut          int,
   primary key (id_annee)
);

/*==============================================================*/
/* Table : SEMMESTRE                                              */
/*==============================================================*/
create table SEMMESTRE
(
   id_semmestre        int not null AUTO_INCREMENT,
   id_annee        int not null,
   Num_semestre    int,
   statut          int,
   primary key (id_semmestre)
);

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
     ID_MATIERE   INT NOT NULL,
     id_semmestre        int,
     N_ELEVE      INT NOT NULL,
     note1         REAL,
     note2         REAL,
     PRIMARY KEY (id_note)
);


CREATE TABLE classe (
  id_classe       INT NOT NULL AUTO_INCREMENT,
  id_annee        int,
  nom             VARCHAR(255) NOT NULL,
  niveau          VARCHAR(255) NOT NULL,
  PRIMARY KEY (id_classe)
);


/*==============================================================*/
/* Table : ELEVE                                                */
/*==============================================================*/
create table ELEVE
(
   n_eleve              int not null AUTO_INCREMENT,
   id_annee             int,
   id_classe            INT NOT NULL,
   NOM_ELEVE            varchar(255),
   PRENOM_ELEVE         varchar(255),
   TEL_PARENT           int(20),
   DATE_DE_NAISSANCE_ELEVE date,
   LIEU_DE_NAISSANCE_ELEVE varchar(255),
   SEXE_ELEVE           varchar(10),
   primary key (N_ELEVE)
);

/*==============================================================*/
/* Table : ENSEIGNANT                                           */
/*==============================================================*/
create table ENSEIGNANT
(
   id_enseignant        int not null AUTO_INCREMENT,
   id_annee             int,
   ID_MATIERE           INT NOT NULL,
   MATRICULE            varchar(255) not null,
   id_unique_E          int(10) not null,
   NOM_ENSEIGNANT       varchar(255),
   PRENOM_ENSEIGNANT    varchar(255),
   SEXE_ENSEIGNANT      varchar(10),
   email                varchar(100),
   login                VARCHAR(200),
   MOT_DE_PASSE_enseignant varchar(255),
   TEL_ENSEIGNANT       varchar(10),
   ROLE                 varchar(10),
   PHOTO_E              varchar(400),
   statut               varchar(30),
   primary key (id_enseignant)
);


/*==============================================================*/
/* Table : MATIERE                                              */
/*==============================================================*/
create table MATIERE
(
   ID_MATIERE           INT NOT NULL AUTO_INCREMENT,
   NOM_MATIERE          varchar(255),
   primary key (ID_MATIERE)
);

/*==============================================================*/
/* Table : MATIERE                                              */
/*==============================================================*/
create table MatieresAClasses
(
   id_classe        int not null,
   ID_MATIERE       int not null,
   credit           int,
   primary key (ID_MATIERE, id_classe)
);

/*==============================================================*/
/* Table : NOTIFICATION                                         */
/*==============================================================*/

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
   N_OBSERVATION        int not null AUTO_INCREMENT,
   DATE_OBSERVATION     date,
   TEXTE                longtext,
   N_ELEVE              int not null,
   primary key (N_OBSERVATION)
);

/*==============================================================*/
/* Table : PARENT                                               */
/*==============================================================*/
create table PARENT
(
   ID_PARENT            int(10) not null AUTO_INCREMENT,
   id_unique_p          int(10) not null,
   NOM_PARENT           varchar(255),
   PRENOM_PARENT        varchar(256),
   TEL_PARENT           int(20),
   SEXE_PARENT          varchar(10),
   email                varchar(150),
   login                VARCHAR(200),
   MOT_DE_PASSE_PARENT  varchar(255),
   PHOTO_P              varchar(400),
   ROLE                 varchar(10),
   statut               varchar(30),
   primary key (ID_PARENT)
);

CREATE TABLE EvenementsDisciplinaires (
    EvenementID int(10) not null AUTO_INCREMENT,
    N_ELEVE INT not null,
    TypeEvenement VARCHAR(50),
    DateEvenement DATE,
    Description TEXT,
    Sanction      TEXT,
    primary key (EvenementID)
);

/*==============================================================*/
/* Table : ParentsEleves                                              */
/*==============================================================*/
create table ParentsEleves
(
   ID_PARENT        int not null,
   N_ELEVE       int not null,
   primary key (ID_PARENT, N_ELEVE)
);

CREATE TABLE commentaires (
  id_commentaire       INT NOT NULL AUTO_INCREMENT,
  nom             VARCHAR(255) NOT NULL,
  Email          VARCHAR(255) NOT NULL,
  comment          VARCHAR(255) NOT NULL,
  PRIMARY KEY (id_commentaire)
);


alter table ENSEIGNANT add constraint FK_annee foreign key (id_annee)
      references ANNEE (id_annee) on delete restrict on update restrict;

alter table ELEVE add constraint FK_annee2 foreign key (id_annee)
      references ANNEE (id_annee) on delete restrict on update restrict;

alter table classe add constraint FK_annee3 foreign key (id_annee)
      references ANNEE (id_annee) on delete restrict on update restrict;

alter table EvenementsDisciplinaires add constraint FK_EVNM foreign key (N_ELEVE)
      references ELEVE (N_ELEVE) on delete restrict on update restrict;

alter table ENSEIGNANT add constraint FK_ATRIBUT foreign key (ID_MATIERE)
      references MATIERE (ID_MATIERE) on delete restrict on update restrict;

alter table ATRIBUT add constraint FK_ATRIBUT2 foreign key (N_OBSERVATION)
      references OBSERVATION (N_OBSERVATION) on delete restrict on update restrict;

alter table CALENDRIER add constraint FK_CREE foreign key (id_enseignant)
      references ENSEIGNANT (id_enseignant) on delete restrict on update restrict;


alter table ELEVE add constraint FK_classe foreign key (id_classe)
      references classe (id_classe) on delete restrict on update restrict;


alter table notes add constraint FK_notes foreign key (id_semmestre)
      references SEMMESTRE (id_semmestre) on delete restrict on update restrict;

alter table notes add constraint FK_notes2 foreign key (ID_MATIERE)
      references MATIERE (ID_MATIERE) on delete restrict on update restrict;

alter table notes add constraint FK_notes3 foreign key (N_ELEVE)
      references ELEVE (N_ELEVE) on delete restrict on update restrict;


alter table MatieresAClasses add constraint FK_RECOIS foreign key (id_classe)
      references classe (id_classe) on delete restrict on update restrict;

alter table MatieresAClasses add constraint FK_RECOIS2 foreign key (ID_MATIERE)
      references MATIERE (ID_MATIERE) on delete restrict on update restrict;
      
INSERT INTO `annee` (`dateDebut`, `dateFin`,statut) 
            VALUES ('2023', '2024',1), 
                  ('2024', '2025',0);

INSERT INTO `CALENDRIER` (`id_enseignant`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
(1, 'Sample 101', 'This is a sample schedule only.', '2022-01-10 10:30:00', '2022-01-11 18:00:00'),
(2, 'Sample 102', 'Sample Description 102', '2022-01-08 09:30:00', '2022-01-08 11:30:00'),
(4, 'Sample 102', 'Sample Description', '2022-01-12 14:00:00', '2022-01-12 17:00:00');

SELECT*FROM CALENDRIER ;

INSERT into ENSEIGNANT(ID_MATIERE,id_annee,MATRICULE,id_unique_E,email,login,MOT_DE_PASSE_enseignant,NOM_ENSEIGNANT,PRENOM_ENSEIGNANT,SEXE_ENSEIGNANT,TEL_ENSEIGNANT,ROLE,`PHOTO_E`)
      VALUES(1,1,"AZERTY",1509009185,"user1@gmail.com","admin",123,"QWERTY","QWERTZ","Masculin",258963,"Admin","06de8c15488098113416a2888bbdb29d.jpg"),
      (2,1,"AZERTY",1509045185,"user2@gmail.com","user1",123,"Azerty","QWERTZ","Masculin",258963,"user","229-2298094_anime-sky-lantern-mountain-japanese-castle-night-japan.jpg"),
      (2,1,"AZERTY",1509755237,"user3@gmail.com","user2",123,"QSDFG","QWERTZ","Feminin",258963,"user","289-2891709_code-geass-wallpaper-android-code-geass-lelouch-png.png");

INSERT INTO message (incoming_msg_id, outgoing_msg_id, msg)
                                VALUES (1509755237, 1509009185, 'YOOOOfjhersggrghsfgr'),
                                (1509009185, 1509755237, 'YESSSSSYfuiejfi');
SELECT*FROM ENSEIGNANT ;

DROP VIEW IF EXISTS ENSEIGNANT_Affichage;
CREATE VIEW ENSEIGNANT_Affichage AS
SELECT e.id_enseignant,e.NOM_ENSEIGNANT,e.id_annee,e.PHOTO_E,e.email, e.PRENOM_ENSEIGNANT, m.NOM_MATIERE, e.SEXE_ENSEIGNANT, e.TEL_ENSEIGNANT, e.ROLE
FROM ENSEIGNANT e
JOIN MATIERE m ON e.ID_MATIERE = m.ID_MATIERE;
SELECT*FROM ENSEIGNANT_Affichage ;

INSERT INTO classe (id_annee,nom, niveau)
            VALUES(1,'IGL', '1'),
                  (1,'IGL', '2'),
                  (1,'RES', '1'),
                  (1,'RES', '2'),
                  (1,'MECA', '3');

SELECT*FROM classe;

INSERT INTO MATIERE (NOM_MATIERE)
      VALUES('Mathematiques'),
            ('Francais'),
            ('Histoire-geographie'),
            ('Sciences');

SELECT*FROM MATIERE;


INSERT INTO PARENT (id_unique_p, NOM_PARENT, email, PRENOM_PARENT, TEL_PARENT, SEXE_PARENT,login, MOT_DE_PASSE_PARENT, PHOTO_P,ROLE)
            VALUES (1, "user1",'Dupont@gmail.com', 'Jean', 0601020304, 'Masculin',"parent1", 123, 'AI.jpg',"PARENT"),
                  (2, "user2",'Martin@gmail.com', 'Marie', 0612345678, 'Feminin',"parent2", 123, 'BATMAN.jpg',"PARENT"),
                  (3, "user3",'Bernard@gmail.com', 'Paul', 0698765432, 'Masculin',"parent3", 123, 'KAZUMA.jpg',"PARENT");

SELECT*FROM PARENT;
DROP VIEW IF EXISTS vue_parents_eleves;
CREATE VIEW vue_parents_eleves AS
SELECT PARENT.* FROM PARENT
JOIN ELEVE ON ELEVE.TEL_PARENT = PARENT.TEL_PARENT GROUP BY PARENT.TEL_PARENT;
SELECT*FROM vue_parents_eleves;


INSERT INTO EvenementsDisciplinaires (N_ELEVE, TypeEvenement, DateEvenement, Description,Sanction)
VALUES
    (1, 'Absence', '2024-01-02', 'Absence non justifiee',""),
    (1, 'Retard', '2024-01-03', 'Retard de 15 minutes','lave les toilette'),
    (2, 'Absence', '2024-01-05', 'Avertissement pour comportement inapproprie',""),
    (3, 'Autre', '2024-01-04', '',"exclus pour 3 jours");

SELECT*FROM EvenementsDisciplinaires;
SELECT count(*) FROM EvenementsDisciplinaires where n_eleve=2 and TypeEvenement="Absence";

INSERT INTO ELEVE (TEL_PARENT, id_classe, id_annee, NOM_ELEVE, PRENOM_ELEVE, DATE_DE_NAISSANCE_ELEVE, LIEU_DE_NAISSANCE_ELEVE, SEXE_ELEVE)
            VALUES( 0601020304, 1,1, 'Dupont', 'Jean', '2005-05-10', 'Paris', 'Masculin'),
                  ( 0612345678, 1,1, 'Martin', 'Sophie', '2006-02-15', 'Marseille', 'Feminin'),
                  ( 0698765432, 1,1, 'Lefevre', 'Luc', '2004-08-20', 'Lyon', 'Masculin'),
                  ( 0601020304, 1,1, 'Dubois', 'Emma', '2005-11-25', 'Toulouse', 'Feminin'),
                  ( 0612345678, 2,1, 'Roux', 'Thomas', '2003-04-03', 'Bordeaux', 'Masculin'),
                  ( 0698765432, 2,1, 'Bertrand', 'Camille', '2006-09-12', 'Nice', 'Feminin'),
                  ( 0601020304, 2,1, 'Lemoine', 'Paul', '2004-12-18', 'Strasbourg', 'Masculin'),
                  ( 0612345678, 2,1, 'Moreau', 'Chloe', '2005-07-30', 'Nantes', 'Feminin'),
                  ( 0698765432, 3,1, 'Girard', 'Alex', '2004-01-22', 'Rennes', 'Masculin'),
                  ( 0601020304, 5,1, 'Leroux', 'Julie', '2005-06-14', 'Lille', 'Feminin'),
                  ( 0612345678, 3,1, 'Lefort', 'Nicolas', '2003-10-05', 'Montpellier', 'Masculin'),
                  ( 0698765432, 3,1, 'Fournier', 'Laura', '2006-03-08', 'Toulon', 'Feminin'),
                  ( 0601020304, 4,1, 'Caron', 'Hugo', '2004-05-17', 'Grenoble', 'Masculin'),
                  ( 0612345678, 4,1, 'Garnier', 'Elise', '2005-08-29', 'Angers', 'Feminin'),
                  ( 0698765432, 4,1, 'Michel', 'Antoine', '2003-02-11', 'Nancy', 'Masculin'),
                  ( 4564616841, 4,1, 'Leclerc', 'Sophia', '2006-07-24', 'Avignon', 'Feminin');

SELECT*FROM ELEVE;

SELECT
    E.NOM_ELEVE,
    E.PRENOM_ELEVE,
    ED.TypeEvenement,
    ED.DateEvenement,
    ED.Description
FROM
    ELEVE E
JOIN
    EvenementsDisciplinaires ED ON E.N_ELEVE = ED.N_ELEVE
WHERE
    E.N_ELEVE = 1;

select id_note, nom_matiere,note from notes,matiere where notes.ID_MATIERE=matiere.ID_MATIERE;



DROP VIEW IF EXISTS vue_notes_eleves;
CREATE VIEW vue_notes_eleves AS
SELECT eleve.n_eleve,id_classe,matiere.ID_MATIERE, NOM_ELEVE, PRENOM_ELEVE, NOM_MATIERE, note1,note2,notes.id_semmestre
FROM eleve
JOIN notes ON eleve.N_eleve = notes.N_eleve
JOIN matiere ON notes.id_matiere = matiere.id_matiere GROUP BY eleve.n_eleve;

DROP VIEW IF EXISTS vue_notes_eleves2;
CREATE VIEW vue_notes_eleves2 AS
SELECT id_note, eleve.n_eleve,id_classe,matiere.ID_MATIERE, NOM_ELEVE, PRENOM_ELEVE, NOM_MATIERE, note1,note2,notes.id_semmestre
FROM eleve
JOIN notes ON eleve.N_eleve = notes.N_eleve
JOIN matiere ON notes.id_matiere = matiere.id_matiere;

DROP VIEW IF EXISTS vue_notes_eleves3;
CREATE VIEW vue_notes_eleves3 AS
SELECT n.n_eleve,e.NOM_ELEVE, e.PRENOM_ELEVE,e.id_classe, m.NOM_MATIERE,m.ID_MATIERE, n.note1, n.note2, mc.credit
FROM ELEVE e
JOIN notes n ON e.n_eleve = n.n_eleve
JOIN MATIERE m ON n.ID_MATIERE = m.ID_MATIERE
JOIN MatieresAClasses mc ON m.ID_MATIERE = mc.ID_MATIERE
WHERE e.id_classe = mc.id_classe;
SELECT classe.id_classe, GROUP_CONCAT(credit SEPARATOR',') as credit
            from classe 
            LEFT JOIN MatieresAClasses on MatieresAClasses.id_classe=classe.id_classe
            GROUP BY id_classe;

            

SELECT*FROM vue_notes_eleves;

SELECT vue_notes_eleves.*,credit FROM vue_notes_eleves ;
 SELECT*FROM vue_notes_eleves where nom_matiere="Mathematiques";





DROP VIEW IF EXISTS vue_event;
-- CREATE VIEW vue_event AS
-- SELECT eleve.n_eleve,EvenementID, NOM_ELEVE, PRENOM_ELEVE,TypeEvenement,DateEvenement,Description
-- FROM EvenementsDisciplinaires
-- JOIN eleve ON eleve.N_eleve = EvenementsDisciplinaires.N_eleve
-- GROUP BY n_eleve;

DROP VIEW IF EXISTS vue_event;
CREATE VIEW vue_event AS
SELECT eleve.n_eleve,eleve.id_annee, TEL_PARENT, EvenementID,Sanction, NOM_ELEVE, PRENOM_ELEVE, TypeEvenement, DateEvenement, Description
FROM eleve
LEFT OUTER JOIN EvenementsDisciplinaires ON eleve.N_eleve = EvenementsDisciplinaires.N_eleve;

SELECT*FROM vue_event;



select* from ELEVE join classe on ELEVE.id_classe=classe.id_classe;
select*from ELEVE,classe WHERE N_ELEVE=1 and ELEVE.id_classe=classe.id_classe

DROP VIEW IF EXISTS vue_matiereclasse;
CREATE VIEW vue_matiereclasse AS
SELECT c.*, m.*
FROM classe c
LEFT JOIN MatieresAClasses mc ON c.id_classe = mc.id_classe
LEFT JOIN matiere m ON mc.ID_MATIERE = m.ID_MATIERE;
select * from vue_matiereclasse;

DROP VIEW IF EXISTS vue_matiereclassenote;
CREATE VIEW vue_matiereclassenote AS
SELECT c.*, m.*
FROM classe c
JOIN MatieresAClasses mc ON c.id_classe = mc.id_classe
JOIN matiere m ON mc.ID_MATIERE = m.ID_MATIERE;
select * from vue_matiereclassenote;

SELECT c.*, m.nom_matiere
FROM classe c
LEFT JOIN (
    SELECT mc.id_classe, m.nom_matiere
    FROM MatieresAClasses mc
    LEFT JOIN matiere m ON mc.ID_MATIERE = m.ID_MATIERE
) AS m ON c.id_classe = m.id_classe  group by id_classe;

INSERT INTO `semmestre` (`id_annee`, `Num_semestre`,statut) 
                  VALUES ('1', '1',0), 
                        ('1', '2',0);

select * from semmestre;


INSERT INTO `matieresaclasses` (`id_classe`, `ID_MATIERE`, `credit`) VALUES
(4, 1, 7),
(1, 4, 4),
(2, 7, 4),
(1, 1, 8),
(1, 2, 2),
(2, 6, 3),
(3, 1, 7),
(5, 5, 21),
(2, 5, 2),
(2, 4, 4);

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id_note`, `ID_MATIERE`, `id_semmestre`, `N_ELEVE`, `note1`, `note2`) VALUES
(1, 1, NULL, 1, 18, NULL),
(2, 1, NULL, 2, 10, NULL),
(3, 1, NULL, 3, 16, NULL),
(4, 1, NULL, 4, 19, NULL),
(5, 4, NULL, 1, 18, NULL),
(6, 4, NULL, 2, 10, NULL),
(7, 4, NULL, 3, 16, NULL),
(8, 4, NULL, 4, 19, NULL),
(9, 3, NULL, 5, 84, NULL),
(10, 3, NULL, 6, 87, NULL),
(11, 3, NULL, 7, 45, NULL),
(12, 3, NULL, 8, 38, NULL),
(13, 1, NULL, 13, 3, NULL),
(14, 1, NULL, 14, 4, NULL),
(15, 1, NULL, 15, 2, NULL),
(16, 1, NULL, 16, 5, NULL),
(17, 2, NULL, 1, 12, NULL),
(18, 2, NULL, 2, 5, NULL),
(19, 2, NULL, 3, 11, NULL),
(20, 2, NULL, 4, 13, NULL),
(21, 3, NULL, 1, 8, NULL),
(22, 3, NULL, 2, 12, NULL),
(23, 3, NULL, 3, 5, NULL),
(24, 3, NULL, 4, 14, NULL),
(25, 5, NULL, 10, 42, NULL),
(26, 5, NULL, 17, 78, NULL),
(27, 7, NULL, 5, 12, NULL),
(28, 7, NULL, 6, 11, NULL),
(29, 7, NULL, 7, 15, NULL),
(30, 7, NULL, 8, 16, NULL),
(31, 7, NULL, 18, 9, NULL),
(32, 6, NULL, 5, 15, NULL),
(33, 6, NULL, 6, 18, NULL),
(34, 6, NULL, 7, 19, NULL),
(35, 6, NULL, 8, 17, NULL),
(36, 5, NULL, 5, 10, NULL),
(37, 5, NULL, 6, 11, NULL),
(38, 5, NULL, 7, 13, NULL),
(39, 5, NULL, 8, 8, NULL),
(40, 5, NULL, 18, 13, NULL),
(41, 4, NULL, 5, 10, NULL),
(42, 4, NULL, 6, 18, NULL),
(43, 4, NULL, 7, 13, NULL),
(44, 4, NULL, 8, 14, NULL),
(45, 4, NULL, 18, 13, NULL);


--
-- Déchargement des données de la table `semmestre`
--

INSERT INTO `semmestre` (`id_semmestre`, `id_annee`, `Num_semestre`, `statut`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 0);

-- --------------------------------------------------------
INSERT INTO `matiere` (`ID_MATIERE`, `NOM_MATIERE`) VALUES
(1, 'Mathematiques'),
(5, 'Anglais'),
(2, 'Francais'),
(3, 'Histoire-geographie'),
(4, 'Sciences'),
(6, 'Droit'),
(7, 'Recherche operationel');