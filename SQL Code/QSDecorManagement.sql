CREATE DATABASE QSDECOR_MANAGEMENT
GO

USE QSDECOR_MANAGEMENT
GO

/*TABLE AREA*/
--TABLE INCLUDES ACCOUNT INFORMATION
CREATE TABLE tbl_account
(
	ACCOUNT_ID VARCHAR(255) PRIMARY KEY,
	NAME VARCHAR(255),
	USERNAME VARCHAR(255),
	PASSWORD VARCHAR(255),
	LEVEL INT
)
GO

--TABLE INCLUDES COLLABORATOR INFORMATION
CREATE TABLE tbl_collaborator
(
	COLLAB_ID VARCHAR(255) PRIMARY KEY,
	COLLAB_NAME VARCHAR(255),
	COLLAB_PHONE VARCHAR(255),
	COLLAB_ZALO VARCHAR(255),
	COLLAB_EMAIL VARCHAR(255),
	COLLAB_ADDRESS VARCHAR(255),
	START_WORKING_DATE DATE,
	COLLAB_BANK_NAME VARCHAR(255),
	COLLAB_BANK_NUMBER VARCHAR(255)
)

--TABLE INCLUDES PRODUCT INFORMATION
CREATE TABLE tbl_product
(
	PRODUCT_ID VARCHAR(255) PRIMARY KEY,
	PRODUCT_NAME VARCHAR(255),
	PRODUCT_SINGLE_PRICE FLOAT,
	PRODUCT_MULTI_PRICE FLOAT, 
	PRODUCT_DESCRIPTION TEXT,
	PRODUCT_NOTE VARCHAR(255),
	PRODUCT_LINK_IMAGE VARCHAR(255)
)

--TABLE INCLUDES ORDER INFORMATION
CREATE TABLE tbl_order
(
	ORDER_ID VARCHAR(255) PRIMARY KEY,
	PRODUCT_NAME VARCHAR(255),
	SELL_CHANEL VARCHAR(255),

	COLLAB_ID VARCHAR(255),
	
	CUSTOMER_NAME VARCHAR(255),
	CUSTOMER_PHONE VARCHAR(255),
	CUSTOMER_ADDRESS VARCHAR(255),

	SELL_PRICE FLOAT,
	SHIPPING_FEE FLOAT,
	OTHERS_FEE FLOAT,
	DEPOSIT FLOAT,
	PAYMENT FLOAT,
	NOTE TEXT,
	ORDER_DATE DATE,
	STATUS VARCHAR(255),
	FOREIGN KEY(COLLAB_ID) REFERENCES tbl_collaborator(COLLAB_ID)
)

--TABLE INCLUDES PARTNER COMPANY INFORMATION
CREATE TABLE tbl_partner
(
	PARTNER_ID INT AUTO_INCREMENT PRIMARY KEY,
	PARTNER_NAME VARCHAR(255),
	DEPUTY VARCHAR(255),
	PHONE VARCHAR(255),
	EMAIL VARCHAR(255),
	ADDRESS VARCHAR(255),
	NOTE VARCHAR(255)
)