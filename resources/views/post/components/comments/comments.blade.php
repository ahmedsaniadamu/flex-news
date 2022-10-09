@forelse ( $post -> comments as $comment )
     @if ($comment -> comment_type == 0)
          <input type="hidden" name="comment_id" value="{{ $comment -> id }}" class="comment-id">
          <div class="flex mt-4 ml-2 md:ml-4 pb-3">               
               <img src="{{ asset('images/avatar.jpg')}}" alt="{{ $comment -> name }}'s avatar"
               class="h-[50px] w-[50px] rounded-full"
               >
               <div class="pl-3">
                    <h5 class="text-xl font-semibold"> 
                         {{ $comment -> name }}    
                         @if ($comment -> website )    
                              <a href="{{ $comment -> website }}" class="bi bi-link text-md text-blue-500 ml-12"></a>
                         @endif
                    </h5>
                    <span class="text-xs bi bi-clock"> 
                         {{ date( 'F jS, Y g:ia', strtotime( $comment -> created_at ) ) }}                
                    </span>
                    <button class="text-red-500 text-sm ml-8 bi bi-reply switch-to-reply-btn">
                          Reply 
                    </button>
                    <p class="text-[15px] text-gray-700 italic md:w-[60%] mt-1"> {{ $comment -> comment }} </p>
                     @include('post.components.replies') 
               </div>
          </div>                               
     @endif
@empty
     <div class="flex items-center h-[200px] justify-center">
          <h5 class="text-md md:text-3xl text-gray-700 text-center font-semibold">
             No any comments yet!
          </h5>
     </div>
@endforelse
 <fieldset class="mt-5 border-t-2 border-gray-400 comment-fieldset">
      <legend class="w-auto text-2xl font-semibold pr-2"> 
           Leave a 
           <span class="comment-type-toggler"> Comment </span> 
     </legend>
 </fieldset>
 <p class="text-md mt-2">
     <strong> Note: </strong>
     your email address won't be published and required fields are marked with 
     <span class="text-red-500 pl-1"> * </span>
 </p>
@include('post.components.comments.comment-action.create-comment')