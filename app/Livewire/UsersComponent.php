<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithoutUrlPagination;;
use Livewire\WithPagination;

class UsersComponent extends Component
{
    use WithPagination,WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';
    public $addPage,$editpage = false;
    public $name,$email,$password,$role,$id;
    public function render()
    {
        $data['users'] = User::paginate(5);
        return view('livewire.users-component', $data);
    }

    public function create(){
        $this->addPage = true;
    }

    public function store(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
        ],[
            'name.required' => 'Name tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password tidak boleh kosong',
            'role.required' => 'Role tidak boleh kosong',
        ]);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role,
        ]);
        session()->flash('success', 'Data berhasil ditambahkan');
        $this->reset();
        $this->addPage = false;
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        session()->flash('success', 'Data berhasil dihapus');
        $this->reset();
    }

    public function edit($id){
        $cari = User::find($id);
        $this->id = $cari->id;
        $this->name = $cari->name;
        $this->email = $cari->email;
        $this->role = $cari->role;
        $this->editpage = true;
    }
    public function update(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ],[
            'name.required' => 'Name tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'role.required' => 'Role tidak boleh kosong',
        ]);
        $user = User::find($this->id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->role = $this->role;
        $user->save();
        session()->flash('success', 'Data berhasil diubah');
        $this->reset();
        $this->editpage = false;
    }
}
