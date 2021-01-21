<?php include "includes/header.php" ?>
<?php if(isset($_SESSION['username'])){
 include "includes/navigation_user.php";
}else{
 include "includes/navigation.php";
}
?>

<div class="container">
    <h2 class="text-center"><b>Your Order Has Been Placed</b></h2><br>
    <img style="width:1000px;height:350px;" src="./images/thank_you.png" alt="">
    <h5 class="text-muted text-center">We will contact you and let you know when your product deliver
    <br> or when you've to come for pickeup based on your delivery choice within 2-3 hours.<br>if any querries please <a href="">contact us</a></h5>
</div>















<?php include "includes/footer.php" ?>