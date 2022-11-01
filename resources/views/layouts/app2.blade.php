<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <title>Animated Sidebar Menu | CodingLab</title>
      <link rel="stylesheet" href={{ asset("homecss/home.css") }}>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <div class="wrapper">
         <input type="checkbox" id="btn" hidden>
         <label for="btn" class="menu-btn">
         <i class="fas fa-bars"></i>
         <i class="fas fa-times"></i>
         </label>
         <nav id="sidebar">
            <div class="title">
               Diagramdor C4
            </div>
            <ul class="list-items">
               <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
               <li><a href="#"><i class="fas fa-address-book"></i>Users</a></li>
               <li><a href="#"><i class="fas fa-user"></i>Profile</a></li>
               <li><a href="#"><i class="fa fa-project-diagram"></i>My diagrams</a></li>
               <li><a href="#"><i class="fas fa-network-wired"></i>Shared diagrams</a></li>
               <li><a href="#"><i class="fas fa-envelope"></i>Contact us</a></li>
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
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-github"></i></a>
                  <a href="#"><i class="fab fa-youtube"></i></a>
               </div>
            </ul>
         </nav>
      </div>
      <div class="content">
         <div class="header">
            Animated Side Navigation Menu
         </div>
         <p>
            using only HTML and CSS
         </p>
      </div>
   </body>
</html>