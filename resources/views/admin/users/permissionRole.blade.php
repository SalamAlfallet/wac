@extends('layouts.default2')
@section('titlepage')
<br>
Create Role Permission Panel
@endsection

@section('content')





<div class="row ">
    <div class="col-md-12">
        <div class="main-card  card">
            <div class="card-body d-flex h-99 justify-content-center align-items-center ">
                <div class="col-md-8 ">
                    <div class="main-card  mr-6 card ">
                        <div class="card-body">

                            <form method="post" action="{{route('admin.permissionsRole.store')}}">
                                @csrf

                                <div class="col-md-10 ">

                                    <select type="select" id="exampleCustomSelect" name="role_id" class="custom-select   mr-4">
                                        <option value="">Role</option>
                                        @foreach($roles as $role)


                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>



                                    <br>
                                    <br>
                                    <div class="col-md-12">

                                        <label class="checkbox-inline ">
                                            @foreach($permissions as $permission)
                                            <input name="permission_id[]" type="checkbox" class="mr-2" value="{{$permission->id}}"> {{$permission->name}}
                                            @endforeach
                                        </label>

                                    </div>

                                    <div class="mt-4 d-flex align-items-center">

                                        <div class="ml-auto">
                                            <button class="btn btn-primary btn-lg">Save </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
