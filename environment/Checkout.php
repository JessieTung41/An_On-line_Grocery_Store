<html>
<head>
    <style type="text/css">
        .Order{
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }
    </style>
    <title>Checkout</title>
</head>
<body>
    <table class="Order">
        <tr class="Order">
            <td class="Order">Your Order</td>
            <td class="Order">Amount</td>
            <td class="Order">Price</td>
        </tr>
        <?php
            session_start();
            foreach ($_SESSION['cart'] as $product => $info){
        ?>
        <tr class="Order">
            <td class="Order"><?php echo $info['name'] ?></td>
            <td class="Order"><?php echo $info['amount']?></td>
            <td class="Order"><?php echo $info['product_total']?></td>
        </tr>
       <?php }?>
        <tr class="Order">
            <td class="Order">Total</td>
            <td class="Order" colspan="2"><?php echo $_SESSION['total'] ?></td>
        </tr>
        <?php
        session_destroy();
        ?>
    </table>
   
    <p>Purchase Form: </p>
    <table>
        <form method="POST" action=Confirmation.php onsubmit="return validate()">
            <tr>
                <td><label>First Name<span style="color: red;">*</span>: </label></td>
                <td><input type="text" name="fn" id="fn"></td>
            </tr>
            <tr>
                <td><label>Last Name<span style="color: red;">*</span>: </label></td>
                <td><input type="text" name="ln" id="ln"></td>
            </tr>
            <tr>
                <td><label>Address<span style="color: red;">*</span>: </label></td>
                <td><input type="text" name="address" id="address"></td>
            </tr>
            <tr>
                <td><label>Suburb<span style="color: red;">*</span>: </label></td>
                <td><input type="text" name="suburb" id="suburb"></td>
            </tr>
            <tr>
                <td><label>State<span style="color: red;">*</span>: </label></td>
                <td><input type="text" name="state" id="state"></td>
            </tr>
            <tr>
                <td><label>Country<span style="color: red;">*</span>: </label></td>
                <td><input type="text" name="country" id="country"></td>
            </tr>
            <tr>
                <td><label>Email<span style="color: red;">*</span>: </label></td>
                <td><input type="text" name="email" id="email"></td>
            </tr>   
            <tr>
                <td><input type="submit" name"purchase" value="Purchase"><td>
                <td></td>
            </tr>
    </form>
    </table>
    <script type="text/javascript">
        function validate()
        {
 
            if (document.getElementById("fn").value=="")
            {
                alert("Please enter your first Name");
                return false;
            }
            if (document.getElementById("ln").value=="")
            {
                alert("Please enter your last Name");
                return false;
            }
            if (document.getElementById("address").value=="")
            {
                alert("Please enter your address");
                return false;
            }
            if (document.getElementById("suburb").value=="")
            {
                alert("Please enter your suburb");
                return false;
            }
            if (document.getElementById("state").value=="")
            {
                alert("Please enter your state");
                return false;
            }
            if (document.getElementById("country").value=="")
            {
                alert("Please enter your country");
                return false;
            }
            if (document.getElementById("email").value=="")
            {
                alert("Please enter your email");
                return false;
            }
            var email = document.getElementById('email').value;
            if(email.split("@").length == 1 || email.split(".").length == 1){
                alert("Wrong email address");
                return false;
            }
            return true;  
        }
    </script>
</body>
</html>