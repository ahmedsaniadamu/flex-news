@foreach ( $relatedNews as $news )
  @if ($loop -> index === 0 )
        <a  
            style="background-image: url({{ $news -> image }})"
            href="{{ route('post.index', [ 'slug' => $news -> slug , 'category' => $news -> category ] ) }}"
            class="banner-image mt-5 mb-8 size-cover no-repeat text-white w-full h-[15rem] md:h-[15rem] block relative"
        > 
            <div class="absolute bottom-3 left-4">
                <span class="px-3 py-1 bg-red-700 rounded text-sm"> 
                    {{ $news -> source }}
                </span>
                <h5 class="text-lg font-bold pr-2 pt-2">
                    {{ substr( $news -> description , 0 , 100 ) }}
                </h5>
                <span class="text-sm mt-1">
                    {{ date( 'F jS, Y', strtotime( $news -> created_at ) ) }}
                </span>
            </div>
        </a>
        @else
        <a href="{{ route('post.index',  [ 'slug' => $news -> slug , 'category' => $news -> category ]) }}" class="flex mb-8">
            <img 
                 class="w-[6rem] h-[4.92rem] object-cover"
                 src="{{ $news -> image }}"
                 alt="{{ $news -> description }}"
           >
           <div class="ml-3">
               <h6 class="font-semibold text-md md:text-sm capitalize" style="font-family: sans-serif">
                    @php
                        //render certain number of words not all decscription text
                        $number_of_words = 8 ;
                        $long_description = explode(' ' , $news -> description ) ;
                        $short_description = array_slice($long_description,0, $number_of_words );
                        $new_description = implode(' ', $short_description );
                        echo $new_description . '..' ;            
                    @endphp        
                     <span class="text-red-500 sm:hidden text-xs pl-5"> Read more </span>
                </h6>
               <span class="text-[12px] mt-5 text-gray-600">
                   {{ date( 'F jS, Y', strtotime( $news -> created_at ) ) }}
               </span>
           </div>
       </a>     
    @endif
@endforeach