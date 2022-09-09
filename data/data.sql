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
