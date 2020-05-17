@extends('layouts.organiq.mastermain')
@section('content')
    {{-- @if ($result) --}}
        @if ($result->Status == 100)
                {{'تراکنش موفقیت آمیز بود:'.$result->RefID}} 
                 @else 
                {{'تراکنش موفقیت آمیز نبود!:'.$result->Status}}

        @endif
    {{-- @endif --}}
    @if($Message)
        {{$Message}}
    @endif
@endsection