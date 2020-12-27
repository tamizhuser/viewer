<?php include 'header.php'; ?>
<!-- Begin Page Content -->
        <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-12">
        			<div class="card border-left-primary shadow h-100 py-2">
		                <div class="card-body">
		                  <div class="row no-gutters align-items-center">
		                    <div class="col mr-2">
		                      <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">Target Manager</div>
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
                      <th>Target Name</th>
                      <th>Image</th>
                      <th>Views</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                    <?php
                        include 'connection.php';
                        $result = mysqli_query($conn,"SELECT * FROM objects"); 
                        while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><?php echo $row['targetName']; ?></td>
                        <td><a href="<?php echo $row['imageLocation']; ?>" target="_blank"><img src="<?php echo $row['imageLocation']; ?>" style="width:100px;"></a></td>
                        <td><?php echo $row['views']; ?></td>
                        <td>
                            
                            <!--<a href="add-questions.php?id=<?php echo $row['itemLocation'];?>" class="btn btn-primary btn-circle btn-sm">
                                <i class="fa fa-question"></i>
                            </a>-->
                            
                            <a href="edit-target.php?id=<?php echo $row['vuforiaId'];?>" class="btn btn-success btn-circle btn-sm">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <a href="#" data-toggle="modal" data-target="#DeleteModal" class="btn btn-danger btn-circle btn-sm delete" data-id ="<?php echo $row['vuforiaId']; ?>" disabled>
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
                      <th>Target Name</th>
                      <th>Image</th>
                      <th>Views</th>
                      <th></th>
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
$accessKey = $secretKey = $id = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['delete']))
    {
        include 'getKeys.php';
        $id=test_input($_REQUEST['id']);
        require_once 'vuforia/php/DeleteTarget.php';
        $instance = new DeleteTarget($accessKey,$secretKey,$id);
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>