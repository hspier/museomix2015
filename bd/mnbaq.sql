use mnbaq;
drop table MNBAQ_PROFILE_EVENT;
drop table MNBAQ_EVENT;
drop table MNBAQ_WORK_EMOTION;
drop table MNBAQ_WORK;
drop table MNBAQ_PROFILE_FEEDBACK_EMOTION;
drop table MNBAQ_PROFILE_FEEDBACK;
drop table MNBAQ_MUSEUM_ROOM;
drop table MNBAQ_EMOTION;
drop table MNBAQ_CATEGORY;
drop table MNBAQ_PROFILE;
select * From mnbaq_profile_feedback;

delete from mnbaq_profile_event where prf_id in (66);
delete from mnbaq_profile where prf_id in (66);
delete from mnbaq_profile_feedback;

create table MNBAQ_CATEGORY (
	CAT_ID int NOT NULL,
    CAT_TYPE int NOT NULL,
    CAT_VALUE varchar(255),
    
    PRIMARY KEY (CAT_ID)
);

create table MNBAQ_AVATAR (
	AVA_ID int NOT NULL,
    AVA_IMG varchar(255),
    
    PRIMARY KEY (AVA_ID)
);

create table MNBAQ_PROFILE (
	PRF_ID int NOT NULL AUTO_INCREMENT,
    PRF_FIRSTNAME  varchar(255),
    PRF_LASTNAME varchar(255),
    PRF_EMAIL varchar(255),    
    PRF_ADDRESS varchar(1000),
    PRF_CITY varchar(255),
    PRF_PROVINCE varchar(255),
    PRF_COUNTRY varchar(255),
    PRF_POSTAL_CODE varchar(6),
    PRF_TELEPHONE varchar(25),    
    CAT_ID int,
    PRF_AUTH_ID blob,
    
    PRIMARY KEY (PRF_ID),
    FOREIGN KEY (CAT_ID) REFERENCES MNBAQ_CATEGORY(CAT_ID)
);

create table MNBAQ_PROFILE_EVENT (
	EVT_ID int NOT NULL,
    PRF_ID int NOT NULL,
    PRF_EVENT_DATE timestamp NOT NULL,
    
    FOREIGN KEY (EVT_ID) REFERENCES MNBAQ_EVENT(EVT_ID),
    FOREIGN KEY (PRF_ID) REFERENCES MNBAQ_PROFILE(PRF_ID)
);

create table MNBAQ_EVENT (
	EVT_ID int NOT NULL,
    EVT_NAME varchar(255),
    
    PRIMARY KEY (EVT_ID)
);

create table MNBAQ_EMOTION (
	EMO_ID int NOT NULL,
    EMO_VALUE varchar(255),
    EMO_IMG varchar(1000),
    
    PRIMARY KEY (EMO_ID)
);

create table MNBAQ_PROFILE_FEEDBACK (
	PRF_FEEDBACK_ID int NOT NULL AUTO_INCREMENT,
    PRF_COMMENTS text,
    PRF_AUDIO blob,
    PRF_ID int NOT NULL,
    WRK_ID int NOT NULL, 
    
    PRIMARY KEY (PRF_FEEDBACK_ID),
    
    FOREIGN KEY (PRF_ID) REFERENCES MNBAQ_PROFILE(PRF_ID)
);

create table MNBAQ_PROFILE_FEEDBACK_EMOTION (
	PRF_FEEDBACK_EMOTION_ID int NOT NULL AUTO_INCREMENT,
    PRF_FEEDBACK_ID int NOT NULL,
    EMO_ID int NOT NULL,
    
    PRIMARY KEY (PRF_FEEDBACK_EMOTION_ID),
    FOREIGN KEY (PRF_FEEDBACK_ID) REFERENCES MNBAQ_PROFILE_FEEDBACK(PRF_FEEDBACK_ID),
    FOREIGN KEY (EMO_ID) REFERENCES MNBAQ_EMOTION(EMO_ID)
);

create table MNBAQ_MUSEUM_ROOM (
	MUS_ROOM_ID int NOT NULL,    
    MUS_ROOM_NAME varchar(255),    
    MUS_ROOM_WING varchar(255),

	PRIMARY KEY (MUS_ROOM_ID)
);

create table MNBAQ_WORK (
	WRK_ID int NOT NULL,
    WRK_AUTHOR varchar(255),
    WRK_NAME varchar(255),
    WRK_IMG varchar(255),
    MUS_ROOM_ID int,    
    
    PRIMARY KEY (WRK_ID),
    FOREIGN KEY (MUS_ROOM_ID) REFERENCES MNBAQ_MUSEUM_ROOM(MUS_ROOM_ID)
);

create table MNBAQ_WORK_EMOTION (
	WRK_ID int NOT NULL,
    EMO_ID int NOT NULL,
    
    FOREIGN KEY (WRK_ID) REFERENCES MNBAQ_WORK(WRK_ID),
    FOREIGN KEY (EMO_ID) REFERENCES MNBAQ_EMOTION(EMO_ID)
);

insert into MNBAQ_EVENT(EVT_ID, EVT_NAME) values (1, "Connexion");
insert into MNBAQ_EVENT(EVT_ID, EVT_NAME) values (2, "Déconnexion");

-- 0-11, 12-17, 18-34, 35-54, 55-69, 70-X
insert into MNBAQ_CATEGORY(CAT_ID, CAT_TYPE, CAT_VALUE) values (1, 1, '0 à 11');
insert into MNBAQ_CATEGORY(CAT_ID, CAT_TYPE, CAT_VALUE) values (2, 1, '12 à 17');
insert into MNBAQ_CATEGORY(CAT_ID, CAT_TYPE, CAT_VALUE) values (3, 1, '18 à 34');
insert into MNBAQ_CATEGORY(CAT_ID, CAT_TYPE, CAT_VALUE) values (4, 1, '35 à 54');
insert into MNBAQ_CATEGORY(CAT_ID, CAT_TYPE, CAT_VALUE) values (5, 1, '55 à 69');
insert into MNBAQ_CATEGORY(CAT_ID, CAT_TYPE, CAT_VALUE) values (6, 1, '70 et plus');

insert into MNBAQ_EMOTION(EMO_ID, EMO_VALUE, EMO_IMG) values (1, 'Passion', 'img/emotion/Passion.svg');
insert into MNBAQ_EMOTION(EMO_ID, EMO_VALUE, EMO_IMG) values (2, 'Souvenir', 'img/emotion/Souvenir.svg');
insert into MNBAQ_EMOTION(EMO_ID, EMO_VALUE, EMO_IMG) values (3, 'Violent', 'img/emotion/Violent.svg');
insert into MNBAQ_EMOTION(EMO_ID, EMO_VALUE, EMO_IMG) values (4, 'Festif', 'img/emotion/Festif.svg');
insert into MNBAQ_EMOTION(EMO_ID, EMO_VALUE, EMO_IMG) values (5, 'Malaise', 'img/emotion/Malaise.svg');
insert into MNBAQ_EMOTION(EMO_ID, EMO_VALUE, EMO_IMG) values (6, 'Peur', 'img/emotion/Peur.svg');
insert into MNBAQ_EMOTION(EMO_ID, EMO_VALUE, EMO_IMG) values (7, 'Mystère', 'img/emotion/Mystere.svg');
insert into MNBAQ_EMOTION(EMO_ID, EMO_VALUE, EMO_IMG) values (8, 'Calme', 'img/emotion/Calme.svg');
insert into MNBAQ_EMOTION(EMO_ID, EMO_VALUE, EMO_IMG) values (9, 'Dramatique', 'img/emotion/Dramatique.svg');
insert into MNBAQ_EMOTION(EMO_ID, EMO_VALUE, EMO_IMG) values (10, 'Ennuyant', 'img/emotion/Ennuyant.svg');
insert into MNBAQ_EMOTION(EMO_ID, EMO_VALUE, EMO_IMG) values (11, 'Envahi', 'img/emotion/Envahi.svg');
insert into MNBAQ_EMOTION(EMO_ID, EMO_VALUE, EMO_IMG) values (12, 'Nostalgique', 'img/emotion/Nostalgique.svg');
insert into MNBAQ_EMOTION(EMO_ID, EMO_VALUE, EMO_IMG) values (13, 'Tendresse', 'img/emotion/Tendresse.svg');
insert into MNBAQ_EMOTION(EMO_ID, EMO_VALUE, EMO_IMG) values (14, 'Traditionnel', 'img/emotion/Traditionnel.svg');
insert into MNBAQ_EMOTION(EMO_ID, EMO_VALUE, EMO_IMG) values (15, 'Inégalité', 'img/emotion/Inegalite.svg');
insert into MNBAQ_EMOTION(EMO_ID, EMO_VALUE, EMO_IMG) values (16, 'Vieux-Jeu', 'img/emotion/Vieux-Jeu.svg');

insert into MNBAQ_MUSEUM_ROOM(MUS_ROOM_ID, MUS_ROOM_NAME, MUS_ROOM_WING) values (1, 'Salle 5', 'Pavillon Gérard-Morisset');
insert into MNBAQ_MUSEUM_ROOM(MUS_ROOM_ID, MUS_ROOM_NAME, MUS_ROOM_WING) values (2, 'Salle 6', 'Pavillon Gérard-Morisset');

insert into MNBAQ_WORK(WRK_ID, WRK_AUTHOR, WRK_NAME, WRK_IMG, MUS_ROOM_ID) values (1, 'Marc-Aurèle Fortin', 'Études d\'ormes, quartierville', 'img/work/arbres.png', 1);
insert into MNBAQ_WORK(WRK_ID, WRK_AUTHOR, WRK_NAME, WRK_IMG, MUS_ROOM_ID) values (2, 'Joseph Charles Franchère', 'Sport canadien', 'img/work/sport.png', 1);
insert into MNBAQ_WORK(WRK_ID, WRK_AUTHOR, WRK_NAME, WRK_IMG, MUS_ROOM_ID) values (3, 'Jean McEwen', 'Le Drapeau inconnu', 'img/work/drapeau.png', 2);
insert into MNBAQ_WORK(WRK_ID, WRK_AUTHOR, WRK_NAME, WRK_IMG, MUS_ROOM_ID) values (4, 'Jean Paul Lemieux', 'Les Masques', 'img/work/masques.png', 2);

-- Ormes
-- plate, envahissant, paisible, nostalgie, souvenir
insert into MNBAQ_WORK_EMOTION(WRK_ID, EMO_ID) values (1, 10);
insert into MNBAQ_WORK_EMOTION(WRK_ID, EMO_ID) values (1, 11);
insert into MNBAQ_WORK_EMOTION(WRK_ID, EMO_ID) values (1, 8);
insert into MNBAQ_WORK_EMOTION(WRK_ID, EMO_ID) values (1, 12);
insert into MNBAQ_WORK_EMOTION(WRK_ID, EMO_ID) values (1, 2);
-- Sport
-- tendresse, tradition, inégalité, quétaine, souvenir
insert into MNBAQ_WORK_EMOTION(WRK_ID, EMO_ID) values (2, 13);
insert into MNBAQ_WORK_EMOTION(WRK_ID, EMO_ID) values (2, 14);
insert into MNBAQ_WORK_EMOTION(WRK_ID, EMO_ID) values (2, 15);
insert into MNBAQ_WORK_EMOTION(WRK_ID, EMO_ID) values (2, 16);
insert into MNBAQ_WORK_EMOTION(WRK_ID, EMO_ID) values (2, 2);
-- Drapeau
-- passion, souvenir, violence, fun, malaise
insert into MNBAQ_WORK_EMOTION(WRK_ID, EMO_ID) values (3, 1);
insert into MNBAQ_WORK_EMOTION(WRK_ID, EMO_ID) values (3, 2);
insert into MNBAQ_WORK_EMOTION(WRK_ID, EMO_ID) values (3, 3);
insert into MNBAQ_WORK_EMOTION(WRK_ID, EMO_ID) values (3, 4);
insert into MNBAQ_WORK_EMOTION(WRK_ID, EMO_ID) values (3, 5);
-- Masques
-- peur, mystère, calme, souvenir, dramatique
insert into MNBAQ_WORK_EMOTION(WRK_ID, EMO_ID) values (4, 6);
insert into MNBAQ_WORK_EMOTION(WRK_ID, EMO_ID) values (4, 7);
insert into MNBAQ_WORK_EMOTION(WRK_ID, EMO_ID) values (4, 8);
insert into MNBAQ_WORK_EMOTION(WRK_ID, EMO_ID) values (4, 2);
insert into MNBAQ_WORK_EMOTION(WRK_ID, EMO_ID) values (4, 9);