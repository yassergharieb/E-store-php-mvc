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


      <div class="mb-2 p-4">

      
      <label class="form-label" ><?= $label_group_title ?>
             </label>
          <input class="form-control" required type="text" name="groupName" id="PrivilegeTitle" value="<?= $group->groupName ?>" maxlength="40">
    

            <label class="form-label"><?= $label_privileges ?></label>
           
            <?php if (count($privileges) > 0):
          

              foreach ($privileges as $privilege):
               

            ?>
             <div class="form-check">
               
                    <input  type="checkbox"  name="privileges[]" <?= in_array($privilege->privlige_id , $grouprivilges) ? "checked" : '' ?>  id="privileges" value="<?= $privilege->privlige_id ?>">
                    <div class="checkbox_button"> 
                    <span><?= $privilege->privlige_title ?></span>

                    </div>
             </div>
             <?php endforeach; endif; ?>

             <!-- <button  type="submit" class="btn btn-primary p-2"  name="submit">Submit</button> -->

        </div> 
       
  
      <button  type="submit" class="btn btn-primary p-2"  name="submit">Submit</button>


  </fieldset>



</form>



        





      </div>
  </div>

</div>




</div>

</div>
                          
                        
                       
  
