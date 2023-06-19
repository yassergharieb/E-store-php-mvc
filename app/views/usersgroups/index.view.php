
 <a href="/public/usersgroups/add"> <i class="fa fa-plus"> add new group </i>  </a> 








 <?php   $messages =  $this->messenger->getMessages();


   if(!empty($messages)):
    foreach ($messages as $message): ?>

<p class=" <?= $message[1] ?> text-white "> <?=  $message[0] ?> </p>

<?php

  endforeach;
  endif;
?>
<table class="table">
<thead>
<tr>

  <th scope="col"> <?= $table_group_name  ?> </th>


  <th scope="col"> <?= $table_control ?> </th>




</tr>
</thead>
<tbody>
<?php
if (count($groups) > 0) {
foreach($groups as $group) {

?>
<tr>
  <!-- <th scope="row">1</th> -->
  <td><?php echo $group->groupName ?></td>
 

  <td>



    <a href="/public/usersgroups/edit/<?= $group->groupId ?>"> edit </a>
        
    <a href="/public/usersgroups/delete/<?= $group->groupId ?>"
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




