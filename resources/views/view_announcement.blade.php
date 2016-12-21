@extends('layouts.app')

@section('content')
<style>
    tr:nth-child(even){background-color: #f2f2f2}
</style>

<div class="container" style="padding-bottom: 20px">
    <div class="container-fluid" style="border: 1px solid #0d5302; border-radius: 0px; background-color: white">        
        <div class="container-fluid" style="padding-top: 10px; padding-bottom: 10px">
            <table style= "width: 100%; word-wrap:break-word; table-layout: fixed; line-height: 30px">
                @foreach($view_announcement as $view_announcements)                
                <tr>
                    <th style="border-bottom: 1px solid #0d5302" width="10%">From:</th>
                    <td style="border-bottom: 1px solid #0d5302; font-weight: bold">{{$view_announcements->firstname}} {{$view_announcements->lastname}}</td>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #0d5302">Date:</th>
                    <td style="border-bottom: 1px solid #0d5302">{{$view_announcements->created_at}}</td>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #0d5302">Subject:</th>
                    <td style="border-bottom: 1px solid #0d5302">{{$view_announcements->subject}}</td>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #0d5302">Recipient:</th>
                    @if ($view_announcements->recipient_userLevel==0) <td style="border-bottom: 1px solid #0d5302">All</td>
                    @elseif($view_announcements->recipient_userLevel==1) <td style="border-bottom: 1px solid #0d5302">Students</td>
                    @elseif ($view_announcements->recipient_userLevel==2) <td style="border-bottom: 1px solid #0d5302">Teachers</td>
                    @elseif($view_announcements->recipient_userLevel==3) <td style="border-bottom: 1px solid #0d5302">Academic Chairman, Academic Coordinator, Registrar, Finance</td>
                    @elseif($view_announcements->recipient_userLevel==4) <td style="border-bottom: 1px solid #0d5302">Secretary</td>
                    @elseif($view_announcements->recipient_userLevel==5) <td style="border-bottom: 1px solid #0d5302">Principal / School Rector</td>@endif
                </tr>
                <tr width="100%">
                    <th style="border-bottom: 1px solid #0d5302" colspan="2">Message:</th>
                </tr>
                <tr>
                    <td></td>
                    <td><div style="text-align: justify"><p>{{$view_announcements->message}}<br>

                                @if ($view_announcements->image!=null)
                                <img src='/upload-images/{{$view_announcements->image}}' width="70%"></br> 
                                @endif

                                @endforeach
                                </table>
                        </div>
                        </div>
                        </div>

                        @endsection