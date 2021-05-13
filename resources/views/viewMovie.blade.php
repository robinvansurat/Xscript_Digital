@extends('layouts.app2')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Movie</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <h1>{{ $movie['Title'] }}</h1>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <img src="{{ $movie['Poster'] }}">
                    </div>
                    <div class="col-12 pt-5 d-flex justify-content-center">
                        <div class="row">
                            <div class="col-12">
                                <p class="text-warning">Writer : </p>
                                <p>{{ $movie['Writer'] }}</p>
                            </div>
                            <div class="col-12">
                                <p class="text-warning">Actors : </p>
                                <p>{{ $movie['Actors'] }}</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="text-warning">Year : </p>
                                <p>{{ $movie['Year'] }}</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="text-warning">Rated : </p>
                                <p>{{ $movie['Rated'] }}</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="text-warning">Released : </p>
                                <p>{{ $movie['Released'] }}</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="text-warning">Runtime : </p>
                                <p>{{ $movie['Runtime'] }}</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="text-warning">Runtime : </p>
                                <p>{{ $movie['Runtime'] }}</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="text-warning">Genre : </p>
                                <p>{{ $movie['Genre'] }}</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="text-warning">Director : </p>
                                <p>{{ $movie['Director'] }}</p>
                            </div>
                            <div class="col-12">
                                <p class="text-warning">Writer : </p>
                                <p>{{ $movie['Writer'] }}</p>
                            </div>
                            <div class="col-12">
                                <p class="text-warning">Plot : </p>
                                <p>{{ $movie['Plot'] }}</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="text-warning">Language : </p>
                                <p>{{ $movie['Language'] }}</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="text-warning">Country : </p>
                                <p>{{ $movie['Country'] }}</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="text-warning">Awards : </p>
                                <p>{{ $movie['Awards'] }}</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="text-warning">Metascore : </p>
                                <p>{{ $movie['Metascore'] }}</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="text-warning">imdbRating : </p>
                                <p>{{ $movie['imdbRating'] }}</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="text-warning">imdbVotes : </p>
                                <p>{{ $movie['imdbVotes'] }}</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="text-warning">imdbID : </p>
                                <p>{{ $movie['imdbID'] }}</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="text-warning">Type : </p>
                                <p>{{ $movie['Type'] }}</p>
                            </div><div class="col-12 col-md-6">
                                <p class="text-warning">DVD : </p>
                                <p>{{ $movie['DVD'] }}</p>
                            </div><div class="col-12 col-md-6">
                                <p class="text-warning">BoxOffice : </p>
                                <p>{{ $movie['BoxOffice'] }}</p>
                            </div><div class="col-12">
                                <p class="text-warning">Production : </p>
                                <p>{{ $movie['Production'] }}</p>
                            </div><div class="col-12 col-md-6">
                                <p class="text-warning">Website : </p>
                                <a href="{{ $movie['Website'] }}" target="_blank">{{ $movie['Website'] }}</a>
                            </div><div class="col-12 col-md-6">
                                <p class="text-warning">Response : </p>
                                <p>{{ $movie['Response'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
<a href="/dashboard" class="pb-5"><button type="button" class="btn btn-success " style="width: 300%; higth:300%">Back</button></a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
