<form  method="post" enctype="application/x-www-form-urlencoded">
  
  <?php   $messages =  $this->messenger->getMessages();


   if(!empty($messages)): foreach ($messages as $message): ?>

<p class=" <?= $message[1] ?> "> <?=  $message[0] ?> </p>

<?php

    endforeach;
  endif;
?>


         
<div class="container-fluid pt-4 px-4">

<div class="row g-4">

  <div class="col-sm-12 col-xl-6">
      <div class="bg-secondary rounded h-100 p-4">
 

      
<fieldset>


      <div class="mb-2 p-4">

      
      <label class="form-label" ><?= $label_group_title ?>
             </label>
          <input class="form-control" required type="text" name="groupName" id="PrivilegeTitle" maxlength="40">
    

            <label class="form-label"><?= $label_privileges ?></label>
           
            <?php if (count($privileges) > 0):
          

              foreach ($privileges as $privilege):
               

            ?>
             <div class="form-check">
               
                    <input  type="checkbox"  name="privileges[]"  id="privileges" value="<?= $privilege->privlige_id ?>">
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
                          
                        
                       
  
