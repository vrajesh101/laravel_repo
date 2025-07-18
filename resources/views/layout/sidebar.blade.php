<div id="sidebar" class="collapse collapse-horizontal show border-end">
    <div id="sidebar-nav" class="list-group border-0 rounded-0 text-sm-start min-vh-100" style="background-color:rgb(42, 47, 61)">
        <a href="{{URL::to('users/user?usertype=admin')}}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar" style="background-color:rgb(42, 47, 61)"> <span class="text-secondary">User</span> </a>
        <a href="{{URL::to('page1?usertype=admin')}}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar" style="background-color:rgb(42, 47, 61)"> <span class="text-secondary">Page 1</span> </a>
        <a href="{{URL::to('page2?usertype=admin')}}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar" style="background-color:rgb(42, 47, 61)"> <span class="text-secondary">Page 2</span></a>
        <a href="{{URL::to('page3?usertype=admin')}}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar" style="background-color:rgb(42, 47, 61)"> <span class="text-secondary">Page 3</span></a>
        <a href="{{route('4',['usertype'=>'admin'])}}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar" style="background-color:rgb(42, 47, 61)"> <span class="text-secondary">Page 4</span></a>
        <a href="{{route('5',['usertype'=>'admin'])}}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar" style="background-color:rgb(42, 47, 61)"> <span class="text-secondary">Page 5</span></a>
        <a href="{{URL::to('addstudent?usertype=admin')}}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar" style="background-color:rgb(42, 47, 61)"> <span class="text-secondary">Add Student</span></a>
        <a href="{{URL::to('/relationship?usertype=admin')}}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar" style="background-color:rgb(42, 47, 61)"> <span class="text-secondary">Relationship</span></a>
        <a href="{{URL::to('/mail?usertype=admin')}}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar" style="background-color:rgb(42, 47, 61)"> <span class="text-secondary">Mail</span></a>
    </div>
</div>