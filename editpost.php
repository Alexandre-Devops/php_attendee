<?php

require_once 'db/conn.php';


if(isset($_POST['submit'])){

//extract values from the $_POST array
$id =$_POST['id'];
$fname = $_POST['fristname'];
$lname = $_POST['lastname'];
$dob = $_POST['dob'];
$email =$_POST['email'];
$contact = $_POST['phone'];
$specialty = $_POST['specialty'];
//call function to insert and track if success or not 
$result = $crud->editAttendee($id,$fname, $lname, $dob, $email, $contact, $specialty); 

}

else{

    echo '<h1 class="text-center text-danger"> There was an error in processing   </h1>';

}

?>
