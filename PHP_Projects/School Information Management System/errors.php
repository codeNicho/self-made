<?php
//session_start();
if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>

<?php
//session_start();
if (count($errors1) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors1 as $error1) : ?>
  	  <p><?php echo $error1 ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
