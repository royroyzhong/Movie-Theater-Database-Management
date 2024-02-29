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
            // echo ($att=="count");
            // count is not work good here
            
            if ($att == "count"){
            echo "<tr>
            <th>Director</th>
            <th>Box_office</th>";}
            else{
                echo "<tr>
                <th>Director</th>
                <th>Box_office</th>";
            }

            while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {

                
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . 
                "</td><td>" . $row[3] .
                "</td><td>" . $row[5] 

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
            
            $att = $_POST['insBoxOff'];
            // echo $att;
            $result = executePlainSQL("SELECT Director,min(Box_office) 
            FROM Movie_1 as m, Profitable_Movie as p WHERE m.ID = p.ID Group by Director Having min(Box_office)>=$att");
            echo printResult($result,$att);

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
		if (isset($_POST['insertHav'])){
            // echo'in150';
            handlePOSTRequest(); //insert
            // echo 'afterHandle';
        } else if (isset($_GET['countTupleRequest1'])) {

            handleGETRequest(); // show table
        }

		?>
        <button onclick="goBack()">Back</button>
</html>