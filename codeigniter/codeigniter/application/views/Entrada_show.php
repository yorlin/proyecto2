<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to my blog</title>

	<style type="text/css">

	::selection{ background-color: #52AF9B;  }
	::moz-selection{ background-color: #52AF9B;  }
	::webkit-selection{ background-color: #52AF9B; }

	body {
		background-color: #C4E6E6;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid ;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid ;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		
		border: 1px solid ;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>

</head>
<body>


<div id="container" style="height: 800px;">

	<h1>Welcome to <?php echo $blog_name; ?></h1>




	<div id="body" style="float: left; height: 800px; ">
		
			<div>
			<h2><?php echo $entry['Titulo'] ?> </h2>

			<h3><?php echo $entry['Fecha'] ?> </h3>		
			<p>
				<?php echo $entry['Texto'] ?> 
			</p>
			</div>
			<hr>
	
		
	</div>

	<div id="sidebar" style="float: right; width: 200px; height: auto; ">
		<div>
		<img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSJBbRH7MxaXmvP8SJcfmzX4EgUjC0TjvnrNmHiJDxb7YjDgO9A" style="width: 90px; height: 90px;">
			

			<?php foreach ($biographi as $key => $bio) : ?>
			<div>
			<h2><?php echo $bio['Nombre'] ?> </h2>

			<h3><?php echo $bio['title'] ?> </h3>		
			<p>
				<?php echo $bio['content'] ?> 
			</p>
			</div>
			<hr>
		<?php endforeach; ?>

		
			


		</div>
<form action="<?php echo base_url(); ?>entrada/Comentario" method="post">
       <?=form_hidden('entrada',$id_entrada);?>
        <input type="submit" name="Comentar" value="Comentar" >
</form>


	</div>






</div>
<div id="body" style="height: 800px; ">
		
			<?php foreach ($comentario as $key => $entry) : ?>
			<div>
			<h2><?php echo $entry['author'] ?> </h2>

			<span><?php echo $entry['date'] ?> </span>		
			<p>
				<?php echo $entry['comment'] ?> 
			</p>
			</div>
			<hr>
<?php endforeach; ?>		
	</div>

</body>
</html>