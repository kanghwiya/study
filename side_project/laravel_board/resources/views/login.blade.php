@extends('layout.layout')

@section('title', 'login')

@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
  <form class="" action="" method="POST" style="width: 300px">
    @include('layout.errorlayout')
      @csrf
      <div class="mb-3">
        <label for="email" class="form-label">이메일</label>
        <input type="email" class="form-control" id="email" name="email" value="kanghwiya@kanghwiya">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">비밀번호</label>
        <input type="password" class="form-control" id="password" name="password" value="kanghwiya">
      </div>
      <button type="submit" class="btn btn-dark">로그인</button>
    </form>
</main>

{{-- 별도의 javascript가 있을 경우 여기에 넣음 --}}
@endsection