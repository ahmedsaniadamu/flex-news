<footer class="bg-gray-900 pt-1 md:pt-8 my-0 pb-0 text-white ">
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 xl:gap-[4rem] pl-4 md:px-3 xl:px-[3rem]">
         <div class="mt-8 sm:mt-0">
            <a href="{{ route('home.index') }}" class="text-xl md:text-3xl pb-0">
                Flex<b class="text-red-500">News</b>
            </a>
            <p class="text-sm  pt-3 md:pt-4">
                 Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione, 
                 voluptatum unde, alias eius dolore eligendi reiciendis non iste eaque 
                 maiores fugit quaerat dolores veritatis consequuntur  
            </p>
             <h5 class="text-lg mt-3"> Categories </h5>
             <a href="{{ route('home.index') }}" class="py-[3px] px-4 bg-gray-700 rounded-lg inline-block mt-3 text-xs mr-3">
                 business
             </a>
             <a href="{{ route('home.index') }}" class="py-[3px] px-4 bg-gray-700 rounded-lg inline-block mt-3 text-xs mr-3">
                 Sport
            </a>
            <a href="{{ route('home.index') }}" class="py-[3px] px-4 bg-gray-700 rounded-lg inline-block mt-3 text-xs mr-3">
                Health
            </a>
            <a href="{{ route('home.index') }}" class="py-[3px] px-4 bg-gray-700 rounded-lg inline-block mt-3 text-xs mr-3">
                Technology
            </a>
            <a href="{{ route('home.index') }}" class="py-[3px] px-4 bg-gray-700 rounded-lg inline-block mt-3 text-xs mr-3">
                Science
            </a>
            <a href="{{ route('home.index') }}" class="py-[3px] px-4 bg-gray-700 rounded-lg inline-block mt-3 text-xs mr-3">
                Articles
            </a>
            <div class="mt-8">
                <span class="bi bi-facebook text-xl mr-5"></span>
                <span class="bi bi-twitter text-xl mr-5"></span>
                <span class="bi bi-whatsapp text-xl mr-5"></span>
                <span class="bi bi-youtube text-xl mr-5"></span>
                <span class="bi bi-instagram text-xl mr-5"></span>
                <span class="bi bi-linkedin text-xl"></span>
            </div>
         </div>
         <div class="mt-8 sm:mt-0">
            <h5 class="text-lg mb-3"> Popular News </h5>
              @foreach ( $popularNews as $news )           
                 @if ($loop -> index < 3 )
                    <a   href="{{ route('post.index' , [ 
                        'category' => $news -> category,
                        'slug' => $news -> slug ] ) 
                        }}" 
                        class="flex mb-4"
                    >
                        <img 
                            class="w-[6rem] h-[4.2rem] object-cover"
                            src="{{ $news -> image }}"
                            alt="{{ $news -> description }}"
                        >
                       <div class="ml-3">
                            <h6 class="text-sm">
                                {{ substr( $news -> description , 0 ,60 ) . '..' }}                             
                            </h6>
                           <span class="text-xs mt-1 text-gray-400">
                              {{ date( 'F jS, Y', strtotime( $news -> created_at ) ) }}
                          </span>
                      </div>
                    </a>        
                 @endif    
            @endforeach
         </div>
         <div class="mt-8 sm:mt-0">
            <h5 class="text-lg mb-3"> Latest News </h5>
              @foreach ( $trendingNews as $news )           
                 @if ($loop -> index < 3 )
                    <a   href="{{ route('post.index' , [ 
                                   'category' => $news -> category,
                                   'slug' => $news -> slug ] ) 
                         }}"  
                        class="flex mb-4"
                      >
                        <img 
                            class="w-[6rem] h-[4.2rem] object-cover"
                            src="{{ $news -> image }}"
                            alt="{{ $news -> description }}"
                        >
                       <div class="ml-3">
                            <h6 class="text-sm">
                                {{ substr( $news -> description , 0 ,60 ) . '..' }}                             
                            </h6>
                           <span class="text-xs mt-1 text-gray-400">
                              {{ date( 'F jS, Y', strtotime( $news -> created_at ) ) }}
                          </span>
                      </div>
                    </a>        
                 @endif    
            @endforeach
         </div>
    </div>
 <p class="mt-8 md:mt-[4rem] mb-0 py-5 border-t-2 border-gray-500 text-center text-sm">
     Copyright &copy; flexNews 2022 all right reserved.
 </p>
</footer>