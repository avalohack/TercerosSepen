<?php
defined('BASEPATH') OR exit('No direct script access allowed');
dirname(__FILE__);
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Terceros</title>

<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
</head>
<body>

<?php
//var_dump($archgivos);
echo "<br>Estas en ";
echo "<a>Terceros</a>";
$seg3 = $this->uri->segment(3);
$seg4 = $this->uri->segment(4);
if ($seg3) {
		 	echo " => ";
			echo "<a href=".base_url().">Año $seg3</a>";
if ($seg4) {
	echo " => ";
	echo "<a href=".base_url()."index.php/welcome/b/$seg3>Quincena $seg4</a>";
}

}
//echo "<br>$sub<br>";
// echo "$seg2";
// echo "$seg3";
// if (isset($sub)) {echo $sub;}

$charDoc = 29;// caracteres que tiene el documento PDF valido
if (!$seg4){
	echo "<br>---------- directorios -----------<br>";
}
for ($i=0; $i < count($archgivos); $i++) { //pasa uno por uno los archivos dentro de la carpeta
  //if muestra nombre si es una carpeta terminacion diagonal invertida
	if($seg4){
		break;
	}
	if (substr($archgivos[$i], -1)=='\\'){
		//echo "<a href=".base_url()$archgivos[$i]">".$archgivos[$i]."</a>";
		//echo $archgivos[$i];
	if ($seg3 && $seg4){
		echo"<a>$archgivos[$i]</a>";
	} else if (!$seg3){
		echo "<a href=".base_url()."index.php/welcome/b/" .$archgivos[$i].">".$archgivos[$i]."</a>";
	}
	else if ($seg3){
		echo "<a href=".base_url()."index.php/welcome/q/".$sub."/".$archgivos[$i].">".$archgivos[$i]."</a>";
	}
	// echo "<a href=".base_url($archgivos[$i])."index.php/welcome/b/" .">".$archgivos[$i]."</a>";
		//print_r(scandir($archgivos[$i]));
		echo "<br>";//echo substr($archgivos[$i], 0);
	}

}

// echo "<br>---------- terceros ---------------<br>";
// 	//pasa por los archivos de la carpeta
// for ($i=0; $i < count($archgivos); $i++) {
// 	// if solo muestra archivos que terminen en .pdf y tengan 26 caracteres
// if (substr($archgivos[$i], -4)=='.pdf' && strlen($archgivos[$i])>=$charDoc){
// 	echo substr($archgivos[$i], 0,13)."  " ; //obtiene el RFC
// 	echo substr($archgivos[$i], 14,2)."  " ; //obtiene el codigo
// 	echo substr($archgivos[$i], 24,1)."  " ; //obtiene el movimiento
// 	echo substr($archgivos[$i], 17,4)."  " ; //obtiene el año
//   echo substr($archgivos[$i], 21,2)."  " ; //obtiene la quincena
// 	if(strlen($archgivos[$i])>$charDoc){
// 		echo substr($archgivos[$i], 29, 1)." copias" ; //si hay mas documentos con el mismo nombre
// 	}
// 	echo "<br>";
// 	//echo strlen($archgivos[$i]). "<br>"; //cuenta los caracteres del string
// }
// }
// echo "<br>---------- archivos que no cumplen los requisitos -----------<br>";
// for ($i=0; $i < count($archgivos); $i++) {
// if (substr($archgivos[$i], -1)!='\\' && strlen($archgivos[$i]) <=23) {
// 	// if muestra archivo si no es carpeta y si no tiene 26 caracteres
// echo $archgivos[$i]."<br>";
// }
// }



 ?>

	<table id="sepenTable" class="table table-sm">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">RFC</th>
	      <th scope="col">Código</th>
	      <th scope="col">Movimiento</th>
	      <th scope="col">Año</th>
	      <th scope="col">Quincena</th>
	      <th scope="col">Copias</th>
	    </tr>
	  </thead>
	  <tbody>
	    <?php
	    $pdfs = 0;
	    for ($i=0; $i < count($archgivos); $i++) {

	      if (substr($archgivos[$i], -4)=='.pdf' && strlen($archgivos[$i])>=$charDoc){
	         echo '<tr><th scope="row">'.++$pdfs.'</th>';
	    	   echo '<td>'.substr($archgivos[$i], 0,13).'</td>' ; //obtiene el RFC
	    	   echo '<td>'.substr($archgivos[$i], 14,2).'</td>' ; //obtiene el codigo
	    	   echo '<td>'.substr($archgivos[$i], 24,1).'</td>' ; //obtiene el movimiento
	    	   echo '<td>'.substr($archgivos[$i], 17,4).'</td>' ; //obtiene el año
	         echo '<td>'.substr($archgivos[$i], 21,2).'</td>' ; //obtiene la quincena
	    	if(strlen($archgivos[$i])>$charDoc){
	    		echo '<td>'.substr($archgivos[$i], 29, 1).'</td></tr>' ; //si hay mas documentos con el mismo nombre
	      }
	    }
	    }
	    ?>
	  </tbody>
	</table>

 	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.
	<?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
 </div>

<script type="text/javascript" src="DataTables/datatables.min.js"></script> <script type="text/javascript">
 $(document).ready( function () {
 	$('#sepenTable').DataTable();
 } );
 </script>

</body>
</html>





















<?php
$terceros=0;
for ($i=0; $i < count($archgivos) ; $i++) {
	if (substr($archgivos[$i], -4)=='.pdf' && strlen($archgivos[$i])>=$charDoc){
		?>
 "<tr>
		<td>  <?php echo  (++$terceros) ?> </td>
		<td> <?php echo (substr($archgivos[$i], 0,13)) ?></a></td>
		<td> <?php echo (substr($archgivos[$i], 14,2)) ?></td>
		<td> <?php echo (substr($archgivos[$i], 24,1)) ?></td>
		<td>
		<!-- Button trigger modal -->
		<button class = "btn btn-primary btn-lg" data-toggle = "modal" data-target = "#myModal">
		Ver
		</button>
		<!-- Modal -->
		<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = >

			<div class = "modal-dialog">
				<div class = "modal-content">

					<div class = "modal-header">
						<button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
							&times;
						</button>

						<h4 class = "modal-title" id = "myModalLabel">
							<?php echo $archgivos[$i] ?>
						</h4>
					</div>

					<div class = "modal-body">
					<iframe id="showPDF" width="100%"  src="<?php echo base_url()."/terceros/$seg3/$seg4/".$archgivos[$i]?>" width="700" height="1000" style="border: none;"></iframe>

					</div>

					<div class = "modal-footer">
						<button type = "button" class = "btn btn-default" data-dismiss = "modal">
							Cerrar
						</button>


						

					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->

		</div><!-- /.modal -->


		</td>
	</tr>
<?php
}
}
?>
