<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Etapa Productiva</title>
    <style>
        #userMenu {
            top: 100%;
            margin-top: 0.5rem;
        }

    </style>
</head>
<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">
    <header class="bg-white text-[#009e00] px-5 py-2.5 flex flex-col items-center border-t-[5px] border-t-white border-b border-b-[#e0e0e0]">

          <div class="flex justify-between w-full">
              <div class="flex items-center">
                  <!-- Logo de SENA en el lado izquierdo -->
                  <img class="w-[70px] h-[70px]" src="{{ asset('img/logo-sena.png') }}" alt="Sena Logo ">

                  <!-- Espaciado entre los dos bloques -->
                  <div class="flex-grow m-2"></div>

                  <!-- Logo de Etapa Productiva y texto "Centro de Comercio y Servicios" en el lado derecho -->
                  <div class="text-left">
                      <!-- Logo de Etapa Seguimiento -->
                      <a href="{{ route('administrator.home') }}" class="flex items-center">
                          <img src="{{ asset('img/logo.png') }}" alt="Etapa Seguimiento Logo" class="w-10 h-auto mr-1.5">
                          <div class="flex flex-col text-left">
                              <h2 class="text-[12px] m-0 text-[#009e00]">Etapa</h2>
                              <h2 class="text-[12px] m-0 text-[#009e00]">Productiva</h2>
                          </div>
                      </a>

                      <!-- Texto "Centro de Comercio y Servicios" debajo del logo y el texto de Etapa Productiva -->
                      <h2 class="text-sm mt-2 text-[#009e00]">Centro de Comercio y Servicios</h2>
                  </div>
              </div>
              <div class="relative ml-auto flex items-center">
                  <!-- Contenedor para la imagen y el ícono de los tres puntos -->
                  <div class="relative">
                      <!-- Imagen de usuario -->
                      <img class="bg-white w-[45px] h-auto rounded-full border-2 " src="{{ asset('img/administrador/mujer.png') }}" alt="User Icon">

                      <!-- Botón de los tres puntos encima de la imagen -->
                      <button id="menuButton" class="absolute top-1 right-0 bg-transparent p-1 mr-[-46%]">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-8 h-8">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm0 5.25a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm0 5.25a1.5 1.5 0 110-3 1.5 1.5 0 010 3z" />
                          </svg>
                      </button>
                  </div>
                   {{-- Menu --}}
                   <div id="userMenu" class=" hidden absolute right-4  mt-2 w-64 bg-[#D9D9D9] border border-gray-300 rounded-lg shadow-lg z-20">
                       <div class="p-4">
                           <div class="flex items-center mb-4">
                               <div>
                                   <p class="text-sm font-bold">{{ auth()->user()->name }} {{ auth()->user()->last_name }}</p>
                                   <p class="text-sm mt-2">Administrador</p>
                               </div>


                           </div>
                           <ul>
                               <li class="mt-2"><a href="{{ route('administrator.Administrator-perfil') }}" class="block text-center text-green-600 font-bold bg-white border hover:text-white hover:bg-green-600 border-green-600 rounded-lg py-1">Ver perfil</a></li>

                               <li class="mt-2"><a href="{{ route('administrator.settings') }}" class="block text-black hover:bg-white p-2 rounded-lg">Configuración</a></li>


                               <li class="mt-2"><a href="{{ route('administrator.template') }}" class="block text-black hover:bg-white p-2 rounded-lg" onclick="toggleSublist(event)">Plantillas</a>
                                   <ul class="hidden ml-4 mt-2 bg-[#EEEEEE] p-2 rounded-lg">
                                       <li class="mt-2 font-bold text-black border-b border-gray-300 pb-2">MODALIDAD</li>
                                       <li class="mt-2"><a href="{{ route('administrator.template')}}"class="block text-black hover:bg-white p-2 rounded-lg">Pasantía</a></li>
                                       <li>
                                          <a href="javascript:void(0)" class="block text-black hover:bg-white p-2 rounded-lg" id="contratoAprendizaje">Contrato de Aprendizaje</a>
                                          <ul id="sublistContrato" class="ml-4 mt-2 bg-[#D9D9D9] p-2 rounded-lg w-[250px] hidden">
                                              <li class="mt-2">
                                                  <a href="{{ route('administrator.template') }}" class="block text-black hover:bg-white p-2 rounded-lg">Ver Plantilla</a>
                                              </li>
                                              <li class="mt-2">
                                                  <a href="{{ route('administrator.template') }}" class="block text-black hover:bg-white p-2 rounded-lg">+ Añadir Plantilla</a>
                                              </li>
                                          </ul>
                                      </li>
                                       <li class="mt-2"><a href="{{ route('administrator.template')}}" class="block text-black hover:bg-white p-2 rounded-lg">Vinculo Laboral</a></li>
                                       <li><a href="{{ route('administrator.template')}}" class="block text-black hover:bg-white p-2 rounded-lg">Unidad Productiva Familiar</a></li>
                                       <li><a href="{{ route('administrator.template')}}" class="block text-black hover:bg-white p-2 rounded-lg">Proyecto Productivo Empresarial</a></li>
                                   </ul></li>
                               <li class="mt-2"><a href="{{ route('administrator.graphic')}}" class="block text-black hover:bg-white p-2 rounded-lg">Graficas</a></li>
                           </ul>
                           <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="mt-4">
                               @csrf
                               <button type="submit" class="block text-center text-green-600 font-bold bg-white border hover:text-white hover:bg-green-600 border-green-600 rounded-lg py-2 w-full">Cerrar sesión</button>
                           </form>
                   </div>
               </div>
          </header>
      <nav class="bg-[#009e00] px-2.5 h-14 py-1.5 flex justify-start items-center relative z-10">
          <button id="notifButton" class="relative">
              <img class="w-[35px] h-auto mr-2.5 filter invert" src="{{ asset('img/notificaciones.png') }}" alt="Notificaciones">
              <span class="absolute top-0 right-0 w-4 h-4 bg-red-600 text-white text-xs rounded-full flex items-center justify-center">5</span> <!-- Ejemplo de contador de notificaciones -->
          </button>
      {{-- FIN Barra Azul --}}
          <div id="notifMenu" class="hidden absolute top-full mt-2 left-0 w-64 bg-white border border-gray-300 rounded-lg shadow-lg z-20">
              <div class="p-4">
                  <h2 class="text-sm font-bold">Notificaciones</h2>
                  <ul>
                      <li class="mt-2">
                          <a href="{{ route('administrator.notificaciones') }}" class="block text-gray-700 hover:bg-gray-100 p-2 rounded-lg">Notificación 1</a>
                      </li>
                      <li class="mt-2">
                          <a href="{{ route('administrator.notificaciones') }}" class="block text-gray-700 hover:bg-gray-100 p-2 rounded-lg">Notificación 2</a>
                      </li>
                      <li class="mt-2">
                          <a href="{{ route('administrator.notificaciones') }}"class="block text-gray-700 hover:bg-gray-100 p-2 rounded-lg">Notificación 3</a>
                      </li>
                  </ul>
              </div>
          </div>
          <div class="w-full flex justify-center">
              <ul class="horizontal-list flex space-x-4 justify-center" >
                  <li>
                      <a href="{{ route('administrator.home') }}" class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                          Inicio
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('administrator.apprentice') }}" class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                          Aprendices
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('administrator.instructor') }}" class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                          Instructores
                      </a>
                  </li>


              </ul>
          </div>




      </nav>

        {{-- FIN Menu --}}
<div class="flex justify-center">
    <main class=" bg-white m-4 p-2 rounded-lg  shadow-[0_0_10px_rgba(0,0,0,0.8)]  border-[#2F3E4C] w-2/3 items-center ">
        <div class=" bg-gray-100 p-6 rounded-lg">
            <div class="text-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-40 h-40 mx-auto text-gray-500 m-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <h1 class="text-lg m-0 text-black font-bold">INSTRUCTOR</h1>
                </div>
                <h3 class="font-bold mb-4">Datos básicos</h3>
                <div class="grid grid-cols-3 gap-4 mb-6">
                    <div>
                        <label class="block text-gray-700">Nombre</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Nombre">
                    </div>
                    <div>
                        <label class="block text-gray-700">Apellido</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Apellido">
                    </div>
                    <div>
                        <label class="block text-gray-700">Cedula</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Cedula">
                    </div>
                    <div>
                        <label class="block text-gray-700">Correo</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Correo">
                    </div>
                    <div>
                        <label class="block text-gray-700">Celular</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Celular">
                    </div>
                    <div>
                        <label class="block text-gray-700">Programa</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Programa">
                    </div>
                    <div>
                        <label class="block text-gray-700">Total de horas</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Total de horas">
                    </div>
                    <div>
                        <label class="block text-gray-700">Horas realizadas</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Horas realizadas">
                    </div>
                    <div>
                        <label class="block text-gray-700">Fecha de inicio</label>
                        <input type="date" class="w-full border border-gray-300 rounded-lg p-2.5">
                    </div>
                    <div>
                        <label class="block text-gray-700">Fecha de fin</label>
                        <input type="date" class="w-full border border-gray-300 rounded-lg p-2.5">
                    </div>
                </div>

                <h3 class="font-bold mb-4 mt-6">Lugar de Residencia</h3>
                <div class="grid grid-cols-3 gap-4 mb-6">
                    <div>
                        <label class="block text-gray-700">Pais:</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Pais">
                    </div>
                    <div>
                        <label class="block text-gray-700">Departamento:</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Departamento">
                    </div>
                    <div>
                        <label class="block text-gray-700">Municipio:</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Municipio">
                    </div>
                    <div>
                        <label class="block text-gray-700">Barrio:</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Barrio">
                    </div>
                    <div>
                        <label class="block text-gray-700">Dirección:</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Dirección">
                    </div>
                </div>
                <div class="flex justify-end mt-6 space-x-4">
                    <a type="submit" href="{{ route('administrator.instructor')}}" class="bg-green-700 hover:bg-green-900 text-white py-2 px-4 rounded">Confirmar</a>
                    <a href="{{ route('administrator.instructor') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded">Cancelar</a>
                </div>
        </div>
    </main>
</div>
<script src="{{ asset('js/SuperAdmin.js') }}"></script>
</body>

</html>