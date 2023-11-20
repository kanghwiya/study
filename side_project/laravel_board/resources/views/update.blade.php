@extends('layout.layout')

@section('title', 'Update')

@section('main')

<form action="{{route('board.update', ['board' => $data->b_id])}}" method="post">
	@method('put')
	@csrf
	<input type="hidden" name="b_id" value="{{$data}}">
	<div class="modal-header">
		<h5 class="modal-title">게시글 수정</h5>
	</div>
	<div class="modal-body">
		<div class="mb-3">
			<input type="text" class="form-control" name="b_title" value="{{$data->b_title}}">
		</div>
		<div class="mb-3">
			<textarea class="form-control" rows="10" name="b_content">{{$data->b_content}}</textarea>
		</div>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-warning">수정완료</button>
		<a href="{{route('board.show',['board' => $data->b_id])}}" class="btn btn-secondary" >취소</a>
	</div>
</form>



@endsection