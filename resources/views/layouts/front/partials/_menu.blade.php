<div class="menu"><!-- menu start -->
 <nav id="menu" class="mega-menu">
  <!-- menu list items container -->
  <section class="menu-list-items">
   <div class="container"> 
    <div class="row"> 
     <div class="col-lg-12 col-md-12"> 
      <!-- menu logo -->
      <ul class="menu-logo">
          <li>
              <a href="{{url('/')}}"><img id="logo_img" src="{{asset('easy.png')}}" alt="logo"> </a>
          </li>
      </ul>
      <!-- menu links -->
      <div class="menu-bar">
       <ul class="menu-links">
          <li class="active"><a href="{{url('/')}}">Home <i class="fa fa-indicator"></i></a></li>

          <li><a href="javascript:void(0)"> Equipes <i class="fa fa-angle-down fa-indicator"></i></a>
               <!-- drop down multilevel  -->
              <ul class="drop-down-multilevel">
                  <li><a href="javascript:void(0)">Equipe 01<i class="fa-indicator"></i></a></li>
                  <li><a href="javascript:void(0)">Equipe 02<i class="fa-indicator"></i></a></li>
                  <li><a href="javascript:void(0)">Equipe 03  &nbsp;<span class="label label-success">New</span> <i class="ti-plus fa-indicator"></i></a></li>
                  <li><a href="javascript:void(0)">Equipe 04<i class="fa-indicator"></i></a></li>
              </ul>
          </li>


           <li><a href="{{url('/front/membres')}}">membres <i class="fa fa-indicator"></i></a></li>
          <li><a href="projets.php">Projets <i class="fa fa-indicator"></i></a></li>
          <li><a href="contact.php">Contact <i class="fa fa-indicator"></i></a></li>
          <li><a href="apropos.php">A Propos <i class="fa fa-indicator"></i></a></li>
      </ul>
      <div class="search-cart">
        <div class="search">
          <a class="search-btn not_click" href="javascript:void(0);"></a>
            <div class="search-box not-click">
               <input type="text" class="not-click form-control" placeholder="Search" value="" name="s">
             <i class="fa fa-search"></i>
            </div>
        </div>
      </div>
      </div>
     </div>
    </div>
   </div>
  </section>
 </nav>
</div> <!-- menu end -->