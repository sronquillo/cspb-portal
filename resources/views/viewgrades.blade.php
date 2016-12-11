@extends('layouts.app')

@section('content')

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
                                <label for="IDno" class="col-md-2 control-label">Search</label>
                                <div class="col-md-6" style="padding-bottom: 10px">
                                    <input id="IDno" type="text" class="form-control" name="IDno" placeholder="ID Number or Name or Section"required="required">
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-success" formaction="{{ url('list/view/grades') }}">
                                        <i class="glyphicon glyphicon-search"></i> Search
                                    </button>

                                </div>
                            </div>
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
