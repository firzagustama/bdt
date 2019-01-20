<!-- <style type="text/css">
.navbar-fixed-left {
  width: 140px;
  position: fixed;
  border-radius: 0;
  height: 100%;
  text-align: center;
}

.navbar-fixed-left .navbar-nav > li {
  float: none;  /* Cancel default li float: left */
  width: 139px;
}

.navbar-fixed-left + .container {
  padding-left: 160px;
}

/* On using dropdown menu (To right shift popuped) */
.navbar-fixed-left .navbar-nav > li > .dropdown-menu {
  margin-top: -50px;
  margin-left: 140px;
}
</style> -->

<style type="text/css">
   /* The side navigation menu */
.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  /*background-color: #f1f1f1;*/
  background-color: darkgrey;
  position: fixed;
  height: 100%;
  overflow: auto;
  text-align: center;
}

/* Sidebar links */
.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
  text-align: left;
}

/* Active/current link */
.sidebar a.active {
  background-color: #4CAF50;
  color: white;
}

/* Links on mouse-over */
.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

/* Page content. The value of the margin-left property should match the value of the sidebar's width property */
div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

/* On screens that are less than 700px wide, make the sidebar into a topbar */
@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

/* On screens that are less than 400px, display the bar vertically, instead of horizontally */
@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
} 
</style>
<html>
    <head>
        <title>LA International Airport</title>
        <link rel="shortcut icon" href="{{{ asset('logo.ico') }}}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <!-- <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#"> <img src="{{{ asset('logo.ico') }}}">Los Angeles International Airport Data</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
              <li id="cargo"><a href="/cargo/">Cargo Data</a></li>
              <li id="passenger"><a href="/passenger/">Passanger Data</a></li>
            </ul>
          </div>
        </nav>

        <div class="container">
            @yield('content')
        </div> -->

      <!-- <div class="navbar navbar-inverse navbar-fixed-left fixed-left">
        <img src="{{{ asset('logo.ico') }}}" style="padding: 5px">
        <a class="navbar-brand" href="#" style="height: 100px;">LA International Airport</a>
        <ul class="nav navbar-nav">
         <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Firza Gustama <span class="caret"></span></a>
           <ul class="dropdown-menu" role="menu">
            <li><a href="#">Sub Menu1</a></li>
            <li><a href="#">Sub Menu2</a></li>
            <li><a href="#">Sub Menu3</a></li>
            <li class="divider"></li>
            <li><a href="#">Sub Menu4</a></li>
            <li><a href="#">Sub Menu5</a></li>
           </ul>
         </li>
         <li><a href="#"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
         <li><a href="#"><span class="glyphicon glyphicon-plane"></span> Airplane List</a></li>
         <li class="active"><a href="/cargo"><span class="glyphicon glyphicon-list-alt"></span> Cargo Recap</a></li>
         <li><a href="#"><span class="glyphicon glyphicon-user"></span> Passenger Recap</a></li>
        </ul>
      </div>
      <div class="container">
        @yield('content')
      </div>
    </body> -->

    <div class="sidebar">
      <img src="{{{ asset('logo.ico') }}}" style="padding: 5px">
      <i class="navbar-brand" href="#" style="height: 100px;">Los Angeles International Airport</i>
      <a href="#"><span class="glyphicon glyphicon-home"></span> Dashboard</a>
      <a href="/cargo" id=cargo><span class="glyphicon glyphicon-list-alt"></span> Cargo Recap</a>
      <a href="/cargo/arrival"><span class="glyphicon glyphicon-log-in"></span> Cargo Arrival</a>
      <a href="/cargo/departure"><span class="glyphicon glyphicon-log-out"></span> Cargo Departure</a>
      <form action="/cargo/date/" method="post">
        @csrf
        <span class="glyphicon glyphicon-list-alt"></span> Recap Date:
        <input type="date" name="date">
        <input type="submit" value="Get recap">
      </form>
    </div>

    <!-- Page content -->
    <div class="content">
      @yield('content')
    </div>
</html>