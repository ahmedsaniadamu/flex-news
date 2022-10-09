<form action="#" method="post" class="md:w-[55%] xl-w-[45%] mt-5 md:ml-3 comment-reply-form">
    @csrf     
    <input type="hidden" name="comment_id" id="reply_form_comment_id" value="0">
    <input type="hidden" name="comment_type" id="reply_form_comment_type" value="0">
    <input type="hidden" name="post_id" id="post_id" value="{{ $post -> id }}">
    <input type="hidden" name="slug"  value="{{ $post -> slug }}">
    <input type="hidden" name="category" value="{{ $post -> category }}">
    <label for="name" class="block w-auto mb-2 text-md text-gray-800 font-semibold"> Username:<span class="text-red-500"> * </span> </label>
    <input 
         class="comment-input py-4" id="name"
         type="text" name="name" required placeholder="your name.."
    >
    @error('name')
      <p class="text-xs text-red-500 mt-2"> {{ $message }} </p>
    @enderror

    <label for="email" class="block mb-2 w-auto mt-5 text-md text-gray-800 font-semibold"> Email Address:  <span class="text-red-500"> * </span> </label>
    <input 
         class="comment-input py-4" id="email"
         type="email" name="email" required placeholder="email.."
    >
    @error('email')
      <p class="text-xs text-red-500 mt-2"> {{ $message }} </p>
    @enderror

    <label for="website" class="block w-auto mt-5 mb-2 text-md text-gray-800 font-semibold"> Website: </label>
    <input 
         class="comment-input py-4" id="website"
         type="text" name="website"  placeholder="website.."
    >
    @error('website')
      <p class="text-xs text-red-500 mt-2" > {{ $message }} </p>
    @enderror

    <label for="comment" class="block w-auto mt-5 mb-2 text-md text-gray-800 font-semibold">
       <span class="comment-type-toggler"> Comment </span>:  <i class="text-red-500">*</i> 
   </label>
     <textarea name="comment" required id="comment" class="comment-input h-[160px] pl-0">
       
    </textarea>
    @error('comment')
      <p class="text-xs text-red-500 mt-2"> {{ $message }} </p>
    @enderror
    <div class="mt-3 flex items-center">
        <input type="checkbox"  class="save-data">
        <p class="text-sm ml-2"> Save my name, email and website in this browser for next comment </p>
    </div>
    <button type="submit" class="capitalize py-2 w-[250px] text-center bg-red-500 text-white rounded-full my-4">
        <span class="comment-type-toggler"> Comment </span>
    </button>
    <button type="button" class="cancel-reply hidden ml-8 bg-gray-100 capitalize py-2 w-[250px] text-center rounded-full my-4"> Cancel Reply </button>     
</form>