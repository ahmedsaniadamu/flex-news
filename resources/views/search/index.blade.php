@extends('layouts.app' , [
    'title' => 'Search | '. $search ,
    'description' => 'expore the latest news around the world today
                      for free such as sport,education,health and more..
                     '    
  ] )
  @section('content')
   <section  class="bg-white w-full m-0 p-0">
     <div class="xl:w-[90%] mx-auto pt-5 md:pt-12">
        <fieldset class="border-t-2 border-gray-300">
            <legend class="capitalize d-block px-3 bg-red-500 text-white  py-[3px] w-auto mx-auto text-md"> 
                 showing results for {{ $search }}  <b> {{ $searchResults->total() }} </b> found.
           </legend>
         </fieldset>
         <div class="sm:grid sm:grid-cols-2 md:grid-cols-3 gap-6 xl:gap-8 md:px-3 px-2 xl:px-4 pb-2 mt-5">
            @foreach ( $searchResults as $searchResult )
                <a href="{{ route('post.index' , [ 'category' => $searchResult -> category ,'slug' => $searchResult -> slug ]) }}"
                     class="mb-8 sm:mb-0 block"
                 >
                     <img src="{{ $searchResult -> image }}" alt="{{ $searchResult -> description }}" 
                         class="w-full h-[12rem] sm:h-[9rem] md:h-[220px] object-cover mb-3"
                     >             
                     <p class="text-md md:text-lg font-semibold text-gray-800" style="font-family: sans-serif">
                        {{ Str::limit($searchResult -> description , 150 , '...')}}                
                     </p>                             
                     <span class="text-xs pb-3 text-gray-600">
                        {{ date( 'F jS, Y', strtotime( $searchResult -> created_at ) ) }}
                    </span>
                </a> 
            @endforeach
        </div>
        <div class="pb-3 pl-3 md:py-8">
             {{ $searchResults -> links() }}
        </div>
      </div>
   </section>
  @endsection