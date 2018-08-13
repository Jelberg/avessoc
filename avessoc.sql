/*==============================================================*/
/* DBMS name:      PostgreSQL 8                                 */
/* Created on:     13/08/2018 03:02:41 p.m.                     */
/*==============================================================*/


drop index RESPONDE_FK;

drop index ANSWER_PK;

drop table ANSWER;

drop index REALIZA_FK;

drop index CNTBTION_PK;

drop table CNTBTION;

drop index SIGUE_FK;

drop index CONFIG_PK;

drop table CONFIG;

drop index POSEE_2_FK;

drop index POSEE_1_FK;

drop index POSEE_FK;

drop index CONTACT_PK;

drop table CONTACT;

drop index SE_ENCUENTRA_2_FK;

drop index SE_ENCUENTRA_1_FK;

drop index SE_ENCUENTRA_FK;

drop index CONTIENE_FK;

drop index DIRECTION_PK;

drop table DIRECTION;

drop index ES_CONSECUENCIA_FK;

drop index DISIEASE_PK;

drop table DISIEASE;

drop index EXAM_PK;

drop table EXAM;

drop index MDCENTER_PK;

drop table MDCENTER;

drop index FORMADO_FK;

drop index MUNICIPALT_PK;

drop table MUNICIPALT;

drop index GENERA__FK;

drop index GENERA_FK;

drop index NOTIFICATION_PK;

drop table NOTIFICATION;

drop index SE_APORTA_FK;

drop index ORDER_PK;

drop table "ORDER";

drop index FORMADO_POR_FK;

drop index PARISH_PK;

drop table PARISH;

drop index PATIENT_PK;

drop table PATIENT;

drop index QUESTION_PK;

drop table QUESTION;

drop index LO_REALIZAN_FK;

drop index OFRECE_FK;

drop index RCENTEREXAM_PK;

drop table RCENTEREXAM;

drop index REFERENTE_FK;

drop index OBTIENE_FK;

drop index REFERIDO_A_FK;

drop index REQUEST_PK;

drop table REQUEST;

drop index USUARIO_OPTIENE2_FK;

drop index SE_ENVIA_FK;

drop index RPERNOT_PK;

drop table RPERNOT;

drop index SE_ANADE_FK;

drop index A_RAZON_FK;

drop index REALIZADO_POR_FK;

drop index RPORDER_PK;

drop table RPORDER;

drop index SCALE_PK;

drop table SCALE;

drop index SPONSOR_PK;

drop table SPONSOR;

drop index STATE_PK;

drop table STATE;

drop index USER_PK;

drop table "USER";

/*==============================================================*/
/* Table: ANSWER                                                */
/*==============================================================*/
create table ANSWER (
   ANSWER_ID            SERIAL               not null,
   ANSWER_QUESTION_ID   INT4                 not null,
   ANSWER_DESC          TEXT                 not null,
   ANSWER_VALUE         INT4                 not null,
   constraint PK_ANSWER primary key (ANSWER_ID)
);

/*==============================================================*/
/* Index: ANSWER_PK                                             */
/*==============================================================*/
create unique index ANSWER_PK on ANSWER (
ANSWER_ID
);

/*==============================================================*/
/* Index: RESPONDE_FK                                           */
/*==============================================================*/
create  index RESPONDE_FK on ANSWER (
ANSWER_QUESTION_ID
);

/*==============================================================*/
/* Table: CNTBTION                                              */
/*==============================================================*/
create table CNTBTION (
   CNTBTION_ID          SERIAL               not null,
   CNTBTION_SPONSOR_ID  INT4                 not null,
   CNTBTION_CANT        NUMERIC              not null,
   CNTBTION_BALANCE     NUMERIC              not null,
   CNTBTION_ACTIVITY_DATE DATE                 not null,
   CNTBTION_USER        TEXT                 null,
   constraint PK_CNTBTION primary key (CNTBTION_ID)
);

/*==============================================================*/
/* Index: CNTBTION_PK                                           */
/*==============================================================*/
create unique index CNTBTION_PK on CNTBTION (
CNTBTION_ID
);

/*==============================================================*/
/* Index: REALIZA_FK                                            */
/*==============================================================*/
create  index REALIZA_FK on CNTBTION (
CNTBTION_SPONSOR_ID
);

/*==============================================================*/
/* Table: CONFIG                                                */
/*==============================================================*/
create table CONFIG (
   CONFIG_ID            SERIAL               not null,
   CONFIG_MPERSON_ID    INT4                 not null,
   CONFIG_ACTIVATION    CHAR(1)              not null
      constraint CKC_CONFIG_ACTIVATION_CONFIG check (CONFIG_ACTIVATION in ('S','N')),
   CONFIG_ACTIVACION_DATE DATE                 null,
   CONFIG_DEACTIVATION_DATE DATE                 null,
   CONFIG_ACTIVITY_DATE DATE                 not null,
   CONFIG_USER          TEXT                 null,
   constraint PK_CONFIG primary key (CONFIG_ID)
);

/*==============================================================*/
/* Index: CONFIG_PK                                             */
/*==============================================================*/
create unique index CONFIG_PK on CONFIG (
CONFIG_ID
);

/*==============================================================*/
/* Index: SIGUE_FK                                              */
/*==============================================================*/
create  index SIGUE_FK on CONFIG (
CONFIG_MPERSON_ID
);

/*==============================================================*/
/* Table: CONTACT                                               */
/*==============================================================*/
create table CONTACT (
   CONTACT_ID           SERIAL               not null,
   CONTACT_MPERSON_ID   INT4                 null,
   CONTACT_USER_MPERSON_ID INT4                 null,
   CONTACT_MDC_MPERSON_ID INT4                 null,
   CONTACT_LOCAL_PHON   INT4                 null,
   CONTACT_MOVIL_PHON   INT4                 null,
   CONTACT_EMAIL        TEXT                 null,
   CONTACT_WEB_SITE     TEXT                 null,
   CONTACT_WORK_PHON    INT4                 null,
   CONTACT_NUMBER_FAX   INT4                 null,
   CONTACT_ACTIVITY_DATE DATE                 not null,
   CONTACT_USER         TEXT                 null,
   constraint PK_CONTACT primary key (CONTACT_ID)
);

/*==============================================================*/
/* Index: CONTACT_PK                                            */
/*==============================================================*/
create unique index CONTACT_PK on CONTACT (
CONTACT_ID
);

/*==============================================================*/
/* Index: POSEE_FK                                              */
/*==============================================================*/
create  index POSEE_FK on CONTACT (
CONTACT_MPERSON_ID
);

/*==============================================================*/
/* Index: POSEE_1_FK                                            */
/*==============================================================*/
create  index POSEE_1_FK on CONTACT (
CONTACT_USER_MPERSON_ID
);

/*==============================================================*/
/* Index: POSEE_2_FK                                            */
/*==============================================================*/
create  index POSEE_2_FK on CONTACT (
CONTACT_MDC_MPERSON_ID
);

/*==============================================================*/
/* Table: DIRECTION                                             */
/*==============================================================*/
create table DIRECTION (
   DIRECTION_ID         SERIAL               not null,
   DIRECTION_PARISH_ID  INT4                 not null,
   DIRECTION_PAR_MUN_ID INT4                 not null,
   DIRECTION_PAR_MUN_ST_ID INT4                 not null,
   DIRECTION_MPERSON_ID INT4                 null,
   DIRECTION_USE_MPERSON_ID INT4                 null,
   DIRECTION_MDC_MPERSON_ID INT4                 null,
   DIRECTION_DESC       TEXT                 not null,
   DIRECTION_TYPE       VARCHAR(2)           not null
      constraint CKC_DIRECTION_TYPE_DIRECTIO check (DIRECTION_TYPE in ('HB','LB') and DIRECTION_TYPE = upper(DIRECTION_TYPE)),
   DIRECTION_ACRONYM    TEXT                 null,
   DIRECTION_ACTIVITY_DATE DATE                 not null,
   DIRECTION_USER       TEXT                 null,
   constraint PK_DIRECTION primary key (DIRECTION_ID)
);

/*==============================================================*/
/* Index: DIRECTION_PK                                          */
/*==============================================================*/
create unique index DIRECTION_PK on DIRECTION (
DIRECTION_ID
);

/*==============================================================*/
/* Index: CONTIENE_FK                                           */
/*==============================================================*/
create  index CONTIENE_FK on DIRECTION (
DIRECTION_PARISH_ID,
DIRECTION_PAR_MUN_ID,
DIRECTION_PAR_MUN_ST_ID
);

/*==============================================================*/
/* Index: SE_ENCUENTRA_FK                                       */
/*==============================================================*/
create  index SE_ENCUENTRA_FK on DIRECTION (
DIRECTION_MPERSON_ID
);

/*==============================================================*/
/* Index: SE_ENCUENTRA_1_FK                                     */
/*==============================================================*/
create  index SE_ENCUENTRA_1_FK on DIRECTION (
DIRECTION_USE_MPERSON_ID
);

/*==============================================================*/
/* Index: SE_ENCUENTRA_2_FK                                     */
/*==============================================================*/
create  index SE_ENCUENTRA_2_FK on DIRECTION (
DIRECTION_MDC_MPERSON_ID
);

/*==============================================================*/
/* Table: DISIEASE                                              */
/*==============================================================*/
create table DISIEASE (
   DISIEASE_ID          SERIAL               not null,
   DISIEASE_EXAM_ID     INT4                 null,
   DISIEASE_DESC        TEXT                 null,
   DISIEASE_ACTIVITY_DATE DATE                 not null,
   DISIEASE_USER        TEXT                 null,
   constraint PK_DISIEASE primary key (DISIEASE_ID)
);

/*==============================================================*/
/* Index: DISIEASE_PK                                           */
/*==============================================================*/
create unique index DISIEASE_PK on DISIEASE (
DISIEASE_ID
);

/*==============================================================*/
/* Index: ES_CONSECUENCIA_FK                                    */
/*==============================================================*/
create  index ES_CONSECUENCIA_FK on DISIEASE (
DISIEASE_EXAM_ID
);

/*==============================================================*/
/* Table: EXAM                                                  */
/*==============================================================*/
create table EXAM (
   EXAM_ID              SERIAL               not null,
   EXAM_TYPE            TEXT                 not null,
   EXAM_CATEGORY        TEXT                 not null,
   EXAM_ACRONYM         TEXT                 not null,
   EXAM_ACTIVITY_DATE   DATE                 not null,
   EXAM_USER            TEXT                 null,
   constraint PK_EXAM primary key (EXAM_ID)
);

/*==============================================================*/
/* Index: EXAM_PK                                               */
/*==============================================================*/
create unique index EXAM_PK on EXAM (
EXAM_ID
);

/*==============================================================*/
/* Table: MDCENTER                                              */
/*==============================================================*/
create table MDCENTER (
   MPERSON_ID           SERIAL               not null,
   MPERSON_NAME         TEXT                 null,
   MPERSON_LAST_NAME    TEXT                 null,
   MPERSON_BIRTH        DATE                 null,
   MPERSON_HOLDER_CARD  TEXT                 null,
   MPERSON_IDENTF       INT4                 null,
   MPERSON_ACTIVITY_DATE DATE                 null,
   MPERSON_USER         TEXT                 null,
   MPERSON_SECOND_NAME  TEXT                 null,
   MPERSON_SECOND_LNAME TEXT                 null,
   MPERSON_NACIONALITY  TEXT                 null,
   MPERSON_CIVIL_STATS  CHAR(1)              null
      constraint CKC_MPERSON_CIVIL_STA_MDCENTER check (MPERSON_CIVIL_STATS is null or (MPERSON_CIVIL_STATS in ('S','C','D','V') and MPERSON_CIVIL_STATS = upper(MPERSON_CIVIL_STATS))),
   MPERSON_SEX          CHAR(1)              null
      constraint CKC_MPERSON_SEX_MDCENTER check (MPERSON_SEX is null or (MPERSON_SEX in ('M','F') and MPERSON_SEX = upper(MPERSON_SEX))),
   MPERSON_LEGAL_NAME   TEXT                 not null,
   MPERSON_PROFETION    TEXT                 null,
   MPERSON_TYPE_DOC     CHAR(3)              null
      constraint CKC_MPERSON_TYPE_DOC_MDCENTER check (MPERSON_TYPE_DOC is null or (MPERSON_TYPE_DOC in ('V','E','RIF','P'))),
   MPERSON_BIRTH_PLACE  DATE                 null,
   MDCENTER_TYPE        CHAR(3)              not null
      constraint CKC_MDCENTER_TYPE_MDCENTER check (MDCENTER_TYPE in ('REF','N') and MDCENTER_TYPE = upper(MDCENTER_TYPE)),
   MDCENTER_RESPONSABILITY_ID INT4                 null,
   MDCENTER_RESPANSABILITY_NAME TEXT                 null,
   MDCENTER_FTURN_INIT  TIME                 null,
   MDCENTER_FTURN_END   TIME                 null,
   MDCENTER_STURN_INIT  TIME                 null,
   MDCENTER_STURN_END   TIME                 null,
   MDCENTER_ACRONYM     TEXT                 null,
   constraint PK_MDCENTER primary key (MPERSON_ID)
);

/*==============================================================*/
/* Index: MDCENTER_PK                                           */
/*==============================================================*/
create unique index MDCENTER_PK on MDCENTER (
MPERSON_ID
);

/*==============================================================*/
/* Table: MUNICIPALT                                            */
/*==============================================================*/
create table MUNICIPALT (
   MUNICIPALT_ID        SERIAL               not null,
   MUNICIPLAT_STATE_ID  INT4                 not null,
   MUNICIPALT_DESC      TEXT                 not null,
   MUNICIPALT_ACTIVITY_DATE DATE                 not null,
   MUNICIPALT_USER      TEXT                 null,
   constraint PK_MUNICIPALT primary key (MUNICIPALT_ID, MUNICIPLAT_STATE_ID)
);

/*==============================================================*/
/* Index: MUNICIPALT_PK                                         */
/*==============================================================*/
create unique index MUNICIPALT_PK on MUNICIPALT (
MUNICIPALT_ID,
MUNICIPLAT_STATE_ID
);

/*==============================================================*/
/* Index: FORMADO_FK                                            */
/*==============================================================*/
create  index FORMADO_FK on MUNICIPALT (
MUNICIPLAT_STATE_ID
);

/*==============================================================*/
/* Table: NOTIFICATION                                          */
/*==============================================================*/
create table NOTIFICATION (
   NOTIFICATION_ID      SERIAL               not null,
   NOTIFICATION_RPORDER_ID INT4                 null,
   NOTIFICATION_RPORDER_REQUEST_ID INT4                 null,
   NOTIFICATION_REQUEST_PATIENT_ID INT4                 null,
   NOTIFINCERNING       INT4                 null,
   NOTID_REFERRED       INT4                 null,
   NOTIFICATION_ORDER_ID INT4                 null,
   NOTIFICATION_TYPE    TEXT                 not null,
   NOTIFICATION_MENSAJE TEXT                 null,
   NOTIFICATION_ACTIVITY_DATE DATE                 not null,
   NOTIFICATION_USER    TEXT                 null,
   constraint PK_NOTIFICATION primary key (NOTIFICATION_ID)
);

/*==============================================================*/
/* Index: NOTIFICATION_PK                                       */
/*==============================================================*/
create unique index NOTIFICATION_PK on NOTIFICATION (
NOTIFICATION_ID
);

/*==============================================================*/
/* Index: GENERA_FK                                             */
/*==============================================================*/
create  index GENERA_FK on NOTIFICATION (
NOTIFICATION_RPORDER_ID,
NOTIFICATION_RPORDER_REQUEST_ID,
NOTIFICATION_REQUEST_PATIENT_ID,
NOTIFINCERNING,
NOTID_REFERRED
);

/*==============================================================*/
/* Index: GENERA__FK                                            */
/*==============================================================*/
create  index GENERA__FK on NOTIFICATION (
NOTIFICATION_ORDER_ID
);

/*==============================================================*/
/* Table: "ORDER"                                               */
/*==============================================================*/
create table "ORDER" (
   ORDER_ID             SERIAL               not null,
   ORDER_SPONSOR_PERSON_ID INT4                 not null,
   ORDER_BIRTH_DATE     DATE                 not null,
   ORDER_BILLING_DATE   DATE                 null,
   ORDER_BILLING_USER   TEXT                 null,
   ORDER_PRICE_EXAM     NUMERIC              null,
   ORDER_TOTAL_EXAM     INT4                 null,
   ORDER_ACTIVITY_DATE  DATE                 not null,
   ORDER_USER           TEXT                 null,
   constraint PK_ORDER primary key (ORDER_ID)
);

/*==============================================================*/
/* Index: ORDER_PK                                              */
/*==============================================================*/
create unique index ORDER_PK on "ORDER" (
ORDER_ID
);

/*==============================================================*/
/* Index: SE_APORTA_FK                                          */
/*==============================================================*/
create  index SE_APORTA_FK on "ORDER" (
ORDER_SPONSOR_PERSON_ID
);

/*==============================================================*/
/* Table: PARISH                                                */
/*==============================================================*/
create table PARISH (
   PARISH_ID            SERIAL               not null,
   PARISH_MUNICIPALT_ID INT4                 not null,
   PARISH_MUNICIPLAT_STATE_ID INT4                 not null,
   PARISH_DESC          TEXT                 null,
   PARISH_ACTIVITY_DATE DATE                 not null,
   PARISH_USER          TEXT                 null,
   constraint PK_PARISH primary key (PARISH_ID, PARISH_MUNICIPALT_ID, PARISH_MUNICIPLAT_STATE_ID)
);

/*==============================================================*/
/* Index: PARISH_PK                                             */
/*==============================================================*/
create unique index PARISH_PK on PARISH (
PARISH_ID,
PARISH_MUNICIPALT_ID,
PARISH_MUNICIPLAT_STATE_ID
);

/*==============================================================*/
/* Index: FORMADO_POR_FK                                        */
/*==============================================================*/
create  index FORMADO_POR_FK on PARISH (
PARISH_MUNICIPALT_ID,
PARISH_MUNICIPLAT_STATE_ID
);

/*==============================================================*/
/* Table: PATIENT                                               */
/*==============================================================*/
create table PATIENT (
   MPERSON_ID           SERIAL               not null,
   MPERSON_NAME         TEXT                 null,
   MPERSON_LAST_NAME    TEXT                 null,
   MPERSON_BIRTH        DATE                 not null,
   MPERSON_IDENTF       INT4                 not null,
   MPERSON_ACTIVITY_DATE DATE                 not null,
   MPERSON_USER         TEXT                 null,
   MPERSON_SECOND_NAME  TEXT                 null,
   MPERSON_SECOND_LNAME TEXT                 null,
   MPERSON_NACIONALITY  TEXT                 null,
   MPERSON_CIVIL_STATS  CHAR(1)              null
      constraint CKC_MPERSON_CIVIL_STA_PATIENT check (MPERSON_CIVIL_STATS is null or (MPERSON_CIVIL_STATS in ('S','C','D','V') and MPERSON_CIVIL_STATS = upper(MPERSON_CIVIL_STATS))),
   MPERSON_SEX          CHAR(1)              null
      constraint CKC_MPERSON_SEX_PATIENT check (MPERSON_SEX is null or (MPERSON_SEX in ('M','F') and MPERSON_SEX = upper(MPERSON_SEX))),
   MPERSON_HOLDER_CARD  TEXT                 null,
   MPERSON_LEGAL_NAME   TEXT                 not null,
   MPERSON_PROFETION    TEXT                 null,
   MPERSON_TYPE_DOC     CHAR(3)              not null
      constraint CKC_MPERSON_TYPE_DOC_PATIENT check (MPERSON_TYPE_DOC in ('V','E','RIF','P')),
   MPERSON_BIRTH_PLACE  DATE                 null,
   constraint PK_PATIENT primary key (MPERSON_ID)
);

/*==============================================================*/
/* Index: PATIENT_PK                                            */
/*==============================================================*/
create unique index PATIENT_PK on PATIENT (
MPERSON_ID
);

/*==============================================================*/
/* Table: QUESTION                                              */
/*==============================================================*/
create table QUESTION (
   QUESTION_ID          SERIAL               not null,
   QUESTION_DESC        TEXT                 not null,
   QUESTION_NUMBER_GRAFFAR INT4                 not null,
   constraint PK_QUESTION primary key (QUESTION_ID)
);

/*==============================================================*/
/* Index: QUESTION_PK                                           */
/*==============================================================*/
create unique index QUESTION_PK on QUESTION (
QUESTION_ID
);

/*==============================================================*/
/* Table: RCENTEREXAM                                           */
/*==============================================================*/
create table RCENTEREXAM (
   RCENTEREXAM_ID       SERIAL               not null,
   RCENTEREXAM_MDCENTER_PERSON_ID INT4                 not null,
   RCENTEREXAM_EXAM_ID  INT4                 not null,
   RCENTEREXAM_AVAILABILITY CHAR(1)              not null
      constraint CKC_RCENTEREXAM_AVAIL_RCENTERE check (RCENTEREXAM_AVAILABILITY in ('S','N') and RCENTEREXAM_AVAILABILITY = upper(RCENTEREXAM_AVAILABILITY)),
   RCENTEREXAM_PRICE    NUMERIC              not null,
   RCENTEREXAM_ACTIVITY_DATE DATE                 not null,
   RCENTEREXAM_USER     TEXT                 null,
   constraint PK_RCENTEREXAM primary key (RCENTEREXAM_ID)
);

/*==============================================================*/
/* Index: RCENTEREXAM_PK                                        */
/*==============================================================*/
create unique index RCENTEREXAM_PK on RCENTEREXAM (
RCENTEREXAM_ID
);

/*==============================================================*/
/* Index: OFRECE_FK                                             */
/*==============================================================*/
create  index OFRECE_FK on RCENTEREXAM (
RCENTEREXAM_MDCENTER_PERSON_ID
);

/*==============================================================*/
/* Index: LO_REALIZAN_FK                                        */
/*==============================================================*/
create  index LO_REALIZAN_FK on RCENTEREXAM (
RCENTEREXAM_EXAM_ID
);

/*==============================================================*/
/* Table: REQUEST                                               */
/*==============================================================*/
create table REQUEST (
   REQUEST_ID           SERIAL               not null,
   REQUEST_PATIENT_PERSON_ID INT4                 not null,
   REQUEST_MDCENTER_ID_CONCERNING INT4                 not null,
   REQUEST_MDCENTER_ID_REFERRED INT4                 not null,
   REQUEST_FAMILY_TYPE  TEXT                 null,
   REQUEST_FAMILY_OTHER TEXT                 null,
   REQUEST_LOBORAL_COND TEXT                 null,
   REQUEST_GRAFFAR_ONE  INT4                 null,
   REGUEST_GRAFFAR_TWO  INT4                 null,
   REQUEST_GRAFFAR_THREE INT4                 null,
   REQUEST_GRAFFAR_FOUR INT4                 null,
   REQUEST_GRAFFAR_PORCTG INT4                 null,
   REQUEST_WEIGHT       INT4                 null,
   REQUEST_INHABITANTS_NUMB INT4                 null,
   REQUEST_AVERAGE_INCOME INT4                 null,
   REQUEST_OBSERVATION  TEXT                 null,
   REQUEST_ORIGIN       TEXT                 null,
   REQUEST_ACTIVITY_DATE DATE                 not null,
   REQUEST_USER         TEXT                 null,
   constraint PK_REQUEST primary key (REQUEST_ID, REQUEST_PATIENT_PERSON_ID, REQUEST_MDCENTER_ID_CONCERNING, REQUEST_MDCENTER_ID_REFERRED)
);

comment on table REQUEST is
'Engloba oedenes y preordenes ';

/*==============================================================*/
/* Index: REQUEST_PK                                            */
/*==============================================================*/
create unique index REQUEST_PK on REQUEST (
REQUEST_ID,
REQUEST_PATIENT_PERSON_ID,
REQUEST_MDCENTER_ID_CONCERNING,
REQUEST_MDCENTER_ID_REFERRED
);

/*==============================================================*/
/* Index: REFERIDO_A_FK                                         */
/*==============================================================*/
create  index REFERIDO_A_FK on REQUEST (
REQUEST_MDCENTER_ID_CONCERNING
);

/*==============================================================*/
/* Index: OBTIENE_FK                                            */
/*==============================================================*/
create  index OBTIENE_FK on REQUEST (
REQUEST_PATIENT_PERSON_ID
);

/*==============================================================*/
/* Index: REFERENTE_FK                                          */
/*==============================================================*/
create  index REFERENTE_FK on REQUEST (
REQUEST_MDCENTER_ID_REFERRED
);

/*==============================================================*/
/* Table: RPERNOT                                               */
/*==============================================================*/
create table RPERNOT (
   RPERNOT_ID           SERIAL               not null,
   RPERNOT_MPERSON_ID   INT4                 null,
   RPERNOT_NOTIFICATION_ID INT4                 null,
   RPERNOT_REVISED      CHAR(1)              null
      constraint CKC_RPERNOT_REVISED_RPERNOT check (RPERNOT_REVISED is null or (RPERNOT_REVISED in ('S','N'))),
   RPERNOT_ACTIVITY_DATE DATE                 not null,
   RPERNOT_USER         TEXT                 null,
   constraint PK_RPERNOT primary key (RPERNOT_ID)
);

/*==============================================================*/
/* Index: RPERNOT_PK                                            */
/*==============================================================*/
create unique index RPERNOT_PK on RPERNOT (
RPERNOT_ID
);

/*==============================================================*/
/* Index: SE_ENVIA_FK                                           */
/*==============================================================*/
create  index SE_ENVIA_FK on RPERNOT (
RPERNOT_NOTIFICATION_ID
);

/*==============================================================*/
/* Index: USUARIO_OPTIENE2_FK                                   */
/*==============================================================*/
create  index USUARIO_OPTIENE2_FK on RPERNOT (
RPERNOT_MPERSON_ID
);

/*==============================================================*/
/* Table: RPORDER                                               */
/*==============================================================*/
create table RPORDER (
   RPORDER_ID           SERIAL               not null,
   RPORDER_REQUEST_ID   INT4                 not null,
   REQUEST_PATIENT_PERSON_ID INT4                 not null,
   REQUEST_MDCENTER_ID_CONCERNING INT4                 not null,
   REQUEST_MDCENTER_ID_REFERRED INT4                 not null,
   RPORDER_STATUS       CHAR(3)              not null
      constraint CKC_RPORDER_STATUS_RPORDER check (RPORDER_STATUS in ('A','R','M')),
   RPORDER_CE_ID        INT4                 not null,
   RPORDER_ORDER_ID     INT4                 null,
   RPORDER_ACTIVITY_DATE DATE                 not null,
   RPORDER_USER         TEXT                 null,
   constraint PK_RPORDER primary key (RPORDER_ID, RPORDER_REQUEST_ID, REQUEST_PATIENT_PERSON_ID, REQUEST_MDCENTER_ID_CONCERNING, REQUEST_MDCENTER_ID_REFERRED)
);

/*==============================================================*/
/* Index: RPORDER_PK                                            */
/*==============================================================*/
create unique index RPORDER_PK on RPORDER (
RPORDER_ID,
RPORDER_REQUEST_ID,
REQUEST_PATIENT_PERSON_ID,
REQUEST_MDCENTER_ID_CONCERNING,
REQUEST_MDCENTER_ID_REFERRED
);

/*==============================================================*/
/* Index: REALIZADO_POR_FK                                      */
/*==============================================================*/
create  index REALIZADO_POR_FK on RPORDER (
RPORDER_REQUEST_ID,
REQUEST_PATIENT_PERSON_ID,
REQUEST_MDCENTER_ID_CONCERNING,
REQUEST_MDCENTER_ID_REFERRED
);

/*==============================================================*/
/* Index: A_RAZON_FK                                            */
/*==============================================================*/
create  index A_RAZON_FK on RPORDER (
RPORDER_ORDER_ID
);

/*==============================================================*/
/* Index: SE_ANADE_FK                                           */
/*==============================================================*/
create  index SE_ANADE_FK on RPORDER (
RPORDER_CE_ID
);

/*==============================================================*/
/* Table: SCALE                                                 */
/*==============================================================*/
create table SCALE (
   SCALE_ID             SERIAL               not null,
   SCALE_MIN            INT4                 not null,
   SCALE_MAX            INT4                 not null,
   SCALE_STRATUM_SOCIAL INT4                 not null,
   SCALE_PORCENTAGE     INT4                 not null,
   constraint PK_SCALE primary key (SCALE_ID)
);

/*==============================================================*/
/* Index: SCALE_PK                                              */
/*==============================================================*/
create unique index SCALE_PK on SCALE (
SCALE_ID
);

/*==============================================================*/
/* Table: SPONSOR                                               */
/*==============================================================*/
create table SPONSOR (
   MPERSON_ID           SERIAL               not null,
   MPERSON_NAME         TEXT                 null,
   MPERSON_LAST_NAME    TEXT                 null,
   MPERSON_BIRTH        DATE                 null,
   MPERSON_HOLDER_CARD  TEXT                 null,
   MPERSON_IDENTF       INT4                 null,
   MPERSON_ACTIVITY_DATE DATE                 null,
   MPERSON_USER         TEXT                 null,
   MPERSON_SECOND_NAME  TEXT                 null,
   MPERSON_SECOND_LNAME TEXT                 null,
   MPERSON_NACIONALITY  TEXT                 null,
   MPERSON_CIVIL_STATS  CHAR(1)              null
      constraint CKC_MPERSON_CIVIL_STA_SPONSOR check (MPERSON_CIVIL_STATS is null or (MPERSON_CIVIL_STATS in ('S','C','D','V') and MPERSON_CIVIL_STATS = upper(MPERSON_CIVIL_STATS))),
   MPERSON_SEX          CHAR(1)              null
      constraint CKC_MPERSON_SEX_SPONSOR check (MPERSON_SEX is null or (MPERSON_SEX in ('M','F') and MPERSON_SEX = upper(MPERSON_SEX))),
   MPERSON_LEGAL_NAME   TEXT                 not null,
   MPERSON_PROFETION    TEXT                 null,
   MPERSON_TYPE_DOC     CHAR(3)              null
      constraint CKC_MPERSON_TYPE_DOC_SPONSOR check (MPERSON_TYPE_DOC is null or (MPERSON_TYPE_DOC in ('V','E','RIF','P'))),
   MPERSON_BIRTH_PLACE  DATE                 null,
   SPONSOR_DATE_INIT    DATE                 not null,
   SPONSOR_DESC         TEXT                 null,
   SPONSOR_LOGO         CHAR(254)            null,
   constraint PK_SPONSOR primary key (MPERSON_ID)
);

/*==============================================================*/
/* Index: SPONSOR_PK                                            */
/*==============================================================*/
create unique index SPONSOR_PK on SPONSOR (
MPERSON_ID
);

/*==============================================================*/
/* Table: STATE                                                 */
/*==============================================================*/
create table STATE (
   STATE_ID             SERIAL               not null,
   STATE_DESC           TEXT                 not null,
   STATE_ACTIVITY_DATE  DATE                 null,
   STATE_USER           TEXT                 null,
   constraint PK_STATE primary key (STATE_ID)
);

/*==============================================================*/
/* Index: STATE_PK                                              */
/*==============================================================*/
create unique index STATE_PK on STATE (
STATE_ID
);

/*==============================================================*/
/* Table: "USER"                                                */
/*==============================================================*/
create table "USER" (
   MPERSON_ID           SERIAL               not null,
   MPERSON_NAME         TEXT                 null,
   MPERSON_LAST_NAME    TEXT                 null,
   MPERSON_BIRTH        DATE                 not null,
   MPERSON_IDENTF       INT4                 not null,
   MPERSON_ACTIVITY_DATE DATE                 not null,
   MPERSON_USER         TEXT                 null,
   MPERSON_SECOND_NAME  TEXT                 null,
   MPERSON_SECOND_LNAME TEXT                 null,
   MPERSON_NACIONALITY  TEXT                 null,
   MPERSON_CIVIL_STATS  CHAR(1)              null
      constraint CKC_MPERSON_CIVIL_STA_USER check (MPERSON_CIVIL_STATS is null or (MPERSON_CIVIL_STATS in ('S','C','D','V') and MPERSON_CIVIL_STATS = upper(MPERSON_CIVIL_STATS))),
   MPERSON_SEX          CHAR(1)              null
      constraint CKC_MPERSON_SEX_USER check (MPERSON_SEX is null or (MPERSON_SEX in ('M','F') and MPERSON_SEX = upper(MPERSON_SEX))),
   MPERSON_HOLDER_CARD  TEXT                 null,
   MPERSON_LEGAL_NAME   TEXT                 not null,
   MPERSON_PROFETION    TEXT                 null,
   MPERSON_TYPE_DOC     CHAR(3)              not null
      constraint CKC_MPERSON_TYPE_DOC_USER check (MPERSON_TYPE_DOC in ('V','E','RIF','P')),
   MPERSON_BIRTH_PLACE  DATE                 null,
   USER_PASS            TEXT                 not null,
   USER_PSEUDONYM       TEXT                 not null,
   USER_PRIVILEGE_LEVL  CHAR(5)              not null
      constraint CKC_USER_PRIVILEGE_LE_USER check (USER_PRIVILEGE_LEVL in ('ADMIN','MD') and USER_PRIVILEGE_LEVL = upper(USER_PRIVILEGE_LEVL)),
   USER_COMPANY         TEXT                 null,
   constraint PK_USER primary key (MPERSON_ID)
);

/*==============================================================*/
/* Index: USER_PK                                               */
/*==============================================================*/
create unique index USER_PK on "USER" (
MPERSON_ID
);

alter table ANSWER
   add constraint FK_ANSWER_RESPONDE_QUESTION foreign key (ANSWER_QUESTION_ID)
      references QUESTION (QUESTION_ID)
      on delete restrict on update restrict;

alter table CNTBTION
   add constraint FK_CNTBTION_REALIZA_SPONSOR foreign key (CNTBTION_SPONSOR_ID)
      references SPONSOR (MPERSON_ID)
      on delete restrict on update restrict;

alter table CONFIG
   add constraint FK_CONFIG_SIGUE_USER foreign key (CONFIG_MPERSON_ID)
      references "USER" (MPERSON_ID)
      on delete restrict on update restrict;

alter table CONTACT
   add constraint FK_CONTACT_POSEE_PATIENT foreign key (CONTACT_MPERSON_ID)
      references PATIENT (MPERSON_ID)
      on delete restrict on update restrict;

alter table CONTACT
   add constraint FK_CONTACT_POSEE_1_USER foreign key (CONTACT_USER_MPERSON_ID)
      references "USER" (MPERSON_ID)
      on delete restrict on update restrict;

alter table CONTACT
   add constraint FK_CONTACT_POSEE_2_MDCENTER foreign key (CONTACT_MDC_MPERSON_ID)
      references MDCENTER (MPERSON_ID)
      on delete restrict on update restrict;

alter table DIRECTION
   add constraint FK_DIRECTIO_CONTIENE_PARISH foreign key (DIRECTION_PARISH_ID, DIRECTION_PAR_MUN_ID, DIRECTION_PAR_MUN_ST_ID)
      references PARISH (PARISH_ID, PARISH_MUNICIPALT_ID, PARISH_MUNICIPLAT_STATE_ID)
      on delete restrict on update restrict;

alter table DIRECTION
   add constraint FK_DIRECTIO_SE_ENCUEN_PATIENT foreign key (DIRECTION_MPERSON_ID)
      references PATIENT (MPERSON_ID)
      on delete restrict on update restrict;

alter table DIRECTION
   add constraint FK_DIRECTIO_SE_ENCUEN_USER foreign key (DIRECTION_USE_MPERSON_ID)
      references "USER" (MPERSON_ID)
      on delete restrict on update restrict;

alter table DIRECTION
   add constraint FK_DIRECTIO_SE_ENCUEN_MDCENTER foreign key (DIRECTION_MDC_MPERSON_ID)
      references MDCENTER (MPERSON_ID)
      on delete restrict on update restrict;

alter table DISIEASE
   add constraint FK_DISIEASE_ES_CONSEC_EXAM foreign key (DISIEASE_EXAM_ID)
      references EXAM (EXAM_ID)
      on delete restrict on update restrict;

alter table MUNICIPALT
   add constraint FK_MUNICIPA_FORMADO_STATE foreign key (MUNICIPLAT_STATE_ID)
      references STATE (STATE_ID)
      on delete restrict on update restrict;

alter table NOTIFICATION
   add constraint FK_NOTIFICA_GENERA_RPORDER foreign key (NOTIFICATION_RPORDER_ID, NOTIFICATION_RPORDER_REQUEST_ID, NOTIFICATION_REQUEST_PATIENT_ID, NOTIFINCERNING, NOTID_REFERRED)
      references RPORDER (RPORDER_ID, RPORDER_REQUEST_ID, REQUEST_PATIENT_PERSON_ID, REQUEST_MDCENTER_ID_CONCERNING, REQUEST_MDCENTER_ID_REFERRED)
      on delete restrict on update restrict;

alter table NOTIFICATION
   add constraint FK_NOTIFICA_GENERA__ORDER foreign key (NOTIFICATION_ORDER_ID)
      references "ORDER" (ORDER_ID)
      on delete restrict on update restrict;

alter table "ORDER"
   add constraint FK_ORDER_SE_APORTA_SPONSOR foreign key (ORDER_SPONSOR_PERSON_ID)
      references SPONSOR (MPERSON_ID)
      on delete restrict on update restrict;

alter table PARISH
   add constraint FK_PARISH_FORMADO_P_MUNICIPA foreign key (PARISH_MUNICIPALT_ID, PARISH_MUNICIPLAT_STATE_ID)
      references MUNICIPALT (MUNICIPALT_ID, MUNICIPLAT_STATE_ID)
      on delete restrict on update restrict;

alter table RCENTEREXAM
   add constraint FK_RCENTERE_LO_REALIZ_EXAM foreign key (RCENTEREXAM_EXAM_ID)
      references EXAM (EXAM_ID)
      on delete restrict on update restrict;

alter table RCENTEREXAM
   add constraint FK_RCENTERE_OFRECE_MDCENTER foreign key (RCENTEREXAM_MDCENTER_PERSON_ID)
      references MDCENTER (MPERSON_ID)
      on delete restrict on update restrict;

alter table REQUEST
   add constraint FK_REQUEST_OBTIENE_PATIENT foreign key (REQUEST_PATIENT_PERSON_ID)
      references PATIENT (MPERSON_ID)
      on delete restrict on update restrict;

alter table REQUEST
   add constraint FK_REQUEST_REFERENTE_MDCENTER foreign key (REQUEST_MDCENTER_ID_REFERRED)
      references MDCENTER (MPERSON_ID)
      on delete restrict on update restrict;

alter table REQUEST
   add constraint FK_REQUEST_REFERIDO__MDCENTER foreign key (REQUEST_MDCENTER_ID_CONCERNING)
      references MDCENTER (MPERSON_ID)
      on delete restrict on update restrict;

alter table RPERNOT
   add constraint FK_RPERNOT_SE_ENVIA_NOTIFICA foreign key (RPERNOT_NOTIFICATION_ID)
      references NOTIFICATION (NOTIFICATION_ID)
      on delete restrict on update restrict;

alter table RPERNOT
   add constraint FK_RPERNOT_USUARIO_O_SPONSOR foreign key (RPERNOT_MPERSON_ID)
      references SPONSOR (MPERSON_ID)
      on delete restrict on update restrict;

alter table RPERNOT
   add constraint FK_RPERNOT_USUARIO_O_PATIENT foreign key (RPERNOT_MPERSON_ID)
      references PATIENT (MPERSON_ID)
      on delete restrict on update restrict;

alter table RPERNOT
   add constraint FK_RPERNOT_USUARIO_O_USER foreign key (RPERNOT_MPERSON_ID)
      references "USER" (MPERSON_ID)
      on delete restrict on update restrict;

alter table RPERNOT
   add constraint FK_RPERNOT_USUARIO_O_MDCENTER foreign key (RPERNOT_MPERSON_ID)
      references MDCENTER (MPERSON_ID)
      on delete restrict on update restrict;

alter table RPORDER
   add constraint FK_RPORDER_A_RAZON_ORDER foreign key (RPORDER_ORDER_ID)
      references "ORDER" (ORDER_ID)
      on delete restrict on update restrict;

alter table RPORDER
   add constraint FK_RPORDER_REALIZADO_REQUEST foreign key (RPORDER_REQUEST_ID, REQUEST_PATIENT_PERSON_ID, REQUEST_MDCENTER_ID_CONCERNING, REQUEST_MDCENTER_ID_REFERRED)
      references REQUEST (REQUEST_ID, REQUEST_PATIENT_PERSON_ID, REQUEST_MDCENTER_ID_CONCERNING, REQUEST_MDCENTER_ID_REFERRED)
      on delete restrict on update restrict;

alter table RPORDER
   add constraint FK_RPORDER_SE_ANADE_RCENTERE foreign key (RPORDER_CE_ID)
      references RCENTEREXAM (RCENTEREXAM_ID)
      on delete restrict on update restrict;

