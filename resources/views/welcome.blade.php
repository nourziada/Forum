@extends('layouts.app2')


@section('content')


            <div class="container">
                <div class="row fullscreen justify-content-center align-items-center">
                    <div class="col-lg-8">
                        <div class="banner-content text-center">
                            <p class="text-uppercase text-white">We work hard, we result perfect</p>
                            <h1 class="text-uppercase text-white">Crafting Digital Agency Experiences</h1>

                            <a href="{{route('socail.auth' ,['provider' => 'facebook'])}}" class="primary-btn banner-btn">Facebook</a>

                            <a href="{{route('socail.auth' ,['provider' => 'github'])}}" class="primary-btn banner-btn">Github</a>

                            <a href="{{ route('register') }}" class="primary-btn banner-btn">Email</a>
                        </div>
                    </div>
                </div>
            </div>

@stop