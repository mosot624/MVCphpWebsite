
<div class="text-center">
	<?php if(isset($_SESSION['is_logged_in'])): ?>
	<a class="btn btn-success btn-share " href="<?php echo ROOT_URL;?>shares/add" style="margin: 10px">Shares</a>
	<?php endif?>
	<?php foreach($viewmodel as $item): ?>
		<div class="card card-body bg-light" style="margin:10">
			<h3><?php echo $item['title'];?></h3>
			<small><?php echo $item['create_date']?></small>
			<p><?php echo $item['body']?></p>
			<br>
			<a class="btn btn-default" href="<?php echo  $item['link']?>" target="_blank"> Go to website </a>
		</div>
		<br>
	<?php endforeach ;?>
</div>
