@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body" style="border: 1px solid #0d5302; border-radius: 0px; background-color: #0a7e07; color: white" >Welcome! <b>{{Auth::user()->firstname}} {{Auth::user()->middlename}} {{Auth::user()->lastname}} ({{Auth::user()->IDno}})</b></div>

                <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white"><h1>Update Notifications</h1></div>
                <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white;padding-top: 10px;padding-bottom: 10px">  

                    @foreach($update_announcement as $update_announcements)

                    <div class="panel-body">           
                        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/update') }}" id="announcementform">
                            {{ csrf_field() }}
                            <div class="form-group col-md-8">
                                <div class="row">
                                    <label for="recipient" class="col-md-2 control-label">Recipient:</label>
                                    <div class="col-md-7" style="padding-bottom: 10px">
                                        @if ($update_announcements->recipient_userLevel==1) Student
                                        @elseif ($update_announcements->recipient_userLevel==2) Teacher
                                        @elseif ($update_announcements->recipient_userLevel==31) Academic Chairman
                                        @elseif ($update_announcements->recipient_userLevel==32) Academic Coordinator
                                        @elseif ($update_announcements->recipient_userLevel==33) Registrar, Finance
                                        @elseif ($update_announcements->recipient_userLevel==34) Finance
                                        @elseif ($update_announcements->recipient_userLevel==4) Secretary
                                        @elseif ($update_announcements->recipient_userLevel==51) Principal
                                        @else Rector
                                        @endif<br>

                                        <select name="recipient" class="form-horizontal">
                                            <option id="recipient" name="type" value=1>Student</option>
                                            <option id="recipient" name="type" value=2>Teacher</option>
                                            <option id="recipient" name="type" value=31>Academic Chairman</option>
                                            <option id="recipient" name="type" value=32>Academic Coordinator</option>
                                            <option id="recipient" name="type" value=33>Registrar</option>
                                            <option id="recipient" name="type" value=34>Finance</option>
                                            <option id="recipient" name="type" value=4>Secretary</option>
                                            <option id="recipient" name="type" value=51>Principal</option>
                                            <option id="recipient" name="type" value=52>Rector</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="subject" class="col-md-2 control-label">Subject:</label>
                                    <div class="col-md-7" style="padding-bottom: 10px">
                                        <input id="subject" type="text" class="form-horizontal" name="subject" placeholder="Subject"required="required" value="{{$update_announcements->subject}}">
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="message" class="col-md-2 control-label">Message:</label>
                                    <div class="col-md-7" style="padding-bottom: 10px">
                                        <textarea id="message" rows="10" cols="36" name="message" form="announcementform" placeholder="Enter your message here." required>{{$update_announcements->message}}</textarea>
                                    </div>
                                </div>

                                <input id="anID" type="hidden" class="form-control" name="anID" value="{{$update_announcements->anID}}">
                                <input id="is_approved" type="hidden" class="form-control" name="is_approved" value="0">
                                <input id="status" type="hidden" class="form-control" name="status" value="1">
                                <input id="type" type="hidden" class="form-control" name="type" value="1">
                                <input id="action" type="hidden" class="form-control" name="action" value="HomeController@notifications">
                                <input id="files" type="hidden" class="form-control" name="imagedefault" value="{{$update_announcements->image}}">

                                <div class="row">
                                    <label for="message" class="col-md-2 control-label">Image:</label>
                                    <div class="col-md-7">
                                        <input type="file" name="fileToUpload" id="fileToUpload">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5"></div>
                                    <button type="reset" class="btn-outline col-md-2">Reset</button>
                                    <button type="submit" class="btn-outline col-md-2" onclick="myFunction()">Update</button>
                                </div>
                            </div>
                        </form>

                        <div class="container col-md-4">
                            <div class="panel panel-success">
                                <div class="panel-heading">Reminder!</div>
                                <div class="panel-body">Your created announcement will be subject for validation by the school secretary or principal</div>
                            </div>
                        </div>
                        <div class="container col-md-4">
                            <div class="panel panel-success">
                                <div class="panel-heading">Reminder!</div>
                                <div class="panel-body">Your created announcement will be subject for validation by the school secretary or principal</div>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function myFunction() {
        alert("Confirm your submission.");
    }
</script>
@endsection
