@extends('layout.plantilla')

@section('tituloPagina', 'CRUD con Laravel')

@section('contenido')
<title>Selecciona una Película</title>
<style>
  /* Estilos básicos */
  body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
  }
  .movie-container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 20px;
  }
  .movie-card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease;
    cursor: pointer;
    width: 150px; /* Ajustamos el ancho de todos los botones */
  }
  .movie-card:hover {
    transform: scale(1.05);
  }
  .movie-image {
    width: 100%; /* Para asegurar que la imagen se ajuste al contenedor */
    height: auto;
    border-bottom: 2px solid #eee;
  }
  .movie-title {
    padding: 10px;
    text-align: center;
    font-size: 18px;
    font-weight: bold;
  }
  
  /* Estilos para el modal */
  .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.5);
  }
  .modal-content {
    background-color: #fefefe;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 60%;
    text-align: center;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    position: relative;
  }
  .close {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
  }
  /* Prevent button click from closing modal */
.modal-content button {
  background-color: #4CAF50; /* Optional green button style */
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.modal-content button:hover {
  background-color: #45A049;
}
</style>

<button onclick="openAddModal2()">Agregar Función</button>

<h2 style="text-align: center;">Selecciona una Película</h2>
<div class="card-body">
  <div class="row">
      <div class="col-sm-12">
          @if ($mensaje = Session::get('success'))
              <div class="alert alert-success" role="alert">
                  {{ $mensaje }}
              </div>
          @endif
      </div>
  </div>
<div class="movie-container">
</div>

<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="document.getElementById('myModal').style.display = 'none';">&times;</span>
    <h3 id="movieTitle"></h3>
    
    <form action="{{route('peliculas.store')}}" method="POST">
      @csrf
      <input type="hidden" id="movieName" name="movieName">
      <label for="cantidad1">Precio del boleto es de 70</label> <br>
      <input type="hidden" id="moviePrecio" name="moviePrecio">
      <label for="cantidad1">Cantidad de boletos:</label>
      <input type="number" id="cantidad" name="cantidad" min="1" value="1" onchange="calcularPrecio()" required><br>
      <p id="precio"></p>
      <label for="pago1">Billete con el que pagas:</label>
      <input type="number" id="pago" name="pago" min="1" value="100" onchange="calcularCambio()" required><br>
      <br>
      <p id="cambio"></p>
      <input type="hidden" id="activo" name="activo">
      <button>Pagar</button>
    </form>
  </div>
</div>

<script>
  function openModal(movieTitle) {
    document.getElementById("movieTitle").innerText = movieTitle;
    document.getElementById("movieName").value = movieTitle;
    document.getElementById("moviePrecio").value = 70;
    document.getElementById("activo").value = 1;
    
    document.getElementById("myModal").style.display = "block";
  }

  function calcularCambio() {
    const cantidadBoletos = parseInt(document.getElementById("cantidad").value);
    const billetePago = parseInt(document.getElementById("pago").value);
    const costoBoleto = 70;
    const totalAPagar = cantidadBoletos * costoBoleto;
    const cambio = billetePago - totalAPagar;
    
    if (cambio >= 0) {
      document.getElementById("cambio").innerText = "Su cambio es: $" + cambio;
    } else {
      document.getElementById("cambio").innerText = "El pago es insuficiente";
    }
    
  }
  
  function calcularPrecio() {
    const cantidadBoletos = parseInt(document.getElementById("cantidad").value);
    const billetePago = parseInt(document.getElementById("pago").value);
    const costoBoleto = 70;
    const totalAPagar = cantidadBoletos * costoBoleto;

    document.getElementById("precio").innerText =  "Total a pagar $" +  totalAPagar;
  }

  function openAddModal2() {
    document.getElementById("addModal").style.display = "block";
  }
  
</script>

<div id="addModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="document.getElementById('addModal').style.display = 'none';">&times;</span>
    <h3>Agregar Película</h3>
    
    <form action="{{route('funcion.store')}}" method="POST">
      @csrf
      <label for="movieName">Nombre de la Película:</label><br>
      <input type="text" id="newName" name="newName" required><br><br>
      <label for="movieImage">URL de la Imagen:</label><br>
      <input type="text" id="movieImage" name="movieImage" required><br><br>
    <button>Agregar Funcion</button>
    </form>
  </div>
</div>

@php
  // Conexión a la base de datos
$host = "localhost"; // o la IP del servidor de bases de datos
$username = "root";
$password = "";
$database = "cineubam";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // Establecer el modo de error PDO a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL para obtener todas las películas
    $sql = "SELECT Funcion_Nombre, Funcion_Imagen FROM tbl_ope_funcions";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Resultado
    $result = $stmt->fetchAll();

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
@endphp

<div class="movie-container">
  @php
    
  if ($result) {
      foreach ($result as $row) {
          // Asegúrate de usar htmlspecialchars() para evitar XSS
          $nombre_pelicula = htmlspecialchars($row['Funcion_Nombre']);
          $url_imagen = htmlspecialchars($row['Funcion_Imagen']);

          echo "<div class='movie-card' onclick=\"openModal('$nombre_pelicula', '$url_imagen')\">";
          echo "<img class='movie-image' src='$url_imagen' alt='$nombre_pelicula'>";
          echo "<div class='movie-title'>$nombre_pelicula</div>";
          echo "</div>";
      }
  } else {
      echo "<p>No se encontraron películas.</p>";
  }
  @endphp
</div>

@endsection