<?php
$json = file_get_contents("http://rdapi.herokuapp.com/product/read.php");

$data = json_decode($json,true);
$list = $data['records'];
 
if(isset($_POST['search'])){
   $search = $_POST['search'];
   $jsearch = file_get_contents('http://rdapi.herokuapp.com/product/search.php?s='.$search);
   $res = json_decode($jsearch,true);

   $list = $res['records'];
   
}else{
   $list = $data['records'];
}
?>
<Marquee><h1> Product List </h1></Marquee>


<form class="example" action="index.php?navi=product" method="POST" style="margin:auto;max-width:300px">
  <input type="text" name="search" placeholder="Enter Product Name">
  <input type="submit"><i class="fa fa-search"></i></input>
</form>
<table>
    <tr>
        <th>ID</th>
        <th>Product</th>
        <th>Price</th>
    </tr>
<?php
foreach($list as $value){
    ?>
    <tr>
        <td><?php echo $value['id'];?></td>
        <td><a href="?navi=details&id=<?php echo $value['id'];?>"><?php echo $value['name'];?></a></td>
        <td><?php echo $value['price'];?></td>
    </tr>
<?php
}
    ?>
</table>
