<?php 
	$pagetitle = "Songs in database";
	include 'includes/header.php';
	
	if($_GET['action'] == "delete"){
		$songid = $_GET['id'];
		$deletetrack = "DELETE FROM songs WHERE ID= '$songid'";
		if ($conn->query($deletetrack) === TRUE) {
			$successnotification = "Track deleted";
		} else {
			$errornotification = "Error deleting record: " . $conn->error;
		}
	}
	
	
?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
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
            <div class="box-header">

              <h3 class="box-title">There are <?php songAmount(); ?> songs in the database.</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Artist</th>
				  <th>Title</th>
				  <th>Duration</th>
				  <th style="width: 140px">Action</th>
                </tr>
                </thead>
                <tbody>
                
<?php
					$getsongs = "SELECT ID, artist, title, duration FROM songs ORDER BY artist";
					$result = $conn->query($getsongs);
									

					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
?>	
                <tr>
                  <td><?php echo $row['ID']; ?></td>
                  <td><?php echo $row['artist']; ?></td>
				  <td><?php echo $row['title']; ?></td>
				  <td><?php echo date("i:s", $row['duration']); ?></td>
				  <td>
                <a class="btn btn-info" href="songedit.php?id=<?php echo $row['ID']; ?>" data-toggle="tooltip" title="Edit track"><i class="fa fa-edit"></i></a>
				<a class="btn btn-warning" href="" data-toggle="tooltip" title="Disable track"><i class="fa fa-pause"></i></a>
				<a class="btn btn-danger" data-toggle="tooltip" title="Delete track" href="songlist.php?action=delete&id=<?php echo $row['ID']; ?>"><i class="fa fa-trash"></i></a>
				  </td>
                </tr>
<?php
    }
} else {
?>
                <tr>
                  <td></td>
                  <td>There are no songs in your database.</td>
				  <td></td>
				  <td>
                  </td>
                </tr>
<?php 
}
?>
			
				</tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
		
        <!-- /.col -->
      </div>
    
    </section>
    <!-- /.content -->
<?php
	include 'includes/footer.php';
?>