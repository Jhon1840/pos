<?php
include("conexion.php");
$filter = '';
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

            <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white px-2">
                <span class="relative w-full">
                    <input aria-label="search" type="search" id="search" placeholder="Search" class="w-full bg-gray-900 text-white transition border border-transparent focus:outline-none focus:border-gray-400 rounded py-3 px-2 pl-10 appearance-none leading-normal">
                    <div class="absolute search-icon" style="top: 1rem; left: .8rem;">
                        <svg class="fill-current pointer-events-none text-white w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                        </svg>
                    </div>
                </span>
            </div>

            <div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
                <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                    <li class="flex-1 md:flex-none md:mr-3">
                        <a class="inline-block py-2 px-4 text-white no-underline" href="#">Bienvenido</a>
                    </li>
                    <li class="flex-1 md:flex-none md:mr-3">
                        <a class="inline-block text-gray-400 no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="#">Matias inc</a>
                    </li>
                   
                </ul>
            </div>
        </div>

    </nav>
</header>


<main>

    <div class="flex flex-col md:flex-row">
        <nav aria-label="alternative nav">
            <div class="bg-gray-800 shadow-xl h-20 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48 content-center">

                <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                    <ul class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left">
                        <li class="mr-3 flex-1">
                            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                                <i class="fas fa-tasks pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Almacen</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1">
                            <a href="add2.php" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                                <i class="fas fa-plus-circle pr-0 md:pr-3 "></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Agregar Producto</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1">
                            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-blue-600">
                                <i class="fas fa-chart-area pr-0 md:pr-3 text-blue-600"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Productos</span>
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
                        <h1 class="font-bold pl-2">LISTA DE LOS PRODUCTOS ACTIVOS</h1>
                    </div>
                </div>


                <div class="container mx-auto px-4 py-4">
    <?php
        if (isset($_GET['aksi']) == 'delete') {
        
        $nik = mysqli_real_escape_string($con, strip_tags($_GET["nik"], ENT_QUOTES));
        $delete_query = "DELETE FROM empleados WHERE codigo='$nik'";
        $delete_result = mysqli_query($con, $delete_query);

        $delete_message = $delete_result ? 'Datos eliminados correctamente.' : 'Error, no se pudo eliminar los datos.';
    }

        $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);
        $sql = $filter ? "SELECT * FROM empleados WHERE estado='$filter' ORDER BY codigo ASC" : "SELECT * FROM empleados ORDER BY codigo ASC";
        $result = mysqli_query($con, $sql);
    ?>

    <?php if (isset($_GET['aksi']) == 'delete') : ?>
        <div class="bg-green-500 p-4 rounded-lg text-white mb-4">
            <?php echo $delete_message; ?>
            <button type="button" class="close hover:bg-green-700 text-white focus:outline-none" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <table class="table-auto w-full border border-gray-300">
      <thead>
        <tr class="bg-gray-200 text-gray-600 uppercase tracking-wider">
            <th class="px-4 py-2">Nº</th>
            <th class="px-4 py-2">CODIGO</th>
            <th class="px-4 py-2">NOMBRE</th>
            <th class="px-4 py-2">DESCRIPCION</th>
            <th class="px-4 py-2">PROVEEDOR</th>
            <th class="px-4 py-2">P.VENTA</th>
            <th class="px-4 py-2">STOCK</th>
            <!--
            <th class="px-4 py-2">UBICACION</th>
            <th class="px-4 py-2">MONTO USD</th>
            -->
            <th class="px-4 py-2">Acciones</th>
        </tr>
      </thead>
      <tbody>
            <?php if (mysqli_num_rows($result) > 0) : ?>
            <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr class="even:bg-gray-100 hover:bg-gray-200">
                <td class="px-4 py-2"><?php echo $no; ?></td>
                <td class="px-4 py-2"><?php echo $row['codigo']; ?></td>
                <td class="px-4 py-2"><?php echo $row['empresa']; ?></td>
                <td class="px-4 py-2"><?php echo $row['lugar_nacimiento']; ?></td>
                <!-- #region -->
                <td class="px-4 py-2">
                  <?php
                    echo $row['direccion'];
                  ?>
                </td>
                <td class="px-4 py-2">

                
                  <?php
                    echo $row['telefono'];
                  ?>
                </td>
                <td class="px-4 py-2"><?php echo $row['puesto']; ?></td>
                <td class="px-4 py-2 flex items-center justify-end space-x-4">
                  <a href="./img/Pagina-en-construccion.jpg" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Editar</a>
                </td>
              </tr>
            <?php $no++; endwhile; ?>
          <?php else : ?>
            <tr>
              <td class="text-center px-4 py-2" colspan="10">No hay datos.</td>
            </tr>
          <?php endif; ?>
      </tbody>
    </table>
  </div>

  <?php mysqli_close($con);  ?>

                
        </section>
    </div>
</main>

</body>


                