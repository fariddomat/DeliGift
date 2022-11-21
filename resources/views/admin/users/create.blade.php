@extends('admin._layouts._app')

@section('content')
    <div class="tile mb-4">

        <div class="col-md-10">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title">Create User</h4>
                    <p class="card-category">add new user with Role</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        @method('post')
                        @include('admin._layouts._error')


                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"
                                aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                                aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="password_c">Password Confirmation</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_c"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <select name="city" id="" class="form-control">
                                <option value="Damascus">Damascus</option>
                                <option value="Homs">Homs</option>
                                <option value="Hama">Hama</option>
                                <option value="Latakia">Latakia</option>
                                <option value="Aleppo">Aleppo</option>
                                <option value="Tartus">Tartus</option>
                                <option value="Daraa">Daraa</option>
                                <option value="Suwayda">Suwayda</option>
                                <option value="Hasaka">Hasaka</option>
                                <option value="Der_Al_Zor">Der_Al_Zor</option>
                                <option value="Raqqa">Raqqa</option>
                                <option value="Quneitra">Quneitra</option>
                            </select>
                        </div>
                        {{-- Roles --}}
                        <div class="form-group">
                            <label for="role">Roles</label>
                            <select class="form-control" name="role_id" id="role_id">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>

                                @endforeach
                            </select>
                            {{-- <a href="{{ route('admin.roles.create') }}">Create new Role</a> --}}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                                Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
            @endsection
