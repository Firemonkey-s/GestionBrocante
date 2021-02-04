CREATE TABLE Role(
        RoleId Int NOT NULL ,
        Titre  Varchar (50) NOT NULL
	,CONSTRAINT Role_PK PRIMARY KEY (RoleId)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Personne
#------------------------------------------------------------

CREATE TABLE Personne(
        PersonneId Int NOT NULL ,
        Nom        Varchar (50) NOT NULL ,
        Prenom     Varchar (50) NOT NULL ,
        Telephone  Varchar (10) NOT NULL ,
        Email      Varchar (50) NOT NULL ,
        RoleId     Int NOT NULL
	,CONSTRAINT Personne_PK PRIMARY KEY (PersonneId)

	,CONSTRAINT Personne_Role_FK FOREIGN KEY (RoleId) REFERENCES Role(RoleId)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Brocanteur
#------------------------------------------------------------

CREATE TABLE Brocanteur(
        BrocanteurId            Int NOT NULL ,
        CarteIdentite           Varchar (50) NOT NULL ,
        Rue                     Varchar (50) NOT NULL ,
        CP                      Varchar (50) NOT NULL ,
        Ville                   Varchar (50) NOT NULL ,
        ReservationEmplacement  Varchar (50) NOT NULL ,
        MetreLineaire           Int NOT NULL ,
        RCN_                    Varchar (50) NOT NULL ,
        PersonneId              Int NOT NULL
	,CONSTRAINT Brocanteur_PK PRIMARY KEY (BrocanteurId)

	,CONSTRAINT Brocanteur_Personne_FK FOREIGN KEY (PersonneId) REFERENCES Personne(PersonneId)
	,CONSTRAINT Brocanteur_Personne_AK UNIQUE (PersonneId)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Reservation
#------------------------------------------------------------

CREATE TABLE Reservation(
        ReservationId Int NOT NULL ,
        Date          Date NOT NULL ,
        nombrePlace   Int NOT NULL ,
        BrocanteurId  Int NOT NULL
	,CONSTRAINT Reservation_PK PRIMARY KEY (ReservationId)

	,CONSTRAINT Reservation_Brocanteur_FK FOREIGN KEY (BrocanteurId) REFERENCES Brocanteur(BrocanteurId)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Payement
#------------------------------------------------------------

CREATE TABLE Payement(
        PayementId    Int NOT NULL ,
        Montant       Float NOT NULL ,
        Date          Date NOT NULL ,
        ModePayement  Varchar (50) NOT NULL ,
        ReservationId Int NOT NULL
	,CONSTRAINT Payement_PK PRIMARY KEY (PayementId)

	,CONSTRAINT Payement_Reservation_FK FOREIGN KEY (ReservationId) REFERENCES Reservation(ReservationId)
	,CONSTRAINT Payement_Reservation_AK UNIQUE (ReservationId)
)ENGINE=InnoDB;

t MYSQLq ~ hsq ~ J   w   sr IhmMLD2.MLDEntite2����u�� KD 	AttEspaceZ 
SQLGenererZ afficherCntCle2Z afficherCntCleEtrangere2Z afficherCntIndex2Z afficherCntUnique2Z afficherCodeAttribut2Z afficherCodeEntite2Z arrondirZ attMajusculeZ augmentationPrefix2I decalComposeF 	epaisseurI 	hAttributZ mldGenerer2Z mldHeritageGenerer2Z mutexZ ombreZ prkImageZ 
prkvisibleZ variableI widthMaxI widthMinI 	xAttributI xCleI xTypeI 	yAttributI yEnteteD zoomL aligneq ~ L aligneTitreq ~ L alignerAttributq ~ L alignerTypeq ~ L attributSelect2q ~ kL augmentation2q ~ L clAttributSelectq ~ lL clCadre2q ~ lL clCadreTitre2q ~ lL clFillSelAttributq ~ lL clFond2q ~ lL clFondTitre2q ~ lL clLienActiverq ~ lL clOmbreq ~ lL clPrkq ~ lL 
clSelectedq ~ lL clStrokeSelAttributq ~ lL clText2q ~ lL clTextTaille2q ~ lL clTextTailleDec2q ~ lL clTextTitre2q ~ lL clTextType2q ~ lL codeq ~ L codeAttribut2q ~ L codeEntete2q ~ L codeFin2q ~ L codeMethodeéq ~ L commentaireq ~ L 	entiteReft LIhmMCD/IhmEntiteRelation;L fontq ~ mL fontAttributq ~ mL 
fontNormalq ~ mL fontNormalItalicq ~ mL 	fontTitreq ~ mL fontTypeq ~ mL 
historiqueq ~ L listeAttributsq ~ L listeCNTAlternativeKeyq ~ L listeCNTForeingKeyq ~ L 	listeCle2q ~ L listeCleEtrangere2q ~ L listeIndex2q ~ L listeUnique2q ~ L nomq ~ L origine2q ~ L 
typeEntiteq ~ xq ~ p    q    �sq ~ s  �  hsq ~ s  <  0?�ff`               ?�                         p   -    ?�      q ~ fq ~ fpppq ~ fpq ~ �q ~ �sq ~ �    Z���pppq ~ �q ~ �q ~ �q ~ �q ~ �q ~ �sq ~ �    �  �pppq ~ �q ~ �q ~ �q ~ �q ~ �q ~�q ~ fq ~ fq ~ fq ~ fq ~epsq ~ �   A@        pt Arialxpsq ~ �   A@         pq ~�xsq ~ �   A@        pq ~�xq ~�psq ~ J   w   sq ~ Lq ~q ~ ft 
04/02/2021q ~ fq ~ gq ~ fq ~ fq ~ fq ~ fq ~ fq ~ hxsq ~ J   w   sq ~ |�������� q ~ fpq ~ ft 
Pk_Primaryq ~ f            q ~ fq ~ ft 0000q ~ fq ~�q ~�q ~�q ~�q ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fsq ~ J   w   sq ~ Lq ~q ~ ft 
04/02/2021q ~ fq ~ gq ~ fq ~ fq ~ fq ~ fq ~ fq ~ hxq ~ fq ~ fsq ~ J   w   sq ~ |�������� q ~ q ~dq ~ �t RoleIdq ~ �            q ~ q ~ fq ~iq ~ q ~jq ~kq ~lq ~mt ROLEIDq ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~qq ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ xq ~ fq ~ fq ~ fsq ~ |�������� q ~ fpq ~ ft 	Attributsq ~ f            q ~ fq ~ fq ~�q ~ fq ~�q ~�q ~�q ~�q ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fsq ~ J   w   sq ~ Lq ~q ~ ft 
04/02/2021q ~ fq ~ gq ~ fq ~ fq ~ fq ~ fq ~ fq ~ hxq ~ fq ~ fsq ~ J   w   sq ~ |����   2 q ~ q ~dq ~ t Titreq ~ �            q ~ q ~ fq ~uq ~ q ~vq ~wq ~xq ~yt TITREq ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~}q ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ xq ~ fq ~ fq ~ fxsq ~ J    w    xsq ~ J    w    xsq ~ J    w    xsq ~ J    w    xsq ~ J    w    xsq ~ J    w    xq ~t RELATIONt ENTITEsq ~�    �    �sq ~ s  �  :sq ~ s     �?�ff`               ?�                         |   -    ?�      q ~ fq ~ fpppq ~ fpq ~ �q ~ �sq ~ �    Z���pppq ~ �q ~ �q ~ �q ~ �q ~ �q ~ �q ~�q ~ �q ~ �q ~ �q ~ �q ~ �q ~ �q ~ fq ~ fq ~ fq ~ fq ~ zpq ~�pq ~�q ~�q ~�psq ~ J   w   sq ~ Lq ~q ~ ft 
04/02/2021q ~ fq ~ gq ~ fq ~ fq ~ fq ~ fq ~ fq ~ hxsq ~ J   w   sq ~ |�������� q ~ fpq ~ fq ~�q ~ f            q ~ fq ~ fq ~�q ~ fq ~�q ~�q ~�q ~�q ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fsq ~ J   w   sq ~ Lq ~q ~ ft 
04/02/2021q ~ fq ~ gq ~ fq ~ fq ~ fq ~ fq ~ fq ~ hxq ~ fq ~ fsq ~ J   w   sq ~ |�������� q ~ q ~ yq ~ �t 
PersonneIdq ~ �            q ~ q ~ fq ~ �q ~ q ~ �q ~ �q ~ �q ~ �t 
PERSONNEIDq ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~ �q ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ xq ~ fq ~ fq ~ fsq ~ |�������� q ~ fpq ~ fq ~ q ~ f            q ~ fq ~ fq ~�q ~ fq ~�q ~�q ~�q ~�q ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fsq ~ J   w   sq ~ Lq ~q ~ ft 
04/02/2021q ~ fq ~ gq ~ fq ~ fq ~ fq ~ fq ~ fq ~ hxq ~ fq ~ fsq ~ J   w   sq ~ |����   2 q ~ q ~ yq ~ t Nomq ~ �            q ~ q ~ fq ~ �q ~ q ~ �q ~ �q ~ �q ~ �t NOMq ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~ �q ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ sq ~ |����   2 q ~ q ~ yq ~ t Prenomq ~ �            q ~ q ~ fq ~ �q ~ q ~ �q ~ �q ~ �q ~ �t PRENOMq ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~ �q ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ sq ~ |����   
 q ~ q ~ yq ~ t 	Telephoneq ~ �            q ~ q ~ fq ~ �q ~ q ~ �q ~ �q ~ �q ~ �t 	TELEPHONEq ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~ �q ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ sq ~ |����   2 q ~ q ~ yq ~ t Emailq ~ �            q ~ q ~ fq ~ �q ~ q ~ �q ~ �q ~ �q ~ �t EMAILq ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~ �q ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ xq ~ fq ~ fq ~ fsq ~ |�������� q ~ fpq ~ ft 
Fk_Foreignq ~ f            q ~ fq ~ fq ~�q ~ fq ~�q ~�q ~�q ~�q ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fsq ~ J   w   sq ~ Lq ~q ~ ft 
04/02/2021q ~ fq ~ gq ~ fq ~ fq ~ fq ~ fq ~ fq ~ hxq ~ fq ~ fsq ~ J   w   sq ~ |�������� q ~ q ~dt FOREING KEYt RoleIdq ~ �            q ~ t Role¤¤Agirq ~iq ~ q ~jq ~kq ~lq ~mt ROLEIDq ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~qq ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ xq ~ fq ~ fq ~ fxsq ~ J    w    xsq ~ J   w   sr Contrainte.TableReference폟�.�� Z 
SQLGenererZ augmentationPrefixL augmentationq ~ L clFondq ~ L clFond1q ~ L clTextq ~ L clText1q ~ L entitet LIhmMLD2/MLDEntite2;L 	entiteRefq ~TL 
historiqueq ~ L listeAttributRefq ~ L nomq ~ L origineq ~ L typeq ~ xp  q ~ fq ~ ft  q ~ fq ~ fq ~q ~�sq ~ J    w    xsq ~ J   w   sr Contrainte.AttributReference�ImYg|l L attributq ~ kL attributRefq ~ kxpq ~Iq ~�xt Personne_Roleq ~q ~Jxsq ~ J    w    xsq ~ J    w    xsq ~ J    w    xsq ~ J    w    xq ~ �q ~q ~sq ~�    �   ,sq ~ s   �  Usq ~ s     �?�ff`               ?�                         �   -    ?�      q ~ fq ~ fpppq ~ fpq ~ �q ~ �sq ~ �    Z���pppq ~ �q ~ �q ~ �q ~ �q ~ �q ~ �q ~�q ~ �q ~ �q ~ �q ~ �q ~ �q ~Mq ~ fq ~ fq ~ fq ~ fq ~ �pq ~�pq ~�q ~�q ~�psq ~ J   w   sq ~ Lq ~q ~ ft 
04/02/2021q ~ fq ~ gq ~ fq ~ fq ~ fq ~ fq ~ fq ~ hxsq ~ J   w   sq ~ |�������� q ~ fpq ~ fq ~�q ~ f            q ~ fq ~ fq ~�q ~ fq ~�q ~�q ~�q ~�q ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fsq ~ J   w   sq ~ Lq ~q ~ ft 
04/02/2021q ~ fq ~ gq ~ fq ~ fq ~ fq ~ fq ~ fq ~ hxq ~ fq ~ fsq ~ J   w   sq ~ |�������� q ~ q ~ �q ~ �t BrocanteurIdq ~ �            q ~ q ~ fq ~ �q ~ q ~ �q ~ �q ~ �q ~ �t BROCANTEURIDq ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~ �q ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ xq ~ fq ~ fq ~ fsq ~ |�������� q ~ fpq ~ fq ~ q ~ f            q ~ fq ~ fq ~�q ~ fq ~�q ~�q ~�q ~�q ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fsq ~ J   w   sq ~ Lq ~q ~ ft 
04/02/2021q ~ fq ~ gq ~ fq ~ fq ~ fq ~ fq ~ fq ~ hxq ~ fq ~ fsq ~ J   w   sq ~ |����   2 q ~ q ~ �q ~ t CarteIdentiteq ~ �            q ~ q ~ fq ~ �q ~ q ~ �q ~ �q ~ q ~t CARTEIDENTITEq ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~q ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ sq ~ |����   2 q ~q ~ �q ~ ft Rue q ~
            q ~ fq ~ fq ~q ~ fq ~q ~q ~q ~t RUEq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fsq ~ J   w   sq ~ Lq ~q ~ fq ~q ~ fq ~ gq ~ fq ~ fq ~ fq ~ fq ~ fq ~ hxq ~ fq ~ fsq ~ J    w    xq ~ fq ~ fq ~ fsq ~ |����   2 q ~ q ~ �q ~ t CPq ~ �            q ~ q ~ fq ~q ~ q ~q ~q ~q ~t CPq ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~q ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ sq ~ |����   2 q ~ q ~ �q ~ t Villeq ~ �            q ~ q ~ fq ~#q ~ q ~$q ~%q ~&q ~'t VILLEq ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~+q ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ sq ~ |����   2 q ~ q ~ �q ~ t ReservationEmplacement q ~ �            q ~ q ~ fq ~/q ~ q ~0q ~1q ~2q ~3t RESERVATIONEMPLACEMENTq ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~7q ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ sq ~ |����   
 q ~ q ~ �q ~ t MetreLineaireq ~ �            q ~ q ~ fq ~;q ~ q ~;q ~;q ~;q ~;t METRELINEAIREq ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~?q ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ sq ~ |����   2 q ~ q ~ �q ~ t RCN°q ~ �            q ~ q ~ fq ~Cq ~ q ~Dq ~Eq ~Fq ~Gt RCN°q ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~Jq ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ xq ~ fq ~ fq ~ fsq ~ |�������� q ~ fpq ~ fq ~Dq ~ f            q ~ fq ~ fq ~�q ~ fq ~�q ~�q ~�q ~�q ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fsq ~ J   w   sq ~ Lq ~q ~ ft 
04/02/2021q ~ fq ~ gq ~ fq ~ fq ~ fq ~ fq ~ fq ~ hxq ~ fq ~ fsq ~ J   w   sq ~ |�������� q ~ q ~ yq ~Jt 
PersonneIdq ~ �            q ~ t Personne¤¤Estq ~ �q ~ q ~ �q ~ �q ~ �q ~ �t 
PERSONNEIDq ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~ �q ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ xq ~ fq ~ fq ~ fxsq ~ J   w   sq ~S  q ~ fq ~ fq ~Vq ~ fq ~ fq ~`q ~sq ~ J    w    xsq ~ J   w   sq ~Yq ~�q ~ xt Brocanteur_Personneq ~t UNIQUExsq ~ J   w   sq ~S  q ~ fq ~ fq ~Vq ~ fq ~ fq ~`q ~sq ~ J    w    xsq ~ J   w   sq ~Yq ~�q ~ xt Brocanteur_Personneq ~q ~Jxsq ~ J    w    xsq ~ J    w    xsq ~ J    w    xsq ~ J    w    xq ~Lq ~q ~sq ~�    �    �sq ~ s   �  Dsq ~ s   ]   �?�ff`               ?�                         �   -    ?�      q ~ fq ~ fpppq ~ fpq ~ �q ~ �sq ~ �    Z���pppq ~ �q ~ �q ~ �q ~ �q ~ �q ~ �q ~�q ~ �q ~ �q ~ �q ~ �q ~ �q ~q ~ fq ~ fq ~ fq ~ fq ~�pq ~�pq ~�q ~�q ~�psq ~ J   w   sq ~ Lq ~q ~ ft 
04/02/2021q ~ fq ~ gq ~ fq ~ fq ~ fq ~ fq ~ fq ~ hxsq ~ J   w   sq ~ |�������� q ~ fpq ~ fq ~�q ~ f            q ~ fq ~ fq ~�q ~ fq ~�q ~�q ~�q ~�q ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fsq ~ J   w   sq ~ Lq ~q ~ ft 
04/02/2021q ~ fq ~ gq ~ fq ~ fq ~ fq ~ fq ~ fq ~ hxq ~ fq ~ fsq ~ J   w   sq ~ |�������� q ~ q ~�q ~ �t ReservationIdq ~ �            q ~ q ~ fq ~�q ~ q ~�q ~�q ~�q ~�t RESERVATIONIDq ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~�q ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ xq ~ fq ~ fq ~ fsq ~ |�������� q ~ fpq ~ fq ~ q ~ f            q ~ fq ~ fq ~�q ~ fq ~�q ~�q ~�q ~�q ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fsq ~ J   w   sq ~ Lq ~q ~ ft 
04/02/2021q ~ fq ~ gq ~ fq ~ fq ~ fq ~ fq ~ fq ~ hxq ~ fq ~ fsq ~ J   w   sq ~ |�������� q ~ q ~�q ~ t Dateq ~�            q ~ q ~ fq ~�q ~ q ~�q ~�q ~�q ~�t DATEq ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~�q ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ sq ~ |�������� q ~ q ~�q ~ t nombrePlaceq ~ �            q ~ q ~ fq ~�q ~ q ~�q ~�q ~�q ~�t NOMBREPLACEq ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~q ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ xq ~ fq ~ fq ~ fsq ~ |�������� q ~ fpq ~ fq ~Dq ~ f            q ~ fq ~ fq ~�q ~ fq ~�q ~�q ~�q ~�q ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fsq ~ J   w   sq ~ Lq ~q ~ ft 
04/02/2021q ~ fq ~ gq ~ fq ~ fq ~ fq ~ fq ~ fq ~ hxq ~ fq ~ fsq ~ J   w   sq ~ |�������� q ~ q ~ �q ~Jt BrocanteurIdq ~ �            q ~ t Brocanteur¤¤Inscrireq ~ �q ~ q ~ �q ~ �q ~ �q ~ �t BROCANTEURIDq ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~ �q ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ xq ~ fq ~ fq ~ fxsq ~ J    w    xsq ~ J   w   sq ~S  q ~ fq ~ fq ~Vq ~ fq ~ fq ~�q ~`sq ~ J    w    xsq ~ J   w   sq ~Yq ~�q ~mxt Reservation_Brocanteurq ~q ~Jxsq ~ J    w    xsq ~ J    w    xsq ~ J    w    xsq ~ J    w    xq ~q ~q ~sq ~�    �    �sq ~ s  &   usq ~ s   �   ?�ff`               ?�                         �   -    ?�      q ~ fq ~ fpppq ~ fpq ~ �q ~ �sq ~ �    Z���pppq ~ �q ~ �q ~ �q ~ �q ~ �q ~ �q ~�q ~ �q ~ �q ~ �q ~ �q ~ �q ~�q ~ fq ~ fq ~ fq ~ fq ~�pq ~�pq ~�q ~�q ~�psq ~ J   w   sq ~ Lq ~q ~ ft 
04/02/2021q ~ fq ~ gq ~ fq ~ fq ~ fq ~ fq ~ fq ~ hxsq ~ J   w   sq ~ |�������� q ~ fpq ~ fq ~�q ~ f            q ~ fq ~ fq ~�q ~ fq ~�q ~�q ~�q ~�q ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fsq ~ J   w   sq ~ Lq ~q ~ ft 
04/02/2021q ~ fq ~ gq ~ fq ~ fq ~ fq ~ fq ~ fq ~ hxq ~ fq ~ fsq ~ J   w   sq ~ |�������� q ~ q ~�q ~ �t 
PayementIdq ~ �            q ~ q ~ fq ~�q ~ q ~�q ~�q ~�q ~�t 
PAYEMENTIDq ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~�q ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ xq ~ fq ~ fq ~ fsq ~ |�������� q ~ fpq ~ fq ~ q ~ f            q ~ fq ~ fq ~�q ~ fq ~�q ~�q ~�q ~�q ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fsq ~ J   w   sq ~ Lq ~q ~ ft 
04/02/2021q ~ fq ~ gq ~ fq ~ fq ~ fq ~ fq ~ fq ~ hxq ~ fq ~ fsq ~ J   w   sq ~ |�������� q ~ q ~�q ~ t Montantq ~�            q ~ q ~ fq ~�q ~ q ~�q ~�q ~�q ~�t MONTANTq ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~�q ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ sq ~ |�������� q ~ q ~�q ~ t Dateq ~�            q ~ q ~ fq ~�q ~ q ~�q ~�q ~�q ~�t DATEq ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~�q ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ sq ~ |����   2 q ~ q ~�q ~ t ModePayementq ~ �            q ~ q ~ fq ~�q ~ q ~�q ~�q ~�q ~�t MODEPAYEMENTq ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~�q ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ xq ~ fq ~ fq ~ fsq ~ |�������� q ~ fpq ~ fq ~Dq ~ f            q ~ fq ~ fq ~�q ~ fq ~�q ~�q ~�q ~�q ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fq ~ fsq ~ J   w   sq ~ Lq ~q ~ ft 
04/02/2021q ~ fq ~ gq ~ fq ~ fq ~ fq ~ fq ~ fq ~ hxq ~ fq ~ fsq ~ J   w   sq ~ |�������� q ~ q ~�q ~Jt ReservationIdq ~ �            q ~ t Reservation¤¤Payerq ~�q ~ q ~�q ~�q ~�q ~�t RESERVATIONIDq ~ q ~ q ~ q ~ q ~ q ~ q ~ q ~ sq ~ J   w   sq ~ Lq ~ Nq ~ q ~�q ~ q ~ Pq ~ fq ~ fq ~ fq ~ fq ~ fq ~ Qxq ~ q ~ sq ~ J    w    xq ~ q ~ q ~ xq ~ fq ~ fq ~ fxsq ~ J   w   sq ~S  q ~ fq ~ fq ~Vq ~ fq ~ fq ~�q ~�sq ~ J    w    xsq ~ J   w   sq ~Yq ~)q ~�xt Payement_Reservationq ~q ~�xsq ~ J   w   sq ~S  q ~ fq ~ fq ~Vq ~ fq ~ fq ~�q ~�sq ~ J    w    xsq ~ J   w   sq ~Yq ~)q ~�xt Payement_Reservationq ~q ~Jxsq ~ J    w    xsq ~ J    w    xsq ~ J    w    xsq ~ J    w    xq ~�q ~q ~xsq ~ J   w   sr IhmMLD2.MLDLienEntite2�����" Z activerI coteZ discontinueF 	epaisseurZ flecheZ selectedD tangenteI xCardI yCardD zoomL cibleq ~TL clLienq ~ lL clLienActiverq ~ lL clLienFondTextq ~ lL clLienSelectq ~ lL 
clLienTextq ~ lL codeq ~ L commentaireq ~ L 
historiqueq ~ L nomq ~ L pointCassureq ~ L sourceq ~TL whNomq ~ qL xyNomq ~ qxp     ?�   �a        �  �?�      q ~`sq ~ �    �   pppsq ~ �    ��� pppq ~{sq ~ �    ��  pppsq ~ �    �   pppq ~ fq ~ fsq ~ J   w   sq ~ Lq ~q ~ ft 
04/02/2021q ~ fq ~ gq ~ fq ~ fq ~ fq ~ fq ~ fq ~ hxt Inscrire:1,1sq ~ J    w    xq ~�sq ~ s   @   sq ~ s   �  �sq ~A     ?�   ���|�`�h   �   �?�      q ~�q ~Cq ~Dq ~{q ~Eq ~Fq ~ fq ~ fsq ~ J   w   sq ~ Lq ~q ~ ft 
04/02/2021q ~ fq ~ gq ~ fq ~ fq ~ fq ~ fq ~ fq ~ hxt 	Payer:1,1sq ~ J    w    xq ~�sq ~ s   6   sq ~ s   �   �sq ~A     ?�   @"M�d�6N  �  3?�      q ~�q ~Cq ~Dq ~{q ~Eq ~Fq ~ fq ~ fsq ~ J   w   sq ~ Lq ~q ~ ft 
04/02/2021q ~ fq ~ gq ~ fq ~ fq ~ fq ~ fq ~ fq ~ hxt Agir:1,1sq ~ J    w    xq ~sq ~ s   ,   sq ~ s  �  �sq ~A     ?�   ��B�_��    e?�      q ~q ~Cq ~Dq ~{q ~Eq ~Fq ~ fq ~ fsq ~ J   w   sq ~ Lq ~q ~ ft 
04/02/2021q ~ fq ~ gq ~ fq ~ fq ~ fq ~ fq ~ fq ~ hxt Est:1,1sq ~ J    w    xq ~`sq ~ s   )   sq ~ s  0  �xsq ~ J    w    xsq ~ J    w    xsq ~ J    w    xsq ~ J    w    x