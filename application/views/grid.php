<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$seg3 = $this->uri->segment(3);
$seg4 = $this->uri->segment(4);
$charDoc = 29;// caracteres que tiene el documento PDF valido
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/b-1.5.2/b-flash-1.5.2/sc-1.5.0/datatables.min.css"/>

    <title>SEPEN Terceros</title>
    <style media="screen">
    .modal-dialog{
      max-width: 90%
    }
    #modalCloser{
      text-align:right
    }
    </style>
  </head>
  <body>

<!-- SEPEN Documentos a terceros -->
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand">Documentacion de Terceros - Secretaria de Educación Pública del Estado de Nayarit</a>
</nav>
<!-- Home -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb" style=margin-bottom:unset >
    <li class="breadcrumb-item"><a>Home</a></li>
    <!-- Muestra los links de posicion y de retorno -->
    <?php
    if ($seg3) {
    			echo "<li class='breadcrumb-item'><a href=".base_url().">Año $seg3</a></li>";
    if ($seg4) {
      $seg4b = $seg4;
    	echo "<li class='breadcrumb-item'><a href=".base_url()."index.php/welcome/b/$seg3>Quincena ".substr($seg4b,1)."</a></li>";
    }
    }
     ?>
  </ol>
</nav>
<!-- Todo lo demas -->
<section >
  <!-- Div Grande -->
<div class="row" >


  <div class="col-3"   >
    <!-- Div de las carpetas -->
    <table class="table table-sm" >
      <thead>
        <tr>
          <th scope="col">Carpetas</th>
        </tr>
      </thead>
      <tbody>
         <?php
          for ($i=0; $i < count($archgivos); $i++) { //pasa uno por uno los archivos dentro de la carpeta
          	if (substr($archgivos[$i], -1)=='\\'){
          	if ($seg3 && $seg4){
          ?>
          		<tr><td><a>      <?php echo trim($archgivos[$i],"\\") ?></a></td></tr>
          	<?php    } else if (!$seg3){    ?>
          		<tr><td><a href="<?php echo base_url()."index.php/welcome/b/" .$archgivos[$i] ?>">
                Año            <?php echo trim($archgivos[$i],"\\") ?></a></td></tr>
          	<?php    } else if ($seg3){     ?>
          		<tr><td><a href="<?php echo base_url()."index.php/welcome/q/".$sub."/".$archgivos[$i] ?>">
                Quincena       <?php echo substr(trim($archgivos[$i],"\\"),1) ?></a></td></tr>
          	<?php
             }
              }
               }
          ?>

      </tbody>
    </table>
  </div>
  <!-- Div de los archivos -->
  <div class="col-9" >
    <div class="tab-content sc" >
      <table id='myTable'class="table table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">RFC</th>
            <th scope="col">Código</th>
            <th scope="col">Movimiento</th>
            <th >

            <button type="button" onclick="abrirDocumento();" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
              Abrir</button>
            <!-- <button type="button" onclick="calis()" name="calis">calis</button> -->
            <!-- Modal content-->

            </th>
          </tr>
        </thead>
        <tbody>
        <?php
        $terceros=0;
        for ($i=0; $i < count($archgivos) ; $i++) {
          if (substr($archgivos[$i], -4)=='.pdf' && strlen($archgivos[$i])>=$charDoc){
            ?>
            <tr>
            <td> <?php echo ++$terceros; ?>                   </td>
            <td> <?php echo substr($archgivos[$i], 0,13);?>   </td>
            <td> <?php echo substr($archgivos[$i], 14,2);?>   </td>
            <td> <?php echo substr($archgivos[$i], 24,1);?>   </td>
            <td>

            <!-- al cliquear se llama la funcion "abrirDocumento" y se manda la variable "toda la ruta" -->
            <input type="radio" id="pagina" name="pagina"
            onclick="guardaDir('<?php echo base_url()."/terceros/$seg3/$seg4/".$archgivos[$i] ?>'
            ,'<?php echo $archgivos[$i] ?>')">
            Ver
          </input>
            </td>
          </tr>
          <?php
        }
      }
        ?>
        <!-- Modal -->
 <div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog">

     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header">
         <h4 id="h4" value="Modal Header" class="modal-title">php</h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
       <div class="modal-body">
         <iframe id="frame1" src="" width="100%" height="700"></iframe>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
     </div>

   </div>
 </div>
        </tbody>
      </table>
  </div>
</div>
</section>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!-- https://datatables.net/download/index -->
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/b-1.5.2/b-flash-1.5.2/sc-1.5.0/datatables.min.js"></script>
        <script type="text/javascript">
var ruta;
var archivo;
function guardaDir(a, b){//obtiene el nombre del archivo y su ruta
  ruta = a;
  archivo = b;
  return ruta, archivo;//se dejan los valores en la global
}
function abrirDocumento(){
  var iframe = document.getElementById("frame1");//toma el iframe
  iframe.setAttribute("src",ruta); //asigna la ruta en src
  $("h4.modal-title").text(archivo);//imprime archivo en h4 del model
  //alert(ruta);
}
// function calis(){
//   alert(archivo);
// }
$(document).ready( function () {
  $('#myTable').DataTable();
} );
$('#myTable').DataTable( {
  paging: false,
  scrollY: 650,
} );
    </script>
  </body>
</html>
