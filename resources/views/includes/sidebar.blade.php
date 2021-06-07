<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading" > <a href="{{route('admin.dashboard')}}" > Test App </a> </div>
    <div class="list-group list-group-flush">
        <div class="">
            <a href="{{route('admin.brand.index')}}" class="{!! (Request::is('admin/brand*') ? 'active_menu' : '') !!} list-group-item list-group-item-action bg-light">Brands</a>
        </div>
        <div class="">
            <a href="{{route('admin.category.index')}}" class="{!! (Request::is('admin/category*') ? 'active_menu' : '') !!} list-group-item list-group-item-action bg-light">Categories</a>
        </div>
        
    </div>
</div>