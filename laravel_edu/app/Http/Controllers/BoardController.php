<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    // 생성 : php artisan make:controller BoardController
    public function index() {
        // ----------------
        // 쿼리빌더
        // ----------------

        // --------------------------------SELECT--------------------------------
        $result = DB::select('select * from boards');

        $result = DB::select('select * from boards limit :no offset :no2', ['no' => 1, 'no2' => 10]);
        $result = DB::select('select * from boards limit ? offset ?', [2, 10]);

        // 카테고리가 4, 7, 8인 게시글의 수를 출력해주세요.
        $arr = [4, 7, 8];
        $result = DB::select('select count(id) from boards where categories_no in(?, ?, ?)', $arr);
        $result = DB::select('select count(id) from boards where categories_no = ? or categories_no = ? or categories_no = ?', [4, 7, 8]);
        $result = DB::select('select count(id) from boards where categories_no = :no or categories_no = :no2 or categories_no = :no3', ['no' => 4, 'no2' => 7, 'no3' => 8]);


        // 카테고리별 게시글 갯수를 출력해주세요.
        $result = DB::select('SELECT categories_no, count(id) CNT FROM boards group by categories_no');

        // 위에거에 + 카테고리명도 함께 출력
        $result = DB::select('SELECT cat.name, count(boa.id) CNT FROM boards boa JOIN categories cat ON boa.categories_no = cat.no group by boa.categories_no, cat.name');


        // --------------------------------INSERT--------------------------------
        // $sql =
        //     'INSERT INTO boards
        //     (title, content, created_at, updated_at, categories_no)
        //     VALUES
        //     (?, ?, ?, ?, ?)';
        // $arr = [
        //     'maniac'
        //     ,'매니악 자꾸 뇌에서 재생됨.....'
        //     ,now()
        //     ,now()
        //     ,'0'
        // ];
        // DB::beginTransaction();
        // DB::insert($sql, $arr);
        // DB::commit();


        $result = DB::select('SELECT * FROM boards ORDER BY id DESC LIMIT 1');
        // --------------------------------UPDATE--------------------------------
        // DB::beginTransaction();
        // DB::update('UPDATE boards SET title = ?, content = ? WHERE id = ?', ['뭬니악', '우짤거야...', $result[0]->id]);
        // DB::commit();
        
        // --------------------------------UPDATE--------------------------------
        // DB::beginTransaction();
        // $result = DB::delete('DELETE FROM boards WHERE id = ?', [$result[0]->id]);
        // // result에 영향 받은 행의 개수가 찍힘
        // DB::commit();
        
        // 클래스로 리턴 $result[0]->id;


        // ----------------
        // 쿼리빌더 체이닝
        // ----------------
        // select * from boards where id = 300;
        $result = 
            DB::table('boards')
            ->where('id', '=', 300)
            ->get(); //get = select

        // select * from boards where id = 300 or id = 400;
        $result = 
            DB::table('boards')
            ->where('id', '=', 300)
            ->orWhere('id', '=', 400)
            ->orderBy('id', 'desc')
            ->get();

        // select * from categories where no in (1,2,3);
        $result =
            DB::table('categories')
            ->whereIn('no', [1, 2, 3]) //카테고리명, [넣어줘야 할 값의 배열]
            ->get();


        // first() : limit하고 비슷하게 동작함
        $result = DB::table('boards')->orderBy('id', 'desc')->first();

        // count() : 결과의 레코드 수를 반환
        $result = DB::table('boards')->count();

        // max() : 해당 컬럼의 최대값
        $result = DB::table('categories')->max('no');
        

        // 게시글 정보 + 카테고리명까지 100개 출력 
        $result =
            DB::table('boards')
            ->select('boards.title', 'boards.content', 'categories.name')
            ->join('categories','categories.no', 'boards.categories_no')
            ->limit(100)
            ->get();

        // 카테고리별 게시글 갯수와 카테고리명을 출력해주세요.
        $result =
            DB::table('boards')
            ->select('categories.no', 'categories.name', DB::raw('count(categories.no)'))
            ->join('categories', 'categories.no', 'boards.categories_no')
            ->groupBy('categories.no', 'categories.name')
            ->get();


            // SELECT count(boa.id), cat.name
            // FROM boards boa
            // JOIN categories cat
            // ON boa.categories_no = cat.no
            // GROUP BY boa.categories_no;
        return var_dump($result);
    }
}
