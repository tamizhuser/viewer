<?php include 'header.php'; ?>
<!-- Begin Page Content -->
        <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-12">
        			<div class="card border-left-primary shadow h-100 py-2">
		                <div class="card-body">
		                  <div class="row no-gutters align-items-center">
		                    <div class="col mr-2">
		                      <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">Request Targets</div>
		                    </div>
		                    <div class="col-auto">
		                      <i class="fas fa-image fa-2x text-gray-300"></i>
		                    </div>
		                  </div>
		                </div>
		            </div>
        		</div>
        		<div class="col-md-12">
        			<!-- DataTales Example -->
          <div class="card shadow mb-4 shadow-lg my-5">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>User ID</th>
                      <th>Image</th>
                      <th>User Name</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                    <?php
                        include 'connection.php';
                        $result = mysqli_query($conn,"SELECT * FROM request_target"); 
                        while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><a href="<?php echo $row['imageLocation']; ?>" target="_blank"><img src="<?php echo $row['imageLocation']; ?>" style="width:100px;"></a></td>
                        <td><?php echo $row['user_name']; ?></td>
                        <td>
                            
                            <!--<a href="add-questions.php?id=<?php echo $row['itemLocation'];?>" class="btn btn-primary btn-circle btn-sm">
                                <i class="fa fa-question"></i>
                            </a>-->
                            <a href="#" data-toggle="modal" data-target="#DeleteModal" class="btn btn-danger btn-circle btn-sm delete" data-id ="<?php echo $row['imageLocation']; ?>" disabled>
                                <i class="fas fa-trash"></i>
                            </a>
                            <script>
                            $(document).on("click", ".delete", function () {
                              var id= $(this).data('id');
                              $(".modal-body #id").val( id );
                            });
                            </script>
                        </td>
                    </tr>
                    <?php
                        } 
                    ?>
                  <tfoot>
                    <tr>
                      <th>User ID</th>
                      <th>Image</th>
                      <th>User Name</th>
                      <th>Options</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        		</div>
        	</div>
              

          

        </div>
        <!-- /.container-fluid -->
<!-- Delete -->
  <div class="modal fade" id="DeleteModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <div class="modal-body">
            <input type="text" style="display:none;" name="id" id="id" value=""/>  
            <p>Do you really want to delete this object?</p>
          </div>
         <div class="modal-footer">          
              <button type="submit" name="delete" class="btn btn-primary">Delete</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>          
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /Delete -->  
<?php include 'footer.php'; ?>
 
<?php
$id = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['delete']))
    {  
       
       include 'connection.php';
       // include 'getKeys.php';
        $id=test_input($_REQUEST['id']);
		$query="delete from request_target where imageLocation='$id'";
        if (mysqli_query($conn, $query)) 
		{
			$file=$id;
			echo $file;
			//chmod($file, 0644);
			unlink($file);
			echo "<script>
					window.location.href = 'request-manager.php';
				</script>";
       }
	
    }
	
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>