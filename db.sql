CREATE DATABASE IF NOT EXISTS contact_form CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE contact_form.messages (
    ID int(11) AUTO_INCREMENT,
    email varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    message text NOT NULL,
    PRIMARY KEY (ID)
);
