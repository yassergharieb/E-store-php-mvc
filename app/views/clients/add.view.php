


<?php 
  $messages =  $this->messenger->getMessages();


if (!empty($messages)):
  // echo "<pre>";
  // var_dump($messages);
  // die();
 foreach ($messages as $message): ?>

<p class=" <?= $message[1] ?> text-white "> <?=  $message[0] ?> </p>


<?php

endforeach;
endif;
?>




  



<form  method="post" enctype="application/x-www-form-urlencoded">
  


         
<div class="container-fluid pt-4 px-4">

<div class="row g-4">

  <div class="col-sm-12 col-xl-6">
      <div class="bg-secondary rounded h-100 p-4">
 

      
<fieldset>
      <legend><?= $text_legend ?></legend>
      <div class="mb-2 p-4">
          <label class="form-label" ><?= $text_label_Name ?>
             </label>
          <input class="form-control" required type="text" name="name"  maxlength="30">
      </div>  
      <div class="mb-2 p-4">
          <label class="form-label"><?= $text_label_PhoneNumber ?></label>
          <input class="form-control" required type="text" name="phone_number" imaxlength="30">
      </div>
      <div class="mb-2 p-4">
          <label class="form-label"><?= $text_label_Email ?></label>
          <input class="form-control" required type="text" name="Email"  maxlength="30">
      </div>
      <div class="mb-2 p-4">
          <label class="form-label"><?= $text_tabel_Address ?></label>
          <input class="form-control" required type="text" name="address"  maxlength="30">
      </div>
   
      <button  type="submit" class="btn btn-primary p-2"  name="submit">
        Submit</button>


  </fieldset>



</form>



        





      </div>
  </div>

</div>




</div>

</div>
                          
                        
                       
  
