<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <title>My Diagram C4 | JGM</title>
      <link rel="stylesheet" href={{ asset("/homecss/home.css") }}>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <div class="background">
          <div class="wrapper">
             <input type="checkbox" id="btn" hidden>
             <label for="btn" class="menu-btn">
             <i class="fas fa-bars"></i>
             <i class="fas fa-times"></i>
             </label>
             <nav id="sidebar">
                <div class="title">
                   Diagramador C4
                </div>
                <ul class="list-items">
                   <li><a href={{route('home')}}><i class="fas fa-home"></i>Home</a></li>
                   @if (Auth::user()->name == "Admin" )
                   <li><a href={{ route('users')}}><i class="fas fa-address-book"></i>Users</a></li>
                   @endif
                   <li><a href={{route('profile', Auth::user()->id)}}><i class="fas fa-user"></i>Profile</a></li>
                   <li><a href={{route('mydiagrams')}}><i class="fa fa-project-diagram"></i>My diagrams</a></li>
                   <li><a href={{route('shdiagrams')}}><i class="fas fa-network-wired"></i>Shared diagrams</a></li>
                   <li><a href={{route('contactus')}}><i class="fas fa-envelope"></i>Contact us</a></li>
                   <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    <i class="fas fa-door-open">
                        </i><span>Log out</span> 
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                   <div class="icons">
                     <a href="https://www.facebook.com/josegonzalesm/"><i class="fab fa-facebook-f"></i></a>
                     <a href="https://www.instagram.com/josegmont_/"><i class="fab fa-instagram"></i></a>
                     <a href="https://github.com/TillWurner"><i class="fab fa-github"></i></a>
                     <a href="https://wa.me/59169180490"><i class="fab fa-whatsapp"></i></a>
                   </div>
                </ul>
             </nav>
         </div>
      </div>
      <div class="content">
        <!-- <img src="/logincss/img/banner5.jpg" >-->
             <div class="header">
                Hola {{ Auth::user()->name }} !
             </div>
             <p>
                Bienvenido a mi Diagramador.
             </p>
             <p>
                ¿Qué haremos hoy?
             </p>
      </div>
   </body>
</html>