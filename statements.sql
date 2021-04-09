CREATE DATABASE drempeltoets;


USE drempeltoets;


CREATE TABLE persoon(
    persoonid INT NOT NULL AUTO_INCREMENT,
    naam VARCHAR(255) NOT NULL,
    adres VARCHAR(255) NOT NULL,
    plaats VARCHAR(255) NOT NULL,
    postcode VARCHAR(255) NOT NULL,
    telefoon VARCHAR(255) NOT NULL,
    van DATE NOT NULL,
    tot DATE NOT NULL
    PRIMARY KEY(persoonid)
);

CREATE TABLE kamer (
    kamerid INT NOT NULL AUTO_INCREMENT,
    kamernummer INT NOT NULL,
    PRIMARY KEY(kamerid)
);

CREATE TABLE reserveringsoverzicht (
    reserveringsnummer INT NOT NULL AUTO_INCREMENT,
    van DATE NOT NULL,
    tot DATE NOT NULL,
    persoon_persoonid INT NOT NULL,
    kamer_kamerid INT NOT NULL,
    PRIMARY KEY(reserveringsnummer),    
    FOREIGN KEY (persoon_persoonid) REFERENCES persoon(persoonid),
    FOREIGN KEY (kamer_kamerid) REFERENCES kamer(kamerid)
);

CREATE TABLE medewerkers (
    medewerkerscode INT NOT NULL AUTO_INCREMENT,
    voorletters VARCHAR(255) NOT NULL,
    voorvoegsel VARCHAR(255),
    achternaam VARCHAR(255) NOT NULL,
    gebruikersnaam VARCHAR(255) NOT NULL,
    wachtwoord VARCHAR(255) NOT NULL,
    PRIMARY KEY(medewerkerscode)
);
