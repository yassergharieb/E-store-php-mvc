
 <a href="/public/supplier/add"> <i class="fa fa-plus"> add new supplier </i>  </a> 











<table class="table">
<thead>
<tr>

  <th scope="col"> <?= $text_table_name  ?> </th>
  <th scope="col"><?= $text_table_email ?></th>
  <th scope="col"><?= $text_table_address ?></th>

  <th scope="col"><?= $text_table_phone_number ?></th>



  <th scope="col"> <?= $text_table_control ?> </th>




</tr>
</thead>
<tbody>
<?php


if (count($supliers) > 0) {
foreach($supliers as $supplier) {

?>
<tr>
  <!-- <th scope="row">1</th> -->
  <td><?php echo $supplier->name ?></td>
  <td> <?php echo $supplier->Email ?></td>
  <td> <?php echo $supplier->address ?></td>
  <td> <?php echo $supplier->phone_number ?></td>


  <td>



    <a href="/public/supplier/edit/<?= $supplier->suplier_id ?>"> edit </a>
        
    <a href="/public/supplier/delete/<?= $supplier->suplier_id ?>"
     onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;
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




