DROP
    DATABASE IF EXISTS auctionmarket;
CREATE
    DATABASE IF NOT EXISTS auctionmarket;

USE
    auctionmarket;


DROP TABLE IF EXISTS branches;
DROP TABLE IF EXISTS customers;
DROP TABLE IF EXISTS transactions;
DROP TABLE IF EXISTS admin;

CREATE TABLE branches
(
    branch_id      VARCHAR(30)      NOT NULL,
    branch_name    VARCHAR(40)  NOT NULL,
    branch_phone   VARCHAR(40)  NOT NULL,
    branch_address VARCHAR(250) NOT NULL,
    PRIMARY KEY (branch_id),
    UNIQUE (branch_name)
);

CREATE TABLE customers
(
    customer_id INT            NOT NULL,
    birth_date  DATE           ,
    first_name  VARCHAR(30)    NOT NULL,
    last_name   VARCHAR(30)    NOT NULL,
    gender      ENUM ('M','F') NOT NULL,
    email       VARCHAR(100)   NOT NULL,
    city        VARCHAR(50)    NOT NULL,
    country     VARCHAR(50)    NOT NULL,
    national_id VARCHAR(50)    NOT NULL,
    phone       VARCHAR(30)    NOT NULL,
    pass	VARCHAR(30)	   NOT NULL,
    balance     DOUBLE,
    branch_id	VARCHAR(30),
    PRIMARY KEY (customer_id),
    UNIQUE (email, phone, national_id),
    FOREIGN KEY (branch_id) REFERENCES branches (branch_id)
);

CREATE TABLE transactions
(
	transaction_id	INT 			NOT NULL,
	transaction_type	VARCHAR(10) NOT NULL,
	product_id		VARCHAR(30) NOT NULL,
	owner_id			INT 			NOT NULL,
	bidder_id		INT 			NOT NULL,
	amount			DOUBLE,
	createdAt		DATETIME,
	PRIMARY KEY (transaction_id),
	FOREIGN KEY (owner_id) REFERENCES customers (customer_id),
	FOREIGN KEY (bidder_id) REFERENCES customers (customer_id)
);

CREATE TABLE admin
(
    admin_id      INT      NOT NULL,
    email    VARCHAR(100)  NOT NULL,
    password   VARCHAR(30)  NOT NULL,
    admin_name VARCHAR(30) NOT NULL,
    PRIMARY KEY (admin_id),
    UNIQUE (admin_name)
);

INSERT INTO `branches` (`branch_id`,`branch_name`,`branch_phone`,`branch_address`) VALUES 
("B1","West Branch","(02) 3699 2373","P.O. Box 992, 7935 Ornare Road"),
("B2","East Branch","(09) 5345 3753","7715 Sociis St."),
("B3","South Branch","(04) 8638 8688","737-7191 Vitae Rd."),
("B4","North","(03) 5563 0182","Ap #389-1647 Nisi Rd.");

INSERT INTO `customers` (`customer_id`,`birth_date`,`first_name`,`last_name`,`gender`,`email`,`city`,`country`,`national_id`,`phone`,`pass`,`balance`) 
VALUES 
	(0,"1999-02-09","Gretchen","Good","M","In.condimentum.Donec@etmagnisdis.com","Bear","Bahrain","C2B86A93-4DBB-83AB-9B2C-4A66A037AD97","(01) 3686 9160","1234",87658),
	(1,"1982-06-19","Plato","Whitaker","M","massa@vitaeorci.org","Bientina","Cook Islands","B4AC70B0-6825-4AB5-F94C-06BECD0F6B67","(01) 1701 2397","1234",78864),
	(2,"1984-01-03","Ryder","Farley","M","In@ametorciUt.edu","South Dum Dum","Azerbaijan","1708496A-CF3B-2BC0-7925-07ADE9CCC727","(09) 1836 7023","1234",23800),
	(3,"1990-12-13","Alfonso","Manning","M","cursus@a.edu","Lampa","Burundi","7C0BF622-4C28-C665-F325-B09A65E391B3","(02) 2910 2183","1234",24651),
	(4,"1985-05-12","Bo","Goodwin","F","aliquam.eu.accumsan@eratneque.co.uk","Habay-la-Neuve","Spain","EB798187-60D9-402B-D3C3-C14AAC86EBBA","(04) 9481 0617","1234",50112),
	(5,"1991-01-11","Andrew","Beasley","M","lorem@egestas.edu","Aubange","Kazakhstan","0F2C9BFC-BDD6-B0EA-D929-CC237C28FF60","(09) 8425 4875","1234",20904),
	(6,"1996-09-21","Wang","Bullock","M","massa.Suspendisse.eleifend@Duiselementumdui.org","Lincoln","Kenya","52E7627B-315D-528E-CC15-C493D96E153F","(01) 4976 1169","1234",81885),
	(7,"1999-10-28","Nero","Travis","M","ante.Vivamus@ullamcorpermagna.ca","Solnechnogorsk","Mali","FC0DCEFA-BA7D-F3A4-D6E1-E2A58F9623BC","(04) 0937 8856","1234",73060),
	(8,"1982-04-04","Paki","Mcmahon","F","erat.Sed@adipiscing.edu","Monceau-sur-Sambre","Niue","602BC5B2-7BCC-1C1F-8552-4C33A2C81BC7","(04) 5876 4757","1234",80020),
	(9,"1998-10-06","Hayes","Hutchinson","F","commodo.auctor.velit@metusInnec.ca","Hoogeveen","Palau","D0955C6B-F8A4-E3F8-6CCE-59300A0D158A","(05) 8802 5171","1234",57292),
	(10,"1982-09-08","Nola","Witt","F","magna.tellus@aduiCras.co.uk","Branchon","Belgium","EA07C0F7-5FAA-90E0-7CEB-981057B87635","(01) 4664 3322","1234",49559);

INSERT INTO `admin` (`admin_id`, `email`, `password`, `admin_name`) VALUES ('1', 'admin@gmail.com', '1234', 'John Admin');

-- ADD INDEXES
ALTER TABLE customers
ADD INDEX customer_phone_idx (phone);

ALTER TABLE transactions
ADD INDEX trans_productId_indx (product_id);


-- CREATE STORED PROCEDUREs

-- update_bidder_balance() PROCEDURE
-- DROP PROCEDURE if EXISTS update_bidder_balance
delimiter $$
CREATE PROCEDURE update_bidder_balance()
BEGIN
	DECLARE transactedAmount DOUBLE;
	DECLARE idOfBidder INT;
	DECLARE balanceOfBidder DOUBLE;
	
	SELECT amount, bidder_id INTO transactedAmount, idOfBidder
	FROM transactions ORDER BY amount DESC LIMIT 1;
	
	SELECT balance INTO balanceOfBidder
	FROM customers WHERE customer_id = idOfBidder;
	
	UPDATE customers SET balance = balanceOfBidder - transactedAmount WHERE customer_id = idOfBidder;
END $$
delimiter ;


-- update_owner_balance() PROCEDURE
-- DROP PROCEDURE if EXISTS update_owner_balance
delimiter $$
CREATE PROCEDURE update_owner_balance()
BEGIN
	DECLARE transactedAmount DOUBLE;
	DECLARE idOfOwner INT;
	DECLARE balanceOfOwner DOUBLE;
	
	SELECT amount, owner_id INTO transactedAmount, idOfOwner
	FROM transactions ORDER BY amount DESC LIMIT 1;
	
	SELECT balance INTO balanceOfOwner
	FROM customers WHERE customer_id = idOfOwner;
	
	UPDATE customers SET balance = balanceOfOwner + transactedAmount WHERE customer_id = idOfOwner;
END $$
delimiter ;

-- ADD Trigger
-- DROP TRIGGER IF EXISTS add_tran_trigger
delimiter $$
CREATE TRIGGER add_tran_trigger
AFTER INSERT ON transactions
FOR EACH ROW
BEGIN
	CALL update_bidder_balance();
	CALL update_owner_balance();
END $$
delimiter ;