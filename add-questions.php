<?php $item = $_GET['id']; ?>
<?php include 'header.php'; ?>
  <div class="container-fluid">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      	<div class="col-xl-12">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">Questions</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-question fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
            <div id="questions">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5 field_wrapper">
                    <div>
                        <?php
                        include 'connection.php';
                        $result = mysqli_query($conn,"SELECT * FROM questions WHERE item='$item'"); 
                        $count = mysqli_num_rows($result);
                        if($count!=0){
                        $number = 11 - $count;
                        while($row = mysqli_fetch_array($result)){
                        ?>
              			<div class="form-group">
              			    <input class="form-control" name="item" type="text" value="<?php echo $item; ?>" style="display:none;">
          					<label for="">Question:</label><input class="form-control" name="question[]" type="text" value="<?php echo $row['question'];?>" required>
          			    </div>	
          			    <div class="row">
          			        <div class="col-md-3">
          			            <div class="form-group">
                  					<label for="">Option a:</label><input class="form-control" name="a[]" type="text" value="<?php echo $row['a'];?>" required>
                  			    </div>
          			        </div>
          			        <div class="col-md-3">
          			            <div class="form-group">
                  					<label for="">Option b:</label><input class="form-control" name="b[]" type="text" value="<?php echo $row['b'];?>" required>
                  			    </div>
          			        </div>
          			        <div class="col-md-3">
          			            <div class="form-group">
                  					<label for="">Option c:</label><input class="form-control" name="c[]" type="text" value="<?php echo $row['c'];?>" required>
                  			    </div>
          			        </div>
          			        <div class="col-md-3">
          			            <div class="form-group">
                  					<label for="">Option d:</label><input class="form-control" name="d[]" type="text" value="<?php echo $row['d'];?>" required>
                  			    </div>
          			        </div>
          			    </div>
          			    <div class="form-group">
          					<label for="">Select Correct option:</label>
              			    <input type="checkbox" id="a" name="correct[]" value="a" <?php echo ($row['correct']==a ? 'checked' : '');?>><label for="a">a</label>
                            <input type="checkbox" id="b" name="correct[]" value="b" <?php echo ($row['correct']==b ? 'checked' : '');?>><label for="b">b</label>
                            <input type="checkbox" id="c" name="correct[]" value="c" <?php echo ($row['correct']==c ? 'checked' : '');?>><label for="c">c</label>
                            <input type="checkbox" id="d" name="correct[]" value="d" <?php echo ($row['correct']==d ? 'checked' : '');?>><label for="d">d</label>
                        </div>
                        <?php
                        }
                        }else{
                        $number = 10; 
                        ?>
              			<div class="form-group">
              			    <input class="form-control" name="item" type="text" value="<?php echo $item; ?>" style="display:none;">
          					<label for="">Question:</label><input class="form-control" name="question[]" placeholder="Enter Question here" type="text" value="<?php echo isset($_POST['question']) ? $_POST['question'] : '' ?>" required>
          			    </div>	
          			    <div class="row">
          			        <div class="col-md-3">
          			            <div class="form-group">
                  					<label for="">Option a:</label><input class="form-control" name="a[]" placeholder="Enter First Option(a) here" type="text" value="<?php echo isset($_POST['a']) ? $_POST['a'] : '' ?>" required>
                  			    </div>
          			        </div>
          			        <div class="col-md-3">
          			            <div class="form-group">
                  					<label for="">Option b:</label><input class="form-control" name="b[]" placeholder="Enter Second Option(b) here" type="text" value="<?php echo isset($_POST['b']) ? $_POST['b'] : '' ?>" required>
                  			    </div>
          			        </div>
          			        <div class="col-md-3">
          			            <div class="form-group">
                  					<label for="">Option c:</label><input class="form-control" name="c[]" placeholder="Enter Third Option(c) here" type="text" value="<?php echo isset($_POST['c']) ? $_POST['c'] : '' ?>" required>
                  			    </div>
          			        </div>
          			        <div class="col-md-3">
          			            <div class="form-group">
                  					<label for="">Option d:</label><input class="form-control" name="d[]" placeholder="Enter Fourth Option(d) here" type="text" value="<?php echo isset($_POST['d']) ? $_POST['d'] : '' ?>" required>
                  			    </div>
          			        </div>
          			    </div>
          			    <div class="form-group">
          					<label for="">Select Correct option:</label>
              			    <input type="checkbox" id="a" name="correct[]" value="a"><label for="a">a</label>
                            <input type="checkbox" id="b" name="correct[]" value="b"><label for="b">b</label>
                            <input type="checkbox" id="c" name="correct[]" value="c"><label for="c">c</label>
                            <input type="checkbox" id="d" name="correct[]" value="d"><label for="d">d</label>
                        </div>
                        <?php
                        }
                        ?>
                        <a href="javascript:void(0);" class="add_button" style="float:right;" title="Add field">+ Add More Questions</a>
                    </div>
          		</div>
          	    <script type="text/javascript">
                $(document).ready(function(){
                    var maxField = <?php echo $number; ?>; //Input fields increment limitation
                    var addButton = $('.add_button'); //Add button selector
                    var wrapper = $('.field_wrapper'); //Input field wrapper
                    var fieldHTML = '<div><div class="form-group"><label for="">Question:</label><input class="form-control" name="question[]" placeholder="Enter Question here" type="text" value="<?php echo isset($_POST['question']) ? $_POST['question'] : '' ?>" required></div>	<div class="row"><div class="col-md-3"><div class="form-group"><label for="">Option a:</label><input class="form-control" name="a[]" placeholder="Enter First Option(a) here" type="text" value="<?php echo isset($_POST['a']) ? $_POST['a'] : '' ?>" required></div></div><div class="col-md-3"><div class="form-group"><label for="">Option b:</label><input class="form-control" name="b[]" placeholder="Enter Second Option(b) here" type="text" value="<?php echo isset($_POST['b']) ? $_POST['b'] : '' ?>" required></div></div><div class="col-md-3"><div class="form-group"><label for="">Option c:</label><input class="form-control" name="c[]" placeholder="Enter Third Option(c) here" type="text" value="<?php echo isset($_POST['c']) ? $_POST['c'] : '' ?>" required></div></div><div class="col-md-3"><div class="form-group"><label for="">Option d:</label><input class="form-control" name="d[]" placeholder="Enter Fourth Option(d) here" type="text" value="<?php echo isset($_POST['d']) ? $_POST['d'] : '' ?>" required></div></div></div><div class="form-group"><label for="">Select Correct option:</label><input type="checkbox" id="a" name="correct[]" value="a"><label for="a">a</label><input type="checkbox" id="b" name="correct[]" value="b"><label for="b">b</label><input type="checkbox" id="c" name="correct[]" value="c"><label for="c">c</label><input type="checkbox" id="d" name="correct[]" value="d"><label for="d">d</label></div><a href="javascript:void(0);" class="remove_button">Remove This Question</a></div>'; //New input field html 
                    var x = 1; //Initial field counter is 1
                    
                    //Once add button is clicked
                    $(addButton).click(function(){
                        //Check maximum number of input fields
                        if(x < maxField){ 
                            x++; //Increment field counter
                            $(wrapper).append(fieldHTML); //Add field html
                        }
                    });
                    
                    //Once remove button is clicked
                    $(wrapper).on('click', '.remove_button', function(e){
                        e.preventDefault();
                        $(this).parent('div').remove(); //Remove field html
                        x--; //Decrement field counter
                    });
                });
                </script>
                </div>
          	</div>
          </div>
        </div>
    </div>
      </script>
  <button class="btn btn-primary my-3" type="submit" name="upload" style="width: 100%;"> PROCEED DATA</button>
</form>
</div>
<?php include 'footer.php'; ?>
<?php
$question = $a = $b = $c = $d = $correct = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['upload'])){
        include 'connection.php';
        $item=$_POST['item'];
		$query="delete from questions where item='$item'";
        if (mysqli_query($conn, $query)) {
            echo "deleted";
        }
        $item=$_POST['item'];
        $question=$_POST['question'];
        $a=$_POST['a'];
        $b=$_POST['b'];
        $c=$_POST['c'];
        $d=$_POST['d'];
        $correct=$_POST['correct'];
        for($i=0;$i<count($question);$i++)
        {
          if($question[$i]!="" && $a[$i]!="" && $b[$i]!="" && $c[$i]!="" && $d[$i]!="" && $correct[$i]!="")
          {
           if(mysqli_query($conn,"insert into questions(item,question,a,b,c,d,correct) values('$item','$question[$i]','$a[$i]','$b[$i]','$c[$i]','$d[$i]','$correct[$i]')")){
               echo "done";
           }else{
               echo $conn->error;
           }
          }
        }
        echo "<script>
            window.location.href = 'target-manager.php';
        </script>";
    }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>