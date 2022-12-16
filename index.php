<?php $title = 'Index';
require_once'includes/header.php';
require_once'db/conn.php';

$results = $crud->getSpecialties();
?>


    <h1 class="text-center">Registration for ITC!</h1>
    <form method="POST" action="success.php" >
    <div class="mb-3">
    <label for="fristname" class="form-label">Frist Name</label>
    <input type="text" name="fristname" class="form-control" id="fristname">
   
  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label">Last Name</label>
    <input type="text" name="lastname" class="form-control" id="lastname">
   
  </div>
  <div class="mb-3">
    <label for="dob" class="form-label">Date Of Birth</label>
    <input type="text" name="dob" class="form-control" id="dob">
   
  </div>
  <div class="mb-3">
    <label for="specialty" class="form-label">Area of Expertise</label>
    <select class="form-control"  id="specialty" name="specialty">
    <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) {  ?>

   
    
    <option value="<?php echo $r['specialty_id']?>"> <?php echo $r['name']?> </option>


<?php } ?>

    </select>
       
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Contact Number</label>
    <input type="text" name="phone" class="form-control" id="phone" aria-describedby="phoneHelp">
    <div id="phoneHelp" class="form-text">We'll never share your phone with anyone else.</div>
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
 <?php require_once 'includes/footer.php' ?>