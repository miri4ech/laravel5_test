<?php

namespace App\Http\Controllers\Admin;

//バリデーション用
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//モデルの宣言
use App\Models\Event;
use App\Models\Category;

//QB用に必要
use DB;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*--- Eloquent　ORMの書き方--*/
        // $events = Event::all();

        /*-- QBの書き方 -- */
        $events = DB::table('events')
        ->join('categories', 'events.category_id', '=', 'categories.id')
        ->select('events.id',
                 'events.title',
                 'events.body',
                 'events.category_id',
                 'events.deleted_at',
                 'events.created_at',
                 'events.updated_at',
                 'categories.id as category_table_id',
                 'categories.name as category_table_name')
        ->get();

        //viewのindex.bladeを使用する
        return view('index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'title' => 'required|min:5',
            'body' => 'required',
            'category_id' => 'required',
        ];

        $this->validate($request, $rules);

        // ②マスアサインメントを使って、記事をDBに作成
        Event::create($request->all());
 
        // ③記事一覧へリダイレクト
        return redirect('events');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //詳細表示
        /*Eloquent ORM*/
        // $event = Event::find($id);

        /*QB*/
        $event = DB::table('events')->where('id', $id)->first();

        /*SQL*/
        // $event = DB::selectOne("SELECT ID,TITLE,BODY FROM events WHERE ID = $id");
        // dd($event);
        return view('show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //レコードを検索
        // $event = Event::find($id);

        $event = DB::table('events')
        ->where('events.id', $id)
        ->join('categories', 'events.category_id', '=', 'categories.id')
        ->select('events.id',
                 'events.title',
                 'events.body',
                 'events.category_id',
                 'events.created_at',
                 'events.updated_at',
                 'categories.id as category_table_id',
                 'categories.name as category_table_name')
        ->first();
        // dd($event);
        //検索結果をビューに渡す
        return view('edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //レコードを検索
        $event = Event::find($id);
        $rules = [
            'title' => 'required|min:5',
            'body' => 'required',
        ];
        //バリデーション
        $this->validate($request, $rules);

        //値を代入
        $event->title = $request->title;
        $event->body = $request->body;
        $event->category_id = $request->category_id;
        //保存（更新）
        $event->save();
        //リダイレクト
        return redirect()->to('/events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //削除対象レコードを検索
        $event = Event::find($id);
        //削除
        $event->delete();


        // DB::table('events')->where('id',$id)->delete();

        //リダイレクト
        return redirect()->to('/events');
    }
}
