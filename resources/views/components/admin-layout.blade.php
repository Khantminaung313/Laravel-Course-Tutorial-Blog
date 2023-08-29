<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-2 mt-5">
                <ul class="list-group">
                    <li class="list-group-item"><a href="/admin/blogs">Dashboard</a></li>
                    <li class="list-group-item"><a href="/admin/blogs/create">Create Blogs</a></li>
                    <li class="list-group-item"><a href="/admin/userList">Manage User</a></li>
                </ul>
            </div>
            <div class="col-10">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-layout>
