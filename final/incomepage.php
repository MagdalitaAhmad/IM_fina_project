<?php
require("conn.php");

if(isset($_POST['submited'])){
    $flockName = $_POST['flock'];
    $flockDate = $_POST['date'];
    $itemsold = $_POST['itemsold'];
    $qty= $_POST['qty'];
    $amount = $_POST['amount'];
    $mop = $_POST['mop'];
    $pstatus = $_POST['pstatus'];
    $soldto = $_POST['soldto'];

    // Specify the columns and values in the INSERT INTO statement
    $sql = "INSERT INTO income (flocks,	date,	itemsold, qty, amount, mop,	pstatus,	soldTo	) 
    VALUES ('$flockName', '$flockDate', '$itemsold', '$qty', '$amount', '$mop', '$pstatus', '$soldto')";

    $queryResult = mysqli_query($conn, $sql);

    if($queryResult){
        echo "<script>alert('New Record Added');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}else{

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        #popuper {
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

        #overlayer {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
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


        #flockForm {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px; /* Adjust the gap as needed */
    }

    #flockForm label {
        display: block;
    }

    #flockForm input {
        width: 100%;
        box-sizing: border-box;
        margin-bottom: 5px; /* Adjust the margin as needed */
    }
    </style>
</head>
<body>

<button class="edit-btn" onclick="editRow()">Add Flocks</button>

<div id="overlay"></div>
    <div id="popup">
        <h2>Flock Information</h2>
        <form id="flockForm" action="incomepage.php" method="POST">
            <label for="flockid">Flock ID:</label>
            <input type="text" name="flockid" id="flockName" required>

            <label for="flockname">Flock Name:</label>
            <input type="text" name="flock" id="flockName" required>

            <label for="flockname">Date Spend:</label>
            <input type="date" id="DateSpend" name="date">

            <label for="birdType">Type of Item:</label>
            <input type="text" name="itemsold" id="itemsold" required>

            <label for="birdBreed">Quantity:</label>
            <input type="text" name="qty" id="qty" required>

            <label for="source">Income Amount:</label>
            <input type="text" name="amount" id="amount" required>

            <label for="source">Payment Method:</label>
            <input type="text" name="mop" id="mop" required>

            <label for="source">Payment Status:</label>
            <input type="text" name="pstatus" id="status" required>

            <label for="source">Sold To:</label>
            <input type="text" name="soldto" id="soldto" required>

            <button type="submit" name="submited">Submit</button>
        </form>
    </div>   
    </div>   
    


   
    <?php
require("conn.php");

$sql = mysqli_query($conn, "SELECT * FROM income");
$count = 1;


while ($row = mysqli_fetch_array($sql)) {
    ?>
        <a href="#">
            <div class="cat-info">
                <h2><?php echo $row['flocks']?></h2>
                <p><strong>Date Acquired:</strong> <?php echo $row['date']?></p>
                <p><strong>Buyer:</strong> <?php echo $row['soldTo']?></p>
                <p><strong>Item Sold:</strong> <?php echo $row['itemsold']?></p>
                <p><strong>Amount:</strong> <?php echo $row['amount']?></p>
            </div>

            
        </a>
        <div class="btn-container">
            <a href="income.php"><button class="edit-btn" onclick="editRows()">EDIT</button></a>
            <button type="submit" name="submit" >DELETE</button>
            </div>
    <?php
    $count = $count + 1;
}
?>      


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

<script>
    function editRows() {
        document.getElementById('popuper').style.display = 'block';
        document.getElementById('overlayer').style.display = 'block';
    }

    
    </script>

</body>


</html>