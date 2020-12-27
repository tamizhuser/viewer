<?php include 'header.php'; ?>
<?php $id = test_input($_GET['id']); ?>
<?php
    include 'connection.php';
    $result = mysqli_query($conn,"SELECT * FROM objects WHERE vuforiaId = '$id'"); 
    while($row = mysqli_fetch_array($result)){
        if($row['itemType'] == "image" || $row['itemType'] == "3dmodel" || $row['itemType'] == "video" || $row['itemType'] == "greenscreen" || $row['itemType'] == "audio"){
            $itemPath = $row['itemLocation'];
            $itemURL = '';
            $assetPath = '';
        }
        else if($row['itemType'] == "assetbundle"){
            $assetPath = $row['itemLocation'];
            $itemPath = '';
            $itemURL = '';
        }
        else{
            $itemURL = $row['itemLocation'];
            $itemURL = '';
            $assetPath = '';
        }
?>
  <div class="container-fluid">
    <form method="post">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                    <div class="form-group">
          					<label for="">Pairing</label><input class="form-control" name="pairing" placeholder="Enter Pairing" type="text" value="<?php echo $row['pairing']; ?>" required>
          			  </div>
					<div class="form-group">
      						    <div class="row">
      						        <div class="col-md-4">
      						            <input class="form-control" type="number" value="<?php echo $row['wines']; ?>" name="wines">
      						            <label>Wine Spectator</label>
      						        </div>
      						        <div class="col-md-4">
      						            <input class="form-control" type="number" value="<?php echo $row['winee']; ?>" name="winee">
      						            <label>Wine Enthausiast</label>
      						        </div>
      						        <div class="col-md-4">
      						            <input class="form-control" type="number" value="<?php echo $row['winev']; ?>" name="winev">
      						            <label>Wine View Consumer</label>
      						        </div>
      						    </row>
      					    </div>
				</div>
				
				<div class="form-group">
				
				</div>
                </div>
              </div>
            </div>
          </div>
      
  </div>
  
   <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                    <div class="form-group">					
					 <div
						 <label>Wine Year</label>
						 <input class="form-control" placeholder="Enter Wine Years" type="text" value="<?php echo $row['wineYear']; ?>" name="wineYear">
						 <br>
					</div>
					 <div    class="form-group">
      						    <div class="row">
									
								    
									<br>
      						        <div class="col-md-4">
      						            <label>Grape Type</label>
										<input class="form-control" type="text" placeholder="Enter Grape Type" value="<?php echo $row['grapeType']; ?>" name="grapeType">      						            
      						        </div>
      						        <div class="col-md-4">
      						            <label>Region</label>
										<input class="form-control" type="text" placeholder="Enter Region" value="<?php echo $row['region']; ?>" name="region">      						            
      						        </div>
      						        <div class="col-md-4">
      						            <label>What to Expect</label>
										<input class="form-control" type="text" placeholder="Enter What to expect" value="<?php echo $row['whatToExpect']; ?>" name="whatToExpect">      						            
      						        </div>
									 
      						    </row>
      					    </div>
      				</div>
					<div
						<br>
						<label>Wine Description</label>
						<input class="form-control" type="text" placeholder="Enter Description" value="<?php echo $row['description']; ?>" name="description">
					</div>
					<br>
					 <div    class="form-group">
      						    <div class="row">
									<br>
      						        <div class="col-md-4">
      						            <label>Alcohol %</label>
										<input class="form-control" type="number" placeholder="Enter Alcohol %" value="<?php echo $row['alcohol']; ?>" name="alcohol">      						            
      						        </div>
      						        <div class="col-md-4">
      						       
								   </div>
      						        <div class="col-md-4">
      						            <label>Price</label>
										<input class="form-control" type="number" placeholder="Enter Price" value="<?php echo $row['price']; ?>" name="price">      						            
      						        </div>
      						    </row>
      					    </div>
      				</div>
				</div>
              </div>
            </div>
				
          </div>
		    </div>
				
          </div>
        <button class="btn btn-primary my-3" type="submit" name="edit_object" style="width: 100%;"> PROCEED DATA</button>
    </form>
<?php
    }
?>
</div>
<?php include 'footer.php'; ?>
<script>
  var loadFile2 = function(event) {
    var filename = document.getElementById('file2').value;
    document.getElementById("imageText2").innerHTML = filename;
  };
  var loadFile3 = function(event) {
    var filename = document.getElementById('file3').value;
    document.getElementById("imageText3").innerHTML = filename;
  };
  var loadFile4 = function(event) {
    var filename = document.getElementById('file4').value;
    document.getElementById("imageText4").innerHTML = filename;
  };
</script>   
<script>
  function _(el){
  	return document.getElementById(el);
  }
  function uploadFile2(){
      var file = _("file2").files[0];
      // alert(file.name+" | "+file.size+" | "+file.type);
      var formdata = new FormData();
      formdata.append("file2", file);
      var ajax = new XMLHttpRequest();
      ajax.upload.addEventListener("progress", progressHandler2, false);
      ajax.addEventListener("load", completeHandler2, false);
      ajax.addEventListener("error", errorHandler2, false);
      ajax.addEventListener("abort", abortHandler2, false);
      ajax.open("POST", "meta_upload_parser.php");
      ajax.send(formdata);
  }
  function progressHandler2(event){
      _("loaded_n_total2").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
      var percent2 = (event.loaded / event.total) * 100;
      _("progressBar2").value = Math.round(percent2);
      _("status2").innerHTML = Math.round(percent2)+"% uploaded... please wait";
  }
  function completeHandler2(event){
      _("status2").innerHTML = event.target.responseText;
      _("progressBar2").value = 100;
  }
  function errorHandler2(event){
      _("status2").innerHTML = "Upload Failed";
  }
  function abortHandler2(event){
      _("status2").innerHTML = "Upload Aborted";
  }
  function uploadFile3(){
      var file = _("file3").files[0];
      // alert(file.name+" | "+file.size+" | "+file.type);
      var formdata = new FormData();
      formdata.append("file3", file);
      var ajax = new XMLHttpRequest();
      ajax.upload.addEventListener("progress", progressHandler3, false);
      ajax.addEventListener("load", completeHandler3, false);
      ajax.addEventListener("error", errorHandler3, false);
      ajax.addEventListener("abort", abortHandler3, false);
      ajax.open("POST", "android_upload_parser.php");
      ajax.send(formdata);
  }
  function progressHandler3(event){
      _("loaded_n_total3").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
      var percent3 = (event.loaded / event.total) * 100;
      _("progressBar3").value = Math.round(percent3);
      _("status3").innerHTML = Math.round(percent3)+"% uploaded... please wait";
  }
  function completeHandler3(event){
      _("status3").innerHTML = event.target.responseText;
      _("progressBar3").value = 100;
  }
  function errorHandler3(event){
      _("status3").innerHTML = "Upload Failed";
  }
  function abortHandler3(event){
      _("status3").innerHTML = "Upload Aborted";
  }
  function uploadFile4(){
      var file = _("file4").files[0];
      // alert(file.name+" | "+file.size+" | "+file.type);
      var formdata = new FormData();
      formdata.append("file4", file);
      var ajax = new XMLHttpRequest();
      ajax.upload.addEventListener("progress", progressHandler4, false);
      ajax.addEventListener("load", completeHandler4, false);
      ajax.addEventListener("error", errorHandler4, false);
      ajax.addEventListener("abort", abortHandler4, false);
      ajax.open("POST", "ios_upload_parser.php");
      ajax.send(formdata);
  }
  function progressHandler4(event){
      _("loaded_n_total4").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
      var percent4 = (event.loaded / event.total) * 100;
      _("progressBar4").value = Math.round(percent4);
      _("status4").innerHTML = Math.round(percent4)+"% uploaded... please wait";
  }
  function completeHandler4(event){
      _("status4").innerHTML = event.target.responseText;
      _("progressBar4").value = 100;
  }
  function errorHandler4(event){
      _("status4").innerHTML = "Upload Failed";
  }
  function abortHandler4(event){
      _("status4").innerHTML = "Upload Aborted";
  }
</script>
<?php
$accessKey = $secretKey = $itemType = $itemLocation = $scale = $rotation = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['edit_object'])){
        include 'getKeys.php';
        $itemType = test_input($_POST['content']);
        if($itemType == "image" || $itemType == "3dmodel" || $itemType == "video" || $itemType == "greenscreen" || $itemType == "audio"){
            if($_POST['file2']){
                $itemLocation = test_input($_POST['file2']);
            }else{
                $itemLocation = $itemPath;
            }
            
        }
        else if($itemType == "assetbundle"){
             if($_POST['file3'] && $_POST['file4']){
                $itemLocation = test_input($_POST['file3'])."-".test_input($_POST['file4']);
            }else{
                $itemLocation = $assetPath;
            }
        }
        else{
            $itemLocation = test_input($_POST['url']);
        }
		
	
        $scale = test_input($_POST['scale']);
        $rotationx = test_input($_POST['rotationx']);
        $rotationy = test_input($_POST['rotationy']);
        $rotationz = test_input($_POST['rotationz']);
        $pairing = test_input($_POST['pairing']);
        $wines = test_input($_POST['wines']);
        $winee = test_input($_POST['winee']);
        $winev = test_input($_POST['winev']);
		$wineYear = test_input($_POST["wineYear"]); 
		$grapeType = test_input($_POST['grapeType']);
        $region = test_input($_POST['region']);
        $whatToExpect = test_input($_POST['whatToExpect']);		
		$description = test_input($_POST["description"]);   
		$alcohol = test_input($_POST['alcohol']);		
		$price = test_input($_POST["price"]); 		
		require_once 'vuforia/php/UpdateTarget.php';
        $instance = new UpdateTarget($accessKey, $secretKey, $id, $itemType, $itemLocation, $scale, $rotationx, $rotationy, $rotationz, $pairing, $wines, $winee, $winev,$wineYear,$grapeType,$region,$whatToExpect,$description,$alcohol,$price);
    }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>