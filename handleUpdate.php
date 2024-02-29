<html>

<h2>Show all the Customers in List</h2>
        <form method="GET" action="handleUpdate.php">
            <input type="hidden" id="countTupleRequest1" name="countTupleRequest1">
            <input type="submit" name="AllTuples"></p>
        </form>

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

        function printResult($result) {
            echo "<br>The Customers in our list:<br>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Email</th><th>Staff_ID</th><th>Phone_num<tr><th>Name";

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Staff_ID"] . "</td><td>" . $row["Phone_num"] . "</td><td>" . $row["Name"]; 
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











        function handleUpdateRequest() {
          global $db_conn;

          $id = $_POST["id"];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $name = $_POST['name'];

          echo "Update Successfully, You Can Check It Now";


          // you need the wrap the old name and new name values with single quotations
          executePlainSQL("UPDATE Customer_Help SET name='" . $name . "', Email='" . $email . "', Phone_num='" . $phone . "' WHERE id='" . $id . "'");
          $db_conn->commit();
      }















        function handleCountRequest1() {
            global $db_conn;

            $result = executePlainSQL("SELECT* FROM Customer_Help");
            echo printResult($result);
        }

        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('updateQueryRequest', $_POST)) {
                    handleUpdateRequest();
                }
                
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


		if (isset($_POST['updateSubmit'])) {
            handlePOSTRequest(); 
    } else if (isset($_GET['countTupleRequest1'])) {
      handleGETRequest(); 
    }
		?>
</html>