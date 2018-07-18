@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
        <h3>Companies</h3>
            <ul class="panel panel-default">
                <li> <a href="/company">All Company</a></li>
                <li><a href="{{route('company.create')}}">Register Company</a></li>
            </ul>
        </div>
        <div class="col-md-6 col-md-offset-2">
            <h3>Employees</h3>
            <ul class="panel panel-default">
                <li> <a href="/employee">All Employees</a></li>
               <li><a href="{{route('employee.create')}}">Register Employee</a></li>
            </ul>
        </div>
        
    </div>
</div>
@endsection
