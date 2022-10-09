<h5 class='uppercase py-4 font-semibold text-sm'>Top Articles </h5>
<div class='h-0.5 flex'> 
    <div class='w-30% bg-red-500'></div>
    <div class='w-70% bg-gray-700'></div>
</div>
<article class="sm:grid sm:grid-cols-2 sm:gap-3 md:gap-5 py-4">
    @foreach ($articles as  $article)
        <div class="block md:flex mt-2 md:justify-between">
             <div 
                 class="bg-cover bg-no-repeat w-full md:w-[38%] block h-[14rem] md:h-[10rem] relative"
                 style="background-image: url({{ $article -> image }})"
              >
                <span class="px-3 py-[3px] bg-red-700 text-white rounded text-[12px] absolute bottom-0"> 
                    {{ $article -> source }}
                </span>
             </div>
             <div class="w-full md:w-[60%]">
                <h5 class="text-xl font-bold mt-2 md:mt-1"> 
                    @php
                        //render certain number of words not all decscription text
                        $number_of_words = 8 ;
                        $long_description = explode(' ' , $article -> description ) ;
                        $short_description = array_slice($long_description,0, $number_of_words );
                        $new_description = implode(' ', $short_description );
                        echo $new_description ;            
                    @endphp  
                </h5>
                <p class="mt-2 text-sm mb-3">
                    @php
                        //render certain number of words not all decscription text
                        $number_of_words = 20 ;
                        $long_description = explode(' ' , $article -> description ) ;
                        $short_description = array_slice($long_description,0, $number_of_words );
                        $new_description = implode(' ', $short_description );
                        echo $new_description ;            
                   @endphp  
                   <a
                       href="{{ route('post.index' , [ 
                                   'category' => $article -> category,
                                   'slug' => $article -> slug ] ) 
                              }}"
                       class="text-red-500 font-bold text-sm md-3 ml-4"
                    >
                       Read more
                  </a>
                </p>
                <span class="text-xs mt-1 text-gray-600">
                    {{ date( 'F jS, Y', strtotime( $article -> created_at ) ) }}
                </span>
             </div>
        </div>
    @endforeach
</article>