<?php include 'header.php'; ?>
<?php 
include 'connection.php';
$getViews = mysqli_query($conn,'SELECT SUM(views) AS totalViews FROM objects'); 
$row = mysqli_fetch_assoc($getViews); 
$views = $row['totalViews'];

$countImages = mysqli_query($conn, "select count(1) FROM objects");
$row = mysqli_fetch_array($countImages);
$images = $row[0];
?>
 <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">

      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
          <div class="row">
        <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Views</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $views; ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-eye fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Image Targets</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $images; ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-image fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Recently Uploaded AR</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="dataTable" width="100%" cellspacing="0">                                  
                <tbody>
                  <tr>
                    <th>Target Name</th>
                    <th>Image</th>
                    <th>Content</th>
                    <th>Views</th>
                  </tr> 
                    <?php
                        include 'connection.php';
                        $result = mysqli_query($conn,"SELECT * FROM objects ORDER BY datetime DESC LIMIT 5"); 
                        while($row = mysqli_fetch_array($result)){
                    ?>
                  <tr>
                    <td><?php echo $row['targetName']; ?></td>
                    <td><a href="<?php echo $row['imageLocation']; ?>"><img src="<?php echo $row['imageLocation']; ?>" style="width:100px;"></a></td>
                    <td><a href="uploads/<?php echo $row['itemLocation']; ?>"><?php echo $row['itemLocation']; ?></a></td>
                    <td><?php echo $row['views']; ?></td>
                  </tr> 
                    <?php
                        }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">

        <!-- Illustrations -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Wine View</h6>
          </div>
        </div>
      </div>
      
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'footer.php'?>