#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Role
#------------------------------------------------------------

CREATE TABLE Role(
        RoleId Int NOT NULL ,
        Titre  Varchar (50) NOT NULL
	,CONSTRAINT Role_PK PRIMARY KEY (RoleId)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Personne
#------------------------------------------------------------

CREATE TABLE Personne(
        PersonneId  Int NOT NULL ,
        Nom         Varchar (50) NOT NULL ,
        Prenom      Varchar (50) NOT NULL ,
        Telephone   Varchar (10) NOT NULL ,
        Email       Varchar (50) NOT NULL ,
        RoleId      Int NOT NULL ,
        RoleId_Agir Int NOT NULL
	,CONSTRAINT Personne_PK PRIMARY KEY (PersonneId)

	,CONSTRAINT Personne_Role_FK FOREIGN KEY (RoleId_Agir) REFERENCES Role(RoleId)
	,CONSTRAINT Personne_Role_AK UNIQUE (RoleId_Agir)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Brocanteur
#------------------------------------------------------------

CREATE TABLE Brocanteur(
        BrocanteurId            Int NOT NULL ,
        CarteIdentite           Varchar (50) NOT NULL ,
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
# Table: Facturation
#------------------------------------------------------------

CREATE TABLE Facturation(
        FacturationId Int NOT NULL ,
        Montant       Float NOT NULL ,
        Date          Date NOT NULL ,
        BrocanteurId  Int NOT NULL
	,CONSTRAINT Facturation_PK PRIMARY KEY (FacturationId)

	,CONSTRAINT Facturation_Brocanteur_FK FOREIGN KEY (BrocanteurId) REFERENCES Brocanteur(BrocanteurId)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Payement
#------------------------------------------------------------

CREATE TABLE Payement(
        PayementId    Int NOT NULL ,
        Montant       Float NOT NULL ,
        Date          Date NOT NULL ,
        ModePayement  Varchar (50) NOT NULL ,
        ReservationId Int NOT NULL ,
        FacturationId Int NOT NULL
	,CONSTRAINT Payement_PK PRIMARY KEY (PayementId)

	,CONSTRAINT Payement_Reservation_FK FOREIGN KEY (ReservationId) REFERENCES Reservation(ReservationId)
	,CONSTRAINT Payement_Facturation0_FK FOREIGN KEY (FacturationId) REFERENCES Facturation(FacturationId)
	,CONSTRAINT Payement_Reservation_AK UNIQUE (ReservationId)
	,CONSTRAINT Payement_Facturation0_AK UNIQUE (FacturationId)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Emplacement
#------------------------------------------------------------

CREATE TABLE Emplacement(
        EmplacementID Int  Auto_increment  NOT NULL
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: GeoLoc
#------------------------------------------------------------

CREATE TABLE GeoLoc(
        GeolocID Int  Auto_increment  NOT NULL
)ENGINE=InnoDB;

