
<h1> holaaaa</h1>
@extends('layouts.dashboa')

@section('titulo')
Cámara web
@endsection

@section('content')
    <h2>Cámara web</h2>

    <video width="320" height="240" autoplay controls>
        <source src="%StreamURL%" type="video/mp4">
        <object width="320" height="240" type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf">
            <param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf" /> 
            <param name="flashvars" value='config={"clip": {"url": "%StreamURL%", "autoPlay":true, "autoBuffering":true}}' /> 
            <p><a href="%StreamURL%">view with external app</a></p> 
        </object>
    </video>

@endsection

@section('footer')
    @include('layouts.footer')
@endsection