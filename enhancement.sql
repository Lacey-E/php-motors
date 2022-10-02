INSERT INTO `clients`(`clientsId`, `clientsFirstname`, `clientsLastname`, `clientsEmail`,
 `clientsPassword`, `clientsLevel`, `comment`) VALUES ('','Tony',
'Stark','tony@starkent.com','Iam1ronM@n','1','I am the real Ironman');

UPDATE `inventory` SET `invDescription` = replace(`invDescription`, 'small interior', 'spacious interior')
 WHERE `inventory`.`invId` = 12;

 UPDATE `clients` SET `clientsId` = '', `clientsLevel` = '3' WHERE `clients`.`clientsId` = 0

 SELECT inventory.invModel, carclassification.classificationName
       FROM inventory
      INNER JOIN carclassification
            ON inventory.invId = carclassification.classificationId
            WHERE carclassification.classificationName = 'SUV';



DELETE FROM inventory WHERE `inventory`.`invId` = 1;
UPDATE inventory SET invThumbnail = concat('/phpmotors',invThumbnail);





hh