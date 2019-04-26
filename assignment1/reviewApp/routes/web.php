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

//basic pages
Route::get('/', function () {
    $item = get_all_item();
    $comments = commentNumber();
    return view('pages/index')->with('item', $item)->with('comments', $comments);
});

Route::get('/documentation', function () {
    return view('pages/doc');
});

// get all items
function get_all_item(){
    $sql = "select * from item;";
    return DB::select($sql);
}




// Item Routes
Route::get('item_detail/{id}', function($id){
    $comments = get_comment_item_user($id);
    $item = get_item($id);
    $man = get_man_item($id);
    return view('pages/item_detail')->with('item',$item)->with('comments',$comments)->with('manufacturer',$man);
});

Route::get('/update_item/{id}', function($id){
    $item = get_item($id);
    $man = get_man();
    return view('pages/update_item')->with('item',$item)->with('manufacturer',$man) ; // go to form and have data load into form with values from item
});

Route::post('update_item_action', function(){
    $summary = request('summary');
    $details = request('details');
    $image = request('image');
    $manufacturer = request('manufacturer');
    $id = request('id');
    
    update_item($summary,$details,$image,$manufacturer,$id);
    
    return redirect("/item_detail/$id");
});

Route::get('delete_item/{id}', function($id){
    delete_item($id);
    return view('pages/delete_item');
});

Route::get('add_item', function(){
    $man = get_man();
    return view('pages/add_item')->with('manufacturer', $man);
});

Route::post('add_item_action', function(){
    $summ = request('summary');
    $details = request('details');
    $image = request('image');
    $man = request('manufacturer');
    
    if ($summ == null || $details == null){
        die("Error while adding. Item must have values.");
    } else{
        $id = add_item($summ, $details, $image, $man);
    }
    
    if ($id) {
        return redirect("item_detail/$id");
    } else {
        die("Error while adding item. The item you are adding may already exists.");
    }
});

// retrieves all data from item comments and user inorder to display review page.
function get_comment_item_user($id){
     $sql = "select *, comment.id as id from item, comment, user where item.id = comment.itemid and comment.name = user.id and item.id = ?;";
     return DB::select($sql, array($id));
}

// links the item with manufacturer so that man can be displayed 
function get_man_item($id){ 
    $sql = "select * from item, manufacturer where item.manufacturer = manufacturer.id and item.id = ?;";
    return DB::select($sql, array($id));
}

// delete specific item
function delete_item($id){
    $sql = "delete from item where id = ?";
    DB::delete($sql,array($id));
    
    $sql = "delete from comment where itemid = ?";
    DB::delete($sql,array($id));
}

//update existing item
function update_item($summary,$details,$image,$manufacturer,$id){
    $sql = "update item set summary = ?, details = ?,image = ?, manufacturer = ? where id = ?";
    DB::update($sql, array($summary, $details,$image,$manufacturer, $id));
}

//add an item
function add_item($summary,$details, $image, $man){// insert into item where the selected values are not == to the where condition
    $sql = "INSERT INTO item(summary, details, image, manufacturer) SELECT ?, ?, ?, ? WHERE NOT EXISTS(SELECT 1 FROM item WHERE manufacturer = ? AND summary = ?);";
    DB::insert($sql, array($summary, $details, $image, $man, $man,$summary));
    $lid = DB::getPdo() -> lastInsertId();
    return($lid);
}

//select specific item
function get_item($id){
    $sql = "select * from item where id = ?";
    $items = DB::select($sql, array($id));
    
    if (count($items) != 1){
        die("it died: $sql");
    }
    
    $item = $items[0];
    return $item;
}





//Comment Routes
Route::get('/update_comment/{id}', function($id){
    $comment = get_comment($id);
    return view('pages/update_comment')->with('comment',$comment); // go to form and have data load into form with values from item
});

Route::post('update_comment_action', function(){
    $name = request('name');
    $rate = request('rate');
    $comment = request('comment');
    $id = request('id');
    $iid = request('itemid'); // item id or iid
    
    $userId = uid_from_usernme($name); //grab user id
    
    $userId = $userId[0]; 
    $name = $userId->id; //convert the username to the id
    update_comment($name,$rate,$comment,$id); //update the relevent post

    return redirect("item_detail/$iid");
});

Route::get('add_comment/{id}', function($id){
    return view('pages/add_comment')->with('id',$id);
});

Route::post('add_comment_action', function(){
    $name = request('name');
    $rate = request('rate');
    $itemid = request('itemid');
    $comment = request('comment');
    $userId = uid_from_usernme($name);
    
    try{
    $userId = $userId[0];
    $name = (string)$userId->id;
    } catch (Exception $e){
        die("Enter a valid user.");
    }
    
    $checks = check_comment($itemid, $name); 
    
    //check the current comments to see if user has commented already
    $evil=false;
    foreach ($checks as $check) {
        if ($check->name == $name){
            $evil = true;
        }
    }
    $rate = (int)$rate;
    if ($rate <= 5 && is_int($rate)){
        if ($evil == false){
            $id = add_comment($name, $comment, $rate, $itemid);
        } else {die("Can only review once");}
    } else {die("rateing is out of 5");}
    
    if ($id) {
        return redirect("item_detail/$itemid");
    } else {
        die("Error while adding item");
    }
});

Route::get('delete_comment/{id}/{iid}', function($id, $iid){ //iid is item id id is comment id
    delete_comment($id);
    return redirect("/item_detail/$iid");
});

//return results if the user has already commented in this item
function check_comment($itemid, $name){
    $sql = "select * from comment where comment.itemid = ? and comment.name = ?";
    return DB::select($sql, array($itemid, $name));
}

// grab the userid where the name is 
function uid_from_usernme($name){
    $sql = "select user.id from user where user.name = ?";
    return DB::select($sql, array($name));
}

//delete from the comment section
function delete_comment($id){
    $sql = "delete from comment where comment.id = ?";
    DB::delete($sql, array($id));
}

// add to comment section
function add_comment($name, $comment, $rate, $itemid){
    $sql = "insert into comment (name, comment, rate, itemid) values (?, ?, ?, ?)";
    $add = DB::insert($sql, array($name, $comment, $rate, $itemid));
    if ($add){
    return true;
    }
}

//grab comments with respective user
function get_comment($id){
    $sql = "select *, comment.id from comment, user where comment.name = user.id and comment.id = ?";
    $comments = DB::select($sql, array($id));
    
    if (count($comments) != 1){
        die("it died: $sql");
    }
    
    $comment = $comments[0];

    return $comment;
}

//update comment section
function update_comment($name,$rate,$comment,$id){
    $sql = "update comment set name = ?, rate = ?, comment = ? where id = ?";
    DB::update($sql, array($name, $rate, $comment, $id));
}






//item manufacturers
Route::get('/manufacturers', function () { // initial load of manufacturer page
    $man = get_man();
    $item = get_all_item();
    $comments = commentNumber();
    return view('pages/manufacturers')->with('manid', 0)->with('item', $item)->with('comments', $comments)->with('manufacturers', $man);
});

Route::get('update_man_page/{id}', function($id){// data load for manufacturer page
    $man = get_man();
    $item = get_all_item();
    $comments = commentNumber();
    return view('pages/manufacturers')->with('manid', $id)->with('item', $item)->with('comments', $comments)->with('manufacturers', $man);
});

Route::post('/add_man', function () {
    $name = request("name");
    
    $data = get_man();
    foreach($data as $da){
        if($da->name == $name){
            die("This Manufacturer already exists");
        } 
    }
    add_man($name);
    $data = get_man();
    return view('pages/add_item')->with('manufacturer', $data);
});

Route::get('delete_man/{id}', function($id){ //iid is item id id is comment id
    delete_man($id);
    return redirect("/");
});
//add manufacturer
function add_man($name){
    $sql = "insert into manufacturer (name) SELECT ? WHERE NOT EXISTS(SELECT 1 FROM manufacturer WHERE name = ?);";
    DB::insert($sql, array($name,$name));
}
//finds the most commented items and lists them first
function commentNumber(){ 
    $sql = "SELECT *, comment.itemid AS itemid, COUNT(comment.id) AS numComments FROM comment,item where item.id != itemid GROUP BY item.id ORDER BY numComments ASC";
    return DB::select($sql);
}
//get all manufacturers
function get_man(){
    $sql = "select * from manufacturer";
    $items = DB::select($sql);
    return $items;
}

//delete man by id
function delete_man($id){
    $sql = "delete from manufacturer where id = ?";
    DB::delete($sql,array($id));
}






// average Routes
Route::get('/average', function(){ //iid is item id id is comment id
 // average rating sql
   $comments = avgComments(); // find average rateing for an item and list order
    if ($comments == false) { // if comments fails return all items 
        $comments = get_all_item();
    } else {$nulledcomments = findNull();}

    return view("pages.average")->with('comments', $comments)->with('nulledcomments', $nulledcomments);
});

// average the rating for an item
function avgComments(){
    $sql = "SELECT *, comment.itemid AS itemid, AVG(comment.rate) AS avgComments FROM comment,item where item.id = itemid GROUP BY item.id ORDER BY avgComments DESC";
    return DB::select($sql);
}

// will return ALL rows from table one then compare them to table two regardless of null.
function findNull(){
    $sql = "SELECT *, item.id FROM item LEFT JOIN comment ON item.ID = comment.itemid WHERE comment.itemid IS NULL";
    return DB::select($sql);
}






// search Bar
Route::post('/search', function(){ //iid is item id id is comment id
    $name = request('name');
    $comments = search($name);
    return view("pages.search")->with('results',$comments);
});
function search($name){
    $sql = "select * from item where summary like '%".$name."%'";
    return DB::select($sql);
}




// user
Route::post('/add_user', function() {
    $name = request("Uname");
    
    $data = get_user();
    foreach($data as $da){
        if($da->name == $name){
            die("This Username is taken.");
        }
    }
    add_user($name);
    return redirect("/");
});

//get all users
function get_user(){
    $sql = "select * from user;";
    $items = DB::select($sql);
    return $items;
}
//add user
function add_user($name){
    $sql = "insert into user (name) SELECT ? WHERE NOT EXISTS(SELECT 1 FROM user WHERE name = ?);";
    DB::insert($sql, array($name,$name));
}