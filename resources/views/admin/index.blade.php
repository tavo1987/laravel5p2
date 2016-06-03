@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials.alert')
                <div class="panel panel-default">
                    <div class="panel-heading">Lista de Usuarios</div>

                    <div class="panel-body">
                        <table class="table" id="table-users">
                            <thead>
                                <th>id</th>
                                <th>Primer Nombre</th>
                                <th>Segundo NOmbre</th>
                                <th>Email</th>
                                <th>Api token</th>
                                <th>Ultima Sessión</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr id="{{ $user->slug}}">
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->first_name}}</td>
                                        <td>{{$user->last_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td><a class="btn btn-block btn-success btn-sm" href="{{$user->api_token}}">LInk</a></td>
                                        <td>{{$user->last_logged_at->format('d-m-Y H:ia')}}</td>
                                        <td>
                                            <form action="{{url('/admin/users/session/'.$user->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                <button  class="btn btn-block btn-primary btn-sm" type="submit">Iniciar sesión</button>
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
@endsection