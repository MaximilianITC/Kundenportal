<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" type"text/css" href="kunden.css">
        <title>
                Kundendaten eingeben
        </title>
</head>
<body>

        <h1>Please enter your Data</h4>
        <br><br><br>




        <?php
                if(isset($_POST['button1'])){

                        $dbconn = pg_connect("host=localhost port=5432 dbname=Kundendaten user=postgres password=SNMG2f208");

                        $sqlCode = $_POST['comCode'];

                        $erg = pg_query_params($dbconn,'SELECT * FROM kunden where code like $1',array($sqlCode));

                        while($line = pg_fetch_array($erg)){
                                $cCodeGet = $line[4];
                                $cNameGet = $line[1];
                                $cAdressGet = $line[2];
                                $cEmailGet = $line[3];
                        }

                        pg_close($dbconn);

                }




                if(isset($_POST['button2'])){
                        $dbconn1 = pg_connect("host=localhost port=5432 dbname=Kundendaten user=postgres password=SNMG2f208");

                        $sqlStatement = pg_prepare($dbconn1, "my_query", 'UPDATE kunden SET name = $1, adresse = $2, email = $3 WHERE code like $4');

                        $sqlStatement = pg_execute($dbconn1, "my_query", array($_POST['comNameInput'], $_POST['comAdress'], $_POST['email'], $_POST['comCode']));       
                        $messageThankYou = "We thank you for your Update. If you want to change your data again you just need to submit your code again.";
                }
        ?>

        <form method="post">
                <div class = "dateneingabe">
                        <br><br><br>
                        <label for"code">Please enter your Code:</label>
                                                                                                                                                     48,1-8        Top
                        <input type="text" id="comCode" name="comCode" value="<?php echo htmlspecialchars($cCodeGet); ?>"/>
                        <br><br>

                        <input type="submit" name="button1" value="Submit Code"/>
                        <br><br><br><br><br><br><br><br><br>

                        <label for="companyName">Company name:</label>

                        <input type="text" id="comNameInput" name="comNameInput" value="<?php echo htmlspecialchars($cNameGet); ?>"/>
                        <br><br>
                        <label for="adresse">Adress:</label>

                        <input type="text" id="comAdress" name="comAdress" value="<?php echo htmlspecialchars($cAdressGet); ?>" />
                        <br><br>

                        <label for="emailAdresse">Email:</label>
                        <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($cEmailGet); ?>" />
                        <br><br>
                        <input type="submit" name="button2"
                        value="Submitt your data"/>
                        <br><br><br><br>

                        <h3><?php echo $messageThankYou; ?><h3/>
                </div>
        </form>

</body>
</html>
