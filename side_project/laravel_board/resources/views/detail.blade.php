{{-- 부모 상속 --}}

@extends('layout.layout')

@section('title', 'login')

@section('main')
<main>
	@forelse($data as $item)
	<h5>{{$item->b_title}}</h5>
	<br>
	<p>{{$item->b_content}}</p>
	@empty
	@endforelse
</main>

{{-- 별도의 javascript가 있을 경우 여기에 넣음 --}}
@endsection