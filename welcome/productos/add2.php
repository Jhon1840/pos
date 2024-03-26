

<?php
include("conexion.php");
?>

<?php 
			$caracteres = '0123456789';
			$longitud = 2;
			$codigo = '';
			for ($i = 0; $i < $longitud; $i++) {
				$codigo .= $caracteres[mt_rand(0, strlen($caracteres) - 1)];
			}
			$codigo='EP-'.$codigo.'/23'

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/> 
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

</head>

<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">

<header>
    <!--Nav-->
    <nav aria-label="menu nav" class=" pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">

        <div class="flex flex-wrap items-center">
            <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
                <a href="#" aria-label="Home">
                    <span class="text-xl pl-2"><i class="">Dashboard</i></span>
                </a>
            </div>

            

            
        </div>

    </nav>
</header>


<main>

    <div class="flex flex-col md:flex-row mx-auto">
        <nav aria-label="alternative nav">
            <div class="bg-gray-800 shadow-xl h-20  fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48 content-center">

                <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                    <ul class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left">
                    <li class="mr-3 flex-1">
                        <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline border-b-2 border-transparent hover:border-gray-800">
                            <i class="fas fa-tasks pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Almacen</span>
                        </a>
                    </li>
                            
                        <li class="mr-3 flex-1">
                            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                                <i class="fas fa-plus-circle pr-0 md:pr-3 text-blue-600"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Agregar Producto</span>
                            </a>
                        </li>

                        <li class="mr-3 flex-1">
                            <a href="index2.php" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline border-b-2 border-transparent hover:border-blue-600">
                                <i class="fas fa-chart-area pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Productos</span>
                            </a>
                        </li>

                        <li class="mr-3 flex-1">
                            <a href="#" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-red-500">
                                <i class="fa fa-wallet pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Facturacion</span>
                            </a>
                        </li>
                    </ul>
                </div>


            </div>
        </nav>
        <section>
            <div id="main" class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

                <div class="bg-gray-800 pt-3">
                    <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                        <h1 class="font-bold pl-2">AGREGAR NUEVO PRODUCTO         .</h1>
                    </div>
                </div>

                <div class="container mx-auto px-4 py-4">
        <h2>Datos del Producto</h2>
        <hr />

    <?php
      if (isset($_POST['add'])) {
        // Escape user input to prevent SQL injection
        //$codigo = mysqli_real_escape_string($con, strip_tags($_POST["codigo"], ENT_QUOTES));
        $nombres = mysqli_real_escape_string($con, strip_tags($_POST["nombres"], ENT_QUOTES));
        $lugar_nacimiento = mysqli_real_escape_string($con, strip_tags($_POST["descripcion"], ENT_QUOTES));
        $fecha_nacimiento = mysqli_real_escape_string($con, strip_tags($_POST["fecha_nacimiento"], ENT_QUOTES));
        $direccion = mysqli_real_escape_string($con, strip_tags($_POST["direccion"], ENT_QUOTES));
        $telefono = mysqli_real_escape_string($con, strip_tags($_POST["telefono"], ENT_QUOTES));
        $puesto = mysqli_real_escape_string($con, strip_tags($_POST["puesto"], ENT_QUOTES));
        $estado = mysqli_real_escape_string($con, strip_tags(1, ENT_QUOTES));

        $cek = mysqli_query($con, "SELECT * FROM empleados WHERE codigo='$codigo'");
        if (mysqli_num_rows($cek) == 0) {
          $insert = mysqli_query($con, "INSERT INTO empleados(codigo, empresa, lugar_nacimiento, fecha_nacimiento,direccion ,telefono, puesto, estado)
                                          VALUES('$codigo','$nombres', '$lugar_nacimiento', '$fecha_nacimiento','$direccion', '$telefono', '$puesto', '$estado')")
                                  or die(mysqli_error($con));

          if ($insert) {
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
          } else {
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
          }
        } else {
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. código exite!</div>';
        }
      }
    ?>

    <form class="flex flex-col space-y-4" action="" method="post">
      <div class="flex flex-row items-center">
        <label class="w-1/4 text-sm font-medium text-gray-700 mr-2" for="codigo">Código</label>
        <input type="text" name="codigo" id="codigo" class="w-3/4 rounded-md border border-gray-300 px-3 py-2" placeholder="<?php echo $codigo;?>" disabled <?php echo isset($_GET['codigo']) ? "value='" . $_GET['codigo'] . "'" : ""; ?>>
      </div>
      <div class="flex flex-row items-center">
        <label class="w-1/4 text-sm font-medium text-gray-700 mr-2" for="lugar_nacimiento">Nombre</label>
        <input type="text" name="nombres" id="nombres" class="w-3/4 rounded-md border border-gray-300 px-3 py-2" placeholder="Producto">
      </div>
      <div class="flex flex-row items-center">
        <label class="w-1/4 text-sm font-medium text-gray-700 mr-2" for="fecha_nacimiento">Precio de compra</label>
        <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" class="w-3/4 rounded-md border border-gray-300 px-3 py-2" placeholder="00-00-0000" required>
      </div>
      <div class="flex flex-row items-center">
        <label class="w-1/4 text-sm font-medium text-gray-700 mr-2" for="telefono">Precio de venta</label>
        <input type="text" name="telefono" id="telefono" class="w-3/4 rounded-md border border-gray-300 px-3 py-2" placeholder="00-00-0000" required>
      </div>
      <div class="flex flex-row items-center">
        <label class="w-1/4 text-sm font-medium text-gray-700 mr-2" for="direccion">Proveedor</label>
        <input type="text" name="direccion" id="direccion" class="w-3/4 rounded-md border border-gray-300 px-3 py-2" placeholder="Ubicación" required>
      </div>
      <div class="flex flex-row items-center">
        <label class="w-1/4 text-sm font-medium text-gray-700 mr-2" for="puesto">STOCK</label>
        <input type="text" name="puesto" id="puesto" class="w-3/4 rounded-md border border-gray-300 px-3 py-2" placeholder="$" required>
      </div>
      <div class="flex flex-row items-center">
    <label class="w-1/4 text-sm font-medium text-gray-700 mr-2" for="descripcion">Descripción</label>
    <textarea name="descripcion" id="descripcion" class="w-3/4 rounded-md border border-gray-300 px-3 py-2"></textarea>
        </div>
      <div class="flex items-center justify-end mt-4">
        <button type="submit" name="add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar datos</button>
        <a href="index.php" class="ml-4 bg-gray-400 hover:bg-gray-500 text-gray-800 font-bold py-2 px-4 rounded">Cancelar</a>
      </div>
    </form>
  </div>
    
                
        </section>
    </div>
</main>

</body>


                