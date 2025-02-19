@extends('layouts.master') <!-- title - active_home - active_MyLibrary - breadcrumb - body -->

@section('title', 'BYCI')

@section('active_home','active')

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Home</li>
@endsection

@section('body')
<div class="row">
    <div class="col-lg-9 col-sm-12">
        <div class="citazione">
            <p>BYCI è un club di pirloni
            </p>
            <blockquote>
                <p>VIVA LE MACCHINE ELETTRICHE </p>
                <small>[Chinese proverb]</small>
            </blockquote>
        </div>
    </div>

    <div class="col-lg-3 col-sm-12">
        <div class="imgBiblio">
            <img class="img-thumbnail img-responsive" src="{{ url('/') }}/img/logoByciBlu.jpg">
        </div>
    </div>
</div>
@endsection