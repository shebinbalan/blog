<nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="admincss/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="active"><a href="index.html"> <i class="icon-home"></i>Home </a></li>
                <li><a href="{{ url('articles') }}"><i class="icon-grid"></i> Articles</a></li>
                <li><a href="charts.html"> <i class="fa fa-bar-chart"></i>Tags </a></li>
                <li><a href="{{ route('categories.index') }}"> <i class="icon-padnote"></i>Categories</a></li>
               
                
        </ul>
       
      </nav>