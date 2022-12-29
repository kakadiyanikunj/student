@extends('layouts.main')
@section('title', 'Student')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush


    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-users bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Student')}}</h5>
                            <span>{{ __('List of student')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Student')}}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- start message area-->
            @include('include.message')
            <!-- end message area-->
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="card-header"><h3>{{ __('Student')}}</h3></div>
                    <div class="card-body">
                        <table id="data_table" class="table">
                            <td> <button  class="btn btn-danger"><a href="trash">Move trash</a></button></td>
                            <thead>
                                <tr>
                                    <th>{{ __('id')}}</th>
                                    <th>{{ __('Name')}}</th>
                                    <th>{{ __('Email')}}</th>
                                    <th>{{ __('city')}}</th>
                                    <th>{{ __('Password')}}</th>
                                    <th>{{ __('Edit')}}</th>
                                    <th>{{ __('Delete')}}</th>

                                </tr>
                                @foreach($data as $d)
                                <tr>
                                   <td>{{$d->id}}</td>
                                   <td>{{$d->name}}</td>
                                   <td>{{$d->email}}</td>
                                   <td>{{$d->city}}</td>
                                   <td>{{$d->password}}</td>


                                   <td> <button  class="btn btn-success"><a href="edit/{{$d->id}}">edit</a></button></td>
                                    <td><button class="btn btn-danger"><a href="destroy/{{$d->id}}">Trash</a></button></td>

                                   </tr>
                                   @endforeach
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- push external js -->
    @push('script')
    <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
    <!--server side users table script-->
    <script src="{{ asset('js/custom.js') }}"></script>
    @endpush
@endsection
