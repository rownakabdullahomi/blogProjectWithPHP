﻿<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Social Media</h2>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fb = $fm->validation($_POST['fb']);
    $tw = $fm->validation($_POST['tw']);
    $ln = $fm->validation($_POST['ln']);
    $gg = $fm->validation($_POST['gg']);
    
    $fb    = mysqli_real_escape_string($db->link, $fb);
    $tw    = mysqli_real_escape_string($db->link, $tw);
    $ln    = mysqli_real_escape_string($db->link, $ln);
    $gg    = mysqli_real_escape_string($db->link, $gg);

    if ($fb == "" || $tw == "" || $ln == "" || $gg == "") {
    echo "<span class='error'>Field must not be empty !!</span>";

    } else{
        $query = "update tbl_social
                        set
                        fb   = '$fb',
                        tw   = '$tw',
                        ln   = '$ln',
                        gg   = '$gg'
                        where id = '1' ";

            $updated_row = $db->update($query);

            if ($updated_row) {
             echo "<span class='success'>Data Updated Successfully.</span>";
            } else {
             echo "<span class='error'>Data Not Updated !</span>";
            }
    }
}
?>

        <div class="block">               
         <form action="social.php" method="post">
<?php 
$query = "select * from tbl_social where id='1'";
$socialmedia = $db->select($query);
if ($socialmedia) {
    while ($result = $socialmedia->fetch_assoc()) {
        
 ?>

            <table class="form">					
                <tr>
                    <td>
                        <label>Facebook</label>
                    </td>
                    <td>
                        <input type="text" name="fb" value="<?php echo $result['fb']; ?>" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Twitter</label>
                    </td>
                    <td>
                        <input type="text" name="tw" value="<?php echo $result['tw']; ?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>LinkedIn</label>
                    </td>
                    <td>
                        <input type="text" name="ln" value="<?php echo $result['ln']; ?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>Google Plus</label>
                    </td>
                    <td>
                        <input type="text" name="gg" value="<?php echo $result['gg']; ?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
<?php 
    }
}
 ?>

        </div>
    </div>
</div>

<?php include "inc/footer.php"; ?>
