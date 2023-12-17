<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table with Edit/Delete Buttons</title>
    <style>
        /* Your CSS styles remain unchanged */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        .edit-btn, .delete-btn, .view-btn{
            padding: 5px 10px;
            cursor: pointer;
            display: inline-block;
            width: 70px;
            margin: 2px 5px;
        }

        .edit-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
        }
        .view-btn {
            background-color: #1b80de;
            color: white;
            border: none;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
            border: none;
        }

        #actn{
            width: 20px;
        }


        #popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            z-index: 1000;
        }

        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

    </style>
</head>
<body>

    <table>
        <thead>
            <tr>
                <th>FLock ID</th>
                <th>Flock Name</th>
                <th>Date Acquired</th>
                <th>Type of Bird</th>
                <th>Breed</th>
                <th>Source</th>
                <th>Actions</th>
            </tr>
        </thead>





























        
        <?php
require("conn.php");

if (isset($_POST['submit'])) {
    $flockid = $_POST['editid'];
    $flockName = $_POST['editflock'];
    $flockDate = $_POST['editdate'];
    $typeofbird = $_POST['edittype'];
    $breed = $_POST['editbreed'];
    $sourceOfFlocks = $_POST['editSourceofFlocks'];

    // Specify the columns and values in the SET part of the UPDATE statement
    $sql = "UPDATE flockmanagement SET 
            flock = '$flockName', 
            date = '$flockDate', 
            type = '$typeofbird', 
            breed = '$breed', 
            SourceofFlocks = '$sourceOfFlocks' 
            WHERE id = '$flockid'";

    $queryResult = mysqli_query($conn, $sql);

    if ($queryResult) {
        echo "<script>alert('Record Updated');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
    } else {
        // Handle other cases if needed
    }

?>
        <div id="overlay"></div>
        <div id="popup">
            <h2>Flock Information</h2>
            <form id="flockForm" method="POST" action="dump.php" >
                <label for="flockid">Flock ID:</label>
                <input type="text" name="editid" id="flockName" required>   
                
                <label for="flockname">Flock Name:</label>
                <input type="text" name="editflock" id="flockName" required>

                <label for="flockname">Date Acquired:</label>
                <input type="date" id="dateInput" name="editdate">

                <label for="birdType">Type of Bird:</label>
                <select name="edittype" id="cars">
                    <option value="Hen">Hen</option>
                    <option value="Rooster">Rooster</option>
                    <option value="Chicks">Chicks</option>
                </select>

                <label for="birdBreed">Breed:</label>
                <input type="text" name="editbreed" id="birdBreed" required>

                <label for="source">Source:</label>
                <input type="text" name="editSourceofFlocks" id="SourceofFlocks" required>

                <button type="submit" name="submit">Submit</button>

            </form>
        </div>    












































<!-- to retrievw data-->        
        <?php
        require("conn.php");

        $sql = mysqli_query($conn, "SELECT * FROM flockmanagement");
        $count = 1;
        while ($row = mysqli_fetch_array($sql)) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['flock']; ?></td>
                    <td><?php echo $row['date']; ?> </td>
                    <td><?php echo $row['type']; ?></td>
                    <td><?php echo $row['breed'];?></td>
                    <td><?php echo $row['SourceofFlocks'];?></td>
                    <td id="actn">
                    <button class="edit-btn" onclick="editRow()">Edit</button>
                        <form id="flockForm" method="POST" action="dump.php">    
                            <?php 
                            if (isset($_POST["deleteID"])) {
                                $deleteid = $_POST["deleteID"];
                                $deleteSql = "DELETE FROM flockmanagement WHERE id = '$deleteid'";
                                $deleteQueryResult = mysqli_query($conn, $deleteSql);
                            
                                if ($deleteQueryResult) {
                                    echo "<script>alert('Record Deleted');</script>";
                                } else {
                                    echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
                                }
                            }
                            ?>
                                         
                            <input type="hidden" name="deleteID" id="deleteID">
                            <button class="delete-btn" onclick="setDeleteID(<?php echo $row['id']; ?>)">Delete</button>
                            <script>
                            function setDeleteID(id) {
                                document.getElementById('deleteID').value = id;
                            }
                        </script>

                        </form>
                        <a href="hays.php"><button class="view-btn" onclick="viewRow(this)">View</button></a>
                    </td>
                </tr>
            </tbody>
        <?php
            $count = $count + 1;
            } // Closing while loop
        ?>     
    </table>

    <script>
    function editRow() {
        document.getElementById('popup').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
    }

    function closePopup() {
        document.getElementById('popup').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
        // You can add additional logic here, like clearing form fields.
    }

    function submitForm() {
        // Add your logic to handle the form submission here.
        // For simplicity, this example just closes the popup.
        closePopup();
    }
    </script>



</body>
</html>
