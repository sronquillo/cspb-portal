@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row col-md-9">
        <div class="panel panel-default"style="border-radius: 0px; background-color: whitesmoke;" >
            <div class="panel-body">
                <div class="row col-md-11">
                    <h1 style="color: #0a7e07">{{Auth::user()->firstname}} {{Auth::user()->lastname}} ({{Auth::user()->IDno}})</h1>
                    <h5>{{Auth::user()->address}}</h5><hr>
                </div>
                <div class='col-md-1'><h1><span class="glyphicon glyphicon-user"></span></h1></div>
                <div class="col-md-11">
                    <h3 style="border-bottom: 2px solid gray">My Details</h3>
                    <table width='50%'>
                        <tr>
                            <td width='50%' style="border-bottom: 1px solid gray">Last Online</td>
                            <td width='50%' style="border-bottom: 1px solid gray">{{Auth::user()->updated_at->format('M d, Y (D)')}}</td>
                        </tr>
                        <tr>
                            <td width='50%' style="border-bottom: 1px solid gray">Level</td>
                            <td width='50%' style="border-bottom: 1px solid gray">{{Auth::user()->level}}</td>
                        </tr>
                        <tr>
                            <td width='50%' style="border-bottom: 1px solid gray">Section</td>
                            <td width='50%' style="border-bottom: 1px solid gray">{{Auth::user()->section}}</td>
                        </tr>
                        <tr>
                            <td width='50%' style="border-bottom: 1px solid gray">Contact Number</td>
                            <td width='50%' style="border-bottom: 1px solid gray">{{Auth::user()->contactno}}</td>
                        </tr>
                        <tr>
                            <td width='50%' style="border-bottom: 1px solid gray">Account Created</td>
                            <td width='50%' style="border-bottom: 1px solid gray">{{Auth::user()->created_at->format('M d, Y (D)')}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div>
            <div class="panel panel-success">
                <div class="panel-heading">Latest Announcements!</div>
                <div class="panel-body">Your created announcement will be subject for validation by the school secretary or principal</div>
            </div>
        </div>
    </div>
</div>
@endsection
