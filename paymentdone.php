<?php 
include('./dbConnection.php');
session_start();
if(!isset($_SESSION['stuLogEmail'])) {
 echo "<script> location.href='loginorsignup.php'; </script>";
} else { 
 date_default_timezone_set('Asia/Delhi');
 $date = date('d-m-y h:i:s');
 if(isset($_POST['ORDER_ID']) && isset($_POST['TXN_AMOUNT'])){
  $order_id = $_POST['ORDER_ID'];
  $stu_email = $_SESSION['buyerLogEmail'];
  $course_id = $_SESSION['course_id'];
  $status = "Success";
  $respmsg = "Done";
  $amount = $_POST['TXN_AMOUNT'];
  $date = $date;
  $sql = "INSERT INTO courseorder(order_id, buyer_email, course_id, status, respmsg, amount, order_date) VALUES ('$order_id', '$buyer_email', '$course_id', '$status', '$respmsg', '$amount', '$date')";
   if($conn->query($sql) == TRUE){
    echo "Redirecting to My Profile....";
    echo "<script> setTimeout(() => {
     window.location.href = './Buyer/myCourse.php';
   }, 1500); </script>";
   };
 } else {
 echo "<b>Transaction status is failure</b>" . "<br/>";
 }
}
?>