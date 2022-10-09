<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts ;
use Illuminate\Support\Facades\App;

class PagesController extends Controller
{

    //re-usable funtion that display trending and popular news across multiple pages
    private function getNews(){
         //get trending news
       $trendingNews = Posts::select(['description','category','slug','source' ,'image','created_at']) 
       ->  where('category','science') -> take(5) -> get() ; 
       //popular news
       $popularNews = Posts::select(['description','category','slug','source' ,'image','created_at']) 
       ->  orderBy('slug','ASC') -> take(5) -> get() ; 

       return [ 'trendingNews' => $trendingNews , 'popularNews' => $popularNews ] ;
    }

    //------------------- homepage -----------------------------------//
    public function index(){   
       //banner images      
       $banner = Posts::select(['description','category','slug','source' ,'image','created_at']) 
                      ->  where('category','business') -> take(4) -> get() ;        
       //business news      
       $businessNews = Posts::select(['description','category','slug','source' ,'image','created_at']) 
                      ->  where('category','business') -> orderBy('id','DESC') -> take(6) -> get() ;      
      //top articles      
      $articles = Posts::select(['description','category', 'content' , 'slug','source' ,'image','created_at']) 
      ->  where('category','article') -> orderBy('id','DESC') -> take(6) -> get() ;
      //sport news
      $sportNews = Posts::select(['description','category', 'content' , 'slug','source' ,'image','created_at']) 
      ->  where('category','sport') -> orderBy('id','DESC') -> take(4) -> get() ;

       return view('home.index' , [
          'banner' => $banner ,
          'trendingNews' => $this -> getNews()['trendingNews'] ,
          'popularNews'=>  $this -> getNews()['popularNews'] ,
          'businessNews' => $businessNews,
          'articles' => $articles ,
          'sportNews' => $sportNews
       ]) ;
    }
    //------------------------------------------------------------------//
           //a page to display a specific news content 
    //-------------------------------------------------------------------//
    public function post($category,$slug){
         //select single post
         $post = Posts:: where('slug', $slug ) -> firstOrFail() ;  
         $relatedNews = Posts::where('slug' , '<>' , $slug ) 
                        -> where('category',$category)
                        -> take( 10 ) -> get();

         return view('post.index' , [               
                                 'relatedNews' => $relatedNews,
                                 'trendingNews' => $this -> getNews()['trendingNews'] ,
                                 'popularNews'=>  $this -> getNews()['popularNews'] 
                             ]) -> with('post' , $post)  ;
    }
   //------------------------------------------------------------------//
           //a page to display news category 
    //-------------------------------------------------------------------//
   public function postCategory($category){                     
      //post category
      $postCategory = Posts::select(['description','category', 'content' , 'slug','source' ,'image','created_at']) 
      ->  where('category', $category ) -> orderBy('id','DESC') ;
      
      if( $postCategory -> count() ){
           return view('post-categories.index', [
                       'postCategory' => $postCategory -> paginate(9) ,
                       'trendingNews' =>  $this -> getNews()['trendingNews'] ,
                       'popularNews'=>  $this -> getNews()['popularNews'] ,
           ]) -> with('category' , $category ) ;
      }
      else {
          return App::abort(404) ;
      }
   }

  //page that displays search results
  public function search($search){    
   $searchResults = Posts::select(['description','category', 'content' , 'slug','source' ,'image','created_at']) 
                   ->  where('category', 'LIKE' , '%'. $search .'%')  
                   ->  orWhere('description', 'LIKE' , '%'. $search .'%')
                   -> orderBy('id','DESC') -> paginate(9);
     
    if( $searchResults -> count() ){
        return view('search.index', [
            'trendingNews' =>  $this -> getNews()['trendingNews'] ,
            'popularNews'=>  $this -> getNews()['popularNews'] ,
            'searchResults' => $searchResults
          ]
        ) -> with('search' , $search ) ; 
      }
    else return App::abort(404) ;
  }
}