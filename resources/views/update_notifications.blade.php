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
                <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white"><h1>Update Notifications</h1></div>
                <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white;padding-top: 10px;padding-bottom: 10px">  
                    <div class="panel-body">
                        {{ $notification->links() }}
                        <table width="100%">
                            <tr style="border-bottom: 3px solid #0d5302">
                                <th width="30%"><div align="Left">Date</div></th>
                                <th width="40%"><div align="Left">Subject</div></th>
                                @if (Auth::user()->userLevel==4 or Auth::user()->userLevel==51 or Auth::user()->userLevel == 52)
                                <th width="15%"><div align="Left">From</div></th>
                                <th width="15%"><div align="Left">Action</div></th>
                                @else
                                <th width="30%"><div align="Left">From</div></th>
                                @endif
                            </tr>
                            @foreach($notification as $notifications)
                            <tr style="border-bottom: 1px solid #0d5302; line-height: 40px">
                                <td width="30%"><div align="Left">{{ date('M d, Y (D) - g:i a',strtotime($notifications->created_at)) }}</div></td>
                                <td width="40%"><div align="Left"><a href="/{{$notifications->anID}}">{{$notifications->subject}}</a></div></td>
                                <td width="15%"><div align="Left">{{$notifications->firstname}} {{$notifications->lastname}}</div></td>
                                @if (Auth::user()->userLevel==4 or Auth::user()->userLevel==51 or Auth::user()->userLevel == 52)
                                <td width="15%"><div align="Left">
                                        <a href='/notifications/{{$notifications->anID}}'>Update</a> |
                                        <a href='/delete/notifications/{{$notifications->anID}}'>Delete</a>
                                    </div></td>
                                @else
                                @endif
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
