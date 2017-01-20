@extends('layouts.app')

@section('content')
<script>
ScrollRate = 1;

function scrollDiv_init() {
    DivElmnt = document.getElementById('MyDivName');
    ReachedMaxScroll = false;
   
    DivElmnt.scrollTop = 0;
    PreviousScrollTop  = 0;
   
    ScrollInterval = setInterval('scrollDiv()', ScrollRate);
}

function scrollDiv() {
   
    if (!ReachedMaxScroll) {
        DivElmnt.scrollTop = PreviousScrollTop;
        PreviousScrollTop++;
       
        ReachedMaxScroll = DivElmnt.scrollTop >= (DivElmnt.scrollHeight - DivElmnt.offsetHeight);
    }
    else {
        ReachedMaxScroll = (DivElmnt.scrollTop == 0)?false:true;
       
        DivElmnt.scrollTop = PreviousScrollTop;
        PreviousScrollTop--;
    }
}

function pauseDiv() {
    clearInterval(ScrollInterval);
}

function resumeDiv() {
    PreviousScrollTop = DivElmnt.scrollTop;
    ScrollInterval    = setInterval('scrollDiv()', ScrollRate);
}


function scrollDiv_init2() {
    DivElmnt2 = document.getElementById('MyDivName2');
    ReachedMaxScroll2 = false;
   
    DivElmnt2.scrollTop = 0;
    PreviousScrollTop2  = 0;
   
    ScrollInterval2 = setInterval('scrollDiv2()', ScrollRate);
}

function scrollDiv2() {
   
    if (!ReachedMaxScroll2) {
        DivElmnt2.scrollTop = PreviousScrollTop2;
        PreviousScrollTop2++;
       
        ReachedMaxScroll2 = DivElmnt2.scrollTop >= (DivElmnt2.scrollHeight - DivElmnt2.offsetHeight);
    }
    else {
        ReachedMaxScroll2 = (DivElmnt2.scrollTop == 0)?false:true;
       
        DivElmnt2.scrollTop = PreviousScrollTop2;
        PreviousScrollTop2--;
    }
}

function pauseDiv2() {
    clearInterval(ScrollInterval2);
}

function resumeDiv2() {
    PreviousScrollTop2 = DivElmnt2.scrollTop;
    ScrollInterval2    = setInterval('scrollDiv2()', ScrollRate);
}

window.onload = function () {
	scrollDiv_init();
	scrollDiv_init2();
	
}
</script>

<div class="container">
    <div class="col-md-9">
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
               	<div class="panel-body" onMouseOver="pauseDiv()" onMouseOut="resumeDiv()" class = "list-group-item" id="profile">
               		<ul class="list-group" id="MyDivName" style="overflow:auto;height:100px">
               			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis leo sit amet egestas fringilla. Morbi aliquet, eros sit amet aliquam fermentum, odio lacus cursus elit, ac venenatis diam leo sit amet metus. Maecenas posuere, enim non sollicitudin consectetur, enim elit congue sem, vel feugiat tortor nunc eu augue. Vestibulum egestas rhoncus ligula at malesuada. In consectetur elementum dolor sit amet tincidunt. Pellentesque nisi velit, convallis vel sapien aliquet, vehicula maximus diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque mattis lorem malesuada laoreet elementum. Vivamus convallis tempus est eu viverra. Ut aliquam risus tristique risus tempus lobortis. Etiam molestie ac erat eget gravida. Aliquam posuere at nunc a tristique. Mauris ornare velit libero, et volutpat diam dictum nec. Fusce eu tempor eros, dignissim ultricies magna. Aenean at augue dolor. Cras hendrerit dictum eros tristique bibendum. Morbi feugiat fermentum dolor quis pretium. Vestibulum urna mi, lobortis at ipsum a, feugiat lacinia ante.
               		</ul>
               	</div>
				</div>
        </div>
        <div>
            <div class="panel panel-success">
                <div class="panel-heading">Latest Notifications!</div>
               	<div class="panel-body" onMouseOver="pauseDiv2()" onMouseOut="resumeDiv2()" class = "list-group-item" id="profile">
               		<ul class="list-group" id="MyDivName2" style="overflow:auto;height:100px">
               			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis leo sit amet egestas fringilla. Morbi aliquet, eros sit amet aliquam fermentum, odio lacus cursus elit, ac venenatis diam leo sit amet metus. Maecenas posuere, enim non sollicitudin consectetur, enim elit congue sem, vel feugiat tortor nunc eu augue. Vestibulum egestas rhoncus ligula at malesuada. In consectetur elementum dolor sit amet tincidunt. Pellentesque nisi velit, convallis vel sapien aliquet, vehicula maximus diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque mattis lorem malesuada laoreet elementum. Vivamus convallis tempus est eu viverra. Ut aliquam risus tristique risus tempus lobortis. Etiam molestie ac erat eget gravida. Aliquam posuere at nunc a tristique. Mauris ornare velit libero, et volutpat diam dictum nec. Fusce eu tempor eros, dignissim ultricies magna. Aenean at augue dolor. Cras hendrerit dictum eros tristique bibendum. Morbi feugiat fermentum dolor quis pretium. Vestibulum urna mi, lobortis at ipsum a, feugiat lacinia ante.
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis leo sit amet egestas fringilla. Morbi aliquet, eros sit amet aliquam fermentum, odio lacus cursus elit, ac venenatis diam leo sit amet metus. Maecenas posuere, enim non sollicitudin consectetur, enim elit congue sem, vel feugiat tortor nunc eu augue. Vestibulum egestas rhoncus ligula at malesuada. In consectetur elementum dolor sit amet tincidunt. Pellentesque nisi velit, convallis vel sapien aliquet, vehicula maximus diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque mattis lorem malesuada laoreet elementum. Vivamus convallis tempus est eu viverra. Ut aliquam risus tristique risus tempus lobortis. Etiam molestie ac erat eget gravida. Aliquam posuere at nunc a tristique. Mauris ornare velit libero, et volutpat diam dictum nec. Fusce eu tempor eros, dignissim ultricies magna. Aenean at augue dolor. Cras hendrerit dictum eros tristique bibendum. Morbi feugiat fermentum dolor quis pretium. Vestibulum urna mi, lobortis at ipsum a, feugiat lacinia ante.
               		</ul>
               	</div>
				</div>
        </div>
    </div>
    <div class="col-md-12">
        <div>
            <div class="panel panel-success">
                <div class="panel-heading">My Grades</div>
                <div class="panel-body">Your created announcement will be subject for validation by the school secretary or principal</div>
            </div>
        </div>
    </div>
</div>
@endsection
