@extends('layouts.app')
<section class="resume-section" style="max-width: 98%" id="films">
    <div class="resume-section-content">
        <div class="row">
            @section('content')
                <br>
                <div class="container" style=" background: #343A40; padding: 10px 30px 10px 30px; border-radius: 0.7%">

                    <div class="row">

                        <div class="col-sm">
                            <br>
                            <h5 class="card-title">{{$serie->nom}}</h5>
                            <img class="card-img-top" src="{{asset($serie->urlImage)}}" alt="Projet Marathon" style="width:70%; border-radius: 3%">


                        </div>
                        <div class="col-sm">

                            <br>
                            <br>

                            <div class="textfond" style="background: #343A40; padding: 20px 20px 10px 20px; border-radius: 5%">

                                <br><br>
                                <p><b>Genre : </b>{{$serie->genre}}</p>
                                <p><b>Langage : </b>{{$serie->langue}}</p>
                                <p><b>Sortie : </b>{{$serie->premiere}}</p>
                                <p><b>Nombre de saisons : </b>{{$serie->nbSaisons()}}</p>
                                <p><b>Nombre d'épisodes : </b>{{$serie->nbEpisodes()}}</p>

                                <p><b>Médias associés : </b></p>
                            </div>
                        </div>

                        <div class="col-sm">

                            <br>

                            <p><b>Résumé : </b>{!! $serie->resume !!}</p>


                        </div>
                    </div>
                    <br>

                </div>

                <div class=container" style="padding: 20px 20px 10px 20px; border-radius: 1%; width: 80%; margin-left: auto; margin-right: auto">
                    <p><b>Avis de la rédaction : </b></p>
                    {!! $serie->avis !!}
                    <br><br>
                    @if($serie->id==43687)
                        <div style="text-align: center">
                        <video controls width="600">
                            <source src="{{asset('images/squid_game-avis.mp4')}}"
                                    type="video/mp4">
                            Votre navigateur ne supporte pas les vidéos :/
                        </video>
                        </div>
                    @endif

                    <details>
                        <summary><b>La liste des épisodes :</b></summary>
                        @auth
                        @foreach($serie->episodes as $episode)


                                <div class="form-check form-switch">
                                    @php($find = Auth::user()->seen->find($episode->id))
                                    @if (isset($find))
                                        ☑️
                                    @else
                                        <form action="/vu/episode/{{$episode->id}}" method="post">
                                            @csrf
                                            <input class="btn btn-primary" id="boutenvoi" type="submit" value="Déjà vu ?"/>
                                        </form>
                                            @endif

                                        Saison {{$episode->saison}}
                                        Episode {{$episode->numero}} :
                                        {{$episode->nom}} <br></label>
                                    <br>
                                </div>

                        @endforeach
                        @endauth
                        @guest
                            @foreach($serie->episodes as $episode)
                                Saison {{$episode->saison}}
                                Episode {{$episode->numero}} :
                                {{$episode->nom}}<br><br>
                            @endforeach
                        @endguest
                    </details>
                    <br>
                    <h3><b>Les commentaires : </b></h3> <br />

                    @foreach ($serie->comments as $comment)
                        <h5> {{$comment->utilisateur->name}}</h5>
                        <h5>Note :
                            {{$comment->note}} / 5</h5>
                        <p>{!! $comment->content !!}</p>
                        @endforeach</b>

                    @auth
                        <h3><b>Commentez également cette série !</b></h3>
                    <form action="{{url('/comments')}}" method="post">

                        @csrf
                        <div>
                            <input type="hidden" name="serie_id" value="{{$serie->id}}" />
                            <textarea name="comments" id="comments" class="form-control" style="font-family:sans-serif;font-size:1.2em;resize:none;width:100%;height:20%"></textarea>
                            <br><br>
                            <label for="notes">Votre note :</label>
                            <input type="number" id="notes" name="notes" value="3" min="0" max="5">
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                    @endauth

                </div>



            @endsection
        </div>
    </div>
</section>