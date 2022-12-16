<?php $title = 'View Records';
require_once'includes/header.php';
require_once'db/conn.php';

if(!isset($_GET['id']))
{
    echo "<h1 class='text-danger'>Please check detais and try again</h1>";
}else{
   
    $id = $_GET['id'];
    $result = $crud->getAttendeeDetails($id);



?>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php
echo $result['fristname']. ' '. $result['lastname'];?>
</h5>
    <h6 class="card-subtitle mb-2 text-muted"> <?php echo $result['name'];?> </h6>

    <p class="card-text">Date of Birth: <?php
echo $result['dateofbirth'];?></p>
 <p class="card-text">Email: <?php
echo $result['emailadress'];?></p>
 <p class="card-text">Phone: <?php
echo $result['contactnumber'];?></p>
 
  </div>
</div>
<?php } ?>
<br/>
<br/>
<br/>


<?php require_once 'includes/footer.php' ?>