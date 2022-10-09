<div class="sm:mx-5 xl:mx-14 -mt-2 sm:mt-3">
    <header class="bg-white sm:p-2 grid md:grid-cols-2 gap-1">
          <a style="background-image: url({{ $banner[2] -> image }});"              
             href="{{ route('post.index' , [ 
                                   'category' => $banner[2] -> category,
                                   'slug' => $banner[2] -> slug  ] ) 
                    }}"
             class="banner-image bg-cover bg-fixed md:bg-scroll bg-no-repeat text-white w-full h-[20rem] md:h-96 relative"
           > 
              <div class="absolute pl-4 pb-3 bottom-0 pt-5 shadow-effect">
                   <span class="px-3 py-1 bg-red-700 rounded text-sm"> 
                       {{ $banner[2] -> source }}
                   </span>
                   <h5 class="text-md md:text-xl font-bold pr-2 pt-2">
                      {{  $banner[2] -> description }}
                   </h5>
                   <span class="text-sm mt-1">
                       {{ date( 'F jS, Y', strtotime( $banner[2] -> created_at ) ) }}
                   </span>
              </div>
          </a>
          <div>                         
                 <a style="background-image: url({{ $banner[0] -> image }})" 
                    href="{{ route('post.index' , [ 
                                   'category' => $banner[0] -> category,
                                   'slug' => $banner[0] -> slug  ] ) 
                    }}"
                   class="banner-image size-cover no-repeat text-white w-full h-48 block relative"
                 > 
                    <div class="absolute bottom-3 left-4">
                         <span class="px-3 py-1 bg-red-700 rounded text-sm"> 
                             {{ $banner[0] -> source }}
                         </span>
                         <h5 class="text-md md:text-lg font-bold pr-2 pt-2">
                            {{  $banner[0] -> description }}
                         </h5>
                         <span class="text-sm mt-1">
                             {{ date( 'F jS, Y', strtotime( $banner[0] -> created_at ) ) }}
                         </span>
                    </div>
                </a>
                <div class="sm:grid sm:grid-cols-2 sm:gap-2">
                    <a style="background-image: url({{ $banner[3] -> image }})" 
                        href="{{ route('post.index' , [ 
                            'category' => $banner[3] -> category,
                            'slug' => $banner[3] -> slug  ] ) 
             }}"
                      class="banner-image size-cover no-repeat mt-1 text-white w-full h-[11.71rem] block relative"
                     > 
                       <div class="absolute shadow-effect bottom-0 pl-3 pt-16 md:pt-12 h-full">
                           <span class="px-3 py-1 bg-red-700 rounded text-xs"> 
                               {{ $banner[3] -> source }}
                           </span>
                           <h5 class="text-sm  pr-2 pt-2">
                              {{  $banner[3] -> description }}
                           </h5>
                           <span class="text-sm mt-1">
                               {{ date( 'F jS, Y', strtotime( $banner[3] -> created_at ) ) }}
                           </span>
                       </div>
                     </a>
                     <a style="background-image: url({{ $banner[1] -> image }})" 
                        href="{{ route('post.index' , [ 
                                   'category' => $banner[1] -> category,
                                   'slug' => $banner[1] -> slug  ] ) 
                              }}"
                       class="banner-image size-cover no-repeat mt-1 text-white w-full h-[11.71rem] block relative"
                      > 
                        <div class="absolute shadow-effect bottom-0 pl-3 pt-16 md:pt-12 h-full">
                            <span class="px-3 py-1 bg-red-700 rounded text-xs"> 
                                {{ $banner[1] -> source }}
                            </span>
                            <h5 class="text-sm  pr-2 pt-2">
                               {{  $banner[1] -> description }}
                            </h5>
                            <span class="text-sm mt-1">
                                {{ date( 'F jS, Y', strtotime( $banner[1] -> created_at ) ) }}
                            </span>
                        </div>
                      </a>
                  </div>
          </div>
    </header>    
</div>