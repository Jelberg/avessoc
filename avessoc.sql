/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     12/09/2018 02:54:44 p.m.                     */
/*==============================================================*/


/*==============================================================*/
/* Table: ANSWER                                                */
/*==============================================================*/
create table ANSWER
(
   ANSWER_ID            int not null auto_increment,
   ANSWER_QUESTION_ID   int not null,
   ANSWER_DESC          text not null,
   ANSWER_VALUE         int not null,
   primary key (ANSWER_ID)
);

/*==============================================================*/
/* Table: CNTBTION                                              */
/*==============================================================*/
create table CNTBTION
(
   CNTBTION_ID          int not null auto_increment,
   CNTBTION_SPONSOR_ID  int not null,
   CNTBTION_CANT        numeric(10,10) not null,
   CNTBTION_BALANCE     numeric(10,10) not null,
   CNTBTION_ACTIVITY_DATE timestamp DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP not null,
   CNTBTION_USER        text,
   primary key (CNTBTION_ID)
);

/*==============================================================*/
/* Table: CONFIG                                                */
/*==============================================================*/
create table CONFIG
(
   CONFIG_ID            int not null auto_increment,
   CONFIG_MPERSON_ID    int not null,
   CONFIG_ACTIVATION    char(1) not null,
   CONFIG_ACTIVACION_DATE date,
   CONFIG_DEACTIVATION_DATE date,
   CONFIG_ACTIVITY_DATE timestamp DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP not null,
   CONFIG_USER          text,
   primary key (CONFIG_ID)
);

/*==============================================================*/
/* Table: CONTACT                                               */
/*==============================================================*/
create table CONTACT
(
   CONTACT_ID           int not null auto_increment,
   CONTACT_MPERSON_ID   int,
   CONTACT_USER_MPERSON_ID int,
   CONTACT_MDC_MPERSON_ID int,
   CONTACT_LOCAL_PHON   int,
   CONTACT_MOVIL_PHON   int,
   CONTACT_EMAIL        text,
   CONTACT_WEB_SITE     text,
   CONTACT_WORK_PHON    int,
   CONTACT_NUMBER_FAX   int,
   CONTACT_ACTIVITY_DATE timestamp DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP not null,
   CONTACT_USER         text,
   primary key (CONTACT_ID)
);

/*==============================================================*/
/* Table: DIRECTION                                             */
/*==============================================================*/
create table DIRECTION
(
   DIRECTION_ID         int not null auto_increment,
   DIRECTION_PARISH_ID  int not null,
   DIRECTION_PAR_MUN_ID int not null,
   DIRECTION_MPERSON_ID int,
   DIRECTION_USE_MPERSON_ID int,
   DIRECTION_MDC_MPERSON_ID int,
   DIRECTION_DESC       text,
   DIRECTION_TYPE       varchar(2),
   DIRECTION_ACRONYM    text,
   DIRECTION_ACTIVITY_DATE timestamp DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP not null,
   DIRECTION_USER       text,
   primary key (DIRECTION_ID)
);

/*==============================================================*/
/* Table: DISIEASE                                              */
/*==============================================================*/
create table DISIEASE
(
   DISIEASE_ID          int not null auto_increment,
   DISIEASE_EXAM_ID     int,
   DISIEASE_DESC        text,
   DISIEASE_ACTIVITY_DATE timestamp DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP not null,
   DISIEASE_USER        text,
   primary key (DISIEASE_ID)
);

/*==============================================================*/
/* Table: EXAM                                                  */
/*==============================================================*/
create table EXAM
(
   EXAM_ID              int not null auto_increment,
   EXAM_TYPE            text not null,
   EXAM_CATEGORY        text not null,
   EXAM_ACRONYM         text not null,
   EXAM_ACTIVITY_DATE   timestamp DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP not null,
   EXAM_USER            text,
   primary key (EXAM_ID)
);

/*==============================================================*/
/* Table: MDCENTER                                              */
/*==============================================================*/
create table MDCENTER
(
   MPERSON_ID           int not null auto_increment,
   MPERSON_NAME         text,
   MPERSON_LAST_NAME    text,
   MPERSON_BIRTH        date,
   MPERSON_HOLDER_CARD  text,
   MPERSON_IDENTF       int,
   MPERSON_ACTIVITY_DATE timestamp DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP not null,
   MPERSON_USER         text,
   MPERSON_SECOND_NAME  text,
   MPERSON_SECOND_LNAME text,
   MPERSON_NACIONALITY  text,
   MPERSON_CIVIL_STATS  char(1),
   MPERSON_SEX          char(1),
   MPERSON_LEGAL_NAME   text not null,
   MPERSON_PROFETION    text,
   MPERSON_TYPE_DOC     char(3),
   MPERSON_BIRTH_PLACE  text,
   MDCENTER_TYPE        char(3) not null,
   MDCENTER_RESPONSABILITY_ID int,
   MDCENTER_RESPANSABILITY_NAME text,
   MDCENTER_FTURN_INIT  time,
   MDCENTER_FTURN_END   time,
   MDCENTER_STURN_INIT  time,
   MDCENTER_STURN_END   time,
   MDCENTER_ACRONYM     text,
   primary key (MPERSON_ID)
);

/*==============================================================*/
/* Table: MUNICIPALT                                            */
/*==============================================================*/
create table MUNICIPALT
(
   MUNICIPALT_ID        int not null auto_increment,
   MUNICIPALT_STATE_ID  int not null,
   MUNICIPALT_DESC      text not null,
   MUNICIPALT_ACTIVITY_DATE timestamp DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP not null,
   MUNICIPALT_USER      text,
   primary key (MUNICIPALT_ID)
);

/*==============================================================*/
/* Table: NOTIFICATION                                          */
/*==============================================================*/
create table NOTIFICATION
(
   NOTIFICATION_ID      int not null auto_increment,
   NOTIFICATION_RPORDER_ID int,
   NOTIFICATION_RPORDER_REQUEST_ID int,
   NOTIFICATION_REQUEST_PATIENT_ID int,
   NOTIFICATION_ORDER_ID int,
   NOTIFICATION_TYPE    text not null,
   NOTIFICATION_MENSAJE text,
   NOTIFICATION_ACTIVITY_DATE timestamp DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP not null,
   NOTIFICATION_USER    text,
   primary key (NOTIFICATION_ID)
);

/*==============================================================*/
/* Table: ORD                                                   */
/*==============================================================*/
create table ORD
(
   ORDER_ID             int not null auto_increment,
   ORDER_SPONSOR_PERSON_ID int not null,
   ORDER_BIRTH_DATE     date not null,
   ORDER_BILLING_DATE   date,
   ORDER_BILLING_USER   text,
   ORDER_PRICE_EXAM     numeric(8,0),
   ORDER_TOTAL_EXAM     int,
   ORDER_ACTIVITY_DATE  timestamp DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP not null,
   ORDER_USER           text,
   primary key (ORDER_ID)
);

/*==============================================================*/
/* Table: PARISH                                                */
/*==============================================================*/
create table PARISH
(
   PARISH_ID            int not null auto_increment,
   PARISH_MUNICIPALT_ID int not null,
   PARISH_DESC          text,
   PARISH_ACTIVITY_DATE timestamp DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP not null,
   PARISH_USER          text,
   primary key (PARISH_ID, PARISH_MUNICIPALT_ID)
);

/*==============================================================*/
/* Table: PATIENT                                               */
/*==============================================================*/
create table PATIENT
(
   MPERSON_ID           int not null auto_increment,
   MPERSON_NAME         text,
   MPERSON_LAST_NAME    text,
   MPERSON_BIRTH        date not null,
   MPERSON_IDENTF       int not null,
   MPERSON_ACTIVITY_DATE timestamp DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP not null,
   MPERSON_USER         text,
   MPERSON_SECOND_NAME  text,
   MPERSON_SECOND_LNAME text,
   MPERSON_NACIONALITY  text,
   MPERSON_CIVIL_STATS  char(1),
   MPERSON_SEX          char(1),
   MPERSON_HOLDER_CARD  text,
   MPERSON_LEGAL_NAME   text not null,
   MPERSON_PROFETION    text,
   MPERSON_TYPE_DOC     char(3) not null,
   MPERSON_BIRTH_PLACE  text,
   primary key (MPERSON_ID)
);

/*==============================================================*/
/* Table: QUESTION                                              */
/*==============================================================*/
create table QUESTION
(
   QUESTION_ID          int not null auto_increment,
   QUESTION_DESC        text not null,
   QUESTION_NUMBER_GRAFFAR int not null,
   primary key (QUESTION_ID)
);

/*==============================================================*/
/* Table: RCENTEREXAM                                           */
/*==============================================================*/
create table RCENTEREXAM
(
   RCENTEREXAM_ID       int not null auto_increment,
   RCENTEREXAM_MDCENTER_PERSON_ID int not null,
   RCENTEREXAM_EXAM_ID  int not null,
   RCENTEREXAM_AVAILABILITY char(1) not null,
   RCENTEREXAM_PRICE    numeric(10,10) not null,
   RCENTEREXAM_ACTIVITY_DATE timestamp DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP not null,
   RCENTEREXAM_USER     text,
   primary key (RCENTEREXAM_ID)
);

/*==============================================================*/
/* Table: REQUEST                                               */
/*==============================================================*/
create table REQUEST
(
   REQUEST_ID           int not null auto_increment,
   REQUEST_PATIENT_PERSON_ID int not null,
   REQUEST_MDCENTER_ID_CONCERNING int ,
   REQUEST_MDCENTER_ID_REFERRED int,
   REQUEST_FAMILY_TYPE  text,
   REQUEST_FAMILY_OTHER text,
   REQUEST_LOBORAL_COND text,
   REQUEST_GRAFFAR_ONE  int,
   REQUEST_GRAFFAR_TWO  int,
   REQUEST_GRAFFAR_THREE int,
   REQUEST_GRAFFAR_FOUR int,
   REQUEST_GRAFFAR_PORCTG int,
   REQUEST_WEIGHT       int,
   REQUEST_INHABITANTS_NUMB int,
   REQUEST_AVERAGE_INCOME int,
   REQUEST_OBSERVATION  text,
   REQUEST_ORIGIN       text,
   REQUEST_ACTIVITY_DATE timestamp DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP not null,
   REQUEST_USER         text,
   primary key (REQUEST_ID, REQUEST_PATIENT_PERSON_ID)
);

/*==============================================================*/
/* Table: RPERNOT                                               */
/*==============================================================*/
create table RPERNOT
(
   RPERNOT_ID           int not null auto_increment,
   RPERNOT_NOTIFICATION_ID int,
   MPERSON_ID           int,
   RPERNOT_REVISED      char(1),
   RPERNOT_ACTIVITY_DATE timestamp DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP not null,
   RPERNOT_USER         text,
   primary key (RPERNOT_ID)
);

/*==============================================================*/
/* Table: RPORDER                                               */
/*==============================================================*/
create table RPORDER
(
   RPORDER_ID           int not null auto_increment,
   RPORDER_REQUEST_ID   int not null,
   REQUEST_PATIENT_PERSON_ID int not null,
   RPORDER_STATUS       char(3) not null,
   RPORDER_CE_ID        int not null,
   RPORDER_ORDER_ID     int,
   RPORDER_ACTIVITY_DATE timestamp DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP not null,
   RPORDER_USER         text,
   primary key (RPORDER_ID, RPORDER_REQUEST_ID, REQUEST_PATIENT_PERSON_ID)
);

/*==============================================================*/
/* Table: SCALE                                                 */
/*==============================================================*/
create table SCALE
(
   SCALE_ID             int not null auto_increment,
   SCALE_MIN            int not null,
   SCALE_MAX            int not null,
   SCALE_STRATUM_SOCIAL int not null,
   SCALE_PORCENTAGE     int not null,
   primary key (SCALE_ID)
);

/*==============================================================*/
/* Table: SPONSOR                                               */
/*==============================================================*/
create table SPONSOR
(
   MPERSON_ID           int not null auto_increment,
   MPERSON_NAME         text,
   MPERSON_LAST_NAME    text,
   MPERSON_BIRTH        date,
   MPERSON_HOLDER_CARD  text,
   MPERSON_IDENTF       int,
   MPERSON_ACTIVITY_DATE timestamp DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP not null,
   MPERSON_USER         text,
   MPERSON_SECOND_NAME  text,
   MPERSON_SECOND_LNAME text,
   MPERSON_NACIONALITY  text,
   MPERSON_CIVIL_STATS  char(1),
   MPERSON_SEX          char(1),
   MPERSON_LEGAL_NAME   text not null,
   MPERSON_PROFETION    text,
   MPERSON_TYPE_DOC     char(3),
   MPERSON_BIRTH_PLACE  text,
   SPONSOR_LOGO         longblob,
   primary key (MPERSON_ID)
);

/*==============================================================*/
/* Table: STATE                                                 */
/*==============================================================*/
create table STATE
(
   STATE_ID             int not null auto_increment,
   STATE_DESC           text not null,
   STATE_ACTIVITY_DATE  timestamp DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP not null,
   STATE_USER           text,
   primary key (STATE_ID)
);

/*==============================================================*/
/* Table: USER                                                  */
/*==============================================================*/
create table USER
(
   MPERSON_ID           int not null auto_increment,
   MPERSON_NAME         text,
   MPERSON_LAST_NAME    text,
   MPERSON_BIRTH        date not null,
   MPERSON_IDENTF       int not null,
   MPERSON_ACTIVITY_DATE timestamp DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP not null,
   MPERSON_USER         text,
   MPERSON_SECOND_NAME  text,
   MPERSON_SECOND_LNAME text,
   MPERSON_NACIONALITY  text,
   MPERSON_CIVIL_STATS  char(1),
   MPERSON_SEX          char(1),
   MPERSON_HOLDER_CARD  text,
   MPERSON_LEGAL_NAME   text not null,
   MPERSON_PROFETION    text,
   MPERSON_TYPE_DOC     char(3) not null,
   MPERSON_BIRTH_PLACE  text,
   USER_PASS            text not null,
   USER_PSEUDONYM       text not null,
   USER_PRIVILEGE_LEVL  char(5) not null,
   USER_COMPANY         text,
   primary key (MPERSON_ID)
);

alter table ANSWER add constraint FK_ANSWER_INV_QUESTION_ID foreign key (ANSWER_QUESTION_ID)
      references QUESTION (QUESTION_ID) on delete restrict on update restrict;

alter table CNTBTION add constraint FK_CNTBTION_INV_SPONSOR_ID foreign key (CNTBTION_SPONSOR_ID)
      references SPONSOR (MPERSON_ID) on delete restrict on update restrict;

alter table CONFIG add constraint FK_CONFIG_INV_USER_ID foreign key (CONFIG_MPERSON_ID)
      references USER (MPERSON_ID) on delete restrict on update restrict;

alter table CONTACT add constraint FK_CONTACT_INV_MDCENTER_ID foreign key (CONTACT_MDC_MPERSON_ID)
      references MDCENTER (MPERSON_ID) on delete restrict on update restrict;

alter table CONTACT add constraint FK_CONTACT_INV_PATIENT_ID foreign key (CONTACT_MPERSON_ID)
      references PATIENT (MPERSON_ID) on delete restrict on update restrict;

alter table CONTACT add constraint FK_CONTACT_INV_USER_ID foreign key (CONTACT_USER_MPERSON_ID)
      references USER (MPERSON_ID) on delete restrict on update restrict;

alter table DIRECTION add constraint FK_DIRECTION_INV_MDCENTER_ID foreign key (DIRECTION_MDC_MPERSON_ID)
      references MDCENTER (MPERSON_ID) on delete restrict on update restrict;

alter table DIRECTION add constraint FK_DIRECTION_INV_PARISH_ID foreign key (DIRECTION_PARISH_ID, DIRECTION_PAR_MUN_ID)
      references PARISH (PARISH_ID, PARISH_MUNICIPALT_ID) on delete restrict on update restrict;

alter table DIRECTION add constraint FK_DIRECTION_INV_PATIENT_ID foreign key (DIRECTION_MPERSON_ID)
      references PATIENT (MPERSON_ID) on delete restrict on update restrict;

alter table DIRECTION add constraint FK_DIRECTION_INV_USER_ID foreign key (DIRECTION_USE_MPERSON_ID)
      references USER (MPERSON_ID) on delete restrict on update restrict;

alter table DISIEASE add constraint FK_DISIEASE_INV_EXAM_ID foreign key (DISIEASE_EXAM_ID)
      references EXAM (EXAM_ID) on delete restrict on update restrict;

alter table MUNICIPALT add constraint FK_MUNICIPALT_INV_STATE_ID foreign key (MUNICIPALT_STATE_ID)
      references STATE (STATE_ID) on delete restrict on update restrict;

alter table NOTIFICATION add constraint FK_NOTIFICATION_INV_ORDER_ID foreign key (NOTIFICATION_ORDER_ID)
      references ORD (ORDER_ID) on delete restrict on update restrict;

alter table NOTIFICATION add constraint FK_NOTIFICATION_INV_RPORDER_ID foreign key (NOTIFICATION_RPORDER_ID, NOTIFICATION_RPORDER_REQUEST_ID, NOTIFICATION_REQUEST_PATIENT_ID)
      references RPORDER (RPORDER_ID, RPORDER_REQUEST_ID, REQUEST_PATIENT_PERSON_ID) on delete restrict on update restrict;

alter table ORD add constraint FK_ORDER_INV_SPONSOR_ID foreign key (ORDER_SPONSOR_PERSON_ID)
      references SPONSOR (MPERSON_ID) on delete restrict on update restrict;

alter table PARISH add constraint FK_PARISH_INV_MUNICIPALT_ID foreign key (PARISH_MUNICIPALT_ID)
      references MUNICIPALT (MUNICIPALT_ID) on delete restrict on update restrict;

alter table RCENTEREXAM add constraint FK_RCENTEREXAM_INV_EXAM_ID foreign key (RCENTEREXAM_EXAM_ID)
      references EXAM (EXAM_ID) on delete restrict on update restrict;

alter table RCENTEREXAM add constraint FK_RCENTEREXAM_INV_MDCENTER_ID foreign key (RCENTEREXAM_MDCENTER_PERSON_ID)
      references MDCENTER (MPERSON_ID) on delete restrict on update restrict;

alter table REQUEST add constraint FK_REQUEST_INV_MDCENTER_CONCERNING foreign key (REQUEST_MDCENTER_ID_REFERRED)
      references MDCENTER (MPERSON_ID) on delete restrict on update restrict;

alter table REQUEST add constraint FK_REQUEST_INV_MECENTER_REFERRED foreign key (REQUEST_MDCENTER_ID_CONCERNING)
      references MDCENTER (MPERSON_ID) on delete restrict on update restrict;

alter table REQUEST add constraint FK_REQUEST_INV_PATIENT_ID foreign key (REQUEST_PATIENT_PERSON_ID)
      references PATIENT (MPERSON_ID) on delete restrict on update restrict;

alter table RPERNOT add constraint FK_RPERNOT_INV_NOTIFICATION foreign key (RPERNOT_NOTIFICATION_ID)
      references NOTIFICATION (NOTIFICATION_ID) on delete restrict on update restrict;

alter table RPERNOT add constraint FK_RPERNOT_INV_USER_ID foreign key (MPERSON_ID)
      references USER (MPERSON_ID) on delete restrict on update restrict;

alter table RPORDER add constraint FK_RPORDER_INV_ORDER_ID foreign key (RPORDER_ORDER_ID)
      references ORD (ORDER_ID) on delete restrict on update restrict;

alter table RPORDER add constraint FK_RPORDER_INV_RCENTEREXAM_ID foreign key (RPORDER_CE_ID)
      references RCENTEREXAM (RCENTEREXAM_ID) on delete restrict on update restrict;

alter table RPORDER add constraint FK_RPORDER_INV_REQUEST_ID foreign key (RPORDER_REQUEST_ID, REQUEST_PATIENT_PERSON_ID)
      references REQUEST (REQUEST_ID, REQUEST_PATIENT_PERSON_ID) on delete restrict on update restrict;

      /* nuevos cambios*/

ALTER TABLE `REQUEST` CHANGE `REQUEST_AVERAGE_INCOME` `REQUEST_AVERAGE_INCOME` DECIMAL(10,3) NULL DEFAULT NULL;

ALTER TABLE `CNTBTION` CHANGE `CNTBTION_CANT` `CNTBTION_CANT` DECIMAL(10,3) NOT NULL, CHANGE `CNTBTION_BALANCE` `CNTBTION_BALANCE` DECIMAL(10,3) NOT NULL;

ALTER TABLE `PATIENT` CHANGE `MPERSON_IDENTF` `MPERSON_IDENTF` TEXT NOT NULL;

ALTER TABLE `SPONSOR` CHANGE `MPERSON_IDENTF` `MPERSON_IDENTF` TEXT NULL DEFAULT NULL;

ALTER TABLE `MDCENTER` ADD `MDCENTER_NATURE_INST` TEXT NOT NULL AFTER `MDCENTER_ACRONYM`, ADD `MDCENTER_CONGREGATION` TEXT NOT NULL AFTER `MDCENTER_NATURE_INST`;

ALTER TABLE `MDCENTER` CHANGE `MDCENTER_NATURE_INST` `MDCENTER_NATURE_INST` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL, CHANGE `MDCENTER_CONGREGATION` `MDCENTER_CONGREGATION` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL;
ALTER TABLE `MDCENTER` CHANGE `MDCENTER_TYPE` `MDCENTER_REFERENCE_CENTER` CHAR(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;
ALTER TABLE `MDCENTER` ADD `MDCENTER_SALUD_CENTER` INT NOT NULL AFTER `MDCENTER_CONGREGATION`;
ALTER TABLE `MDCENTER` CHANGE `MDCENTER_SALUD_CENTER` `MDCENTER_SALUD_CENTER` TEXT NOT NULL;
ALTER TABLE `MDCENTER` CHANGE `MDCENTER_SALUD_CENTER` `MDCENTER_SALUD_CENTER` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL;
ALTER TABLE `MDCENTER` ADD `MDCENTER_FLABOR_DAY` TEXT NULL AFTER `MDCENTER_SALUD_CENTER`;
ALTER TABLE `MDCENTER` ADD `MDCENTER_LLABOR_DAY` INT NOT NULL AFTER `MDCENTER_FLABOR_DAY`;
ALTER TABLE `MDCENTER` CHANGE `MDCENTER_LLABOR_DAY` `MDCENTER_LLABOR_DAY` TEXT NULL;

ALTER TABLE `CONTACT` ADD `CONTACT_LOCAL_PHON_2` INT NULL AFTER `CONTACT_USER`, ADD `CONTACT_LOCAL_PHON_3` INT NULL AFTER `CONTACT_LOCAL_PHON_2`, ADD `CONTACT_LOCAL_PHON_4` INT NULL AFTER `CONTACT_LOCAL_PHON_3`, ADD `CONTACT_LOCAL_PHON_5` INT NULL AFTER `CONTACT_LOCAL_PHON_4`;

ALTER TABLE `EXAM` CHANGE `EXAM_TYPE` `EXAM_DESC` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;
ALTER TABLE `MDCENTER` CHANGE `MDCENTER_REFERENCE_CENTER` `MDCENTER_REFERENCE_CENTER` CHAR(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL;

ALTER TABLE `RCENTEREXAM` CHANGE `RCENTEREXAM_MDCENTER_PERSON_ID` `RCENTEREXAM_MDCENTER_PERSON_ID` INT(11) NULL, CHANGE `RCENTEREXAM_EXAM_ID` `RCENTEREXAM_EXAM_ID` INT(11) NULL, CHANGE `RCENTEREXAM_AVAILABILITY` `RCENTEREXAM_AVAILABILITY` CHAR(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL, CHANGE `RCENTEREXAM_PRICE` `RCENTEREXAM_PRICE` DECIMAL(10,10) NULL, CHANGE `RCENTEREXAM_ACTIVITY_DATE` `RCENTEREXAM_ACTIVITY_DATE` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `RCENTEREXAM` CHANGE `RCENTEREXAM_PRICE` `RCENTEREXAM_PRICE` DECIMAL(10,2) NULL DEFAULT NULL;
ALTER TABLE `REQUEST` CHANGE `REQUEST_WEIGHT` `REQUEST_WEIGHT` DECIMAL(11) NULL DEFAULT NULL;
ALTER TABLE `REQUEST` CHANGE `REQUEST_WEIGHT` `REQUEST_WEIGHT` DECIMAL(11,2) NULL DEFAULT NULL;
ALTER TABLE `REQUEST` ADD `REQUEST_CAUSE_EXAM` INT NOT NULL AFTER `REQUEST_USER`;
ALTER TABLE `REQUEST` CHANGE `REQUEST_CAUSE_EXAM` `REQUEST_CAUSE_EXAM` INT(11) NULL;