# CSC174Group2

# Deliverable 3
# *Contributors:* Andrew Au, Hardev Singh, Muhammad Musarrat.

## Full File Paths:

  ### SQL Create Tables 
  
CREATE TABLE EMPLOYEE(
    ID char(8) NOT NULL PRIMARY KEY
    );
CREATE TABLE CUSTOMER(
    PHONE char(10) NOT NULL PRIMARY KEY,
    fname varchar(15),
    lname varchar(15)
    );

CREATE TABLE MERCHANDISE (
    SKU char(8) NOT NULL PRIMARY KEY
    );

CREATE TABLE MOVIE (
    SKU char(8) NOT NULL PRIMARY KEY,
    MOVIE_NAME varchar(15),
    FOREIGN KEY (SKU) REFERENCES MERCHANDISE(SKU)
    );

CREATE TABLE SNACK (
    SKU char(8) NOT NULL PRIMARY KEY,
    SNACK_TYPE varchar(15),
    SNACK_BRAND varchar(15),
    FOREIGN KEY (SKU) REFERENCES MERCHANDISE(SKU)
    );

CREATE TABLE BUYS (
    SKU char(8) NOT NULL,
    PHONE char(10) NOT NULL,
    FOREIGN KEY (SKU) REFERENCES MERCHANDISE(SKU),
    FOREIGN KEY (PHONE) REFERENCES CUSTOMER(PHONE),
    CONSTRAINT buys_pk PRIMARY KEY (SKU, PHONE)
    );

CREATE TABLE SELLS (
    ID char(8) NOT NULL,
    SKU char(8) NOT NULL,
    FOREIGN KEY (SKU) REFERENCES MERCHANDISE(SKU),
    FOREIGN KEY (ID) REFERENCES EMPLOYEE(ID),
    CONSTRAINT sells_pk PRIMARY KEY (ID, SKU)
    );

  ### SQL Insert File Path: CSC174Group2/insert.php
  
  ### SQL Select File Path: CSC174Group2/index.php

## Steps to test website:

1. Click URL and go to the webpage.
2. Enter a SKU number in the text box and click the submit button.
3. Webpage will refresh and display the added SKU number in the table.


