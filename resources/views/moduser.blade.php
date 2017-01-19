@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body" style="border: 1px solid #0d5302; border-radius: 0px; background-color: #0a7e07; color: white" >Welcome! <b>{{Auth::user()->firstname}} {{Auth::user()->middlename}} {{Auth::user()->lastname}} ({{Auth::user()->IDno}})</b></div>

                <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white"><h1>Modify Users</h1></div>
                <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white;padding-top: 10px;padding-bottom: 10px">  
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                @foreach ($user as $users)
                                @if (Auth::user()->userLevel==4 or Auth::user()->userLevel==51 or Auth::user()->userLevel == 52)
                                <div align="right"><a href="/users/{{$users->IDno}}"><button class="btn btn-success">Turn Editing Off</button></a></div>
                                @endif
                                <table width="100%">
                                    <form method='POST' role="form" class='form-horizontal'>
                                        <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                                        <input type='hidden' name='id' value='{{ $users->id }}'>                                
                                        <tr>
                                            <td width="20%">
                                                Student No.:
                                            </td>
                                            <td>
                                                <b><input type='text' name='IDno' value='{{$users->IDno}}' size="36" readonly></b>
                                        </tr>
                                        <tr>
                                            <td width="20%">
                                                Firstname:
                                            </td>
                                            <td>
                                                <input type='text' name='firstname' value='{{$users->firstname}}' size="39">
                                        </tr>
                                        <tr>
                                            </td>
                                            <td>
                                                Middlename:
                                            </td>
                                            <td>
                                                <input type='text' name='middlename' value="{{$users->middlename}}" size="39">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Lastname:
                                            </td>
                                            <td>
                                                <input type='text' name='lastname' value="{{$users->lastname}}" size="39">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Department:
                                            </td>
                                            <td>
                                                <input type='text' name='department' value="{{$users->department}}" size="39">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Level:
                                            </td>
                                            <td>
                                                <input type='text' name='level' value="{{$users->level}}" size="39">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Section:
                                            </td>
                                            <td>
                                                <input type='text' name='section' value="{{$users->section}}" size="39">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Email:
                                            </td>
                                            <td>
                                                <input type='email' name='email' value="{{$users->email}}" size="39" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Address:
                                            </td>
                                            <td>
                                                <input type='text' name='address' value="{{$users->address}}" size="39">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Contact No.:
                                            </td>
                                            <td>
                                                <input type='text' name='contactno' value="{{$users->contactno}}" size="39">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                            </td>
                                            <td align="right">
                                                <input type="reset" class="btn btn-default">
                                                <input type="submit" class="btn btn-success" value="Modify" formaction="{{ url('/mod/user')}}">
                                            </td>
                                        </tr>
                                </table><hr>
                                @endforeach
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
