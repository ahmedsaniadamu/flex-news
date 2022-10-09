<h5 class='capitalize py-4 font-semibold text-md'> Latest Sport News </h5>
<div class='h-0.5 flex mb-5'> 
    <div class='w-[10%] bg-red-500'></div>
    <div class='w-[90%] bg-gray-300'></div>
</div>
<div>
<a style="background-image: url({{$sportNews[0] -> image }});"         
        href="{{ route('post.index' , [ 
                'category' => $sportNews[0] -> category,
                'slug' => $sportNews[0] -> slug ] ) 
             }}"
        class="banner-image bg-cover bg-fixed md:bg-scroll bg-no-repeat text-white block w-full md:w-[96%] h-[24rem] md:h-96 relative mx-auto"
      > 
         <div class="absolute pl-4 pb-3 bottom-0 pt-5 shadow-effect">
              <span class="px-3 py-1 bg-red-700 rounded text-sm"> 
                  {{$sportNews[0] -> source }}
              </span>
              <h5 class="text-xl font-bold pr-2 pt-2">
                 {{ $sportNews[0] -> description }}
              </h5>
              <span class="text-sm mt-1">
                  {{ date( 'F jS, Y', strtotime($sportNews[0] -> created_at ) ) }}
              </span>
         </div>
     </a>
     <div class="sm:grid sm:grid-cols-2 md:grid-cols-3 gap-6 px-0 md:px-3 xl:px-4 pb-2 mt-5 mb-3">
        @foreach ( $sportNews as $news )
             @if ($loop -> index > 0 )
                <a 
                    href="{{ route('post.index' , [ 
                                'category' => $news -> category,
                                'slug' => $news -> slug ] ) 
                      }}" class="mb-8 sm:mb-0 block"
                 >
                    <img src="{{ $news -> image }}" alt="{{ $news -> description }}" 
                        class="w-full h-[12rem] sm:h-[9rem] object-cover mb-3"
                    >             
                    <p class="text-sm font-semibold font-[35px] hidden sm:block">
                    {{ Str::limit($news -> description , 60 , '...')}}                
                    </p>
                    <p class="text-md font-semibold sm:hidden">
                    {{ Str::limit($news -> description , 150 , '...')}}                             
                    </p>
                    <span class="text-xs pb-3">
                    {{ date( 'F jS, Y', strtotime( $news -> created_at ) ) }}
                </span>
            </a> 
             @endif
        @endforeach
    </div>
</div>