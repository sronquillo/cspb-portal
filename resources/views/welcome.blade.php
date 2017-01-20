@extends('layouts.app')

@section('content')
<script>
    ScrollRate = 50;

    function scrollDiv_init() {
        DivElmnt = document.getElementById('MyDivName');
        ReachedMaxScroll = false;

        DivElmnt.scrollTop = 0;
        PreviousScrollTop = 0;

        ScrollInterval = setInterval('scrollDiv()', ScrollRate);
    }

    function scrollDiv() {

        if (!ReachedMaxScroll) {
            DivElmnt.scrollTop = PreviousScrollTop;
            PreviousScrollTop++;

            ReachedMaxScroll = DivElmnt.scrollTop >= (DivElmnt.scrollHeight - DivElmnt.offsetHeight);
        } else {
            ReachedMaxScroll = (DivElmnt.scrollTop == 0) ? false : true;

            DivElmnt.scrollTop = PreviousScrollTop;
            PreviousScrollTop--;
        }
    }

    function pauseDiv() {
        clearInterval(ScrollInterval);
    }

    function resumeDiv() {
        PreviousScrollTop = DivElmnt.scrollTop;
        ScrollInterval = setInterval('scrollDiv()', ScrollRate);
    }


    function scrollDiv_init2() {
        DivElmnt2 = document.getElementById('MyDivName2');
        ReachedMaxScroll2 = false;

        DivElmnt2.scrollTop = 0;
        PreviousScrollTop2 = 0;

        ScrollInterval2 = setInterval('scrollDiv2()', ScrollRate);
    }

    function scrollDiv2() {

        if (!ReachedMaxScroll2) {
            DivElmnt2.scrollTop = PreviousScrollTop2;
            PreviousScrollTop2++;

            ReachedMaxScroll2 = DivElmnt2.scrollTop >= (DivElmnt2.scrollHeight - DivElmnt2.offsetHeight);
        } else {
            ReachedMaxScroll2 = (DivElmnt2.scrollTop == 0) ? false : true;

            DivElmnt2.scrollTop = PreviousScrollTop2;
            PreviousScrollTop2--;
        }
    }

    function pauseDiv2() {
        clearInterval(ScrollInterval2);
    }

    function resumeDiv2() {
        PreviousScrollTop2 = DivElmnt2.scrollTop;
        ScrollInterval2 = setInterval('scrollDiv2()', ScrollRate);
    }

    window.onload = function () {
        scrollDiv_init();
        scrollDiv_init2();

        $('.Table #tr3').each(function (i, row) {
            setTimeout(function () {
                $(row).delay(1000) .fadeIn(3000);
            }, 3000 * i);
        });

    }
</script>

<style type="text/css">
    #table1 #tr3 {
        display: none;
    }
</style>

<div class="container">
    <div class="col-md-9">
        <div class="panel panel-default"style="border-radius: 0px; background-color: whitesmoke;" >
            <div class="panel-body">
                <div class="row col-md-11">
                    <h1 style="color: #0a7e07">{{Auth::user()->firstname}} {{Auth::user()->lastname}} ({{Auth::user()->IDno}})</h1>
                    <h5>{{Auth::user()->address}}</h5><hr>
                </div>
                <div class='col-md-1'><h1><span class="glyphicon glyphicon-user"></span></h1></div>
                <div class="col-md-12">
                    <h3 style="border-bottom: 2px solid gray">My Details</h3>
                    <table width='40%'>
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
                        <tr>
                            <td width='50%' style="border-bottom: 1px solid gray">Position</td>
                            <td width='50%' style="border-bottom: 1px solid gray">
                                @if (Auth::user()->userLevel==1)Student
                                @elseif (Auth::user()->userLevel==2)Teacher
                                @elseif (Auth::user()->userLevel==31)Academic Chairman
                                @elseif (Auth::user()->userLevel==32)Academic Coordinator
                                @elseif (Auth::user()->userLevel==33)Registrar
                                @elseif (Auth::user()->userLevel==34)Finance
                                @elseif (Auth::user()->userLevel==4)Secretary
                                @elseif (Auth::user()->userLevel==51)Principal
                                @elseif (Auth::user()->userLevel==52)Rector
                                @endif
                            </td>
                        </tr><br>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div>
            <div class="panel panel-success">
                <div class="panel-heading">Latest Announcements!</div>
               	<div class="panel-body" onMouseOver="pauseDiv()" onMouseOut="resumeDiv()" class = "list-group-item" id="profile">
                    <ul class="list-group" id="MyDivName" style="overflow:auto;height:100px">
                        <table>
                            @foreach($announcement as $announcements)
                            <tr>
                                <td style="border-bottom: 1px solid gray">From:</td>
                                <td style="border-bottom: 1px solid gray">{{$announcements->firstname}} {{$announcements->lastname}}</td>
                            </tr>
                            <tr>
                                <td style="border-bottom: 1px solid gray">Subject:</td>
                                <td style="border-bottom: 1px solid gray"><b>{{$announcements->subject}}</b></td>
                            </tr>
                            <tr>
                                <td style="vertical-align: text-top; border-bottom: 1px solid gray">Message:</td>
                                <td style="border-bottom: 1px solid gray"><b>{{$announcements->message}}</b></td>
                            </tr>
                            @endforeach
                        </table>
                    </ul>
               	</div>
            </div>
        </div>
        <div>
            <div class="panel panel-success">
                <div class="panel-heading">Latest Notifications!</div>
               	<div class="panel-body" onMouseOver="pauseDiv2()" onMouseOut="resumeDiv2()" class = "list-group-item" id="profile">
                    <ul class="list-group" id="MyDivName2" style="overflow:auto;height:100px">
                        <table>
                            @foreach($notification as $notifications)
                            <tr>
                                <td style="border-bottom: 1px solid gray">From:</td>
                                <td style="border-bottom: 1px solid gray">{{$notifications->firstname}} {{$notifications->lastname}}</td>
                            </tr>
                            <tr>
                                <td style="border-bottom: 1px solid gray">Subject:</td>
                                <td style="border-bottom: 1px solid gray"><b>{{$notifications->subject}}</b></td>
                            </tr>
                            <tr>
                                <td style="vertical-align: text-top; border-bottom: 1px solid gray">Message:</td>
                                <td style="border-bottom: 1px solid gray"><b>{{$notifications->message}}</b></td>
                            </tr>
                            @endforeach
                        </table>
                    </ul>
               	</div>
            </div>
        </div>
    </div>
    
    
    
    @if (Auth::user()->userLevel==1)
    <div class="col-md-12">
        <div>
            <div class="panel panel-success">
                <div class="panel-heading">My Grades</div>
                <div class="panel-body">
                    <table border=1 width=100% align="center"  class="Table" id="table1">
                        <tr style="text-align: center; font-weight: bold">
                            <td rowspan=2>SUBJECTS</td>
                            <td colspan=4>QUARTER</td>
                        </tr>
                        <tr  style="text-align: center; font-weight: bold">
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                        </tr>

                        @foreach($grade as $grades)
                        <tr id="tr3">
                            <td>{{$grades->subjectName}}</td>
                            <td style="text-align: center">{{$grades->q1}}</td>
                            <td style="text-align: center">{{$grades->q2}}</td>
                            <td style="text-align: center">{{$grades->q3}}</td>
                            <td style="text-align: center">{{$grades->q4}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
    
    
</div>
@endsection
