CREATE DEFINER=`root`@`localhost` PROCEDURE `check_licence`(IN licenceSerial varchar(255),IN email varchar(255))
BEGIN
SELECT * 
FROM achat,user,licence
where user.email = email and
user.ID = achat.User_ID and
licence.Licence_Serial = licenceSerial and
licence.Licence_ID = achat.Licence_ID;

END