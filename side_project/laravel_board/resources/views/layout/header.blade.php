<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="/board">미니보드다</a>
          @auth
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  게시판
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="./free.html">자유게시판</a></li>
                  <li><a class="dropdown-item" href="./question.html">질문게시판</a></li>
                  <!-- <li><hr class="dropdown-divider"></li> -->
                </ul>
              </li>
            </ul>
            <a href="{{route('user.logout.get')}}" role="button" class="nav-link text-light">로그아웃</a>
          </div>
          @endauth

          {{-- 비로그인 상태 --}}
          @guest
          <a href="{{route('user.registration.get')}}" role="button" class="nav-link text-light">회원가입</a>
          @endguest
        </div>
      </nav>
</header>