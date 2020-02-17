
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <script src="js/functions.js"></script>
    <title>Code Assessment Juan Paredes</title>

</head>
<body>
<!-- Form-->

<form accept-charset="UTF-8" action="php/action_page.php" autocomplete="on" method="POST" id='user_form' >
    <fieldset>
        <h3>Guest Information</h3>
        <label >First Name</label><br />
        <input name="first_name" type="text" value="" required/> <br />

        <label >Last Name</label><br />
        <input name="last_name" type="text" value="" required/> <br />

        <label >Email</label><br />
        <input name="email" type="email" value="" required/> <br />

        <input name="email_list" type="checkbox" value="1" checked/> Include in email list<br /> <br />

        <h3 >Cruise Preference</h3>

        <input checked="checked" name="brand" type="radio" value="R" onclick="getRadioVal(this);"/> Royal
        <input name="brand" type="radio" value="Z" onclick="getRadioVal(this);"/> Azamara
        <input name="brand" type="radio" value="C" onclick="getRadioVal(this);"/> Celebrity<br /><br />


        <select id="ship_selector" name="ship" required>
            <option value="Mariner of the Seas" name="ship">Mariner of the Seas</option>
            <option selected value="Liberty of the Seas" name="ship">Liberty of the Seas</option>
            <option value="Oasis of the Seas" name="ship">Oasis of the Seas</option>
        </select><br /><br />

        <label for="sail_date">Sail Date:</label>
        <input type="date" id="sail_date" name="sail_date" onclick="sailingDates()" required><br /><br />

        <label >Comments</label><br />
        <textarea cols="30" rows="5" maxlength="500" name="comment" id="comment"></textarea><br />

        <button type="submit" value="Submit" >Submit</button>
        <button type="reset" value="Reset">Reset</button><br/><br/>

        <?php
            session_start();
            if( isset($_SESSION['msg']) )
            {
                echo "<label id ='validation'>" .$_SESSION['msg']. "</label>";
                unset($_SESSION['msg']);
            }

            if( isset($_SESSION['brand']) )
                        {
                            echo $__SESSION['brand'];
            unset($_SESSION['brand']);
                        }
        ?>
            </fieldset>
        </form>
        <hr/>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Brand</th>
                <th>Mail List</th>
                <th>Ship</th>
                <th>Sail Date</th>
                <th>Comments</th>
                <th>Action</th>
            </tr>
            <?php
                require_once('php/config.php');
                $db=$config['db'];

                $conn= new mysqli($db['host'],$db['user'],$db['password']);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                else{
                    $result = $conn->query("SELECT * FROM juanpare_testing_db.guest_registration;");

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        if($row["brand"] == "Z"){
                            $row["brand"] = "Azamara";
                        }
                        if($row["brand"] == "R"){
                            $row["brand"] = "Royal Caribbean";
                        }
                        if($row["brand"] == "C"){
                            $row["brand"] = "Celebrity";
                        }

                        if($row["email_list_flag"] == "1"){
                            $row["email_list_flag"] = "yes";
                        }
                        if($row["email_list_flag"] == "0"){
                            $row["email_list_flag"] = "no";
                        }

                        echo "<tr><td>" . $row["first_name"]." ". $row["last_name"]. "</td>
                                  <td>" . $row["email_address"] . "</td>
                                  <td>" . $row["brand"]. "</td>
                                  <td>" . $row["email_list_flag"]. "</td>
                                  <td>" . $row["ship"]. "</td>
                                  <td>" . $row["sail_date"]. "</td>
                                  <td>" . $row["comments"]. "</td>
                                  <td> <a href= \"php/delete.php?id=".$row['personal_id']."\">Delete</a></td>
                              </tr>";
                    }
                    echo "</table>";
                    }
                    else { echo "0 Users registered"; }
                    $conn->close();
                    }

            ?>

        </table>
</body>
</html>