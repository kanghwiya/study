
{{-- 상속 --}}
@extends('inc.layout')

{{-- section: 부모 템플릿에 해당하는 yield 부분에 삽입 --}}
@section('title', '자식2 타이틀')

배로 만든 아이스티 <br>


@section('main')

{{-- 구구단 --}}

@for($i = 1; $i <= 9;  $i++)
    <p>{{$i}}단</p>
        @for( $num = 1; $num <= 9; $num++)
            <span>{{$i}}x{{$num}} = {{$i*$num}}</span>
            <span>{{$i.'x'.$num.' = '.($i*$num)}}</span>
            <br>
        @endfor
@endfor
@endsection