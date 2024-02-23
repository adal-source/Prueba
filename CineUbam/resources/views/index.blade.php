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
  <div class="movie-card" onclick="openModal('La Momia', 'img1.jpg')">
    <img class="movie-image" src="img1.jpg" alt="La Momia" id="imageUrl">
    <div class="movie-title">La Momia</div>
  </div>
  <div class="movie-card" onclick="openModal('Harry Potter', 'pelicula2.jpg')">
    <img class="movie-image" src="img2.jpg" alt="Harry Potter" id="imageUrl">
    <div class="movie-title">Harry Potter</div>
  </div>
  <div class="movie-card" onclick="openModal('Avatar', 'img3.jpg')">
    <img class="movie-image" src="img3.jpg" alt="Avatar" id="imageUrl">
    <div class="movie-title">Avatar</div>
  </div>
  <div class="movie-card" onclick="openModal('Soy Leyenda', 'img4.jpg')">
    <img class="movie-image" src="img4.jpg" alt="Soy Leyenda" id="imageUrl">
    <div class="movie-title">Soy Leyevda</div>
  </div>
  <div class="movie-card" onclick="openModal('EL Gigante de Hierro', 'img5.jpg')">
    <img class="movie-image" src="img5.jpg" alt="EL Gigante de Hierro" id="imageUrl">
    <div class="movie-title">EL Gigante de Hierro</div>
  </div>
  <div class="movie-card" onclick="openModal('El Hombre Vicentenario', 'img6.jpg')">
    <img class="movie-image" src="img6.jpg" alt="El Hombre Vicentenario" id="imageUrl">
    <div class="movie-title">El Hombre Vicentenario</div>
  </div>
  <div class="movie-card" onclick="openModal('Termineitor', 'img7.jpg')">
    <img class="movie-image" src="img7.jpg" alt="Termineitor" id="imageUrl">
    <div class="movie-title">Termineitor</div>
  </div>
  <div class="movie-card" onclick="openModal('Wall-E', 'img8.jpg')">
    <img class="movie-image" src="img8.jpg" alt="Wall-E" id="imageUrl">
    <div class="movie-title">Wall-E</div>
  </div>
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

  function closeModal() {
    document.getElementById("myModal").style.display = "none";
    document.getElementById("addModal").style.display = "none";
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
  
  // Función para agregar una nueva película
  function addNewMovie(event) {
    event.preventDefault();
    
    // Obtener los valores del formulario
    var newName = document.getElementById("newName").value;
    var newImage = document.getElementById("movieImage").value;
    
    // Crear el nuevo elemento div para la película
    var movieContainer = document.querySelector(".movie-container");
    var newMovieCard = document.createElement("div");
    newMovieCard.classList.add("movie-card");
    newMovieCard.innerHTML = `
      <img class="movie-image" src="${newImage}" alt="${newName}">
      <div class="movie-title">${newName}</div>
    `;
    
    // Agregar un event listener para abrir el modal de detalles de la película
    newMovieCard.addEventListener("click", function() {
      openModal(newName, newImage);
    });
    
    // Agregar el nuevo elemento al contenedor de películas
    movieContainer.appendChild(newMovieCard);

    // Cerrar el modal de agregar película
    document.getElementById("addModal").style.display = "none";
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
      <input type="text" id="movieImage" name="movieImage" required  onchange="addNewMovie(event)"><br><br>
      <!-- <button onclick="addNewMovie(event)">Poner Funcion</button> -->
    <button>Poner Funcion</button>
    </form>
  </div>
</div>

@foreach ($datos as $item)
{{$item->Funcion_Nombre}}
{{$item->Funcion_Imagen}}
@endforeach
<script>
  document.addEventListener('DOMContentLoaded', function() {
  fetchPeliculas();
});

function fetchPeliculas() {
  fetch('{{route('funcion.index')}}') // Cambia esto por la ruta real a tu endpoint
    .then(response => response.json())
    .then(datos => {
      datos.forEach(item => {
        addPeliculaToDOM(item.Funcion_Nombre, item.Funcion_Imagen);
      });
    })
    .catch(error => console.error('Error al cargar las películas:', error));
}

function addPeliculaToDOM(nombre, imagen) {
  const movieContainer = document.querySelector('.movie-container');
  const movieCard = document.createElement('div');
  movieCard.classList.add('movie-card');
  movieCard.setAttribute('onclick', `openModal('${nombre}', '${imagen}')`);

  const movieImage = document.createElement('img');
  movieImage.classList.add('movie-image');
  movieImage.src = imagen;
  movieImage.alt = nombre;

  const movieTitle = document.createElement('div');
  movieTitle.classList.add('movie-title');
  movieTitle.textContent = nombre;

  movieCard.appendChild(movieImage);
  movieCard.appendChild(movieTitle);

  movieContainer.appendChild(movieCard);
}
  </script>
  @endsections