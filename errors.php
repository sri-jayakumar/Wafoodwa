<?php
	session_start();
	if(array_key_exists('errors', $_SESSION)) {
		$errors = $_SESSION['errors'];
	} else {
		$errors = array();
		$_SESSION['errors'] = $errors;
	}
	if (count($errors) > 0) : 
?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>