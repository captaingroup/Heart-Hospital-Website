    <?php
	$patientID = $_GET["id"] ;
	
    // DB connection info
    //TODO: Update the values for $host, $user, $pwd, and $db
    //using the values you retrieved earlier from the portal.
    $host = "sql3.freemysqlhosting.net";
    $user = "sql331497";
    $pwd = "sI2*yG2*";
    $db = "sql331497";
    // Connect to database.
    try {
        $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch(Exception $e){
        die(var_dump($e));
		echo 'did not work';
    }
		
    // Retrieve data
    $sql_select = "SELECT `Device Name`, `Reading` FROM `4-Sensors` WHERE `Patient ID` = ".$patientID." AND `Device Name` = 'Water Content' ORDER BY `Time Stamp` DESC LIMIT 1";
    $stmt = $conn->query($sql_select);
    $patients = $stmt->fetchAll(); 
    if(count($patients) > 0) {
        foreach($patients as $patient) {
			
			echo "<h5>".$patient['Device Name']." ".$patient['Reading']."</h5>";
        }
    } else {
    }
?>
