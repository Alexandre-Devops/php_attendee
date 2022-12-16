<?php

$title='Success';
require_once 'includes/header.php';
require_once 'db/conn.php';



if(isset($_POST['submit'])){
//extract values from the $_POST array
$fname = $_POST['fristname'];
$lname = $_POST['lastname'];
$dob = $_POST['dob'];
$email =$_POST['email'];
$contact = $_POST['phone'];
$specialty = $_POST['specialty'];
//call function to insert and track if success or not 
$isSuccess = $crud->insert($fname, $lname, $dob, $email, $contact, $specialty); 

if($isSuccess)
 echo '<h1 class ="text-center text-success">You Have Been Registered!</h1>';
 
}
else{

    echo '<h1 class="text-center text-danger"> There was an error in processing   </h1>';
}
?>


<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php
echo $_POST['fristname']. ' '. $_POST['lastname'];?>
</h5>
    <h6 class="card-subtitle mb-2 text-muted"> <?php echo $_POST['specialty'];?> </h6>

    <p class="card-text">Date of Birth: <?php
echo $_POST['dob'];?></p>
 <p class="card-text">Email: <?php
echo $_POST['email'];?></p>
 <p class="card-text">Phone: <?php
echo $_POST['phone'];?></p>
 
  </div>
</div>

<br/>
<br/>
<br/>
<br/>
<br/>
<?php require_once 'includes/footer.php';  ?>