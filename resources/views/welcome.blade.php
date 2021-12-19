@extends('layouts.app')
@section('content')


    <section class="resume-section" style="max-width: 98%" id="films">
        <div class="resume-section-content">
            <div style="text-align: center; padding-bottom: 20px"><img src="{{'images/filmsAnim.gif'}}"></div>
            <h2 class="d-flex justify-content-center row">Les séries les mieux notées</h2>
            <div class="row">
    @foreach($series as $serie)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="card" style="width: 300px; height: 630px">
                            <div class="card-body">
                                <h5 class="card-title">{{$serie->nom}}</h5>
                                <img class="card-img-top" src="{{asset($serie->urlImage)}}" alt="Projet Marathon" style="width:100%">
                                <p><b>Genre : </b>{{$serie->genre}}</p>
                                <p><b>Langage : </b>{{$serie->langue}}</p>
                                <p><b>Nombre de saisons : </b>{{$serie->nbSaisons()}}</p>
                                <p><b>Nombre d'épisodes : </b>{{$serie->nbEpisodes()}}</p>
                                <a class="btn btn-primary" href="{{asset('series/'.$serie->id)}}" style="position:absolute; bottom:15px; color: #fff">Détails</a>
                            </div>
                        </div>
                    </div>
    @endforeach
            </div>
        </div>
    </section>
    <hr class="m-0" />
    @endsection