@extends('layouts.deshboard')

@section('content')
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div>
            @endif
            @if (\Session::has('error'))
                <div class="alert alert-danger">
                    <p>{{ \Session::get('error') }}</p>
                </div>
            @endif
            <div class="x_title">
                <h2>White List IP</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="clearfix"></div>
                <a class="btn btn-primary mb-2 ml-2" href="{{ route('admin.white.create') }}">Add IP </a>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col"># sdfds</th>
                            <th scope="col">User Name</th>
                            <th scope="col">IP</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @php
                        $whitelists = DB::table('whitelists')
                            ->select('*')
                            ->get();
                        $users = DB::table('users')
                            ->select('*')
                            ->get();
                        
                    @endphp
                    <tbody>
                        @foreach ($whitelists as $value)
                            <tr>
                                <td>{{ $value->user_id }}</td>
                                @foreach ($users as $user)
                                    @if ($value->user_id == $user->id)
                                        <td>{{ $user->name }}</td>
                                    @endif
                                @endforeach

                                <td>{{ $value->ip }}</td>
                                <td>
                                    <a href="{{ route('admin.white.edit', $value->id) }}" class="btn btn-primary btn-sm"><i
                                            class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                    <a href="{{ route('admin.white.delete', $value->id) }}"
                                        class="btn btn-info btn-sm  btn-danger"><i class="fa fa-trash"
                                            aria-hidden="true"></i></a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
