<h3 class="bg">  <?= $header  ?>  </h3> 


<div class = 'd-flex p-2 flex-column'>
<a href="/users"><i class="fa fa-user-circle"></i> <?= $users_list ?></a>
<a href="/public/usersgroups/index"><i class="fa fa fa-user"></i> <?= $users_groups ?></a>
<a href="/public/privileges/index"><i class="fa fa-key"></i> <?= $users_privileges ?></a>



<a href="/public/privileges/add"> <i class="fa fa-plus"> add new privilege </i>  </a>
<a href="/public/user/add"> <i class="fa fa-plus"> add new user </i>  </a> 



<a href="/public/auth/login"> <i class="fa fa-plus"> log in  </i>  </a> 











<table class="table">
<thead>
<tr>

 


                <th  scope="col" ><?= $table_username ?></th>
                <th scope="col"><?= $table_group ?></th>
                <th scope="col"><?= $table_email ?></th>
                <th scope="col"><?= $table_subscription_date ?></th>
                <th scope="col"><?= $table_last_login ?></th>
                <th scope="col"><?= $label_PhoneNumber ?></th>
                

                <th scope="col"><?= $table_control ?></th>

</tr>
</thead>
<tbody>
<?php
if (count($usrs) > 0) {

    
foreach ( (object) $usrs as  $user) {

?>
<tr>
  <!-- <th scope="row">1</th> -->
  <td><?php echo $user->username ?></td>
  <td><?php echo $user->groupName ?></td>

  <td> <?php echo $user->Email ?></td>
  <td> <?php echo $user->subscrbtiondate ?></td>
  <td> <?php echo $user->lastLogin ?></td>
  <td> <?php echo $user->Phonenumber ?></td>
  

  <td>



    <a href="/public/privileges/edit/<?= $privilge->privlige_id ?>"> edit </a>
        
    <a href="/public/privileges/delete/<?= $privilge->privlige_id ?>"
     onclick="if(!confirm('<?= $table_control_delete_confirm ?>')) return false;
     ">
    <i class="fa fa-trash"> </i></a>
 </td>
</tr>

<?php  } } else {

    
    ?>

    <!-- <td class= "bg-dnager">  </td> -->
    
    <?php } ?>
</tbody>
</table>

















</div>
              



