<?php

include 'book_2.php';


?>


<?php

if(isset($_POST['submit'])){
    if( empty($_POST['email']) || empty($_POST['psw'])
        || empty($_POST['pswrepeat']) )
    {
        echo "Please fillout all required fields";
    }else{
        $email = $_POST['email'];
        $psw = $_POST['psw'];
        $pswrepeat = $_POST['pswrepeat'];
        
        $sql = "INSERT INTO book(email,psw,pswrepeat)
        VALUES('$email','$psw','$pswrepeat')";
		
		
		if( $conn->query($sql) === TRUE){
            echo "<div class='alert alert-success'>Successfully added new user</div>";
        }else{
            echo "<div class='alert alert-danger'>Error: There was an error while adding new user</div>";
        }
    }
}

?>
