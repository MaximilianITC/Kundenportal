<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" type"text/css" href="kunden.css">
        <title>
                Kundendaten eingeben
        </title>
</head>
<body>
        <div class="bild" style="text-align: center;">
                <img src="Hintergrund.png" alt="ITC Logo" style="width:15%;">
                <h1>IT Concepts GmbH customer data update</h1>
        </div>
        <br><br><br>

        <?php
                include_once 'dbconn.php';

                if(isset($_POST['button1'])){

                        $dbconn = $conn;

                        $sqlCode = $_POST['comCode'];

                        $erg = pg_query_params($dbconn,'SELECT * FROM kunden where code like $1',array($sqlCode));
                                
                        while($line = pg_fetch_array($erg)){
                                $cCodeGet = $line[4];
                                $cNameGet = $line[1];
                                $cStreetGet = $line[2];
                                $cPLZGet = $line[5];
                                $cOrtGet = $line[6];
                                $cLaenderkennzeichenGet = $line[7];
                                $cLandesvorwahlGet = $line[8];
                                $cOrtsvorwahlGet = $line[9];
                                $cTelefonGet = $line[10];
                                $cEmailGet = $line[3];
                                $cWebsiteGet = $line[11];
                        }
                        pg_close($dbconn);
                }
                        
                if(isset($_POST['button2'])){
                        $dbconn1 = $conn;
                        
                        $sqlStatement = pg_prepare($dbconn1, "my_query", 'UPDATE kunden SET name = $1, strasse = $2, plz = $3, ort = $4, laenderkennzeichen = $5, landesvorwahl = $6, ortsvorwahl = $7, telefon = $8, email = $9, website = $10 WHERE code like $11');

                        $sqlStatement = pg_execute($dbconn1, "my_query", array($_POST['comNameInput'], $_POST['comStreet'], $_POST['comPLZ'], $_POST['comOrt'], $_POST['comLaenderkennzeichen'], $_POST['comLandesvorwahl'], $_POST['comOrtsvorwahl'], $_POST['comTelefon'], $_POST['comEmail'], $_POST['comWebsite'], $_POST['comCode']));
                        $messageThankYou = "We thank you for your Update. If you want to change your data you just need to submit your code again.";
                }
        ?>
                
        <form method="post">
                <div class = "dateneingabe">
                        <br><br><br>
                        <label for"code">Please enter your Code:</label>
                        <input type="text" id="comCode" name="comCode" value="<?php echo htmlspecialchars($cCodeGet); ?>"/>
                        <br><br>
                        
                        <input type="submit" name="button1" value="Submit Code"/>
                        <br><br><br>

                        <h3 class="danke"><?php echo $messageThankYou; ?></h3>

                        <h2>Please enter or update your data here:</h2>
                        <br>


                        <label for="companyName">Company name: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comNameInput" name="comNameInput" value="<?php echo htmlspecialchars($cNameGet); ?>"/>
                        <br><br>


                        <label for="strasse">Street: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comStreet" name="comStreet" value="<?php echo htmlspecialchars($cStreetGet); ?>" />
                        <br><br>


                        <label for="plz">Postal Code: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comPLZ" name="comPLZ" value="<?php echo htmlspecialchars($cPLZGet); ?>" />
                        <br><br>

                        <label for="ort">Town: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comOrt" name="comOrt" value="<?php echo htmlspecialchars($cOrtGet); ?>" />
                        <br><br>


                        <label for="laenderkennzeichen">Country Code: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comLaenderkennzeichen" name="comLaenderkennzeichen" value="<?php echo htmlspecialchars($cLaenderkennzeichenGet); ?>" />
                        <br><br>

                        <label for="landesvorwahl">Phone prefix (countryp) &nbsp; &nbsp; &nbsp; </label>
                        <input type="text" id="comLandesvorwahl" name="comLandesvorwahl" value="<?php echo htmlspecialchars($cLandesvorwahlGet); ?>" />
                        <br><br>

                        <label for="ortsvorwahl">Phone prefix (town): &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comOrtsvorwahl" name="comOrtsvorwahl" value="<?php echo htmlspecialchars($cOrtsvorwahlGet); ?>" />
                        <br><br>


                        <label for="telefon">Telephone: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comTelefon" name="comTelefon" value="<?php echo htmlspecialchars($cTelefonGet); ?>" />
                        <br><br>

                        <label for="emailAdresse">Email: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comEmail" name="comEmail" value="<?php echo htmlspecialchars($cEmailGet); ?>" />
                        <br><br>

                        <label for="wesite">Website: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comWebsite" name="comWebsite" value="<?php echo htmlspecialchars($cWebsiteGet); ?>" />
                        <br><br>


                        <input type="submit" name="button2"
                        value="Submitt your data"/>
                        <br><br>
                </div>
        </form>

        <div class="impressum">
                <br>
                <h3>IT Concepts GmbH</h3>
                <br><br>
                <p>Gewerbest. 17</p>
                <p>35633 Lahnau</p>
                <p>Germany</p>
                <p>Fon: +49 6441 679299-0</p>
                <p>Fax: +49 6441 679299-99</p>
                <br>
                <p>sales@itcworld.com</p>
                <br>
                <h4>Opening hours</h4>
                <br>
                <p>Mon. - Thur.</p>
                <p>08:00 - 16:30</p>
                <br>
                <p>Fr.</p>
                <p>08:00 - 16:00</p>
                <br>
        </div>
</body>
</html>


