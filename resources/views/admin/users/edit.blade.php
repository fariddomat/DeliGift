@extends('admin._layouts._app')

@section('content')

    <div class="tile mb-4">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title">Edit User</h4>
                    <p class="card-category">update user with Role</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('put')
                        @include('admin._layouts._error')


                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ old('name', $user->name) }}" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ old('email', $user->email) }}" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="name">City</label>
                            <select name="city" id="" class="form-control">
                                <option @if ($user->city=='Damascus')
selected
                                @endif value="Damascus">Damascus</option>
                                <option @if ($user->city=='Homs')
                                    selected
                                                                    @endif  value="Homs">Homs</option>
                                <option @if ($user->city=='Hama')
                                    selected
                                                                    @endif  value="Hama">Hama</option>
                                <option @if ($user->city=='Latakia')
                                    selected
                                                                    @endif  value="Latakia">Latakia</option>
                                <option @if ($user->city=='Aleppo')
                                    selected
                                                                    @endif  value="Aleppo">Aleppo</option>
                                <option @if ($user->city=='Tartus')
                                    selected
                                                                    @endif  value="Tartus">Tartus</option>
                                <option @if ($user->city=='Daraa')
                                    selected
                                                                    @endif  value="Daraa">Daraa</option>
                                <option @if ($user->city=='Suwayda')
                                    selected
                                                                    @endif  value="Suwayda">Suwayda</option>
                                <option @if ($user->city=='Hasaka')
                                    selected
                                                                    @endif  value="Hasaka">Hasaka</option>
                                <option @if ($user->city=='Der_Al_Zor')
                                    selected
                                                                    @endif  value="Der_Al_Zor">Der_Al_Zor</option>
                                <option @if ($user->city=='Raqqa')
                                    selected
                                                                    @endif  value="Raqqa">Raqqa</option>
                                <option @if ($user->city=='Quneitra')
                                    selected
                                                                    @endif  value="Quneitra">Quneitra</option>
                            </select>
                        </div>

                        {{-- Roles --}}
                        <div class="form-group">
                            <label for="role">Roles</label>
                            <select class="form-control" name="role_id" id="role_id">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                        {{ $role->name }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                                Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
            @endsection
