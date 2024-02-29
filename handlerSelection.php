<html>
<h2>Show the chosen Movies</h2>
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


        function printResult($result) {
            echo "<br>The movies in your list:<br>";
            echo "<table>";
            echo "<tr><th>Name</th><th>Type</th><th>Director</th><th>Language";

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

            $db_conn= new mysqli("dbserver.students.cs.ubc.ca", "rzhong01", "a38917878", "rzhong01");
            if ($db_conn->connect_error) {
                debugAlertMessage('Connect Failed' . $db_conn->connect_error);
                return false;
            } else {
                debugAlertMessage('Successfully Connected to MYSQL');
                return true;
            }

            

        }

        function disconnectFromDB() {
            global $db_conn;

            debugAlertMessage("Disconnect from Database");
            $db_conn->close();
        }

        //Select Query
        function handleSelectRequest() {

            global $db_conn;

            $att = $_POST['selTableAll'];
            $att1 = $_POST['selLan'];
            $result = executePlainSQL("SELECT * FROM Movie_2 m WHERE m.Type = \"$att\" AND m.Language=\"$att1\"");
            echo printResult($result);
        }


    

        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('selectQueryRequest', $_POST)) {
                    handleSelectRequest();
                }

                disconnectFromDB();
            }
        }

    


		if (isset($_POST['selectSubmit'])){
            handlePOSTRequest(); //insert
        }

		?>
</html>