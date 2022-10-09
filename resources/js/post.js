window.onload = () => {
    //selector function for single element
    const $ = element => document.querySelector(element);
    //selector function for multiple elements
    const $$ = element => document.querySelectorAll(element);

    //dynamically set comment or reply based on user action
    const commentReplyForm = $('form.comment-reply-form');
    const switchToReplyBtn = $$('.switch-to-reply-btn');
    const toggleText = $$('.comment-type-toggler');
    const commentId = $$('.comment-id');

   switchToReplyBtn.forEach( (button,id) => {
      button.addEventListener('click' , () => {
        //update comment id of the comment for with the specified comment id
        $('#reply_form_comment_id').value = commentId[id].value ;
        // set the comment type to reply
        $('#reply_form_comment_type').value = 1 ;
        //change all comment label to reply label
        toggleText.forEach( label => {
            label.innerHTML = 'Reply';
        })
        //display cancel reply button
        $('button.cancel-reply').classList.remove('hidden')
        // scroll user to reply form position;
         $('.comment-fieldset').scrollIntoView(true);                 
      })
   })
   //set form type back to comment form
   $('button.cancel-reply').addEventListener('click', () => {
        //update comment id of the comment for with the specified comment id
        $('#reply_form_comment_id').value = 0 ;
        // set the comment type to comment
        $('#reply_form_comment_type').value = 0 ;
        //change all comment label to  comment label
        toggleText.forEach( label => {
            label.innerHTML = 'Comment';
        })
        commentReplyForm.reset()
        //display cancel reply button
        $('button.cancel-reply').classList.add('hidden')
   })

   commentReplyForm.addEventListener('submit', event => {
       event.preventDefault()                      
       commentReplyForm.action = '/comment/create-comment';
       commentReplyForm.submit();
       //save commenter name email and website if choosen by user
        if( $('input.save-data').checked ){
            saveCommenterData( $('#name').value , $('#email').value , $('#website').value )
        }
   })  

   function saveCommenterData(name,email,website){
       if( name && email ){
          localStorage.setItem('name' , name )
          localStorage.setItem('email', email)
          if(website) localStorage.setItem('website' , website )
       }
   }

   function getCommenterData(){
        const name = localStorage.getItem('name') ;
        const email = localStorage.getItem('email');
        const website = localStorage.getItem('website')

       if( name !== null && email !== null ){
          $('#name').value  = name
          $('#email').value = email
          if(website !== null ) $('#website').value = website
       }       
   }
   getCommenterData()

}