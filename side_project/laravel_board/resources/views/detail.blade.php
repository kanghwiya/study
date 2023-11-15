{{-- 부모 상속 --}}

@extends('layout.layout')

@section('title', 'login')

@section('main')
<main>
	<p class="card-text">{{$item->b_id}}</p>
	<p class="card-text">{{$item->created_at}}</p>
	<h5 class="card-title">{{$item->b_title}}</h5>
	<p class="card-text">{{$item->b_content}}</p>
</main>

{{-- 별도의 javascript가 있을 경우 여기에 넣음 --}}
@endsection