-- database SANIA

create schema if not exists sania;

use sania ;

-- table fonctions

create table fonctions(
    id_fonction tinyint auto_increment not null ,
    libelle_fonction varchar(40),
    constraint pk_fonction_name primary key(id_fonction)
);

-- ajout par defaut

insert into fonctions(libelle_fonction)values('admin'),('service informatique') , ('dircab');

-- ajout autre information

insert into fonctions(libelle_fonction)values('ministre'), ('conseiller');

-- table agent

create table if not exists agents(
    id_agent mediumint auto_increment not null ,
    nom_agent varchar(40),
    email_agent varchar(80),
    phone_agent varchar(15),
    fk_fonction tinyint ,
    password_agent varchar(50) default 'sania' ,
    constraint fk_fonction_agent foreign key(fk_fonction) references fonctions(id_fonction) on delete set null on update cascade ,
    constraint pk_agent_name primary key(id_agent)
);

-- update agent

alter table agents add dateEnregistrement date default current_date();
alter table agents modify dateEnregistrement date default current_date();
 -- Non ajouter

alter table agents add sexe varchar(10);


update agents set sexe = 'Masculin' ;

-- information par defaut
insert into agents(nom_agent,email_agent,phone_agent,fk_fonction,password_agent) values('admin','admin@gmail.com','0995540211',1,'admin');
-- requetes

select id_agent , nom_agent , email_agent , phone_agent , libelle_fonction , password_agent from agents inner join fonctions on agents.fk_fonction = fonctions.id_fonction ;

-- add table documents

create table if not exists documents(
    id_doc smallint auto_increment not null ,
    titre_document varchar(150),
    nature_document longtext ,
    date_entre datetime default now(),
    fk_agent  mediumint ,
    constraint fk_doc foreign key(fk_agent) references agents(id_agent) on delete set null on update cascade,
    constraint pk_doc primary key(id_doc)
);

-- update agents
alter table agents add statut longtext 

-- creation de la tables de traitements

create table traitements(
    id_traitement smallint auto_increment ,
    objet varchar(100) ,
    pdf longtext ,
    date_sortie date default current_date(),
    heure_sortie time default current_time(),
    fk_try_agent mediumint ,
    fk_try_fonction tinyint,
    constraint fk_name_agt foreign key(fk_try_agent) references agents(id_agent) on delete set null on update cascade,
    constraint fk_name_fnc foreign key(fk_try_fonction) references fonctions(id_fonction) on delete set null on update cascade,
    constraint pk_try primary key(id_traitement)

);


Database changed
MariaDB [sania]> select * from agents;
+----------+-------------+-----------------------+-------------+-------------+----------------+--------------------+----------+
| id_agent | nom_agent   | email_agent           | phone_agent | fk_fonction | password_agent | dateEnregistrement | sexe     |
+----------+-------------+-----------------------+-------------+-------------+----------------+--------------------+----------+
|        1 | admin       | admin@gmail.com       | 0995540211  |           1 | admin          | 2022-09-08         | Masculin |
|        3 | moise mbiye | moise@gmail.com       | 0999552054  |           4 | moise          | 2022-09-08         | Masculin |
|        4 | nathaly     | nathaly@gmail.com     | 0820536575  |           2 | lagarxia       | 2022-09-08         | Feminin  |
|        5 | sanath      | sanath@gmail.com      | 0853872315  |           3 | sanath         | 2022-09-08         | Masculin |
|        6 | jean-pierre | jean-pierre@gmail.com | 0898673843  |           6 | sania          | 2022-09-09         | Masculin |
+----------+-------------+-----------------------+-------------+-------------+----------------+--------------------+----------+
5 rows in set (0.001 sec)

MariaDB [sania]> desc documents;
+-----------------+--------------+------+-----+---------------------+----------------+
| Field           | Type         | Null | Key | Default             | Extra          |
+-----------------+--------------+------+-----+---------------------+----------------+
| id_doc          | smallint(6)  | NO   | PRI | NULL                | auto_increment |
| titre_document  | varchar(40)  | YES  |     | NULL                |                |
| nature_document | longtext     | YES  |     | NULL                |                |
| date_entre      | datetime     | YES  |     | current_timestamp() |                |
| fk_agent        | mediumint(9) | YES  | MUL | NULL                |                |
+-----------------+--------------+------+-----+---------------------+----------------+
5 rows in set (0.061 sec)

MariaDB [sania]> desc agents;
+--------------------+--------------+------+-----+-----------+----------------+
| Field              | Type         | Null | Key | Default   | Extra          |
+--------------------+--------------+------+-----+-----------+----------------+
| id_agent           | mediumint(9) | NO   | PRI | NULL      | auto_increment |
| nom_agent          | varchar(40)  | YES  |     | NULL      |                |
| email_agent        | varchar(80)  | YES  |     | NULL      |                |
| phone_agent        | varchar(15)  | YES  |     | NULL      |                |
| fk_fonction        | tinyint(4)   | YES  | MUL | NULL      |                |
| password_agent     | varchar(50)  | YES  |     | sania     |                |
| dateEnregistrement | date         | YES  |     | curdate() |                |
| sexe               | varchar(10)  | YES  |     | NULL      |                |
+--------------------+--------------+------+-----+-----------+----------------+
8 rows in set (0.003 sec)

MariaDB [sania]> desc documents;
+-----------------+--------------+------+-----+---------------------+----------------+
| Field           | Type         | Null | Key | Default             | Extra          |
+-----------------+--------------+------+-----+---------------------+----------------+
| id_doc          | smallint(6)  | NO   | PRI | NULL                | auto_increment |
| titre_document  | varchar(40)  | YES  |     | NULL                |                |
| nature_document | longtext     | YES  |     | NULL                |                |
| date_entre      | datetime     | YES  |     | current_timestamp() |                |
| fk_agent        | mediumint(9) | YES  | MUL | NULL                |                |
+-----------------+--------------+------+-----+---------------------+----------------+
5 rows in set (0.002 sec)

MariaDB [sania]> desc fonctions;
+------------------+-------------+------+-----+---------+----------------+
| Field            | Type        | Null | Key | Default | Extra          |
+------------------+-------------+------+-----+---------+----------------+
| id_fonction      | tinyint(4)  | NO   | PRI | NULL    | auto_increment |
| libelle_fonction | varchar(40) | YES  |     | NULL    |                |
+------------------+-------------+------+-----+---------+----------------+
2 rows in set (0.002 sec)

MariaDB [sania]> select titre_document ,date_entre , nom_agent from documents inner
    -> join agents on documents.fk_agent = agents.id_agent;
+-----------------------+---------------------+-----------+
| titre_document        | date_entre          | nom_agent |
+-----------------------+---------------------+-----------+
| motivation            | 2022-09-09 10:04:43 | nathaly   |
| guide de mathematique | 2022-09-09 10:09:20 | nathaly   |
| lettre primature      | 2022-09-09 10:13:42 | nathaly   |
| lettre test           | 2022-09-10 05:39:10 | nathaly   |
+-----------------------+---------------------+-----------+
4 rows in set (0.101 sec)

MariaDB [sania]> select titre_document ,date_entre , nom_agent,libelle_fonction from documents right join agents on documents.fk_agent = agents.id_agent;
ERROR 1054 (42S22): Unknown column 'libelle_fonction' in 'field list'
MariaDB [sania]> select titre_document ,date_entre , nom_agent from documents right join agents on documents.fk_agent = agents.id_agent;
+-----------------------+---------------------+-------------+
| titre_document        | date_entre          | nom_agent   |
+-----------------------+---------------------+-------------+
| motivation            | 2022-09-09 10:04:43 | nathaly     |
| guide de mathematique | 2022-09-09 10:09:20 | nathaly     |
| lettre primature      | 2022-09-09 10:13:42 | nathaly     |
| lettre test           | 2022-09-10 05:39:10 | nathaly     |
| NULL                  | NULL                | admin       |
| NULL                  | NULL                | moise mbiye |
| NULL                  | NULL                | sanath      |
| NULL                  | NULL                | jean-pierre |
+-----------------------+---------------------+-------------+
8 rows in set (0.064 sec)

MariaDB [sania]> select titre_document ,date_entre , fk_agent from documents right join agents on documents.fk_agent = agents.id_agent;
+-----------------------+---------------------+----------+
| titre_document        | date_entre          | fk_agent |
+-----------------------+---------------------+----------+
| motivation            | 2022-09-09 10:04:43 |        4 |
| guide de mathematique | 2022-09-09 10:09:20 |        4 |
| lettre primature      | 2022-09-09 10:13:42 |        4 |
| lettre test           | 2022-09-10 05:39:10 |        4 |
| NULL                  | NULL                |     NULL |
| NULL                  | NULL                |     NULL |
| NULL                  | NULL                |     NULL |
| NULL                  | NULL                |     NULL |
+-----------------------+---------------------+----------+
8 rows in set (0.003 sec)

MariaDB [sania]> select * from fonctions;
+-------------+---------------------+
| id_fonction | libelle_fonction    |
+-------------+---------------------+
|           1 | admin               |
|           2 | secretariat general |
|           3 | dircab              |
|           4 | ministre            |
|           5 | conseiller          |
|           6 | secretariat dircab  |
+-------------+---------------------+
6 rows in set (0.005 sec)

MariaDB [sania]> alter table documents add fk_fonction tinyint , add constraint foreign key(fk_fonction) references fonctions(id_fonction)
    -> on delete set null on update cascade;
Query OK, 4 rows affected (2.095 sec)              
Records: 4  Duplicates: 0  Warnings: 0

MariaDB [sania]> select * from documents;
+--------+-----------------------+------------------------------------------+---------------------+----------+-------------+
| id_doc | titre_document        | nature_document                          | date_entre          | fk_agent | fk_fonction |
+--------+-----------------------+------------------------------------------+---------------------+----------+-------------+
|      1 | motivation            | 12-blek-le-roc-web-1.PDF                 | 2022-09-09 10:04:43 |        4 |        NULL |
|      2 | guide de mathematique | 13 BEOINS ALIMENTATION PONDEUSE 2.pdf    | 2022-09-09 10:09:20 |        4 |        NULL |
|      3 | lettre primature      | gestion courrier.pdf                     | 2022-09-09 10:13:42 |        4 |        NULL |
|      4 | lettre test           | 16ALIMENT PREPARER COMPLET VOLAILLES.pdf | 2022-09-10 05:39:10 |        4 |        NULL |
+--------+-----------------------+------------------------------------------+---------------------+----------+-------------+
4 rows in set (0.002 sec)

MariaDB [sania]> update documents set fk_fonction = 2 ;
Query OK, 4 rows affected (0.110 sec)
Rows matched: 4  Changed: 4  Warnings: 0

MariaDB [sania]> select * from documents;
+--------+-----------------------+------------------------------------------+---------------------+----------+-------------+
| id_doc | titre_document        | nature_document                          | date_entre          | fk_agent | fk_fonction |
+--------+-----------------------+------------------------------------------+---------------------+----------+-------------+
|      1 | motivation            | 12-blek-le-roc-web-1.PDF                 | 2022-09-09 10:04:43 |        4 |           2 |
|      2 | guide de mathematique | 13 BEOINS ALIMENTATION PONDEUSE 2.pdf    | 2022-09-09 10:09:20 |        4 |           2 |
|      3 | lettre primature      | gestion courrier.pdf                     | 2022-09-09 10:13:42 |        4 |           2 |
|      4 | lettre test           | 16ALIMENT PREPARER COMPLET VOLAILLES.pdf | 2022-09-10 05:39:10 |        4 |           2 |
+--------+-----------------------+------------------------------------------+---------------------+----------+-------------+
4 rows in set (0.001 sec)

MariaDB [sania]> select titre_document ,date_entre , nom_agent, libelle_fonction from documents inner join agents on documents.fk_agent = agents.id_agent inner join fonction on documents.fk_fonction = fonctions.id_fonction;

MariaDB [sania]> select titre_document ,date_entre , nom_agent, libelle_fonction from documents inner join agents on documents.fk_agent = agents.id_agent inner join fonctions on documents.fk_fonction = fonctions.id_fonction;
+-----------------------+---------------------+-----------+---------------------+
| titre_document        | date_entre          | nom_agent | libelle_fonction    |
+-----------------------+---------------------+-----------+---------------------+
| motivation            | 2022-09-09 10:04:43 | nathaly   | secretariat general |
| guide de mathematique | 2022-09-09 10:09:20 | nathaly   | secretariat general |
| lettre primature      | 2022-09-09 10:13:42 | nathaly   | secretariat general |
| lettre test           | 2022-09-10 05:39:10 | nathaly   | secretariat general |
+-----------------------+---------------------+-----------+---------------------+
4 rows in set (0.002 sec)

MariaDB [sania]> select titre_document,nature_document ,date_entre , nom_agent, libelle_fonction from documents inner join agents on documents.fk_agent = agents.id_agent inner join fonctions on documents.fk_fonction = fonctions.id_fonction;
+-----------------------+------------------------------------------+---------------------+-----------+---------------------+
| titre_document        | nature_document                          | date_entre          | nom_agent | libelle_fonction    |
+-----------------------+------------------------------------------+---------------------+-----------+---------------------+
| motivation            | 12-blek-le-roc-web-1.PDF                 | 2022-09-09 10:04:43 | nathaly   | secretariat general |
| guide de mathematique | 13 BEOINS ALIMENTATION PONDEUSE 2.pdf    | 2022-09-09 10:09:20 | nathaly   | secretariat general |
| lettre primature      | gestion courrier.pdf                     | 2022-09-09 10:13:42 | nathaly   | secretariat general |
| lettre test           | 16ALIMENT PREPARER COMPLET VOLAILLES.pdf | 2022-09-10 05:39:10 | nathaly   | secretariat general |
+-----------------------+------------------------------------------+---------------------+-----------+---------------------+
4 rows in set (0.001 sec)
