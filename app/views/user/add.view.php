


 



<?php 
  $messages =  $this->messenger->getMessages();


if(!empty($messages)):
 foreach ($messages as $message): ?>

<p class=" <?= $message[1] ?> text-white "> <?=  $message[0] ?> </p>

<?php

endforeach;
endif;
?>




  
           
    <div class="container-fluid pt-4 px-4">

<div class="row g-4">

    <div class="col-sm-12 col-xl-6">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4"><?= $legend ?></h6>

            


<form  action=""  method="post" class="m-2 " enctype="application/x-www-form-urlencoded">

<div class="mb-3 p-4">
<label class="form-label"><?= $label_FirstName ?></label>
<input type="text" class="form-control" name="firstname"> 
</div>  

<div class="mb-3 p-4">
<label class="form-label"><?= $label_LastName ?></label>
<input type="text" class="form-control" name="lastname"> 
</div>                                 


<div class="mb-3 p-4">
<label class="form-label"><?= $label_username ?></label>
<input type="text" class="form-control" name="username"> 
</div>                                 




<div class="mb-2 p-4 ">
<label  class="form-label"> <?=  $label_Email ?></label>
<input type="Email" class="form-control"  name="Email" >
</div>


<div class="mb-2 p-4 ">
<label  class="form-label"> <?=  $label_CEmail ?></label>
<input type="Email" class="form-control"  name="CEmail" >
</div>

<div class="mb-2 p-4 ">
<label  class="form-label"> <?= $label_password  ?></label>
<input type="password" class="form-control"  name="password" >
</div>

<div class="mb-2 p-4 ">
<label  class="form-label"> <?= $label_CPassword  ?></label>
<input type="password" class="form-control"  name="CPassword" >
</div>
<div class="mb-2 p-4" >
<label  class="form-label"> <?= $label_PhoneNumber ?></label>
<input type="text" class="form-control" name="PhoneNumber">
</div> 






<select required name="GroupId" class="form-select form-select-lg mb-3" >
    
<option value=""> <?= $user_GroupId ?></option>
   <?php if ($Usersgroups != false): foreach ($Usersgroups as $Usersgroup): ?>
 <option value="<?= $Usersgroup->groupId  ?>"> <?= $Usersgroup->groupName ?> </option>

          
 
 <?php endforeach; endif; ?>
</select>






<?php 
if(isset($user)){
    var_dump($user);
}


?>

<button  type="add" class="btn btn-primary  p-2" name="submit">Submit</button>


</form>



          





        </div>
    </div>

</div>




</div>

</div>
                            
                          
                         
    
