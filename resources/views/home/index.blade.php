  @extends('layouts.app' , [
    'title' => 'FlexNews',
    'description' => 'expore the latest news around the world today
                      for free such as sport,education,health and more..
                     ',      
  ] )
  @section('content')
       @include('home.components.header')
       <div class='flex justify-between flex-col sm:flex-row sm:mx-5 xl:mx-14 mt-3'>
           <div class='w-100% md:w-70% bg-white px-2'> 
                <h5 class='uppercase py-4 font-semibold text-sm'> Trending News </h5>
                <div class='h-0.5 flex mb-5'> 
                    <div class='w-30% bg-red-500'></div>
                    <div class='w-70% bg-gray-700'></div>
                </div>
                @include('home.components.trending-news')
                <h5 class='uppercase py-4 font-semibold text-sm'>Top Business News</h5>
                <div class='h-0.5 flex mb-5'> 
                    <div class='w-30% bg-red-500'></div>
                    <div class='w-70% bg-gray-700'></div>
                </div>
                @include('home.components.business-news')
           </div>
           <div class='w-100% md:w-28% bg-white px-2 mt-1 sm:mt-0'>
               <h5 class='uppercase py-4 font-semibold text-sm'> Follow Us </h5>
               <div class='h-0.5 flex'> 
                    <div class='w-30% bg-red-500'></div>
                    <div class='w-70% bg-gray-700'></div>
              </div>
               <div class='flex justify-between flex-wrap mt-5 px-5 sm:px-2'>
                  <img src='{{ asset('images/Capture.PNG') }}' class='h-10 w-48%' alt='facebook'>
                  <img src='{{ asset('images/insta.PNG') }}' class='h-10 w-48%' alt='instagram'>
                  <img src='{{ asset('images/twitter.PNG') }}' class='h-10 w-48%' alt='twitter'>
                  <img src='{{ asset('images/youtube.PNG') }}' class='h-10 w-48%' alt='youtube'>
               </div>
               <h5 class='uppercase py-4 font-semibold text-sm mt-5'> Popular News </h5>
               <div class='h-0.5 flex'> 
                   <div class='w-30% bg-red-500'></div>
                   <div class='w-70% bg-gray-700'></div>
               </div>
               @include('home.components.popular-news')
           </div>
       </div>
       <div class="sm:mx-5 xl:mx-14 mt-5 md:mt-[2rem] bg-white px-2 md:px-3 xl:px-[1rem]">
            @include('home.components.articles')
       </div>
       <div class='flex justify-between flex-col sm:flex-row sm:mx-5 xl:mx-14 mt-5 md:mt-[2rem] mb-5'>
            <div class='w-100% md:w-70% bg-white px-2'>
                  @include('home.components.sport-news') 
            </div>
            <div class='w-100% md:w-28% mt-1 sm:mt-0'>
                @include('home.components.mail-chimp')
                @include('home.components.categories')
            </div>
       </div>

  @endsection