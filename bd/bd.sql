GRANT ALL PRIVILEGES ON *.* TO 'php' @'localhost'  WITH GRANT OPTION;
-- GRANT ALL PRIVILEGES ON *.* TO 'php' @'%'  WITH GRANT OPTION;

DROP DATABASE IF EXISTS gestion_restaurant;
CREATE DATABASE IF NOT EXISTS gestion_restaurant;
USE gestion_restaurant;


/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de cr�ation :  18/12/2021 15:08:28                      */
/*==============================================================*/


drop table if exists ADMINE;

drop table if exists ASSOCIER;

drop table if exists CATEGORIE;

drop table if exists CLIENT;

drop table if exists COMMANDE;

drop table if exists EMPLOYE;

drop table if exists EMPLOYEPOTENTIEL;

drop table if exists FACTURE;

drop table if exists INTERESSER;

drop table if exists ITEERS;

drop table if exists MENU;

drop table if exists PLATS;

drop table if exists POST;

drop table if exists RESERVATION;

drop table if exists TABLERESERVATION;

drop table if exists TYPEMENU;
/*==============================================================*/
/* Table : ADMINE                                               */
/*==============================================================*/
create table ADMINE
(
   id_admin             int not null,
   mot_passe            text,
   email                text,
   primary key (id_admin),
   check (email like "%@%")
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*==============================================================*/
/* Table : ASSOCIER                                             */
/*==============================================================*/
create table ASSOCIER
(
   CODECOMMANDE         int not null,
   CODE_CLIENT          int not null,
   CODEFACTURE          int not null,
   CODE_PLAT            int not null,
   primary key (CODECOMMANDE, CODE_CLIENT, CODEFACTURE, CODE_PLAT)
);

/*==============================================================*/
/* Table : CATEGORIE                                            */
/*==============================================================*/
create table CATEGORIE
(
   ID_CATEGORIE         int not null,
   NOM_CATEGORIE        text,
   primary key (ID_CATEGORIE)
);

/*==============================================================*/
/* Table : CLIENT                                               */
/*==============================================================*/
create table CLIENT
(
   CODE_CLIENT          int not null,
   NOM                  text,
   PRENOM               text,
   TEL                  numeric(8,0),
   PROFESSION           text,
   DATENAISSANCE        date,
   ADRESS               text,
   VILLE                text,
   MOT_PASSE            text,
   email                text,
   primary key (CODE_CLIENT),
   check (email like "%@%")
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*==============================================================*/
/* Table : COMMANDE                                             */
/*==============================================================*/
create table COMMANDE
(
   CODECOMMANDE         int not null,
   COM_CODE_CLIENT      int,
   CODE_CLIENT          int not null,
   CODEFACTURE          int not null,
   DATECO               date,
   primary key (CODECOMMANDE, CODE_CLIENT, CODEFACTURE)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*==============================================================*/
/* Table : EMPLOYE                                              */
/*==============================================================*/
create table EMPLOYE
(
   ID_EMPLOYE           int not null,
   ETAT                 bool,
   primary key (ID_EMPLOYE)
);

/*==============================================================*/
/* Table : EMPLOYEPOTENTIEL                                     */
/*==============================================================*/
create table EMPLOYEPOTENTIEL
(
   ID_EMPLOYE           int not null,
   CV                   longblob,
   ADRESSEMPLOYEEPONTENTIRL char(70),
   TELEMPLOYEEPONTENTIEL numeric(8,0),
   EMAILEMPLOYEEPONTENTIEL text,
   NOMEMPLOYEEPONTENTIEL char(70),
   primary key (ID_EMPLOYE)
);

/*==============================================================*/
/* Table : FACTURE                                              */
/*==============================================================*/
create table FACTURE
(
   CODEFACTURE          int not null,
   MONTOT               numeric(8,0),
   NUMBREPL             int,
   TYPEPAYEMENT         numeric(8,0),
   primary key (CODEFACTURE)
);

/*==============================================================*/
/* Table : INTERESSER                                           */
/*==============================================================*/
create table INTERESSER
(
   ID_POST              int not null,
   ID_EMPLOYEE          int not null,
   DATEDEMMANDE         datetime,
   primary key (ID_POST, ID_EMPLOYEE)
);

/*==============================================================*/
/* Table : ITEERS                                               */
/*==============================================================*/
create table ITEERS
(
   CODE_PLAT            int not null,
   ID_MENU              int not null,
   NBR_PLAT             numeric(8,0),
   primary key (CODE_PLAT, ID_MENU)
);

/*==============================================================*/
/* Table : MENU                                                 */
/*==============================================================*/
create table MENU
(
   ID_MENU              int not null,
   ID_TYPE              int not null,
   NOM_MENU             text,
   JOUR                 char(60),
   primary key (ID_MENU)
);

/*==============================================================*/
/* Table : PLATS                                                */
/*==============================================================*/
create table PLATS
(
   CODE_PLAT            int not null,
   ID_CATEGORIE         int not null,
   NOM_PLAT             text,
   DESCPTION            text,
   PRIX                 float(8,2),
   DISPO_               bool,
   primary key (CODE_PLAT)
);

/*==============================================================*/
/* Table : POST                                                 */
/*==============================================================*/
create table POST
(
   ID_POST              int not null,
   ID_EMPLOYE           int not null,
   NOM_POST             text,
   COMPETENCE           text,
   SALAIRE              numeric(8,0),
   primary key (ID_POST)
);

/*==============================================================*/
/* Table : RESERVATION                                          */
/*==============================================================*/
create table RESERVATION
(
   ID_RESERVATION       int not null,
   CODE_CLIENT          int not null,
   ID_TABLE             int not null,
   DATE_RESE            date,
   HEURE_DEP            time,
   HEURE_FI             time,
   primary key (ID_RESERVATION)
);

/*==============================================================*/
/* Table : TABLERESERVATION                                     */
/*==============================================================*/
create table TABLERESERVATION
(
   ID_TABLE             int not null,
   RESERVER             bool,
   NUMBERPERSONNE       numeric(8,0),
   TYPETABLE            numeric(8,0),
   DATE_RESERVATION     date,
   HEURE_DE             time,
   HEUREF               time,
   primary key (ID_TABLE)
);

/*==============================================================*/
/* Table : TYPEMENU                                             */
/*==============================================================*/
create table TYPEMENU
(
   ID_TYPE              int not null,
   primary key (ID_TYPE)
);

alter table ASSOCIER add constraint FK_ASSOCIER foreign key (CODE_PLAT)
      references PLATS (CODE_PLAT) on delete restrict on update restrict;

alter table ASSOCIER add constraint FK_ASSOCIER2 foreign key (CODECOMMANDE, CODE_CLIENT, CODEFACTURE)
      references COMMANDE (CODECOMMANDE, CODE_CLIENT, CODEFACTURE) on delete restrict on update restrict;

alter table COMMANDE add constraint FK_COMMANDER foreign key (CODE_CLIENT)
      references CLIENT (CODE_CLIENT) on delete restrict on update restrict;

alter table COMMANDE add constraint FK_IMPRIMER2 foreign key (CODECOMMANDE, COM_CODE_CLIENT, CODEFACTURE)
      references FACTURE (CODECOMMANDE, CODE_CLIENT, CODEFACTURE) on delete restrict on update restrict;

alter table INTERESSER add constraint FK_INTERESSER foreign key (ID_EMPLOYEE)
      references EMPLOYEPOTENTIEL (ID_EMPLOYE) on delete restrict on update restrict;

alter table INTERESSER add constraint FK_INTERESSER2 foreign key (ID_POST)
      references POST (ID_POST) on delete restrict on update restrict;

alter table ITEERS add constraint FK_INTEGER2 foreign key (CODE_PLAT)
      references PLATS (CODE_PLAT) on delete restrict on update restrict;

alter table ITEERS add constraint FK_INTEGERS foreign key (ID_MENU)
      references MENU (ID_MENU) on delete restrict on update restrict;

alter table MENU add constraint FK_APPARTENIR__ foreign key (ID_TYPE)
      references TYPEMENU (ID_TYPE) on delete restrict on update restrict;

alter table PLATS add constraint FK_ACCORDER foreign key (ID_CATEGORIE)
      references CATEGORIE (ID_CATEGORIE) on delete restrict on update restrict;

alter table POST add constraint FK_AVOIR foreign key (ID_EMPLOYE)
      references EMPLOYE (ID_EMPLOYE) on delete restrict on update restrict;

alter table RESERVATION add constraint FK__CONCERNER foreign key (ID_TABLE)
      references TABLERESERVATION (ID_TABLE) on delete restrict on update restrict;

alter table RESERVATION add constraint FK__EFFECTUER foreign key (CODE_CLIENT)
      references CLIENT (CODE_CLIENT) on delete restrict on update restrict;



--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`CODE_CLIENT`, `NOM`, `PRENOM`, `TEL`, `PROFESSION`, `DATENAISSANCE`, `ADRESS`, `VILLE`, `MOT_PASSE`, `email`) VALUES
(1, 'Daabal', 'Sokaina', '99999999', NULL, NULL, '45hhsj', 'Eljadida', 'd91079b065578ae6e349260c1a1a6741', 'sokainadaabal@gmail.com');

INSERT INTO `admine` (`id_admin`, `email`, `mot_passe`) VALUES
(1, 'sokainadaabal@gmail.com', 'ca2b61ba7a81e6436b1ee2de197b65da');
--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`CODE_CLIENT`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

COMMIT;


-- SAUVGARDER UNE BASE DE DONNEE MYSQL
-- ouvrez l'invite de commande cmd
-- mysqldump -u root -p gestion_restaurant > bd.sql				
 