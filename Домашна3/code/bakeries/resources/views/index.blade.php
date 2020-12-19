@extends('base')

@section('content')
    <div class="wrapper">
        <div class="nav">
            <div class="logo"><img class="imglogo"src="images/Logo1.png" alt="img"></div>
            <div class="menu">
                <ul>
                    <li><a href="/help">HELP</a></li>
                    <li><a href="/contact">CONTACT</a></li>
                </ul>
            </div>
        </div>
        <div class="header">
            <img src="images/Welcome.png" alt="">
            <p>
                BAKERIES DATABASE
            </p>
            <button class="search" type="button"><a href="/search">SEARCH</a></button>
        </div>
    </div>
@endsection
