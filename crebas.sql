/*==============================================================*/
/* DBMS name:      ORACLE Version 11g                           */
/* Created on:     07/08/2018 02:25:58 p.m.                     */
/*==============================================================*/


alter table ENTITY_2
   drop constraint FK_ENTITY_2_RELATIONS_ENTITY_1;

drop table ENTITY_1 cascade constraints;

drop index RELATIONSHIP_1_FK;

drop table ENTITY_2 cascade constraints;

/*==============================================================*/
/* Table: ENTITY_1                                              */
/*==============================================================*/
create table ENTITY_1 
(
   ID_A                 INTEGER              not null,
   ATTRIBUTE_2          INTEGER,
   constraint PK_ENTITY_1 primary key (ID_A)
);

/*==============================================================*/
/* Table: ENTITY_2                                              */
/*==============================================================*/
create table ENTITY_2 
(
   ID_A                 INTEGER,
   ID_B                 INTEGER              not null,
   constraint PK_ENTITY_2 primary key (ID_B)
);

/*==============================================================*/
/* Index: RELATIONSHIP_1_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_1_FK on ENTITY_2 (
   ID_A ASC
);

alter table ENTITY_2
   add constraint FK_ENTITY_2_RELATIONS_ENTITY_1 foreign key (ID_A)
      references ENTITY_1 (ID_A);

