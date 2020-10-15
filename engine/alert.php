<?php if(isset($_GET['i'])){ ?>
<div class="alert-i">
		<p><?php echo $_GET['i']."."; ?></p>
</div>
<?php }elseif(isset($_GET['w'])){ ?>
<div class="alert-w">
		<p><?php echo $_GET['w']."."; ?></p>
</div>
<?php } ?>