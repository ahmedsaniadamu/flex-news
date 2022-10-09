@forelse ( $post -> comments as $reply )
    @if ( $reply -> comment_type == 1 &&  $comment -> id ==  $reply -> comment_id)
      <div class="flex mt-2 ml-2 md:ml-4 py-2 pl-2 mb-2 rounded md:w-[80%]" style="background: rgb(253, 245, 245)">
          <img src="{{ asset('images/avatar.jpg')}}" alt="{{ $reply -> name }}'s avatar"
              class="h-[40px] w-[40px] rounded-full ml-2"
          >
          <div class="pl-3">
                <h5 class="text-md text-gray-700 font-semibold"> 
                      {{ $reply -> name }}    
                      @if ($reply -> website )    
                          <a href="{{ $reply -> website }}" class="bi bi-link text-md text-blue-500 ml-12"></a>
                      @endif
                </h5>
                <span class="text-xs bi bi-clock"> 
                      {{ date( 'F jS, Y g:ia', strtotime( $reply -> created_at ) ) }}                
                </span> 
                <p class="text-[15px] text-gray-700 italic mt-1 px-2 pb-2"> {{ $reply -> comment }} </p>
           </div>
        </div>   
    @endif
      @empty                     
    @endforelse 
  