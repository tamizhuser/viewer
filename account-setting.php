<?php include 'header.php'; ?>
<div class="container-fluid">
	<div class="col-xl-12">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">Account Settings</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-cogs fa-2x text-gray-300"></i>
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
        			$sql = "select * from admin";
                    $result = $conn->query($sql);
                       if ($result->num_rows > 0) {
                           while($row = $result->fetch_assoc()) {
                ?>
      				<div class="form-group">
      					<label for="">Username</label><input class="form-control" name="username" value="<?php echo $row['username']; ?>" placeholder="Enter Username" type="text" value="" required>
      			  </div>	
        			<div class="form-group">
                <label for="">Email</label><input class="form-control" name="email" value="<?php echo $row['email']; ?>" placeholder="Enter Email" type="text" value="" required>
              </div> 	
              <div class="form-group">
                <label for="">Password</label><input class="form-control" name="password" value="<?php echo $row['password']; ?>" placeholder="Enter Password" type="password" value="" required>
              </div>  
              <div class="form-group">
                <button class="btn btn-primary" type="submit" name="setting" style="width: 100%;"> PROCEED DATA</button>
              </div>
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
$username = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['setting']))
    {
        $username = test_input($_POST["username"]);
        $email = test_input($_POST['email']);
        $password = test_input($_POST["password"]);
        $sql = "UPDATE admin SET username='$username',email='$email',password='$password' where id='1'";
        if (mysqli_multi_query($conn, $sql)) {
            echo "<script>
            window.location.href = 'logout.php';
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