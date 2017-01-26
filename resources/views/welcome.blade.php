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
<style>
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: absolute; /* Stay in place */
    z-index: 100; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    top: 20px;
    display: block;
    width: 70%;
    max-width: 100%;
    border: 7px solid rgba(0, 0, 0, .2);
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 70%;
    max-width: 100%;
    text-align: center;
    color: #ccc;
    padding: 20px 0;
    height: 1px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>

<style>
#myImg2 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg2:hover {opacity: 0.7;}

/* The Modal (background) */
.modal2 {
    display: none; /* Hidden by default */
    position: absolute; /* Stay in place */
    z-index: 100; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content2 {
    margin: auto;
    top: 20px;
    display: block;
    width: 70%;
    max-width: 100%;
    border: 7px solid rgba(0, 0, 0, .2);
}

/* Caption of Modal Image */
#caption2 {
    margin: auto;
    display: block;
    width: 70%;
    max-width: 100%;
    text-align: center;
    color: #ccc;
    padding: 20px 0;
    height: 1px;
}

/* Add Animation */
.modal-content2, #caption2 {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close2 {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close2:hover,
.close2:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content2 {
        width: 100%;
    }
}
</style>


<div class="container">
    <div class="col-md-9">
        <div class="panel panel-default"style="border-radius: 0px; background-color: whitesmoke;" >
            <div class="panel-body">
            								<div id="myModal" class="modal">
													<span class="close">&times;</span>
													<img class="modal-content" id="img01">
													<div id="caption"></div>
												</div>
												<div id="myModal2" class="modal2">
													<span class="close2">&times;</span>
													<img class="modal-content2" id="img02">
													<div id="caption2"></div>
												</div>
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
                                <td style="border-bottom: 1px solid gray"><p>{{$announcements->message}}<br>
	                            @if ($announcements->image!=null)
	                                <img id="myImg" src="/upload-images/{{$announcements->image}}" alt="{{$announcements->image}}" width="100%"></br> 
                                    @endif
                                </p></td>
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
                                <td style="border-bottom: 1px solid gray"><p>{{$notifications->message}}
                                    @if ($notifications->image!=null)
                                        <img id="myImg2" src="/upload-images/{{$notifications->image}}" alt="{{$notifications->image}}" width="100%"></br> 
                                    @endif                                
                                </p></td>
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
                            <td style="text-align: center">@if ($grades->q1 == 0) @else {{$grades->q1}}@endif</td>
                            <td style="text-align: center">@if ($grades->q2 == 0) @else {{$grades->q2}}@endif</td>
                            <td style="text-align: center">@if ($grades->q3 == 0) @else {{$grades->q3}}@endif</td>
                            <td style="text-align: center">@if ($grades->q4 == 0) @else {{$grades->q4}}@endif</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>
<script>
// Get the modal
var modal2 = document.getElementById('myModal2');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img2 = document.getElementById('myImg2');
var modalImg2 = document.getElementById("img02");
var captionText2 = document.getElementById("caption2");
img2.onclick = function(){
    modal2.style.display = "block";
    modalImg2.src = this.src;
    captionText2.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span2 = document.getElementsByClassName("close2")[0];

// When the user clicks on <span> (x), close the modal
span2.onclick = function() { 
    modal2.style.display = "none";
}
</script>
@endsection
