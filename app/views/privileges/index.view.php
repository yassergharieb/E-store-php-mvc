
 <a href="/public/privileges/add"> <i class="fa fa-plus"> add new privilege </i>  </a> 










<?php if  (isset($_SESSION['message'])) { ?>

<p class =" bg-success text-white">   <?php  echo $_SESSION['message'] ?> </p>

<?php }
unset($_SESSION['message']);

?>
<table class="table">
<thead>
<tr>

  <th scope="col"> <?= $label_privilege_title  ?> </th>
  <th scope="col"><?= $label_privilege_url ?></th>

  <th scope="col"> <?= $table_control ?> </th>




</tr>
</thead>
<tbody>
<?php
if (count($privilges) > 0) {
foreach($privilges as $privilge) {

?>
<tr>
  <!-- <th scope="row">1</th> -->
  <td><?php echo $privilge->privlige_title ?></td>
  <td> <?php echo $privilge->privlige ?></td>

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




