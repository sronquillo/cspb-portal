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

                <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white"><h1>View Grades</h1></div>
                <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white;padding-top: 10px;padding-bottom: 20px">  
                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="IDno" class="col-md-2 control-label">ID number :</label>
                                <div class="col-md-6" style="padding-bottom: 10px">
                                    <input id="IDno" type="text" class="form-control" name="IDno" placeholder="ID Number or Name or Section"required="required">
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-success" formaction="{{ url('/list/view/grades') }}">
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
                                @foreach($grade as $grades)
                                <tr style="border-bottom: 1px solid #0d5302; line-height: 40px">
                                    <td width="20%"><div align="Left">{{$grades->IDno}}</div></td>
                                    <td width="50%"><div align="Left">{{$grades->firstname}} {{$grades->middlename}} {{$grades->lastname}}</div></td>
                                    <td width="30%"><div align="Left">
                                            <a href='/grades/{{$grades->IDno}}'>View Grades</a>
                                            @if (Auth::user()->userLevel == 4 or Auth::user()->userLevel == 51 or Auth::user()->userLevel == 52)|
                                            <a href='/modify/grades/{{$grades->IDno}}'>Modify Grades</a>
                                            @else
                                            @endif
                                        </div></td>
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
