{{-- 부모 상속 --}}

@extends('layout.layout')

@section('title', 'login')

@section('main')
<main>
	@forelse($data as $item)
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">{{$item->b_title}}</h5>
				<p class="card-text">{{$item->b_content}}</p>
				<a href="{{route('board.show', ['board' => $item->b_id])}}" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#modalDetail">상세</a>
			</div>
		</div>
	@empty
	<div><p>표시할 게시물이 없습니다.</p></div>
	@endforelse
</main>

{{-- 별도의 javascript가 있을 경우 여기에 넣음 --}}
@endsection