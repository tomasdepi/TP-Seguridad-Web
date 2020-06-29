<?php
  if(!empty($_FILES['uploaded_file']))
  {
    $path = "uploads/";
    $path = $path . $_POST['name'];
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo "your file was uploaded. click <a href='$path'>here</a> to open it";
    } else{
        echo "There was an error uploading the file, please try again!";
    }
    die();
  }else{

?>
<html>
<body>

<h1>Welcome to the Admin Upload Images Service!!!!!</h1>

<h2>Instructions:</h2>
<p>
	Upload File<br/>
	<br/>
</p>

  <form enctype="multipart/form-data" action="index.php" method="POST">
    <p>Upload your file</p>
    File Name: <input type="text" name="name"></input><br />
    <input type="file" name="uploaded_file"></input><br />
    <input type="submit" value="Upload"></input>
  </form>
</body>
</html>

<?php }