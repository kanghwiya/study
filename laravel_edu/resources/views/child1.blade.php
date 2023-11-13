
{{-- 상속 --}}
@extends('inc.layout')

{{-- section: 부모 템플릿에 해당하는 yield 부분에 삽입 --}}
@section('title', '자식1 타이틀')

자몽아이스티

{{-- @section ~ @endsection : 처리해야 할 코드가 많을 경우 --}}
@section('main')
<h2>자식 1 화면입니다. </h2>
<p>잊지마 오랜 겨울 사이 왼손으로 그린 별 하나
    보이니 그 유일함이 얼마나 아름다운지 말야
</p>

{{-- 조건문 --}}

@if($gender === '0')
    <span>성별 : 남자</span>
@elseif($gender === '1')
    <span>성별 : 여자</span>
@else
    <span>성별 : 기타</span>
@endif



{{-- 반복문 --}}
@for($i = 0; $i < 5;  $i++)
{{-- {{변수}} : 화면에 변수를 출력하는 방법(=echo) --}}
    <span>{{$i}}</span>
@endfor

<hr>
<h3>foreach문</h3>
@foreach ($data as $key => $val)
    {{-- 루프의 총 횟수 / 현재 몇 번째 돌고있는지  --}}
    <p>{{$loop->count.'   >>   '.$loop->iteration}}</p>
    <span>{{$key.' : '.$val}}</span>
    <br>
@endforeach

<hr>

<h3>forelse</h3>
@forelse($data2 as $key =>  $val)
    <span>{{$key.' : '.$val}}</span>
    <br>
@empty
    <span>빈배열입니다.</span>
@endforelse

@endsection

{{-- 부모 show test --}}
@section('show')
<h2>하이고 야는 또 오ㅑ 골뱅이여</h2>
<p></p>
@endsection