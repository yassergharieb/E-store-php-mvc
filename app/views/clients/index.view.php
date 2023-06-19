
 <a href="/public/clients/add"> <i class="fa fa-plus"> add new client </i>  </a> 











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



if ($clientss != false) {

foreach($clientss as $client) {

?>
<tr>
  <!-- <th scope="row">1</th> -->
  <td><?php echo $client->name ?></td>
  <td> <?php echo $client->Email ?></td>
  <td> <?php echo $client->address ?></td>
  <td> <?php echo $client->phone_number ?></td>


  <td>



    <a href="/public/clients/edit/<?= $client->client_id ?>"> edit </a>
        
    <a href="/public/clients/delete/<?= $client->client_id ?>"
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




