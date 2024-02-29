<html>
<!-- <h2>Show all the Movies in List</h2> -->
        <!-- <form method="GET" action="handlerinsert.php">
            <input type="hidden" id="countTupleRequest1" name="countTupleRequest1">
            <input type="submit" name="AllTuples"></p>
        </form> -->
        

<script>
function goBack() {
  window.history.back();
}
</script>
<?php
        $success = True;
        $db_conn = NULL; 
        $show_debug_alert_messages = False;

        function debugAlertMessage($message) {
            global $show_debug_alert_messages;

            if ($show_debug_alert_messages) {
                echo "<script type='text/javascript'>alert('" . $message . "');</script>";
            }
        }

        function executePlainSQL($cmdstr) { 
            global $db_conn, $success;
            $result = $db_conn-> query($cmdstr);
            return $result;
        }

        function executeBoundSQL($cmdstr, $list, $types) {
            global $db_conn, $success;
            $stmt = $db_conn->prepare($cmdstr);
            $stmt->bind_param($types, $list[0], $list[1],$list[2],$list[3]);
            $result = $stmt->execute();
            return $result;
        }

        function printResult($result, $att) {
            echo "<br>The $att in the list:<br>";
            echo "<table>";
            // echo "<tr><th>$att</th>";

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo "<tr><td>" . $row["Name"] . "</td><td>" . $row["Type"] . "</td><td>" . $row["Director"] . "</td><td>" . $row["Language"]; 
            }

            echo "</table>";
        }

        function printResult1($result) {
            echo "<br>In the list:<br>";
            echo "<table>";
            // echo "<tr><th>$att</th>";

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo "<tr><td>" . $row["Name"] . "</td><td>" . $row["Type"] . "</td><td>" . $row["Director"] . "</td><td>" . $row["Language"]; 
            }

            echo "</table>";
        }

        function console_log( $data ){
          echo '<script>';
          echo 'console.log('. json_encode( $data ) .')';
          echo '</script>';
        }


        function connectToDB() {
            global $db_conn;

            // echo "before";
            $db_conn= new mysqli("dbserver.students.cs.ubc.ca", "rzhong01", "a38917878", "rzhong01");
            if ($db_conn->connect_error) {
                debugAlertMessage('Connect Failed' . $db_conn->connect_error);
                // echo "false";
                return false;
            } else {
                debugAlertMessage('Successfully Connected to MYSQL');
                // echo "true";
                return true;
            }

            

        }

        function disconnectFromDB() {
            global $db_conn;

            debugAlertMessage("Disconnect from Database");
            $db_conn->close();
        }

        function handleInsertRequest() {
            global $db_conn;
            $att = $_POST['insTableAll'];

            $att1 = $_POST['vehicle1'];
            $att2 = $_POST['vehicle2'];
            $att3 = $_POST['vehicle3'];
            $att4 = $_POST['vehicle4'];
            $attA ="Name,Type,Director,Language" ;
            if($att1 == NULL ){
                $attA=str_replace("Name,", '', $attA) ;
            }

            if($att2 == NULL ){
                $attA=str_replace("Type,", '', $attA) ;
            }
            if($att3 == NULL ){
                $attA=str_replace("Director,", '', $attA) ;
            }
            if($att4 == NULL ){
                $attA=str_replace(",Language", '', $attA) ;
                $attA=str_replace("Language", '', $attA) ;
            }               

            $result = executePlainSQL("SELECT $attA FROM Movie_2");
            // echo "95";
            echo printResult1($result);

        //     if ($att == 'Name'){
        //     $result = executePlainSQL("SELECT $att FROM Movie_2");
        // }
        // else{
        //     $result = executePlainSQL("SELECT DISTINCT $att FROM Movie_2");
        // }


        //     echo printResult($result,$att);
            
        }


        function handlePOSTRequest() {
            if (connectToDB()) {



                    handleInsertRequest();

                    
                disconnectFromDB();
            }
        }

        function handleGETRequest() {
            if (connectToDB()) {
                if(array_key_exists('AllTuples', $_GET)) {
                    handleCountRequest1();
                }

                disconnectFromDB();
            }
        }
        // $att = $_POST['vehicle1'];
        // echo $att;
        // $att2 = $_POST['vehicle2'];
        // echo $att2 == NULL;

        // echo gettype($att2);
        handlePOSTRequest();
        // // echo $_POST['insTableAll'];
		// if (isset($_POST['insertProjection'])){
        //     echo "check";
        //     handlePOSTRequest(); //insert
        //     // echo 'afterHandle';
        // } else if (isset($_GET['countTupleRequest1'])) {
        //     echo "check128";
        //     handleGETRequest(); // show table
        // }


		?>
        <button onclick="goBack()">Back</button>
</html>