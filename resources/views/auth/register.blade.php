@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body" style="border: 1px solid #0d5302; border-radius: 0px; background-color: #0a7e07; color: white">Register</div>
                <div class="panel-body"style="border: 1px solid #0d5302; border-radius: 0px; background-color: white">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        {{--ID number--}}
                        <div class="form-group{{ $errors->has('IDno') ? ' has-error' : '' }}">
                            <label for="IDno" class="col-md-4 control-label">ID number</label>

                            <div class="col-md-6">
                                <input id="IDno" type="text" class="form-control" name="IDno" value="{{ old('IDno') }}">

                                @if ($errors->has('IDno'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('IDno') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{--First Name --}}
                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">

                                @if ($errors->has('firstname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('firstname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{--Middle Name --}}
                        <div class="form-group">
                            <label for="middlename" class="col-md-4 control-label">Middle Name</label>
                            <div class="col-md-6">
                                <input id="middlename" type="text" class="form-control" name="middlename" value="{{ old('middlename') }}">
                            </div>
                        </div>

                        {{--Last Name --}}
                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">

                                @if ($errors->has('lastname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!--                        {{--Status--}}
                                                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                                    <label for="status" class="col-md-4 control-label">Status</label>
                                                    
                                                    <div class="col-md-6">
                                                        <select name="status" class="form-control">
                                                            <option id="status" name="status" value=NULL></option>
                                                            <option id="status" name="status" value="Student">Student</option>
                                                            <option id="status" name="status" value="Employee">Employee</option>
                                                        </select>                            
                                                        @if ($errors->has('status'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('status') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>-->

                        {{--User Group--}}
                        <div class="form-group{{ $errors->has('userLevel') ? ' has-error' : '' }}">
                            <label for="userLevel" class="col-md-4 control-label">User Group</label>

                            <div class="col-md-6">
                                <select name="userLevel" class="form-control">
                                    <option id="userLevel" name="userLevel" value="1">Student</option>
                                    <option id="userLevel" name="userLevel" value="2">Teacher</option>
                                    <option id="userLevel" name="userLevel" value="31">Academic Chairman</option>
                                    <option id="userLevel" name="userLevel" value="32">Academic Coordinator</option>
                                    <option id="userLevel" name="userLevel" value="33">Registrar</option>
                                    <option id="userLevel" name="userLevel" value="34">Finance</option>
                                    <option id="userLevel" name="userLevel" value="4">Secretary</option>
                                    <option id="userLevel" name="userLevel" value="51">Principal</option>
                                    <option id="userLevel" name="userLevel" value="52">Rector</option>
                                </select>                            
                                @if ($errors->has('userLevel'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('userLevel') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{--Email--}}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{--Password--}}
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{--Password Confirmation--}}
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{--Hidden--}}
                        <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}">
                            <div class="col-md-6">
                                <input id="is_active" type="hidden" class="form-control" name="is_active" value="1">
                            </div>
                        </div>

                        {{--Submit--}}
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="glyphicon glyphicon-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
