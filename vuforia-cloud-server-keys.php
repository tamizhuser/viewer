<?php include 'header.php'; ?>
<div class="container-fluid">
	<div class="col-xl-12">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">Vuforia Cloud Server Keys</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-key fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
	<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-12">
          <div class="p-5">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <?php
                include 'connection.php';
    			$sql = "select * from vuforiaKeys";
                $result = $conn->query($sql);
                   if ($result->num_rows > 0) {
                       while($row = $result->fetch_assoc()) {
            ?>
      		  <div class="form-group">
      			<label for="">Access Key</label><input class="form-control" name="accesskey" placeholder="Enter Access Key" type="text" value="<?php echo $row['accessKey']; ?>" required>
      		  </div>	
        	  <div class="form-group">
                <label for="">Secret Key</label><input class="form-control" name="secretkey" placeholder="Enter Secret Key" type="text" value="<?php echo $row['secretKey']; ?>" required>
              </div> 	
              <button class="btn btn-primary" type="submit" name="setkeys" style="width: 100%;"> PROCEED DATA</button>
            <?php
                }
            }
            ?>
            </form>
    	  </div>
    	</div>
      </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<?php
include 'connection.php';
// define variables and set to empty values
$accessKey = $secretKey = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['setkeys']))
    {
        $accesskey = test_input($_POST["accesskey"]);
        $secretkey = test_input($_POST['secretkey']);
        $sql = "UPDATE vuforiaKeys SET accessKey='$accesskey',secretKey='$secretkey' where id='1'";
        if (mysqli_multi_query($conn, $sql)) {
            echo "<script>
            window.location.href = 'vuforia-cloud-server-keys.php';
        </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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