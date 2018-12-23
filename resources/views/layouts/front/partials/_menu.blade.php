<div class="menu"><!-- menu start -->
    <nav id="menu" class="mega-menu">
        <!-- menu list items container -->
        <section class="menu-list-items">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-lg-12 col-md-12">
                        <!-- menu logo -->
                        <ul class="menu-logo">
                            <li>
                                <a href="{{url('/')}}"><img id="logo_img" src="{{asset('easy.png')}}" alt="logo"> </a>
                            </li>
                        </ul>
                        <!-- menu links -->
                        <div class="menu-bar">
                            <ul class="menu-links">

                                <li class="{{ set_active_route('home_path') }}"><a tab-toggle="tab" href="{{route("home_path")}}">Home<i
                                                class="fa fa-indicator"></i></a></li>
                                <li class="{{ set_active_route('equipes_path') }}"><a tab-toggle="tab" href="{{route('equipes_path')}}">equipes<i
                                                class="fa fa-indicator"></i></a></li>
                                <li class="{{ set_active_route('membres_path') }}"><a tab-toggle="tab" href="{{route('membres_path')}}">membres<i

                                                class="fa fa-indicator"></i></a></li>
                                <li id="projets" @if($active == 'projets') class="active" @endif><a href="{{route('projets-front')}}">Projets<i
                                                class="fa fa-indicator"></i></a></li>
                                <li id="theses" @if($active == 'theses') class="active" @endif ><a href="{{url('/front/equipes')}}">theses<i
                                                class="fa fa-indicator"></i></a></li>
                                <li id="contact" @if($active == 'contact') class="active" @endif ><a href="{{url('front/contact')}}">Contact<i
                                                class="fa fa-indicator"></i></a></li>
                                <li id="apropos" @if($active == 'apropos') class="active" @endif ><a href="{{url('front/apropos')}}">A Propos <i
                                                class="fa fa-indicator"></i></a></li>
                                <li>
                                    <div class="search">
                                        <a class="search-btn not_click" href="javascript:void(0);"></a>
                                        <div class="search-box not-click">
                                            <input type="text" class="not-click form-control" placeholder="Search"
                                                   value="" name="s">
                                            <i class="fa fa-search"></i>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </nav>
</div> <!-- menu end -->