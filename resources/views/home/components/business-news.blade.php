<div class="sm:grid sm:grid-cols-2 md:grid-cols-3 gap-6 px-0 md:px-3 xl:px-4 pb-2">
    @foreach ( $businessNews as $news )
        <a href="{{ route('post.index' , [ 
                                   'category' => $news -> category,
                                   'slug' => $news -> slug ] ) 
                              }}"
            class="mb-8 sm:mb-0 block"
          >
             <img src="{{ $news -> image }}" alt="{{ $news -> description }}" 
                 class="w-full h-[12rem] sm:h-[9rem] object-cover mb-3"
             >             
             <p class="text-sm hidden sm:block">
                {{ Str::limit($news -> description , 60 , '...')}}                
             </p>
             <p class="text-md font-semibold sm:hidden">
                {{ Str::limit($news -> description , 150 , '...')}}                             
             </p>
             <span class="text-[12px] pb-3 text-gray-500">
                {{ date( 'F jS, Y', strtotime( $news -> created_at ) ) }}
            </span>
        </a> 
    @endforeach
</div>