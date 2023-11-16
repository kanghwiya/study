{{-- 부모 상속 --}}

@extends('layout.layout')

@section('title', 'list')

@section('main')
<main>
	<div class="text-center mt-5 mb-5">
		<a href="{{route('board.create')}}">
		<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" data-bs-toggle="modal" data-bs-target="#modalInsert" fill="currentColor" class="bi bi-signpost-split" viewBox="0 0 16 16">
			<path d="M7 7V1.414a1 1 0 0 1 2 0V2h5a1 1 0 0 1 .8.4l.975 1.3a.5.5 0 0 1 0 .6L14.8 5.6a1 1 0 0 1-.8.4H9v10H7v-5H2a1 1 0 0 1-.8-.4L.225 9.3a.5.5 0 0 1 0-.6L1.2 7.4A1 1 0 0 1 2 7h5zm1 3V8H2l-.75 1L2 10h6zm0-5h6l.75-1L14 3H8v2z"/>
		</svg>
		</a>
	</div>
	
	@forelse($data as $item)
		<div class="card" id="{{$item->b_id}}">
			<div class="card-body">
				<h5 class="card-title">{{$item->b_title}}</h5>
				<p class="card-text">{{$item->b_content}}</p>
				<a href="{{route('board.show', ['board' => $item->b_id])}}" class="btn btn-outline-info">상세</a>
			</div>
		</div>
	@empty
	<div><p>표시할 게시물이 없습니다.</p></div>
	@endforelse
</main>

{{-- 별도의 javascript가 있을 경우 여기에 넣음 --}}
@endsection