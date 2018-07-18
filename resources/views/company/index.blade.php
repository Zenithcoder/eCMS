@extends('layouts.app')

@section('content')
<div class="container">
     
     	<div class="widget-content">
                        <div class="widget-content nopadding">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Company name</th>
                                    <th>Company Website</th>
                                    <th>Email</th>
                                    <th>Company Logo</th> 
                                    <th>Actions</th>                            
                                </tr>
                                </thead>
                                <tbody>
                                @if('companys')
                                    @forelse($companys as $company)
                                        <tr>
                                            <td class="">{{$company->name}}</td>
                                            <td class="">{{$company->website}}</td>
                                            <td class="">{{$company->email}}</td>
                                            <td class=""><img src="{{asset('img/'.$company->logo)}}" height="50px" alt=""></td>
                                            <td class="">
                                                 
                                                <a href="{{route('company.edit',  $company->id)}} "  style="float:left" class="btn btn-sm btn-info">

                                                    <i class="icon-edit"></i>
                                                </a>

                                                <a href="{{route('company.delete', $company->id)}}"  style="float:left" class="btn btn-sm btn-danger">

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
                            {{$companys->links()}}
                        </div>
                    </div>
     
</div>
@endsection
