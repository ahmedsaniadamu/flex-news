<div class="sm:grid grid-cols-2 gap-4 mt-3 md:px-2">
    <a style="background-image: url({{ $trendingNews[0] -> image }})"          
        href="{{ route('post.index' , [ 
                'category' => $trendingNews[0] -> category,
                'slug' => $trendingNews[0] -> slug ] ) 
             }}"
        class="banner-image size-cover no-repeat text-white w-full h-[15rem] md:h-[24rem] block relative"
      > 
         <div class="absolute bottom-3 left-4">
              <span class="px-3 py-1 bg-red-700 rounded text-sm"> 
                  {{ $trendingNews[0] -> source }}
              </span>
              <h5 class="text-md md:text-xl font-bold pr-2 pt-2">
                 {{  $trendingNews[0] -> description }}
              </h5>
              <span class="text-sm mt-1">
                  {{ date( 'F jS, Y', strtotime( $trendingNews[0] -> created_at ) ) }}
              </span>
         </div>
     </a>
     <div class="mt-4 sm:mt-0">
          @foreach ( $trendingNews as $news )
              @if ( $loop -> index > 0 )
                <a  
                    href="{{ route('post.index' , [ 
                        'category' => $news -> category,
                        'slug' => $news -> slug ] ) 
                     }}" 
                     class="flex mb-5 md:mb-8"
                  >
                     <img 
                          class="w-[6.6rem] h-[4.4rem] object-cover"
                          src="{{ $news -> image }}"
                          alt="{{ $news -> description }}"
                    >
                    <div class="ml-3">
                        <h6 class="font-bold text-sm" style="font-family: sans-serif">
                              {{ substr( $news -> description , 0 ,60 ) . '..' }}
                              <span class="text-red-500 text-xs ps-3"> Read more </span>
                         </h6>
                        <span class="text-xs mt-1">
                            {{ date( 'F jS, Y', strtotime( $news -> created_at ) ) }}
                        </span>
                    </div>
                </a>
              @endif
          @endforeach
     </div>
</div>