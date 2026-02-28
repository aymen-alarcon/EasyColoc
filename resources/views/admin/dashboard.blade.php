@include("includes.header")

<div class="container py-4">

    <h1 class="mb-4">Dashboard</h1>
    <div class="row g-4">
        <div class="col-lg-12">
            <div class="card shadow-sm mb-5">
                <div class="card-header bg-white fw-bold">
                    Users
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>status</th>
                                    <th>owner</th>
                                    <th>Joined</th>
                                    <th>actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($colocations as $colocation)                                    
                                    <tr>
                                        <td>#USR-{{ $colocation->id }}</td>
                                        <td>{{ $colocation->name }}</td>
                                        <td>{{ $colocation->description }}</td>
                                        <td>{{ $colocation->status }}</td>
                                        <td>{{ $colocation->owner->first_name }} {{ $colocation->owner->last_name }}</td>
                                        <td>{{ $colocation->created_at->format("Y-m-d") }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-secondary me-1 btn-rename"><i class="bi bi-pencil"></i></button>
                                            <form action="/admin/colocation/destroy/{{ $colocation->id }}" method="post">
                                                @csrf
                                                @method("DELETE")

                                                <button class="btn btn-sm btn-outline-danger btn-delete"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card shadow-sm">
                <div class="card-header bg-white fw-bold">
                    Colocations
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Reputation</th>
                                    <th>Joined</th>
                                    <th>actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)                                    
                                    <tr>
                                        <td>#USR-{{ $user->id }}</td>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->reputation }}</td>
                                        <td>{{ $user->created_at->format("Y-m-d") }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-secondary me-1 btn-rename"><i class="bi bi-pencil"></i></button>
                                            <form action="/admin/user/destroy/{{ $user->id }}" method="post">
                                                @csrf
                                                @method("DELETE")

                                                <button class="btn btn-sm btn-outline-danger btn-delete"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@include("includes.footer")