<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Bookings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <section class="payment">
    <?php
        $connection = mysqli_connect('localhost', 'root', '', 'book_db');
        if (isset($_POST['payd'])) {
            $fullName = $_POST['fullName'];
            $cardNumber = $_POST['cardNumber'];
            $expiryDate = $_POST['expiry'];
            $cvv = $_POST['cvv'];
            
            if (empty($fullName) || empty($cardNumber) || empty($expiryDate) || empty($cvv)) {
                echo "Please fill all fields.";
            } else {
                $sqlRequest = "INSERT INTO payments (full_name, card_number, expiry_date, cvv) VALUES ('$fullName', '$cardNumber', '$expiryDate', '$cvv')";
                
                if (mysqli_query($connection, $sqlRequest)) {
                    echo "Payment successfully recorded.";
                } else {
                    echo "Error: " . $sqlRequest . "<br>" . mysqli_error($connection);
                }
            }
            mysqli_close($connection);
        }
    ?>
    <div class="paymentcontainer">
        <h1>Payment Details</h1>
        <form action="payment.php" class="paymentform" method="post">
            <div>
                <label for="cardName">Full Name</label>
                <input type="text" placeholder="First name Last name" id="cardName" name="fullName" required>
            </div>
            <div>
                <label for="cardNumber">Card Number</label>
                <input type="text" placeholder="1234 5678 9012 3456" id="cardNumber" name="cardNumber" required>
            </div>
            <div>
                <label for="expiry">Expiry Date (MM/YY)</label>
                <input type="text" placeholder="MM/YY" id="expiry" name="expiry" required>
            </div>
            <div>
                <label for="cvv">CVV</label>
                <input type="number" placeholder="123" id="cvv" name="cvv" maxlength="3" required>
            </div>
            <div id="errorMessage" class="error"></div>
            <button name="payd" type="submit">Pay Now</button>
        </form>
    </div>
    </section>
</body>
<style>
    body {
        height: 100%;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: Arial, sans-serif;
    }
    .paymentcontainer {
        max-width: 500px;
        width: 100%;
        padding: 20px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        background: white;
    }
    form {
        background: #f4f4f4;
        padding: 30px;
        border-radius: 9px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    label {
        display: block;
        margin-bottom: 5px;
    }
    input[type="text"],
    input[type="number"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
    }
    button {
        display: block;
        width: 100%;
        padding: 10px;
        background: #0005f5;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }
    button:hover {
        background: #1ca879;
    }
    .error {
        color: red;
        margin-bottom: 10px;
    }
</style>
</html>
