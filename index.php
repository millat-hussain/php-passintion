<?php 
include "config/config.php";
include "lab/Database.php";
include "lab/helper.php";

$db=new Database();
$hlp=new Helper();

 ?>




<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Blog Project </title>
        <meta name="description" content="nocontent">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">

    </head>
    <body>

    	<?php 

    $par_page =3; 

    if (isset($_GET['page'])) {

        $page=$_GET['page'];

    }else{

        $page=1;

    }

    $start_from = ($page-1)*$par_page;




    	 ?>








    	<div class="container">
    		<?php 

    		$query =("SELECT * FROM blog_post LIMIT $start_from,$par_page");
    		$select =$db->select($query);
    		if ($select==true) {

    			while ($rasult= $select->fetch_assoc()) {

    		 ?>
    		<div class="conccc">
    		<h3><?php  echo $rasult["title"]; ?> </h3>
    		<p>
    			<?php  echo $hlp->Sorten( $rasult["postbody"]);?>
    		</p>
    		<button>Click Me </button>
    		</div>
    	<?php } ?>

    	<?php 

    	$query ="SELECT * FROM blog_post";
        $rasult = $db->select($query);
        $total_rows =mysqli_num_rows($rasult);
        $total_page =ceil($total_rows/$par_page);




    	 ?>






<?php 
echo '<a href="index.php?page=1">Previous</a>';
 ?>

 <?php 


       for ($i =1; $i < $total_page; $i++) { 


          echo '
   <a  href="index.php?page='.$total_page.'">'.$i.'</a>

          ';
           
         }
  ?>


<?php 
echo ' <a href="index.php?page='.$total_page.'">Next &rarr;</a>';
 ?>

    	
 

	<?php } ?>

    	</div>
    </body>
</html>