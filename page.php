<?php include 'inc/header.php';?>

<?php 
    if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL ){
    	header("Location: 404.php");
       // echo "<script>window.location = 'index.php';</script>";
    } else{
        $id = $_GET['pageid'];
    }

 ?> 

<?php 
$pagequery = "select * from tbl_page where id='$id'";
$pagedetails = $db->select($pagequery);
if ($pagedetails) {
    while ($result = $pagedetails->fetch_assoc()) {
        
 ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2><?php echo $result['name'] ?></h2>
				<?php echo $result['body'] ?>
	</div>

</div>

<?php
		} # if ($post) er while loop
	} else{  # if ($post) er else

	header("Location:404.php");
}
?>

<?php include "inc/sidebar.php"; ?>
<?php include "inc/footer.php"; ?>