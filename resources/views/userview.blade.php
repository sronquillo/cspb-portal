@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body" style="border: 1px solid #0d5302; border-radius: 0px; background-color: #0a7e07; color: white" >Welcome! <b>{{Auth::user()->firstname}} {{Auth::user()->middlename}} {{Auth::user()->lastname}} ({{Auth::user()->IDno}})</b></div>

                <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white"><h1>View Users</h1></div>
                <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white;padding-top: 10px;padding-bottom: 10px">  
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                @foreach ($user as $users)
                                @if (Auth::user()->userLevel==4 or Auth::user()->userLevel==51 or $users->userLevel==52)
                                <div align="right"><a href="/modify/users/{{$users->IDno}}"><button class="btn btn-success">Turn Editing On</button></a></div>
                                @endif
                                <table width="100%">
                                    <tr>
                                        <td width="20%">
                                            Student No.:
                                        </td>
                                        <td style="border-bottom: 1px solid">
                                            <b>{{$users->IDno}}</b>
                                    </tr>
                                    <tr>
                                        <td width="20%">
                                            Firstname:
                                        </td>
                                        <td style="border-bottom: 1px solid">
                                            {{$users->firstname}}
                                    </tr>
                                    <tr>
                                        </td>
                                        <td>
                                            Middlename:
                                        </td>
                                        <td style="border-bottom: 1px solid">
                                            {{$users->middlename}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Lastname:
                                        </td>
                                        <td style="border-bottom: 1px solid">
                                            {{$users->lastname}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Department:
                                        </td>
                                        <td style="border-bottom: 1px solid">
                                            {{$users->department}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Level:
                                        </td>
                                        <td style="border-bottom: 1px solid">
                                            {{$users->level}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Section:
                                        </td>
                                        <td style="border-bottom: 1px solid">
                                            {{$users->section}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Email:
                                        </td>
                                        <td style="border-bottom: 1px solid">
                                            {{$users->email}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Address:
                                        </td>
                                        <td style="border-bottom: 1px solid">
                                            {{$users->address}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Contact No.:
                                        </td>
                                        <td style="border-bottom: 1px solid">
                                            {{$users->contactno}}
                                        </td>
                                    </tr>
                                </table><hr>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
