{{-- 부모 상속 --}}

@extends('layout.layout')

@section('title', 'Detail')

@section('main')
<main>

<form action="{{route('board.destroy', ['board' => $data->b_id])}}" method="POST">
    @csrf
	@method('delete')

	<p>글번호</p>
	<p>{{$data->b_id}}</p>

	<p>제목</p>
	<p>{{$data->b_title}}</p>

	<p>내용</p>
	<p>{{$data->b_content}}</p>

	<p>조회수</p>
	<p>{{$data->b_hits}}</p>

	<p>작성일</p>
	<p>{{$data->created_at}}</p>

	<p>수정일</p>
	<p>{{$data->updated_at}}</p>

	<button type="submit" class="btn btn-outline-danger">삭제</button>
</form>

</main>

{{-- 별도의 javascript가 있을 경우 여기에 넣음 --}}
@endsection