@extends('layouts.app')

@section('content')
<style>
    tr:nth-child(even){background-color: #f2f2f2}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body" style="border: 1px solid #0d5302; border-radius: 0px; background-color: #0a7e07; color: white" >Welcome! <b>{{Auth::user()->firstname}} {{Auth::user()->middlename}} {{Auth::user()->lastname}} ({{Auth::user()->IDno}})</b></div>

                <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white"><h1>View Users</h1></div>
                <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white;padding-top: 10px;padding-bottom: 10px">  
                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/users/list') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="IDno" class="col-md-2 control-label">Search</label>
                                <div class="col-md-6" style="padding-bottom: 10px">
                                    <input id="IDno" type="text" class="form-control" name="IDno" placeholder="ID Number or Name or Section"required="required">
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-success">
                                        <i class="glyphicon glyphicon-search"></i> Search
                                    </button>
                                </div>
                            </div>
                            <hr>
                            <table width="100%">
                                <tr style="border-bottom: 3px solid #0d5302">
                                    <th width="20%"><div align="Left">ID No</div></th>
                                    <th width="50%"><div align="Left">Name</div></th>
                                    <th width="30%"><div align="Left">Action</div></th>
                                </tr>
                                @foreach($user as $users)
                                <tr style="border-bottom: 1px solid #0d5302; line-height: 40px">
                                    <td width="20%"><div align="Left">{{$users->IDno}}</div></td>
                                    <td width="50%"><div align="Left">{{$users->firstname}} {{$users->middlename}} {{$users->lastname}}</div></td>
                                    <td width="30%"><div align="Left"><a href="/users/{{$users->IDno}}">View User Info</a>
                                            @if (Auth::user()->userLevel==4)
                                            @if ($users->userLevel==1)
                                            | <a href="/grades/{{$users->IDno}}">View Grades</a>
                                            @else
                                            @endif
                                            @if ($users->userLevel==1 or $users->userLevel==2)
                                            @if ($users->is_active==1)
                                            | <a href="/deactivate/{{$users->IDno}}">Deactivate</a>
                                            @else
                                            | <a href="/activate/{{$users->IDno}}">Activate</a>
                                            @endif
                                            @else
                                            @endif
                                            @elseif (Auth::user()->userLevel==51 or Auth::user()->userLevel==52)
                                            @if ($users->userLevel==1)
                                            | <a href="/grades/{{$users->IDno}}">View Grades</a>
                                            @else
                                            @endif
                                            @if ($users->userLevel==1 or $users->userLevel==2 or $users->userLevel==31 or $users->userLevel==32 or $users->userLevel==33 or $users->userLevel==34 or $users->userLevel==4 or $users->userLevel==51 or $users->userLevel==52)
                                            @if ($users->is_active==1)
                                            | <a href="/deactivate/{{$users->IDno}}">Deactivate</a>
                                            @else
                                            | <a href="/activate/{{$users->IDno}}">Activate</a>
                                            @endif
                                            @else
                                            @endif
                                            @else
                                        </div></td>
                                    @endif
                                </tr>
                                @endforeach
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
