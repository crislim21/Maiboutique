@extends('layouts.main')

@section('container')
<div class="my-4">
    <h1 class="text-center">{{ $title }}</h1>
</div>

@if(session()->has('success'))
    <div class="alert alert-success d-flex justify-content-center w-100" role="alert">
        {{ session('success') }}
    </div>
@endif

@foreach ($history as $items)
<div class="container border rounded my-2 shadow overflow-hidden" style="background-color: #ffff;">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <h4>{{ $items->created_at }}</h4>
                @foreach ($items->historydetail as $item)
                <ul>

                    <li>
                        @if($item->image == null)
                            <img src="https://source.unsplash.com/100x100?{{ $item->product_title}}" class="border img-fluid">
                        @else
                            <img src="{{ $item->image }}" alt="">
                        @endif
                        {{ $item->quantity }} pc(s) {{ $item->product_title }}   -    <strong>Rp. {{ $item->price }}</strong>
                    </li>
                </ul>
                @php
                    $count += $item->total
                @endphp
                @endforeach
            </div>
            <h4>Total Price : Rp. {{ $count }}</h4>

        </div>
    </div>
</div>
@endforeach


@endsection
