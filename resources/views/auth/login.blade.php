@extends('layouts.app')

@section('content')
<div class="container"style="padding-bottom: 11%">
    <div class="row">
        <div class="col-md-6">
            <h1 style ="color:#0a7e07; border-bottom: solid 2px">Institutional Goals</h1>
            <ul>
                <li>Design and regularly update the curriculum that addresses the interest and current needs of the students in response to the challenges of the Third Millenium.</li>
            </ul>
            <ul>
                <li>Integrate the Gospel values in the Catholic formation of the students to build a just and more humane society.</li>
            </ul>
            <ul>
                <li>Develop the programs that will enable the students to grow spiritually, psychologically, emotionally, morally and socially as Christian Catholic.</li>
            </ul>
            <ul>
                <li>Enhance leadership capabilities of the students who are value laden and service oriented with a deep sense of respect and concern for others.</li>
            </ul>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body" style=" border-radius: 0px; background-color: #0a7e07; color: white">Login</div>
                <div class="panel-body" style=" border-radius: 0px; background-color: white;">

                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif


                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('IDno') ? ' has-error' : '' }}">
                            <label for="IDno" class="col-md-4 control-label">ID number</label>

                            <div class="col-md-6">
                                <input id="IDno" type="text" class="form-control" name="IDno" value="{{ old('IDno') }}">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Login
                                </button>

                                <!--<a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
