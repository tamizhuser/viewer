<?php include 'header.php'; ?>
  <div class="container-fluid">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      	<div class="col-xl-12">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">Target Image</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-image fa-2x text-gray-300"></i>
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
          				<div class="form-group">
          					<label for="">Target Name</label><input class="form-control" name="targetname" placeholder="Enter target name" type="text" value="<?php echo isset($_POST['targetname']) ? $_POST['targetname'] : '' ?>" required>
          			 <br>
						   <label>Wine Year</label>
							<input class="form-control" placeholder="Enter Wine Years" type="text" value="<?php echo isset($_POST['wineYear']) ? $_POST['wineYear'] : '' ?>" name="wineYear">
      						          
							
					 </div>	
          				<div class="form">
                      <center>
                        <input type="file" name="file1" id="file1" onchange="loadFile(event)" class="inputfile" accept=".jpg, .jpeg">
                        <p id="imageText" style="padding-top:56px;font-size: 20px;">Drop file here or Click to select</p>
                      </center>
                      <center>
                        <img src="" style="position:absolute;height:90%;top:0;transform: translate(-50%, 5%);" id="output">
                      </center>
                  </div>
                  <br>
                  <center>
                    <button type="button" class="btn btn-primary" onclick="uploadFile()">Upload Image</button>
                    <br>
                    <progress id="progressBar" value="0" max="100" style="margin-top:10px;height:40px;width:70%;"></progress>
                    <p id="loaded_n_total"></p>
                    <span class="help-block" id="status"></span>
                  </center>
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
                    
					
					
					 <div    class="form-group">
      						    <div class="row">
									<br>
									 <div class="col-md-4">
      						            <label>Region</label>
										<input class="form-control" type="text" placeholder="Enter Region" value="<?php echo isset($_POST['region']) ? $_POST['region'] : '' ?>" name="region">      						            
      						        </div>
      						        <div class="col-md-4">
      						            <label>Grape Type</label>
										<input class="form-control" type="text" placeholder="Enter Grape Type" value="<?php echo isset($_POST['grapeType']) ? $_POST['grapeType'] : '' ?>" name="grapeType">      						            
      						        </div>
      						       
      						       
      						    </row>
      					    </div>
      				</div>
					
					
					<div class="form-group">
          					<label for="">Pairing</label><input class="form-control" name="pairing" placeholder="Enter Pairing" type="text" value="<?php echo isset($_POST['pairing']) ? $_POST['pairing'] : '' ?>" required>
          			</div>
					
				
					<br>
					<hr>
					<br>
					
					
					
					
						  
					   <div align="right" style="margin-bottom:5px;">
						<button type="button" name="add" id="add" class="btn btn-success btn-xs">Add</button>
					   </div>
					   <br />
					   <form method="post" id="user_form">
						<div class="table-responsive">
						 <table class="table table-striped table-bordered" id="user_data">
						  <tr>
						   <th>Year</th>
						   <th>Alcohol %</th>
						   <th>Average Price</th>
						   <th>Taste Profile</th> 
						   <th>Wine Enthausiast</th>
						   <th>Wine Spectator</th>
						   <th>Edit</th>
						   <th>Remove</th>
						  </tr>
						 </table>
						</div>
						
					
					   </form>


					<div id="user_dialog" title="Add Data">
					   <div class="form-group">
						<label>Year</label>
						<input type="number" name="wine_year" id="wine_year" class="form-control" />
						<span id="error_wine_year" class="text-danger"></span>
					   </div>
					   <div class="form-group">
						<label>Alcohol %</label>
						<input type="number" name="alcohol" id="alcohol" class="form-control" />
						<span id="error_alcohol" class="text-danger"></span>
					   </div><div class="form-group">
						<label>Average Price</label>
						<input type="number" name="average_price" id="average_price" class="form-control" />
						<span id="error_average_price" class="text-danger"></span>
					   </div>
					   <div class="form-group">
						<label>Taste Profile</label>
						<input type="text" name="taste_profile" id="taste_profile" class="form-control" />
						<span id="error_taste_profile" class="text-danger"></span>
					   </div>
					   <div class="form-group">
						<label>Wine Enthausiast</label>
						<input type="text" name="wine_enthausiast" id="wine_enthausiast" class="form-control" />
						<span id="error_wine_enthausiast" class="text-danger"></span>
					   </div>
					   <div class="form-group">
						<label>Wine Spectator</label>
						<input type="text" name="wine_spectator" id="wine_spectator" class="form-control" />
						<span id="error_wine_spectator" class="text-danger"></span>
					   </div>
					   
					   <div class="form-group" align="center">
						<input type="hidden" name="row_id" id="hidden_row_id" />
						<button type="button" name="save" id="save" class="btn btn-info">Save</button>
					   </div>
					  </div>
					  <div id="action_alert" title="Action">

						</div>
					
					
                </div>
              </div>
            </div>
				
          </div>
		  
<button class="btn btn-primary my-3" type="submit" name="upload_object" style="width: 100%;"> PROCEED DATA</button>
    </form>
</div>
<?php include 'footer.php'; ?>
<script>
  var loadFile = function(event) {
    var output = document.getElementById("output");
    output.src = URL.createObjectURL(event.target.files[0]);
    document.getElementById("imageText").innerHTML = "";
  };
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
  function uploadFile(){
  	var file = _("file1").files[0];
  	// alert(file.name+" | "+file.size+" | "+file.type);
  	var formdata = new FormData();
  	formdata.append("file1", file);
  	var ajax = new XMLHttpRequest();
  	ajax.upload.addEventListener("progress", progressHandler, false);
  	ajax.addEventListener("load", completeHandler, false);
  	ajax.addEventListener("error", errorHandler, false);
  	ajax.addEventListener("abort", abortHandler, false);
  	ajax.open("POST", "file_upload_parser.php");
  	ajax.send(formdata);
  }
  function progressHandler(event){
  	_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
  	var percent = (event.loaded / event.total) * 100;
  	_("progressBar").value = Math.round(percent);
  	_("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
  }
  function completeHandler(event){
  	_("status").innerHTML = event.target.responseText;
  	_("progressBar").value = 100;
  }
  function errorHandler(event){
  	_("status").innerHTML = "Upload Failed";
  }
  function abortHandler(event){
  	_("status").innerHTML = "Upload Aborted";
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


<script>  
//$.noConflict();
$(document).ready(function(){ 
  var count = 0;

 $('#user_dialog').dialog({
  autoOpen:false,
  width:400
 });

 $('#add').click(function(){
  $('#user_dialog').dialog('option', 'title', 'Add Data');
  $('#wine_year').val('');
  $('#alcohol').val(''); 
  $('#average_price').val('');
  $('#taste_profile').val('');
  $('#wine_enthausiast').val('');
  $('#wine_spectator').val('');
  $('#error_wine_year').text('');
  $('#error_alcohol').text('');
  $('#error_average_price').text('');
  $('#error_taste_profile').text('');
  $('#error_wine_enthausiast').text('');
  $('#error_wine_spectator').text('');
  $('#wine_year').css('border-color', '');
  $('#alcohol').css('border-color', ''); 
  $('#average_price').css('border-color', '');
  $('#taste_profile').css('border-color', ''); 
  $('#wine_enthausiast').css('border-color', '');
  $('#wine_spectator').css('border-color', '');
  $('#save').text('Save');
  $('#user_dialog').dialog('open');
 });

 $('#save').click(function(){
  var error_wine_year = '';
  var error_alcohol = '';
  var error_average_price = '';
  var error_taste_profile = '';
  var error_wine_enthausiast = '';
  var error_wine_spectator = '';
  var wine_year = '';
  var alcohol = ''; 
  var average_price = '';
  var taste_profile = ''; 
  var wine_enthausiast = '';
  var wine_spectator = '';
  if($('#wine_year').val() == '')
  {
   error_wine_year = 'First Name is required';
   $('#error_wine_year').text(error_wine_year);
   $('#wine_year').css('border-color', '#cc0000');
   wine_year = '';
  }
  else
  {
   error_wine_year = '';
   $('#error_wine_year').text(error_wine_year);
   $('#wine_year').css('border-color', '');
   wine_year = $('#wine_year').val();
  } 
  
  if($('#alcohol').val() == '')
  {
   error_alcohol = 'Last Name is required';
   $('#error_alcohol').text(error_alcohol);
   $('#alcohol').css('border-color', '#cc0000');
   alcohol = '';
  }
  else
  {
   error_alcohol = '';
   $('#error_alcohol').text(error_alcohol);
   $('#alcohol').css('border-color', '');
   alcohol = $('#alcohol').val();
  }  
  
  if($('#average_price').val() == '')
  {
   error_average_price = 'Last Name is required';
   $('#error_average_price').text(error_average_price);
   $('#average_price').css('border-color', '#cc0000');
   average_price = '';
  }
  else
  {
   error_average_price = '';
   $('#error_average_price').text(error_average_price);
   $('#average_price').css('border-color', '');
   average_price = $('#average_price').val();
  }  
  
  if($('#taste_profile').val() == '')
  {
   error_taste_profile = 'Last Name is required';
   $('#error_taste_profile').text(error_taste_profile);
   $('#taste_profile').css('border-color', '#cc0000');
   taste_profile = '';
  }
  else
  {
   error_taste_profile = '';
   $('#error_taste_profile').text(error_taste_profile);
   $('#taste_profile').css('border-color', '');
   taste_profile = $('#taste_profile').val();
  }  
  
  if($('#wine_enthausiast').val() == '')
  {
   error_wine_enthausiast = 'Last Name is required';
   $('#error_wine_enthausiast').text(error_wine_enthausiast);
   $('#wine_enthausiast').css('border-color', '#cc0000');
   wine_enthausiast = '';
  }
  else
  {
   error_wine_enthausiast = '';
   $('#error_wine_enthausiast').text(error_wine_enthausiast);
   $('#wine_enthausiast').css('border-color', '');
   wine_enthausiast = $('#wine_enthausiast').val();
  }  
  
  if($('#wine_spectator').val() == '')
  {
   error_wine_spectator = 'Last Name is required';
   $('#error_wine_spectator').text(error_wine_spectator);
   $('#wine_spectator').css('border-color', '#cc0000');
   wine_spectator = '';
  }
  else
  {
   error_wine_spectator = '';
   $('#error_wine_spectator').text(error_wine_spectator);
   $('#wine_spectator').css('border-color', '');
   wine_spectator = $('#wine_spectator').val();
  }
  
  if(error_wine_year != '' || error_alcohol != ''||error_average_price != '' || error_taste_profile != ''||error_wine_enthausiast != '' || error_wine_spectator != '')
  {
   return false;
  }
  else
  {
   if($('#save').text() == 'Save')
   {
    count = count + 1;
    output = '<tr id="row_'+count+'">';
    output += '<td>'+wine_year+' <input type="hidden" name="hidden_wine_year[]" id="wine_year'+count+'" class="wine_year" value="'+wine_year+'" /></td>';
    output += '<td>'+alcohol+' <input type="hidden" name="hidden_alcohol[]" id="alcohol'+count+'" value="'+alcohol+'" /></td>';
    output += '<td>'+average_price+' <input type="hidden" name="hidden_average_price[]" id="average_price'+count+'" class="average_price" value="'+average_price+'" /></td>';
    output += '<td>'+taste_profile+' <input type="hidden" name="hidden_taste_profile[]" id="taste_profile'+count+'" value="'+taste_profile+'" /></td>';
    output += '<td>'+wine_enthausiast+' <input type="hidden" name="hidden_wine_enthausiast[]" id="wine_enthausiast'+count+'" class="wine_enthausiast" value="'+wine_enthausiast+'" /></td>';
    output += '<td>'+wine_spectator+' <input type="hidden" name="hidden_wine_spectator[]" id="wine_spectator'+count+'" value="'+wine_spectator+'" /></td>';
    output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">Edit</button></td>';
    output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
    output += '</tr>';
    $('#user_data').append(output);
   }
   else
   {
    var row_id = $('#hidden_row_id').val();
    output = '<td>'+wine_year+' <input type="hidden" name="hidden_wine_year[]" id="wine_year'+row_id+'" class="wine_year" value="'+wine_year+'" /></td>';
    output += '<td>'+alcohol+' <input type="hidden" name="hidden_alcohol[]" id="alcohol'+row_id+'" value="'+alcohol+'" /></td>';
    output += '<td>'+average_price+' <input type="hidden" name="hidden_average_price[]" id="average_price'+row_id+'" class="average_price" value="'+average_price+'" /></td>';
    output += '<td>'+taste_profile+' <input type="hidden" name="hidden_taste_profile[]" id="taste_profile'+row_id+'" value="'+taste_profile+'" /></td>';
    output += '<td>'+wine_enthausiast+' <input type="hidden" name="hidden_wine_enthausiast[]" id="wine_enthausiast'+row_id+'" class="wine_enthausiast" value="'+wine_enthausiast+'" /></td>';
    output += '<td>'+wine_spectator+' <input type="hidden" name="hidden_wine_spectator[]" id="wine_spectator'+row_id+'" value="'+wine_spectator+'" /></td>';
    output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+row_id+'">Edit</button></td>';
    output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'">Remove</button></td>';
    $('#row_'+row_id+'').html(output);
   }

   $('#user_dialog').dialog('close');
  }
 });

 $(document).on('click', '.view_details', function(){
  var row_id = $(this).attr("id");
  var wine_year = $('#wine_year'+row_id+'').val();
  var alcohol = $('#alcohol'+row_id+'').val();
  var average_price = $('#average_price'+row_id+'').val();
  var taste_profile = $('#taste_profile'+row_id+'').val(); 
  var wine_enthausiast = $('#wine_enthausiast'+row_id+'').val();
  var wine_spectator = $('#wine_spectator'+row_id+'').val();
  $('#wine_year').val(wine_year);
  $('#alcohol').val(alcohol);
  $('#average_price').val(average_price);
  $('#taste_profile').val(taste_profile);
  $('#wine_enthausiast').val(wine_enthausiast);
  $('#wine_spectator').val(wine_spectator);
  $('#save').text('Edit');
  $('#hidden_row_id').val(row_id);
  $('#user_dialog').dialog('option', 'title', 'Edit Data');
  $('#user_dialog').dialog('open');
 });

 $(document).on('click', '.remove_details', function(){
  var row_id = $(this).attr("id");
  if(confirm("Are you sure you want to remove this row data?"))
  {
   $('#row_'+row_id+'').remove();
  }
  else
  {
   return false;
  }
 });

 $('#action_alert').dialog({
  autoOpen:false
 });

});  
</script>


<?php
$accessKey = $secretKey = $targetName = $imageLocation = $itemType = $itemLocation = $androidAsset = $iosAsset = $scale = $rotation = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['upload_object'])){
        include 'getKeys.php';
        $targetName = test_input($_POST["targetname"]);		
		$imageLocation = "images/".test_input($_POST["file1"]);
        $itemType = test_input($_POST['content']);
        if($itemType == "image" || $itemType == "3dmodel" || $itemType == "video" || $itemType == "greenscreen" || $itemType == "audio"){
            $itemLocation = test_input($_POST['file2']);
        }else if($itemType == "assetbundle")
        {
            $androidAsset = test_input($_POST['file3']);
            $iosAsset = test_input($_POST['file4']);
            $itemLocation = $androidAsset."-".$iosAsset;
        }else{
            $itemLocation = test_input($_POST['url']);
        }
        $scale = test_input($_POST['scale']);
        $rotationx = test_input($_POST['rotationx']);
        $rotationy = test_input($_POST['rotationy']);
        $rotationz = test_input($_POST['rotationz']);
        
		$region = test_input($_POST['region']);
		$grapeType = test_input($_POST['grapeType']);
		$pairing = test_input($_POST['pairing']);       
        
       
		$wine_yearArr = $_POST['hidden_wine_year'];
		$alcoholArr = $_POST['hidden_alcohol'];
		$average_priceArr = $_POST['hidden_average_price'];
		$taste_profileArr = $_POST['hidden_taste_profile'];
		$wine_enthausiastArr = $_POST['hidden_wine_enthausiast'];
		$wine_spectatorArr = $_POST['hidden_wine_spectator'];
		
		$YearArr = array();
		for($i=0; $i< count($wine_yearArr); $i++) {
			$YearArr[$i]['wine_year'] = $wine_yearArr[$i];
			$YearArr[$i]['alcohol'] = $alcoholArr[$i];
			$YearArr[$i]['average_price'] = $average_priceArr[$i];
			$YearArr[$i]['taste_profile'] = $taste_profileArr[$i];
			$YearArr[$i]['wine_enthausiast'] = $wine_enthausiastArr[$i];
			$YearArr[$i]['wine_spectator'] = $wine_spectatorArr[$i];	
		}
		
		$YearArrFinal = json_encode($YearArr);
		require_once 'vuforia/php/PostNewTarget.php';
		$instance = new PostNewTarget($accessKey, $secretKey, $targetName, $imageLocation, $itemType, $itemLocation, $scale, $rotationx, $rotationy, $rotationz,$region,$grapeType,$pairing,$YearArrFinal);
    }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>