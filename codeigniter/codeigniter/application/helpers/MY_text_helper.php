<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('JS_CSS_files'))
{
	function JS_CSS_files()
	{
		$array = array('<meta name="viewport" content="width=device-width, initial-scale=1.0"  charset="utf-8">',
		 			   '<link href="'.base_url().'assets/dist/css/bootstrap.min.css" rel="stylesheet" media="screen">', 
		 			   '<script src="'.base_url().'assets/dist/js/jquery.js" ></script>',
		 			   '<script src="'.base_url().'assets/dist/js/bootstrap.min.js" ></script>',
		 			   '<script src="'.base_url().'assets/dist/js/bootstrap.js" ></script>');
		return $array;
	}   
}
if ( ! function_exists('navbar'))
{
	function navbar()
	{
		$html = '
			<div class="container">
				<nav class="navbar navbar-default" role="navigation">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<ul class="nav nav-tabs">
							<li><a href="#">Mantenimientos</a></li>
							<li><a  href="'.base_url().'Estudiantes">Estudiantes</a></li>
							<li><a  href="'.base_url().'Profesores">Profesores</a></li>
							<li><a  href="'.base_url().'Aulas">Aulas</a></li>
							<li><a  href="'.base_url().'Cursos">Cursos</a></li>
							<li><a  href="'.base_url().'Grupos">Grupos</a></li>
						</ul>
					</div>
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">Buscar</button>
					</form>
					<ul class="nav nav-tabs navbar-right">
						<li><a class="" href="#">Salir</a></li>
					</ul>
				</nav>	
			</div>';
		return $html;
	}
}
if ( ! function_exists('modal'))
{
	function modal($data,$route,$seccion)
	{
		$html = 
			'<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
				<div class="modal-dialog">
					<div id="form-content" class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">Crear '.$seccion.'</h4>
						</div>
						<div class="modal-body">
				  			<form class="form-horizontal" id = "mo" method="POST" action="'.base_url().'index.php/'.$route.'">
								'.FormModal($data).'
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									<input class="btn btn-success" type="submit" value="Guardar" id="submit">
								</div>
							</form>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<footer>
				<script>
					$(".update").click ( function () {
    					var hreff = $("#mo").attr("action");
    					var route = "'.base_url().'"'.' + $(this).attr ( "id" );
 						$("#mo").attr("action",route); 
 						$("#myModal").modal("show");

					});
				</script>
			</footer>
		';
		return $html;
	}
}
if ( ! function_exists('_table'))
{
	function _table($data,$heading,$seccion)
	{
		$html =
			'<div class="container">
				<h1 class = "text-primary"><small>'.$seccion.'</small></h1>
					<table class="table">
						<thead>'.thead($heading).'
						</thead>
						<tbody>'.rows($data,$seccion).'</tbody>
					</table>
				<button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
				Crear
				</button><br>
				<p class="text-center"><a class="glyphicon glyphicon-circle-arrow-left" href=""></a>  
					<a class="glyphicon glyphicon-circle-arrow-right" href=""></a>
				</p>
			</div>
		';
		return $html;
	}

}
if ( ! function_exists('rows'))
{
	function rows($data,$seccion){
		$html ='';
		foreach ($data as $u){
			$html .= '<tr>';
			$cont = 1;
			foreach ($u as $o)
			{
				if ($cont != 1) {
					$html .='<td>'.$o.'</td>';

				}
				$cont++;
				
			}
			$html .='<td >
						<a class="delete" style="margin-left:25%;"  href="'.$seccion.'/borrar/'.$u->id.'"><span class="glyphicon glyphicon-remove"></span></a>
						<a class="update" href="#" id="'.$seccion.'/editar/'.$u->id.'"><span class="glyphicon glyphicon-pencil"></span></a>

					</td>
					</tr>';
		}	
		return $html;			
	}
}
if ( ! function_exists('thead'))
{
	function thead($data)
	{
		$html ='<tr>';
			foreach ($data as $u){
				$html .='<th class = "text-primary">'.$u.'</th>';
			}	
			$html .='</tr>';
		return $html;			
	}
}
if ( ! function_exists('FormModal'))
{
	function FormModal($data)
	{
		$html ='';
		$cont = 1;
		foreach ($data as $u){
			if ($u['type'] == 'datalist') {//Datalist Para varias tablas
				$html .='<div class="form-group">
							<label for="datalist'.$cont.'" class="col-sm-2 control-label">'.$u['text'].'</label>
							<div class="col-sm-5">
								<input  name="input'.$cont.'" class="form-control" list="input'.$cont.'" placeholder="'.$u['text'].'" required>
								<datalist id="input'.$cont.'">'.datalist($u['table'],$u['tableName']).'</datalist> 
							</div>';
					if (next($u)!= 'null') {
						$html .='</div>';
					};
			}else{
				$html .='<div class="form-group">
					<label for="input'.$cont.'" class="col-sm-2 control-label">'.$u['text'].'</label>
					<div class="col-sm-5">
						<input type="'.$u['type'].'" class="form-control" name="input'.$cont.'" placeholder="'.$u['text'].'" required>
					</div>';
					if (next($u)!= 'null') {
						$html .='</div>';
					};
			}
			$cont++;		
		}
		return $html;			
	}
}
if ( ! function_exists('datalist'))
{
	function datalist($data,$table)
	{
		$html='';
		if ($table=='professor') {
			foreach ($data as $u){
      			$html .='<option value="'.$u->id.'">'.$u->first_name.' '.$u->last_name.'</option>'."\n";
      		}
      	}else{
      		foreach ($data as $u){
      			$html .='<option value="'.$u->id.'">'.$u->name.'</option>'."\n";
      		}
      	}
      	return $html;		
	}
}
