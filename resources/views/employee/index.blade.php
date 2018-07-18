@extends('layouts.app')

@section('content')
<div class="container">
     
     	<div class="widget-content">
                        <div class="widget-content nopadding">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>phone </th> 
                                    <th>email</th>   
                                    <th>Company</th>  
                                    <th>Actions</th>                           
                                </tr>
                                </thead>
                                <tbody>
                                @if('employees')
                                    @forelse($employees as $employee)
                                        <tr>
                                            <td class="">{{$employee->first_name}}</td>
                                            <td class="">{{$employee->last_name}}</td>
                                            <td class="">{{$employee->phone}}</td>
                                            <td class="">{{$employee->email}}</td>
                                            <td class="">{{$employee->company->name}}</td>
                                            
                                            <td class="">
                                                 
                                                <a href="{{route('employee.edit',  $employee->id)}} "  style="float:left" class="btn btn-sm btn-info">

                                                    <i class="icon-edit"></i>
                                                </a>

                                                <a href=" {{route('employee.delete', $employee->id)}}"  style="float:left" class="btn btn-sm btn-danger">

                                                    <i class="icon-remove"></i>
                                                </a>
                                                
                                            </td>
                                        </tr>
                                    @empty
                                        <td class="taskDesc">NO DATA</td>

                                    @endforelse
                                @endif

                                </tbody>
                            </table>
                            {{$employees->links()}}
                        </div>
                    </div>
     
</div>
@endsection
