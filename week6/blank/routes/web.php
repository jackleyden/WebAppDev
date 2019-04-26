<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function(){
    $sql = "select * from item;";
    $items = DB::select($sql);
    return view('items/item_list')->with('item',$items);// open file with data
});

Route::get('/item_detail/{id}', function($id){
    $item = get_item($id);
    return view('items/item_detail')->with('item',$item);
});

Route::get('/update_item/{id}', function($id){
    $item = get_item($id);
    return view('items/update_item')->with('item',$item); // go to form and have data load into form with values from item
});

Route::post('update_item_action', function(){
    $summary = request('summary');
    $details = request('details');
    $id = request('id');
    
    update_item($summary,$details,$id);
    
    return redirect("item_detail/$id");
});

Route::get('delete_item/{id}', function($id){
    delete_item($id);
    return view('items/delete_item');
});

Route::get('add_item', function(){
    return view('items/add_item');
});

Route::post('add_item_action', function(){
    $summ = request('summary');
    $dets = request('details');
    $id = add_item($summ, $dets);
    
    if ($id) {
        return redirect("item_detail/$id");
    } else {
        die("Error while adding item");
    }
});
function delete_item($id){
    $sql = "delete from item where id = ?";
    DB::delete($sql,array($id));
}
function update_item($summary,$details,$id){
    $sql = "update item set summary = ?, details = ? where id = ?";
    DB::update($sql, array($summary, $details, $id));
}

function add_item($summary,$details){
    $sql = "insert into item (summary, details) values (?, ?)";
    DB::insert($sql, array($summary, $details));
    $lid = DB::getPdo() -> lastInsertId();
    return($lid);
}

function get_item($id){
    $sql = "select * from item where id = ?";
    $items = DB::select($sql, array($id));
    
    if (count($items) != 1){
        die("it died: $sql");
    }
    
    $item = $items[0];
    return $item;
}
