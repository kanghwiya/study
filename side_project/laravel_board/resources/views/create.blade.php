@extends('layout.layout')

@section('title', 'Create')

@section('main')


<div>
	<form action="{{route('board.store')}}" method="post">
		@csrf
		<div class="modal-header">
			<h5 class="modal-title">게시글 작성</h5>
		</div>
		<div class="modal-body">
			<div class="mb-3">
				<input type="text" class="form-control" placeholder="제목을 입력해주세요." name="b_title">
			</div>
			<div class="mb-3">
				<textarea class="form-control" rows="10" placeholder="내용을 입력하세요" name="b_content"></textarea>
			</div>
			<br><br>
			<input type="file" accept="image/*">
			</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">작성</button>
			<a href="{{route('board.index')}}" class="btn btn-secondary" >취소</a>
	</form>
</div>

@endsection