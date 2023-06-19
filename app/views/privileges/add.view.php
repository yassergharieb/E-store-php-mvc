






<form  method="post" enctype="application/x-www-form-urlencoded">
  
    <?php if  (isset($_SESSION['error'])) { ?>

<p class="bg-danger">   <?php  echo $_SESSION['error'] ?> </p>

<?php } 
unset($_SESSION['error']);

?>

  
           
<div class="container-fluid pt-4 px-4">

<div class="row g-4">

    <div class="col-sm-12 col-xl-6">
        <div class="bg-secondary rounded h-100 p-4">
   

        
<fieldset>
        <legend><?= $legend ?></legend>
        <div class="mb-2 p-4">
            <label class="form-label" ><?= $label_privilege_title ?>
               </label>
            <input class="form-control" required type="text" name="PrivilegeTitle" id="PrivilegeTitle" maxlength="30">
        </div>
        
        <div class="mb-2 p-4">
            <label class="form-label"><?= $label_privilege_url ?></label>
            <input class="form-control" required type="text" name="Privilege" id="Privilege" maxlength="30">
        </div>
        <button  type="submit" class="btn btn-primary p-2"  name="submit">Submit</button>

 
    </fieldset>



</form>



          





        </div>
    </div>

</div>




</div>

</div>
                            
                          
                         
    
