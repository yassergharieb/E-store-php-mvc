

    <h1> all employees </h1>


    <?php if  (isset($_SESSION['message'])) { ?>

<p class =" bg-success text-white">   <?php  echo $_SESSION['message'] ?> </p>

<?php }
unset($_SESSION['message']);

?>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col"> <?= $employee_name  ?> </th>
      <th scope="col"><?= $employee_salary ?></th>
      <th scope="col"><?=  $employee_company?> </th>
      <th scope="col"><?= $employee_address ?></th>
    
      <th scope="col"> <?= $employee_Email ?> </th>
      <th scope="col">action </th>




    </tr>
  </thead>
  <tbody>
    <?php
    if (count($employees) > 0) {
    foreach($employees as $employee) {

    ?>
    <tr>
      <!-- <th scope="row">1</th> -->
      <td><?php echo $employee->id ?></td>
      <td> <?php echo $employee->name ?></td>
      <td> <?php echo $employee->salary ?></td>
      <td> <?php echo $employee->company ?></td>
      <td> <?php echo $employee->address ?></td>
     
      <td> <?php echo $employee->email ?></td>
      <td>
        <a href="/public/employee/delete/<?= $employee->id ?> "> delete </a>
        <a href="/public/employee/edit/<?= $employee->id ?> "> update </a>

      </td>



      
    </tr>

    <?php  } } else {

        
        ?>

        <td class= "bg-dnager"> th </td>
        
        <?php } ?>
  </tbody>
</table>



