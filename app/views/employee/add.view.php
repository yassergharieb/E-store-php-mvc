


    <!-- <h1> add employee </h1> -->





<?php if  (isset($_SESSION['error'])) { ?>

<p class="bg-danger">   <?php  echo $_SESSION['error'] ?> </p>

<?php } 
unset($_SESSION['error']);

?>

  
           
<div class="container-fluid pt-4 px-4">

<div class="row g-4">

    <div class="col-sm-12 col-xl-6">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Basic Form</h6>

            


<form  action=""  method="post" class="m-2 " enctype="application/x-www-form-urlencoded">



<div class="mb-3 p-4">
<label class="form-label">Name</label>
<input type="text" class="form-control" name="name"> 
</div>


<div class="mb-2 p-4" >
<label  class="form-label"> address</label>
<input type="text" class="form-control" name="address">
</div> 

<div class="mb-2 p-4 ">
<label  class="form-label">Email address</label>
<input type="email" class="form-control"  name="email" >
</div>

<div class="mb-2 p-4 ">
<label  class="form-label">company</label>
<input type="company" class="form-control"  name="company" >
</div>

<div class="mb-2 p-4">
<label  class="form-label">salary</label>
<input type="number" class="form-control"  name="salary">
</div>



<button  type="add" class="btn btn-primary  p-2" name="submit">Submit</button>


</form>



          





        </div>
    </div>

</div>




</div>

</div>
                            
                          
                         
    
