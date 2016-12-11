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

                <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white"><h1>Notifications</h1></div>
                <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white;padding-top: 10px;padding-bottom: 10px">  
                    <div class="panel-body">
                        {{ $notification->links() }}
                        <table width="100%">
                            <tr style="border-bottom: 3px solid #0d5302">
                                <th width="20%"><div align="Left">Date</div></th>
                                <th width="50%"><div align="Left">Subject</div></th>
                                <th width="30%"><div align="Left">From</div></th>
                            </tr>
                            @foreach($notification as $notifications)
                            <tr style="border-bottom: 1px solid #0d5302; line-height: 40px">
                                <td width="20%"><div align="Left">{{$notifications->created}}</div></td>
                                <td width="50%"><div align="Left"><a href="{{$notifications->anID}}">{{$notifications->subject}}</a></div></td>
                                <td width="30%"><div align="Left">{{$notifications->firstname}} {{$notifications->lastname}}</div></td>
                            </tr>
                            @endforeach
                        </table>
                        {{ $notification->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
