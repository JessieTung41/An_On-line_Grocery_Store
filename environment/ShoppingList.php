<?php
    $link = mysqli_connect("aa1l7yebseq72pr.cfp6uymaslvn.us-east-1.rds.amazonaws.com", "Assignment", "123456789", "assignment1") or die("Could not connect to Server");
    $id = $_GET['product_id'];
    $query_string = "select * from products";
    $result = mysqli_query($link, $query_string);
    
    $num_rows = mysqli_num_rows($result);
    print "<center>";
    if(isset($id)){
        if($num_rows > 0) {
            while($a_row = mysqli_fetch_assoc($result)){
                if($a_row['product_id'] == $id){
                    $name = $a_row['product_name'];
                    $unit_price = $a_row['unit_price'];
                    $unit_quantity = $a_row['unit_quantity'];
                    $in_stock = $a_row['in_stock'];
                    $img_path = $a_row['imgpath'];
                }
            }
            print "<table>";
            print "<tr><td>Product_ID</td><td>Product_name</td><td>Unit_price</td><td>Unit_quantity</td><td>In_stock</td></tr>"; 
            print "<tr>";
            print "<td>$id</td><td>$name</td><td>$unit_price</td><td>$unit_quantity</td><td>$in_stock</td>";
            print "</tr>";
            print "</table>";
            print "<br>";
            print "<br>";
        }
         
    }
    else {
        print "Please select the product";
    }
    print "</center>";
    mysqli_close($link);
?>

<html>
    <head>
        <style type="text/css">
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                text-align: center;
            }
            .prod{
                width: 140px;
                height: 140px;
            }
        </style>
        <title>Shopping List</title>
    </head>
    <body style="background-color: rgb(204, 177, 205);">
        <center>
        <div>
            <?php if(isset($id)) { ?>
            <img src="<?php echo $img_path ?>" class="prod"><br><br>
            <form method="GET" onsubmit="return validate()" action="ShoppingCart.php" target="cart">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="hidden" name="name" value="<?php echo $name ?>">
                <input type="hidden" name="unit_price" value="<?php echo $unit_price?>">
                <input type="hidden" name="unit_quantity" value="<?php echo $unit_quantity?>">
                <input type="hidden" name="in_stock" value="<?php echo $in_stock?>">
                <label>Enter Amount: </label>
                <input type="number" name="amount" id="amount">
                <input type="submit" value="Add to cart">
            </form>
            <?php }?>
            </center>
            <script type="text/javascript">
                function validate(){
                    if(document. getElementById("amount").value == " "){
                        alert("Please enter the quantity");
                        return false;
                    }
                    if(document.getElementById("amount").value > 200 || document.getElementById('amount').value <= 0){
                        alert("Please enter realistic quantities");
                        return false;
                    }
                    return true;
                }
            </script>
        </div>
    </body>
</html>