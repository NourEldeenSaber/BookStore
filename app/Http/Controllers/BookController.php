<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{
   public function index(){

       $books= Book::orderBy('id','DESC')->paginate(3);
       return view(
           'books.index',
           compact('books')
       );
   }
   public function show($id){
       $book=Book::findOrFail($id);
       return view(
           'books.show',
           compact('book')
       );
   }
   public function create(){
      $categories =Category::select('id','name')->get();
    return view(
        'books.create',
        compact('categories')
    );
   }
   public function store(Request $request){

     $request->validate([
        'title'=>'required|string|max:100',
         'description'=>'required|string',
         'image'=>'required|image|mimes:png,jpg',
         'category_ids'=>'required',
         'category_ids.*'=>'exists:categories,id|',
     ]);

    $image=$request->file('image');
    $ext =$image->getClientOriginalExtension();
    $name="Book-" . uniqid() . ".$ext";
    $image->move(public_path('uploads/books'),$name);


    $title = $request->title;
    $description = $request->description;

    $book=Book::create([
        'title'=>$title,
        'description'=>$description,
        'image'=>$name
    ]);
    $book->categories()->sync($request->category_ids); //sync بتروح تبص في البايفود تيبل
    return redirect(route('books.index'));
   }
   function edit($id){
    $book=Book::findOrFail($id);
    return view(
      'books.edit'  ,
        compact('book')
    );
   }

   public function update(Request $request,$id){
       $request->validate([
           'title'=>'required|string|max:100',
           'description'=>'required|string',
           'image'=>'nullable|image|mimes:png,jpg'
       ]);
       $book=Book::findOrFail($id);
       $name=$book->image;

       if($request->hasFile('image')){
            if ($name !==null){
                unlink(public_path('uploads/books/') . $name);
            }
           $image=$request->file('image');
           $ext =$image->getClientOriginalExtension();
           $name="Book-" . uniqid() . ".$ext";
           $image->move(public_path('uploads/books'),$name);
       }

       $title = $request->title;
       $description = $request->description;
       $book->update([
            'title'=>$title,
            'description'=>$description,
            'image'=>$name
        ]);
       return redirect(route('books.edit',$id));
   }

   public function delete($id){
       $book=Book::findOrFail($id);
        if ($book->image !== null){
            unlink(public_path('uploads/books/') . $book->image);
        }
        $book->delete();
        return redirect(route('books.index'));
   }
}
