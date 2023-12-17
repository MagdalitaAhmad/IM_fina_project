<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

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
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .button-container {
            display: flex;
            justify-content: space-around;
        }

        #popup {
            width: 500px;
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
            display: flex;
        }

        button {
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        #itemtype, #qty{
            display: inline;
        }


        #income {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px; /* Adjust the gap as needed */
    }

    #income label {
        display: block;
    }

    #income input {
        width: 100%;
        box-sizing: border-box;
        margin-bottom: 5px; /* Adjust the margin as needed */
    }
    </style>
</head>
<body>

/<?php
require("conn.php");

if(isset($_POST['update'])){
    $flockid = $_POST['flockid'];
    $flockName = $_POST['flock'];
    $flockDate = $_POST['date'];
    $itemsold = $_POST['itemsold'];
    $qty = $_POST['qty'];
    $amount = $_POST['amount'];
    $mop = $_POST['mop'];
    $pstatus = $_POST['pstatus'];
    $soldto = $_POST['soldto'];

    // Specify the columns and values in the SET part of the UPDATE statement
    $sql = "UPDATE income SET 
            flocks = '$flockName', 
            date = '$flockDate', 
            itemsold = '$itemsold', 
            qty = '$qty', 
            amount = '$amount',
            mop = '$mop',
            pstatus = '$pstatus',
            soldTo = '$soldto'
            WHERE id = '$flockid'";

    $queryResult = mysqli_query($conn, $sql);

    if ($queryResult) {
        echo "<script>alert('Record Updated');</script>";
    } else {
        echo "<script>alert('Error updating record: " . mysqli_error($conn) . "');</script>";
    }
} else {
    // Handle other cases if needed
}
?>


<div id="overlay"></div>
    <div id="popup">
        <h2>Flock Information</h2>
        <form id="income" action="income.php" method="POST">
            <label for="flockid">Flock ID:</label>
            <input type="text" name="flockid" id="flockid" required>

            <label for="flockname">Flock Name:</label>
            <input type="text" name="flock" id="flockName" required>

            <label for="flockname">Date Spend:</label>
            <input type="date" id="DateSpend" name="date">

            <label for="birdType">Type of Item:</label>
            <input type="text" name="itemsold" id="itemsold" required>

            <label for="birdBreed">Quantity:</label>
            <input type="text" name="qty" id="qty" required>

            <label for="source">Expense Amount:</label>
            <input type="text" name="amount" id="amount" required>

            <label for="source">Payment Method:</label>
            <input type="text" name="mop" id="mop" required>

            <label for="source">Payment Status:</label>
            <input type="text" name="pstatus" id="status" required>

            <label for="source">Sold To:</label>
            <input type="text" name="soldto" id="soldto" required>

            <button type="submit" name="update">Submit</button>
        </form>
    </div>   
    </div>   


    
    <div class="maincontainer">
        <h1>Income</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Flock</th>
                    <th>Date</th>
                    <th>Sold Items</th>
                    <th>How Many</th>
                    <th>Sale Amount</th>
                    <th>Payment Method</th>
                    <th>Payment Status</th>
                    <th>Sold To</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Rows 1 to 9 -->



                <?php
        require("conn.php");

        $sql = mysqli_query($conn, "SELECT * FROM income");
        $count = 1;
        while ($row = mysqli_fetch_array($sql)) {
        ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['flocks']?></td>
                    <td><?php echo $row['date']?></td>
                    <td><?php echo $row['itemsold']?></td>
                    <td><?php echo $row['qty']?></td>
                    <td><?php echo $row['amount']?></td>
                    <td><?php echo $row['mop']?></td>
                    <td><?php echo $row['pstatus']?></td>
                    <td><?php echo $row['soldTo']?></td>
                    <td class="button-container">
                    <button class="edit-btn" onclick="editRow()">Edit</button>
                        <form id="flockForm" method="POST" action="income.php">    
                            <?php 
                            if (isset($_POST["deleteID"])) {
                                $deleteid = $_POST["deleteID"];
                                $deleteSql = "DELETE FROM income WHERE id = '$deleteid'";
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
                <!-- Repeat the above row structure for rows 2 to 9 with different data -->
        
                <!-- Row 10 -->
                <?php
                $count = $count + 1;
                } // Closing while loop
            ?> 
            </tbody>
            
        </table>
    </div>

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