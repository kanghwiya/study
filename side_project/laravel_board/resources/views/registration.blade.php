@extends('layout.layout')

@section('title', 'registration')

@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
    <form class="" action="{{route('user.registration.post')}}" method="POST" style="width: 300px">
      @csrf
      {{-- <input type="hidden" name="ctokekn" value="ewjljlkegljldsjlf214j5ewjijoj"> --}}
      @include('layout.errorlayout')
      <div class="mb-3">
        <label for="email" class="form-label">이메일</label>
        <input type="email" class="form-control" id="email" name="email">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">비밀번호</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
      <div class="mb-3">
          <label for="passwordchk" class="form-label">비밀번호 확인</label>
          <input type="password" class="form-control" id="passwordchk" name="passwordchk">
      </div>
      <div class="mb-3">
          <label for="name" class="form-label">이름</label>
          <input type="text" class="form-control" id="name" name="name">
      </div>
      <a class="btn btn-secondary" href="{{route('user.login.get')}}">취소</a>
      <button type="submit" class="btn btn-dark float-end">회원가입</button>
    </form>
</main>
@endsection