<div>
    <h2 class="intro-y text-lg font-medium mt-5 mb-3">
        Edit Form
    </h2>
    <form wire:submit.prevent="update">
        <div>
            <label for="name" class="form-label">Input Nama</label>
            <input id="name" type="text" wire:model="name" class="form-control" placeholder="Input Nama">
        </div>
        @error('name')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <div>
            <label for="email" class="form-label">Input Email</label>
            <input id="email" type="email" wire:model="email" class="form-control" placeholder="Input Email">
        </div>
        @error('email')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <div>
            <label for="password" class="form-label">Input Password</label>
            <input id="password" type="password" wire:model="password" class="form-control" placeholder="Input Password">
        </div>
        @error('password')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <div>
            <label for="role" class="form-label">Input Role</label>
            <select id="role" wire:model="role" class="form-control">
                <option value="">--Pilih--</option>
                <option value="admin">Admin</option>
                <option value="pemilik">Pemilik</option>
            </select>
        </div>
        @error('role')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <button type="submit" class="btn btn-primary mr-1 mb-2">Update</button>
    </form>
</div>