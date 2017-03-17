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
                <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white"><h1>Announcements</h1></div>
                <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white;padding-top: 10px;padding-bottom: 10px">  
                    <div class="panel-body">
                        {{ $announcement->links() }}
                        <table width="100%">
                            <tr style="border-bottom: 3px solid #0d5302">
                                <th width="30%"><div align="Left">Date</div></th>
                                <th width="40%"><div align="Left">Subject</div></th>

                                @if (Auth::user()->userLevel==4 or Auth::user()->userLevel==51 or Auth::user()->userLevel==52)
                                <th width="15%"><div align="Left">From</div></th>
                                <th width="15%"><div align="Left">Action</div></th>
                                @else
                                <th width="30%"><div align="Left">From</div></th>
                                @endif
                            </tr>
                            @foreach($announcement as $announcements)
                            <tr style="border-bottom: 1px solid #0d5302; line-height: 40px">
                                <td width="30%"><div align="Left">{{ date('M d, Y (D) - g:i a',strtotime($announcements->created_at)) }}</div></td>
                                <td width="40%">
                                    <div align="Left">
                                        <a href="{{$announcements->anID}}">
                                            @if ($announcements->is_read == 0)
                                            <b>{{$announcements->subject}}</b>
                                            @else
                                                {{$announcements->subject}}
                                            @endif
                                        </a>
                                    </div>
                                </td>                                        
                                @if (Auth::user()->userLevel==4 or Auth::user()->userLevel==51 or Auth::user()->userLevel==52)
                                <td width="15%"><div align="Left">{{$announcements->firstname}} {{$announcements->lastname}}</div></td>
                                <td width="15%">
                                    <div align="Left">
                                        <a href='/announcements/{{$announcements->anID}}'>Update</a> |
                                        <a href='/delete/announcements/{{$announcements->anID}}'>Delete</a>
                                    </div>
                                </td>
                                @else
                                <td width="30%"><div align="Left">{{$announcements->firstname}} {{$announcements->lastname}}</div></td>
                                @endif
                            </tr>
                            @endforeach
                        </table>
                        {{ $announcement->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</script>
@endsection
