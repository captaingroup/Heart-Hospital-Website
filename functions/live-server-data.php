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
    $sql_select = "SELECT `Device Name`, `Reading` FROM `4-Sensors` WHERE `Patient ID` = ".$patientID." AND `Device Name` = 'Heart Rate' ORDER BY `Time Stamp` DESC LIMIT 1";
    $stmt = $conn->query($sql_select);
    $patients = $stmt->fetchAll(); 
    
	
	
// Set the JSON header
header("Content-type: text/json");

// The x value is the current JavaScript time, which is the Unix time multiplied by 1000.
$x = time() * 1000;
// The y value is a random number
$y = $patient['Reading'];

// Create a PHP array and echo it as JSON
$ret = array($x, $y);
echo json_encode($ret);

?>
