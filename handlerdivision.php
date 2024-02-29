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
            // echo "<br>The $att in the list:<br>";
            echo "<table>";
            // echo "<tr><th>$att</th>";
            // echo "<tr><th>ID</th>
            // <th>Name</th>
            // <th>Year</th>
            // <th>Director</th>
            // <th>ProductID</th>
            // <th>Price</th>
            // <th>Location</th>
            // <th>Theatre Name";

            while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {

                
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] .
                "</td><td>" . $row[4] .
                "</td><td>" . $row[6] .
                "</td><td>" . $row[7] .
                "</td><td>" . $row[8]
                ; 
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
            // $att = $_POST['insJoinTable'];
            
            $att = $_POST['insDivTable'];


            // $result = executePlainSQL("SELECT Distinct MID FROM Play_at  as p1 Where NOT EXISTS ( SELECT * From Movies_Theatre as m Where NOT EXISTS 
            // (Select * From Play_at  as p2 WHERE p1.MID = p2.MID and m.Name=p2.Name and m.Location = p2.Location))");

    $result = executePlainSQL("SELECT Distinct mv1.Name FROM Play_at as p1 , Movie_1 as mv1 Where mv1.ID = p1.MID 
    and NOT EXISTS ( SELECT * From Movies_Theatre as m Where NOT EXISTS 
    (Select * From Play_at  as p2 WHERE p1.MID = p2.MID and m.Name=p2.Name and m.Location = p2.Location))");


        //     if ($att == "PopCorn"){
        //     $result = executePlainSQL("SELECT * FROM Movie_1 as m,Peripheral_Merchandise_Sell_Own as p WHERE m.ID = p.MID and Price >100");
        // } else{
        //     $result = executePlainSQL("SELECT * FROM Movie_1 as m,Peripheral_Merchandise_Sell_Own as p WHERE m.ID = p.MID and Price <100");
        // }


            echo printResult($result,"*");
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

        // echo "check";
        // echo $_POST['insTableAll'];
		if (isset($_POST['insertDiv'])){

            handlePOSTRequest(); //insert
            // echo 'afterHandle';
        } else if (isset($_GET['countTupleRequest1'])) {

            handleGETRequest(); // show table
        }

		?>
        <button onclick="goBack()">Back</button>
</html>