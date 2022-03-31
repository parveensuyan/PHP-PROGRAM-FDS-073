<?php 
if(!empty($array_result)) {?>
 <tr>
 <th>Name</th>
 <th>Email</th>
 <th>Mobile</th>
 <th>Message</th>
 <th>Action</th>
</tr>

<?php 
foreach($array_result as $value){?>
<tr>
 <td><?php echo $value['name'];?></td>
 <td><?php echo $value['email'];?></td>
 <td><?php echo $value['mobile'];?></td>
 <td><?php echo $value['message'];?></td>
 <td>
     <a name = "abc" class="test" href="edit.php/?id=<?php echo $value['id'];?>">Edit</a> | <a class=" delete-anchor-nn"
   href="" data-id="<?php echo $value['id'];?>">Delete</a></td>
</tr>
<?php } 
}
else{ ?>
    <p>NO RECORD FOUND</p>
<?php }?>
<script src="index.js"></script>
