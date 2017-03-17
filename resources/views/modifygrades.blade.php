@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body" style="border: 1px solid #0d5302; border-radius: 0px; background-color: #0a7e07; color: white" >Welcome! <b>{{Auth::user()->firstname}} {{Auth::user()->middlename}} {{Auth::user()->lastname}} ({{Auth::user()->IDno}})</b></div>

                <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white"><h1>Modify Grades</h1></div>
                <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white;padding-top: 10px;padding-bottom: 20px">  
                    {{--table--}}
                    <b><h4>REPORT ON LEARNING PROGRESS</h4></b>

                    <table width="50%">
                        <tr>
                            <td>Name:</td>
                            <td><u><b>{{strtoupper($userInfo->lastname)}}, {{strtoupper($userInfo->firstname)}} {{strtoupper($userInfo->middlename)}}</b></u><br></td>
                        </tr>
                        <tr>
                            <td>Student No.:</td>
                            <td><u><b>{{strtoupper($userInfo->IDno)}}</b></u><br></td>
                        </tr>
                        <tr>
                            <td>Gr. & Sec.:</td>
                            <td><u>{{$userInfo->level}} {{$userInfo->section}}</u><br></td>
                        </tr>
                        <tr>
                            <td>Curricumlum:</td>
                            <td><u>K to 12 Basic Education Curriculum</u></td>
                        </tr>
                    </table>

                    <hr>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <form action="{{ url('/add/grades')}}" method="POST">
                            <label for="subject" class="col-md-2 control-label" style="width: 95px">Add Subject:</label>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="IDno" value="{{ $userInfo->IDno}}">
                            <div class="col-md-1" style="padding-bottom: 10px">
                                <select name="subject" class="form-horizontal" style="width: 63px">
                                    <option id="subject" name="subject" value="Christian Living">Christian Living</option>
                                    <option id="subject" name="subject" value="Values Education">Values Education</option>
                                    <option id="subject" name="subject" value="English">English</option>
                                    <option id="subject" name="subject" value="Filipino">Filipino</option>
                                    <option id="subject" name="subject" value="Mathematics">Mathematics</option>
                                    <option id="subject" name="subject" value="Science">Science</option>
                                    <option id="subject" name="subject" value="Araling Panlipunan">Araling Panlipunan</option>
                                    <option id="subject" name="subject" value="MSEP">MSEP</option>
                                    <option id="subject" name="subject" value="EPP">EPP</option>
                                </select>
                            </div>
                            <input class="col-md-1" type='text' value='' name='q1' placeholder="1st">
                            <input class="col-md-1" type='text' value='' name='q2' placeholder="2nd">
                            <input class="col-md-1" type='text' value='' name='q3' placeholder="3rd">
                            <input class="col-md-1" type='text' value='' name='q4' placeholder="4th">
                            <button class="btn btn-success" type="submit">Add</button>
                        </form>
                    </div>

                    <table border=1 width="70%" align="center">
                        <tr style="text-align: center; font-weight: bold">
                            <td rowspan=2>SUBJECTS</td>
                            <td colspan=4>QUARTER</td>
                            <td rowspan=2 width="80">Final<br> Rating</td>
                            <td rowspan=2>Remark</td>
                            <td rowspan=2>Action</td>
                        </tr>
                        <tr  style="text-align: center; font-weight: bold">
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                        </tr>
                        <style>
                            input[type=text] { text-align:center }
                        </style>


                        @foreach($grade as $grades)
                        <form method="POST" role="form" class='form-horizontal'>
                            <input type='hidden' value='{{$grades->IDno}}' name='IDno'>
                            <input type='hidden' value='{{$grades->subjectName}}' name='subject'>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <tr>
                                <td>{{$grades->subjectName}}</td>
                                <td style="text-align: center">@if ($grades->is_approved==1)<input class='form-control' type='text' value='{{$grades->q1}}' name='q1' disabled> @else<input class='form-control' type='text' value='{{$grades->q1}}' name='q1'>@endif</td>
                                <td style="text-align: center">@if ($grades->is_approved==1)<input class='form-control' type='text' value='{{$grades->q2}}' name='q2' disabled> @else<input class='form-control' type='text' value='{{$grades->q2}}' name='q2'>@endif</td>
                                <td style="text-align: center">@if ($grades->is_approved==1)<input class='form-control' type='text' value='{{$grades->q3}}' name='q3' disabled> @else<input class='form-control' type='text' value='{{$grades->q3}}' name='q3'>@endif</td>
                                <td style="text-align: center">@if ($grades->is_approved==1)<input class='form-control' type='text' value='{{$grades->q4}}' name='q4' disabled> @else<input class='form-control' type='text' value='{{$grades->q4}}' name='q4'>@endif</td>
                                <td style="text-align: center">
                                @if ($grades->q1 == 0 or $grades->q2 == 0 or $grades->q3 == 0 or $grades->q4 == 0)
                                {!!$avg=null!!} 
                                @else
                                {!!$avg=round($grades->avg,2)!!}
                                @endif
                            </td>
                            <td style="text-align: center">
                                @if (($avg)==null)
                                @else
                                @if (($avg)>=75) Passed
                                @else Failed
                                @endif
                                @endif

                            </td>
                                <td style="text-align:center">
                                    @if ($grades->is_approved==1)
                                        <button class="btn btn-default" type='submit' formaction="{{ url('/confirm/modify')}}" disabled>Modify</button>
                                    @else
                                        <button class="btn btn-default" type='submit' formaction="{{ url('/confirm/modify')}}">Modify</button>
                                    @endif
                                    @if (Auth::user()->userLevel==51 and $grades->is_approved==1 or Auth::user()->userLevel==52 and $grades->is_approved==1)
                                        <button  style="width:70px" class="btn btn-success" type='submit' formaction="{{ url('/unlock')}}">Unlock</button>
                                    @elseif (Auth::user()->userLevel==51 and $grades->is_approved==0 or Auth::user()->userLevel==52 and $grades->is_approved==0)
                                        <button  style="width:70px" class="btn btn-success" type='submit' formaction="{{ url('/lock')}}">Lock</button>
                                    @endif
                                    @if (Auth::user()->userLevel==51 and $grades->is_approved==1 or Auth::user()->userLevel==52 and $grades->is_approved==1)
                                        <button  style="width:70px" class="btn btn-warning" type='submit' formaction="#" disabled>Delete</button>
                                    @elseif (Auth::user()->userLevel==51 and $grades->is_approved==0 or Auth::user()->userLevel==52 and $grades->is_approved==0)
                                        <button  style="width:70px" class="btn btn-warning" type='submit' formaction="{{ url('/delete')}}">Delete</button>
                                    @endif
                                </td>
                            </tr>
                        </form>
                        @endforeach
                        <tr>
                            <td colspan=8>Grading Plan Used: Averaging</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection