@extends('layouts.app')
@section('content')




    <div class="container" style=" background: #343A40; padding: 10px 30px 10px 30px; border-radius: 0.7%">

        <div style="text-align: center"><img src="{{asset('images/info.png')}}" style="width:10%" ></div>
        <h1>Vos informations :</h1>
        <p><b>Votre nom d'utilisateur : </b>{{Auth::user()->name}}</p>
        <p><b>Votre adresse mail : </b>{{Auth::user()->email}}</p>

    </div>
    <br>

@endsection