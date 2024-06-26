<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\password;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');

});

//@@@@@ SELECT @@@@@

//SELECT QUERIES
    // $users = DB::select('select *from users ');
    // $users = DB::select('select *from users where id=1');
    // $users = DB::select("select *from users where id=?"['1']);

//QUERIES BUILDER
    // $users = DB::table('users')->get();
    // $users = DB::table('users')->where('id',1)->get();
  
//ELOQUENT
    //$users = User::where('id',1)->first();
   // $users = User::all();

//@@@@@ INSERT @@@@@

//SELECT QUERIES
    // $user = DB::insert('insert into users ( name, email, password) values (?, ?,?)', ['teste' ,'teste@teste.com','teste']);
    // $user = DB::insert('insert into users ( name, email, password) values (?, ?,?)', ['teste' ,'teste@teste.com','teste']);
      
//QUERIES BUILDER
    //$user = DB::table('users')->insert([
        //['email' => 'picard@example.com', 'name' => 'teste2', 'password' => "teste"],
        //['email' => 'janeway@example.com', 'name' => 'teste3', 'password' => "teste"],
    //]);

//ELOQUENT
 //   $user = User::create(['email' => 'teste4@example.com', 'name' => 'teste4', 'password' => "teste"]);

//@@@@@ UPDATE  @@@@@
//SELECT QUERIES
    //$user = DB::update("update users set email = ? where name = ?",['teste1@teste.com','Anita']); 

//QUERIES BUILDER
    //$user =  DB::table('users')->where('id', 9)->update(['name' => 'teste123']);
    
   //update user - ELOQUENT
    //$user = User::where('id', 8)->first(); //or
    // $user = User::find(8);
    //$user->update(['name' => 'teste123']);


    //delete user - SELECT QUERIES
  //  $user = DB::delete("delete from users where id=?"['1']);
     // $user =  DB::table('users')->where('id', 9)->delete();

     //delete user - ELOQUENT
     //$user = User::find(8);
     //$user->delete();
   // dd($user);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
