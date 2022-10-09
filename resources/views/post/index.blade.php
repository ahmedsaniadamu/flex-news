@extends('layouts.app', [
  'title' => 'News  | '. $post -> category ,
  'description' => $post -> description,
  'script' => '/js/post.js'
])
@section('content')
   <section class="mx-auto my-0 sm:my-5 md:w-[94%] xl:w-[90%] md:flex justify-between post-info">
        <div class="block md:w-[68%] bg-white px-2 md:px-4">
            <div class="pt-4">
                <a href="{{ route('home.index') }}" class="text-sm font-semibold bi bi-house-door"> Home </a>
                <span class="text-sm font-semibold"> / </span>
                <a href="{{ route('post-categories.index',['category' => $post -> category ]) }}" class="text-sm font-semibold md:text-red-500">
                    {{ $post -> category }} 
               </a>
            </div>
            <h2 class="mt-3 text-2xl md:text-3xl font-bold">  
               {{ $post -> description }}
            </h2>
            <div class="flex justify-between mt-5">
                 <span> <b class="mr-2 md:mr-3"> Posted On: </b>  
                    <small class="text-sm">   {{ date( 'F jS, Y', strtotime( $post -> created_at ) ) }} </small>                      
                  </span>
                  <i class="bi bi-chat-left-dots text-sm text-red-500 md:text-gray-900"> 
                      comments:  
                      <small class="text-sm"> {{  count(  
                           array_filter(
                               json_decode( json_encode($post -> comments ) , true ) ,
                                  function($comment){
                                    return $comment['comment_type'] == 0 ;
                                   }
                                )
                           ) }} 
                       </small>  
                   </i>
            </div>
            <div class="flex mt-3 items-center">
               <span> <b class="mr-8"> Share: </b> </span>
                  <div>
                     <span class="bi bi-facebook text-xl mr-5 text-blue-500"></span>
                     <span class="bi bi-twitter text-xl mr-5 text-blue-400"></span>
                     <span class="bi bi-whatsapp text-xl mr-5 text-green-500"></span>
                     <span class="bi bi-youtube text-xl mr-5 text-red-500"></span>
                     <span class="bi bi-instagram text-xl mr-5 text-red-800"></span>
                     <span class="bi bi-linkedin text-xl text-blue-300"></span>
                 </div>
            </div>
            <img 
                 src="{{ $post -> image }}" alt="{{ $post -> description }}"
                 class="w-full h-[230px] md:h-[400px] mt-4 p-0 mx-0"
            >
            <p class="mt-3 leading-8 text-md">
                {{ $post -> content }}
            </p>
        </div>
        <!-- this section is only visible in large devices  -->
        <div class="hidden md:block md:w-[30%] bg-white px-2 h-auto"> 
               <h5 class='uppercase py-3 font-semibold text-sm'> Follow Us </h5>
               <div class='h-0.5 flex'> 
                    <div class='w-30% bg-red-500'></div>
                    <div class='w-70% bg-gray-700'></div>
              </div>
            <div class='flex justify-between flex-wrap mt-5 px-5 sm:px-2 md:px-4'>
               <img src='{{ asset('images/Capture.PNG') }}' class='h-10 w-48%' alt='facebook'>
               <img src='{{ asset('images/insta.PNG') }}' class='h-10 w-48%' alt='instagram'>
               <img src='{{ asset('images/twitter.PNG') }}' class='h-10 w-48%' alt='twitter'>
               <img src='{{ asset('images/youtube.PNG') }}' class='h-10 w-48%' alt='youtube'>
            </div>
            <h5 class='uppercase py-3 font-semibold text-sm mt-5' > Related News </h5>
               <div class='h-0.5 flex'> 
                    <div class='w-30% bg-red-500'></div>
                    <div class='w-70% bg-gray-700'></div>
              </div>
            @include('post.components.related-news')
        </div>         
   </section>
   <section class="my-4 bg-white mx-auto md:w-[94%] xl:w-[90%] px-2 md:px-4">
       <h5 class='uppercase py-3 font-semibold text-sm'> 
           Comments  
           @if (count( $post -> comments ))
               &nbsp; &nbsp;  
               <span class="py-1 px-3 bg-red-500 text-white text-sm">
                  {{  count(  
                     array_filter(
                         json_decode( json_encode($post -> comments ) , true ) ,
                            function($comment){
                              return $comment['comment_type'] == 0 ;
                             }
                          )
                     ) }} 
               </span>
           @endif
       </h5>
       <div class='h-0.5 flex'>           
         <div class='w-[100%] bg-gray-300'></div>          
       </div>
      @include('post.components.comments.comments')
   </section>
   <!-- this section is only visible in mobile devices  -->   
   <section class="sm:hidden px-2 mt-3 bg-white pb-5">
      <h5 class='uppercase py-3 font-semibold text-sm'>  Related News </h5>
      <div class='h-0.5 flex'> 
        <div class='w-[15%] bg-red-500'></div>
        <div class='w-70% bg-gray-700'></div>
        <div class='w-[15%] bg-red-500'></div>
      </div>
      <div class="flex related-news">
           @foreach ( $relatedNews as $news )
               <a 
                  href="{{ route(
                                'post.index',[ 
                                              'category' => $news -> category , 
                                              'slug' => $news ->  slug 
                                             ]
                        ) }}"
                  class="mr-5 mt-5 block mb-3"
               >
                  <img 
                      src="{{ $news -> image }}" 
                      alt="{{ $news -> description }}"
                      class="w-full h-[180px]"
                      >    
                  <h5 class="text-md font-semibold">
                      {{ Str::limit($news -> description , 80, '...') }}
                  </h5>
                  <span class="text-sm mt-1">
                     {{ date( 'F jS, Y', strtotime( $news -> created_at ) ) }}
                 </span>
               </a>
           @endforeach
      </div>
   </section>
   <!-- ------------------------------------ -->
@endsection