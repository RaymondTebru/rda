<?php 
	$pagetitle = "Edit Song";
	
	//If someone tries to access this page directly without specifying which song to edit, send em back to the songlist.
	if(empty($_GET)){
		header('Location: songlist.php');
		exit;
	}
	
	include 'includes/header.php';
//	print_r($_POST);
	$songid = $_GET['id'];
	
	if($_POST['submit'] == "true"){
	$artist = mysqli_real_escape_string($conn, $_POST['artist']);
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$album = mysqli_real_escape_string($conn, $_POST['album']);
	$subcat = mysqli_real_escape_string($conn, $_POST['id_subcat']);
	
	$updatetrack = "UPDATE songs SET artist='$artist', title='$title', album='$album', id_subcat='$subcat' WHERE id='$songid'";

	if ($conn->query($updatetrack) === TRUE) {
		$successnotification = "Record updated successfully. <a href=\"songlist.php\">Return to the songlist</a>";
	} else {
		$errornotification = "Error updating record: " . $conn->error;
	}
	}
	
	$getsong = "SELECT artist, title, album, id_subcat, id_genre FROM songs WHERE ID='$songid'";
	$result = $conn->query($getsong);
									
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$artist = $row['artist'];
			$title = $row['title'];
			$album = $row['album'];
			$subcat = $row['id_subcat'];
			$genre = $row['id_genre'];
		}
	}
?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
		<div class="col-md-9">

<?php if(!empty($successnotification)){ ?>
		  <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Woohoo!</h4>
                <?php echo $successnotification; ?>
		  </div>
<?php } if(!empty($errornotification)){ ?>
		  <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Oops!</h4>
                <?php echo $errornotification; ?>
		  </div>
<?php } ?>		

		  <div class="box box-solid box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit song.</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" action="">
				<div class="form-group">
				  <label>Id</label>
				  <input type="text" class="form-control" value="<?php echo $songid; ?>" disabled>
				</div>
			    <div class="form-group">
                  <label>Artist</label>
                  <input type="text" class="form-control" value="<?php echo $artist; ?>" name="artist">
                </div>
				<div class="form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" value="<?php echo $title; ?>" name="title">
                </div>
				<div class="form-group">
                  <label>Album</label>
                  <input type="text" class="form-control" value="<?php echo $album; ?>" name="album">
                </div>

				<div class="form-group">
                  <label>Subcategory</label>
                  <select class="form-control" width="300" style="width: 300px" name="id_subcat">
					<option value="<?php echo $subcat; ?>"><?php subcatName($subcat); echo " (Don't change)"; ?></option>
                    <?php getSubcats($subcat); ?>
                  </select>
                </div>

                <!-- select -->
				<input type="hidden" name="submit" value="true">
                <button type="submit" class="btn btn-primary">Submit</button>
                
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          
          <!-- /.box -->
        </div>
	  
	  
	  </div>
    </section>
    <!-- /.content -->
<?php
	include 'includes/footer.php';
?>