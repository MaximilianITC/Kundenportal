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
                require_once('dbconn.php');

                if(isset($_POST['button1'])){

                        $dbconn = $conn;

			
                        $sqlCode = $_POST['comCode'];
			

			$stmtSelect = $dbconn->prepare("select * from kunden where code like ?;");
			$stmtSelect->bind_param("s", $sqlCode);
			$stmtSelect->execute();
			$erg = $stmtSelect->get_result();
			
                        while($line = $erg->fetch_assoc()){
                                $cCodeGet = $line["code"];
                                $cNameGet = $line["name"];
                                $cName2Get = $line["namezusatz"];
                                $cStreetGet = $line["strasse"];
                                $cStreet2Get = $line["strasse2"];
                                $cPLZGet = $line["plz"];
                                $cOrtGet = $line["ort"];
                                $cLaenderkennzeichenGet = $line["laenderkennzeichen"];
                                $cLandesvorwahlGet = $line["landesvorwahl"];
                                $cOrtsvorwahlGet = $line["ortsvorwahl"];
                                $cTelefonGet = $line["telefon"];
                                $cEmailGet = $line["email"];
                                $cWebsiteGet = $line["website"];

				$cGlnGet = $line["gln"];
				$cRouteIdGet = $line["routeid"];
				$cOsnatcGet = $line["osnatc"];

				$cKontaktEinkaufMailGet = $line["kontakteinkaufmail"];
				$cKontaktEinkaufPhoneGet = $line["kontakteinkaufphone"];

				$cKontaktServiceMailGet = $line["kontaktservicemail"];
				$cKontaktServicePhoneGet = $line["kontaktservicephone"];

				$cKontaktBuchhaltungMailGet = $line["kontaktbuchhaltungmail"];
				$cKontaktBuchhaltungPhoneGet = $line["kontaktbuchhaltungphone"];

                                $cEmailRechnungGet = $line["emailrechnung"];
                                $cEmailMahnungGet = $line["mahnung"];
                                $cUidGet = $line["uid"];
                                $cRechnungsAdresseGet = $line["emailrechnung"];
                                $cLieferadresseGet = $line["lieferadresse"];
                                $cKontaktEinkaufGet = $line["kontakteinkauf"];
                                $cKontaktServiceGet = $line["kontaktservice"];
                                $cKontaktBuchhaltungGet = $line["kontaktbuchhaltung"];
                        }

                        //$dbconn->close();
                }

                if(isset($_POST['button2'])){
			if(filter_var($_POST['comRechnungsEmail'], FILTER_VALIDATE_EMAIL)){
                        	$dbconn1 = $conn;

                        	$stmt = $dbconn1->prepare("UPDATE kunden SET name = ?, strasse = ?, plz = ?, ort = ?, laenderkennzeichen = ?, landesvorwahl = ?, ortsvorwahl = ?, telefon = ?, email = ?, website = ?, emailrechnung = ?, uid = ?, rechnungsadresse = ?, lieferadresse = ?, kontakteinkauf = ?, kontaktservice = ?, kontaktbuchhaltung = ?, namezusatz = ?, strasse2 = ?, mahnung = ?, gln = ?, routeid = ?, osnatc = ?, kontakteinkaufmail = ?, kontakteinkaufphone = ?, kontaktservicemail = ?, kontaktservicephone = ?, kontaktbuchhaltungmail = ?, kontaktbuchhaltungphone = ? WHERE code like ?");

                        	$stmt->bind_param("ssssssssssssssssssssssssssssss", $_POST['comNameInput'], $_POST['comStreet'], $_POST['comPLZ'], $_POST['comOrt'], $_POST['comLaenderkennzeichen'], $_POST['comLandesvorwahl'], $_POST['comOrtsvorwahl'], $_POST['comTelefon'], $_POST['comEmail'], $_POST['comWebsite'], $_POST['comRechnungsEmail'], $_POST['comUID'], $_POST['comRechnungsanschrift'], $_POST['comLieferadresse'], $_POST['comAnsprechpartnerEinkauf'], $_POST['comAnsprechpartnerService'], $_POST['comAnsprechpartnerBuchhaltung'],$_POST['comName2Input'], $_POST['comStreet2'] ,$_POST['comMahnungsEmail'], $_POST['comGLN'], $_POST['comRouteID'], $_POST['comOSNATC'] , $_POST['comAnsprechpartnerEinkaufMail'], $_POST['comAnsprechpartnerEinkaufPhone'], $_POST['comAnsprechpartnerServiceMail'], $_POST['comAnsprechpartnerServicePhone'], $_POST['comAnsprechpartnerBuchhaltungMail'], $_POST['comAnsprechpartnerBuchhaltungPhone'], $_POST['comCode']);
				$stmt->execute();
                        	$messageThankYou = "We thank you for your Update. If you want to change your data you just need to submit your code again.";
                	}
			else{
				$messageError = "ERROR: Please enter a valide Email in the field 'Email (billing)'.";
	
				$error_css='background-color:red';
				$dbconn = $conn;

			
                        	$sqlCode = $_POST['comCode'];
			

				$stmtSelect = $dbconn->prepare("select * from kunden where code like ?;");
				$stmtSelect->bind_param("s", $sqlCode);
				$stmtSelect->execute();
				$erg = $stmtSelect->get_result();
			
                       		while($line = $erg->fetch_assoc()){
                               		$cCodeGet = $line["code"];
                               		$cNameGet = $line["name"];
                                	$cName2Get = $line["namezusatz"];
                                	$cStreetGet = $line["strasse"];
                                	$cStreet2Get = $line["strasse2"];
                                	$cPLZGet = $line["plz"];
                                	$cOrtGet = $line["ort"];
                                	$cLaenderkennzeichenGet = $line["laenderkennzeichen"];
                               		$cLandesvorwahlGet = $line["landesvorwahl"];
                                	$cOrtsvorwahlGet = $line["ortsvorwahl"];
                                	$cTelefonGet = $line["telefon"];
                                	$cEmailGet = $line["email"];
                                	$cWebsiteGet = $line["website"];

					$cGlnGet = $line["gln"];
					$cRouteIdGet = $line["routeid"];
					$cOsnatcGet = $line["osnatc"];

					$cKontaktEinkaufMailGet = $line["kontakteinkaufmail"];
					$cKontaktEinkaufPhoneGet = $line["kontakteinkaufphone"];

					$cKontaktServiceMailGet = $line["kontaktservicemail"];
					$cKontaktServicePhoneGet = $line["kontaktservicephone"];

					$cKontaktBuchhaltungMailGet = $line["kontaktbuchhaltungmail"];
					$cKontaktBuchhaltungPhoneGet = $line["kontaktbuchhaltungphone"];

                                	$cEmailRechnungGet = $line["emailrechnung"];
                                	$cEmailMahnungGet = $line["mahnung"];
                                	$cUidGet = $line["uid"];
                                	$cRechnungsAdresseGet = $line["emailrechnung"];
                                	$cLieferadresseGet = $line["lieferadresse"];
                               		$cKontaktEinkaufGet = $line["kontakteinkauf"];
                                	$cKontaktServiceGet = $line["kontaktservice"];
                                	$cKontaktBuchhaltungGet = $line["kontaktbuchhaltung"];
                        
				}			
			}
		}
        ?>

        <form method="post">
                <div class = "dateneingabe">
                        <br><br><br>
                        <label for="code">Please enter your Customre-Code:</label>
                        <input type="text" id="comCode" name="comCode" value="<?php echo htmlspecialchars($cCodeGet); ?>"/>
                        <br><br>

                        <input type="submit" name="button1" value="Submit Code"/>
                        <br><br><br>

                        <h3 class="danke"><?php echo $messageThankYou; ?></h3>
			<h3 style="color:red;"><?php echo $messageError; ?></h3>

                        <h2>Please enter or update your data here:</h2>
                        <br>


                        <label for="companyName">Company name:&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comNameInput" name="comNameInput" value="<?php echo htmlspecialchars($cNameGet); ?>"/>
                        <br><br>

                        <label for="companyName2">&nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comName2Input" name="comName2Input" value="<?php echo htmlspecialchars($cName2Get); ?>"/>
                        <br><br>


                        <label for="strasse">Street: &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comStreet" name="comStreet" value="<?php echo htmlspecialchars($cStreetGet); ?>" />
                        <br><br>

                        <label for="strasse2">&nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comStreet2" name="comStreet2" value="<?php echo htmlspecialchars($cStreet2Get); ?>" />
                        <br><br>

                        <label for="plz">Postal code: &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comPLZ" name="comPLZ" value="<?php echo htmlspecialchars($cPLZGet); ?>" />
                        <br><br>

                        <label for="ort">Town: &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comOrt" name="comOrt" value="<?php echo htmlspecialchars($cOrtGet); ?>" />
                        <br><br>


                        <label for="laenderkennzeichen">Country code: &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comLaenderkennzeichen" name="comLaenderkennzeichen" value="<?php echo htmlspecialchars($cLaenderkennzeichenGet); ?>" />
                        <br><br>

                        <label for="landesvorwahl">Phone prefix (country): &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </label>
                        <input type="text" id="comLandesvorwahl" name="comLandesvorwahl" value="<?php echo htmlspecialchars($cLandesvorwahlGet); ?>" />
                        <br><br>

                        <label for="ortsvorwahl">Phone prefix (town): &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comOrtsvorwahl" name="comOrtsvorwahl" value="<?php echo htmlspecialchars($cOrtsvorwahlGet); ?>" />
                        <br><br>


                        <label for="telefon">Telephone: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comTelefon" name="comTelefon" value="<?php echo htmlspecialchars($cTelefonGet); ?>" />
                        <br><br>

                        <label for="emailAdresse">Email: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comEmail" name="comEmail" value="<?php echo htmlspecialchars($cEmailGet); ?>" />
                        <br><br>




                        <label for="rechnungsEmail">Email (billing): &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </label>
                        <input type="text" id="comRechnungsEmail" name="comRechnungsEmail" value="<?php echo htmlspecialchars($cEmailRechnungGet); ?>" style="<?php echo $error_css; ?>"/>
                        <br><br>

                        <label for="mahnungsEmail">Email (reminder): &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>

                         <input type="text" id="comMahnungsEmail" name="comMahnungsEmail" value="<?php echo htmlspecialchars($cEmailMahnungGet); ?>"/>
                        <br><br>


                        <label for="wesite">Website: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comWebsite" name="comWebsite" value="<?php echo htmlspecialchars($cWebsiteGet); ?>" />
                        <br><br>







                        <label for="UID">VAT identification number:&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comUID" name="comUID" value="<?php echo htmlspecialchars($cUidGet); ?>" />
                        <br><br>

			



			<label for="GLN">GLN: &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comGLN" name="comGLN" value="<?php echo htmlspecialchars($cGlnGet); ?>" />
                        <br><br>

			<label for="routeid">Route-ID: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp;  &nbsp;</label>
                        <input type="text" id="comRouteID" name="comRouteID" value="<?php echo htmlspecialchars($cRouteIdGet); ?>" />
                        <br><br>

			<label for="OSNATC">Our supplier number at the customer:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comOSNATC" name="comOSNATC" value="<?php echo htmlspecialchars($cOsnatcGet); ?>" />
                        <br><br>




	

                        <label for="rechnungsanschrift">Billing address: &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comRechnungsanschrift" name="comRechnungsanschrift" value="<?php echo htmlspecialchars($cRechnungsAdresseGet); ?>" />
                        <br><br>

                        <label for="lieferadresse">Delivery address: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comLieferadresse" name="comLieferadresse" value="<?php echo htmlspecialchars($cLieferadresseGet) ?>" />
                        <br><br>

                        <label for="ansprechpartnerEinkauf">Contact person (purchase): &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comAnsprechpartnerEinkauf" name="comAnsprechpartnerEinkauf" value="<?php echo htmlspecialchars($cKontaktEinkaufGet) ?>" />
                        <br><br>




			&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<label for="ansprechpartnerEinkaufMail">Mail: &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comAnsprechpartnerEinkaufMail" name="comAnsprechpartnerEinkaufMail" value="<?php echo htmlspecialchars($cKontaktEinkaufMailGet) ?>" />
                        <br><br>

			&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<label for="ansprechpartnerEinkaufPhone">Phone: &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comAnsprechpartnerEinkaufPhone" name="comAnsprechpartnerEinkaufPhone" value="<?php echo htmlspecialchars($cKontaktEinkaufPhoneGet) ?>" />
                        <br><br>





                        <label for="ansprechpartnerService">Contact person (service): &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comAnsprechpartnerService" name="comAnsprechpartnerService" value="<?php echo htmlspecialchars($cKontaktServiceGet) ?>" />
                        <br><br>

			&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<label for="ansprechpartnerServiceMail">Mail: &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comAnsprechpartnerServiceMail" name="comAnsprechpartnerServiceMail" value="<?php echo htmlspecialchars($cKontaktServiceMailGet) ?>" />
                        <br><br>

			&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<label for="ansprechpartnerEinkaufPhone">Phone: &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comAnsprechpartnerServicePhone" name="comAnsprechpartnerServicePhone" value="<?php echo htmlspecialchars($cKontaktServicePhoneGet) ?>" />
                        <br><br>






                        <label for="ansprechpartnerBuchhaltung">Contact person (accounting):&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comAnsprechpartnerBuchhaltung" name="comAnsprechpartnerBuchhaltung" value="<?php echo htmlspecialchars($cKontaktBuchhaltungGet) ?>" />

			<br><br>






			&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<label for="ansprechpartnerBuchhaltungMail">Mail: &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comAnsprechpartnerBuchhaltungMail" name="comAnsprechpartnerBuchhaltungMail" value="<?php echo htmlspecialchars($cKontaktBuchhaltungMailGet) ?>" />
                        <br><br>

			&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<label for="ansprechpartnerBuchhaltungPhone">Phone: &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                        <input type="text" id="comAnsprechpartnerBuchhaltungPhone" name="comAnsprechpartnerBuchhaltungPhone" value="<?php echo htmlspecialchars($cKontaktBuchhaltungPhoneGet) ?>" />
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





