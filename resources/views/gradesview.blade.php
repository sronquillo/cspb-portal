@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <div class="panel-body" style="border: 1px solid #0d5302; border-radius: 0px; background-color: #0a7e07; color: white" >Welcome! <b>{{Auth::user()->firstname}} {{Auth::user()->middlename}} {{Auth::user()->lastname}} ({{Auth::user()->IDno}})</b></div>

                <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white"><h1>Grades</h1></div>
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

<table border=1 width="70%" align="center">
    <tr style="text-align: center; font-weight: bold">
        <td rowspan=2   >SUBJECTS</td>
	<td colspan=4>QUARTER</td>
        <td rowspan=2 width="80">Final<br> Rating</td>
	<td rowspan=2>Remark</td>
</tr>
<tr  style="text-align: center; font-weight: bold">
	<td>1</td>
	<td>2</td>
	<td>3</td>
	<td>4</td>
</tr>

@foreach($grade as $grades)
<tr>
	<td>{{$grades->subjectName}}</td>
	<td style="text-align: center">{{$grades->q1}}</td>
	<td style="text-align: center">{{$grades->q2}}</td>
	<td style="text-align: center">{{$grades->q3}}</td>
	<td style="text-align: center">{{$grades->q4}}</td>
	<td style="text-align: center">{!!$avg=ROUND($grades->avg)!!}</td>
        <td style="text-align: center">
           @if (($avg)>=75) Passed
           @else Failed
           @endif
           
        </td>
</tr>
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