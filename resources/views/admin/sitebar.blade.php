<div class="dashboard-container">
        <aside class="admin-sidebar">
                <nav class="sidebar-nav">
                        <ul>
                                <li class="nav-item active"><a href="{{ route('admin.dashboard') }}"><i
                                                        class="fas fa-tachometer-alt"></i> Dashboard</a></li>

                                <li class="nav-header">MASOFALAR</li>
                                <li class="nav-item"><a href="{{route('admin.yuzm.index')}}" data-distance="100m"><i
                                                        class="fas fa-shoe-prints"></i> 100m Natijalar</a></li>
                                <li class="nav-item"><a href="{{route('admin.ikkiyuzm.index')}}" data-distance="200m"><i
                                                        class="fas fa-shoe-prints"></i> 200m Natijalar</a></li>
                                <li class="nav-item"><a href="{{route('admin.tortyuzm.index')}}" data-distance="400m">
                                                <i class="fas fa-shoe-prints"></i> 400m Natijalar</a></li>
                                <li class="nav-item"><a href="{{route('admin.sakkizyuzm.index')}}" data-distance="800m">
                                                <i class="fas fa-shoe-prints"></i> 800m Natijalar</a></li>
                                <li class="nav-item"><a href="{{route('admin.birmingbeshyuzm.index')}}"
                                                data-distance="3000m">
                                                <i class="fas fa-shoe-prints"></i> 1500m Natijalar</a></li>
                                <li class="nav-item"><a href="{{route('admin.uchmingm.index')}}" data-distance="800m">
                                                <i class="fas fa-shoe-prints"></i> 3000m Natijalar</a></li>
                                <li class="nav-item"><a href="{{route('admin.beshmingm.index')}}" data-distance="800m">
                                                <i class="fas fa-shoe-prints"></i> 5000m Natijalar</a></li>

                                <li class="nav-header">SAKRASH VA ITQITISH</li>
                                <li class="nav-item"><a href="{{route('admin.uzunlikkasakrash.index')}}"><i
                                                        class="fas fa-ruler-horizontal"></i> Uzunlikka
                                                sakrash</a></li>
                                <li class="nav-item"><a href="{{route('admin.balandlikkasakrash.index')}}"><i
                                                        class="fas fa-arrows-alt-v"></i> Balandlikka
                                                sakrash</a></li>
                                <li class="nav-item"><a href="{{route('admin.yadro.index')}}"><i
                                                        class="fas fa-circle"></i> Yadro itqitish</a></li>
                        </ul>
                </nav>
        </aside>

        <main class="admin-content" id="main-content">
                <h2 id="content-title"></h2>
                <p id="dashboard-info"></p>
 <!-- 26 Oktyabir 2025 Rayimjonov Eldorbek -->