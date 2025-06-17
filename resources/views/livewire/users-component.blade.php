<div>
    <div class="container-fluid">
        <h2 class="intro-y text-lg font-medium mt-10">
            Data User
        </h2>
        <button wire:click="create" class="btn btn-twitter mt-6 w-40 mr-2 h-8 mb-2"> Tambah User </button>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible show flex items-center mb-2" role="alert">
            {{ session('success') }}
        </div>
    @endif
        <table class="table  mt-5">
            <thead class="table-light">
                <tr>
                    <th class="whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap">Name</th>
                    <th class="whitespace-nowrap">Email</th>
                    <th class="whitespace-nowrap">Role</th>
                    <th class="whitespace-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->role}}</td>
                    <td>
                        <button class="btn btn-elevated-primary w-24 mr-1 mb-2" wire:click="edit({{$data->id}})">Edit</button> 
                        <button class="btn btn-elevated-danger w-24 mr-1 mb-2" wire:click="destroy({{ $data->id}})">Hapus</button> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$users->links()}}
        @if ($addPage)
            @include('users.create')
        @endif
        @if ($editpage)
            @include('users.edit')
        @endif
    </div>
    </div>
