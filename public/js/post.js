/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/post.js ***!
  \******************************/
window.onload = function () {
  //selector function for single element
  var $ = function $(element) {
    return document.querySelector(element);
  }; //selector function for multiple elements


  var $$ = function $$(element) {
    return document.querySelectorAll(element);
  }; //dynamically set comment or reply based on user action


  var commentReplyForm = $('form.comment-reply-form');
  var switchToReplyBtn = $$('.switch-to-reply-btn');
  var toggleText = $$('.comment-type-toggler');
  var commentId = $$('.comment-id');
  switchToReplyBtn.forEach(function (button, id) {
    button.addEventListener('click', function () {
      //update comment id of the comment for with the specified comment id
      $('#reply_form_comment_id').value = commentId[id].value; // set the comment type to reply

      $('#reply_form_comment_type').value = 1; //change all comment label to reply label

      toggleText.forEach(function (label) {
        label.innerHTML = 'Reply';
      }); //display cancel reply button

      $('button.cancel-reply').classList.remove('hidden'); // scroll user to reply form position;

      $('.comment-fieldset').scrollIntoView(true);
    });
  }); //set form type back to comment form

  $('button.cancel-reply').addEventListener('click', function () {
    //update comment id of the comment for with the specified comment id
    $('#reply_form_comment_id').value = 0; // set the comment type to comment

    $('#reply_form_comment_type').value = 0; //change all comment label to  comment label

    toggleText.forEach(function (label) {
      label.innerHTML = 'Comment';
    });
    commentReplyForm.reset(); //display cancel reply button

    $('button.cancel-reply').classList.add('hidden');
  });
  commentReplyForm.addEventListener('submit', function (event) {
    event.preventDefault();
    commentReplyForm.action = '/comment/create-comment';
    commentReplyForm.submit(); //save commenter name email and website if choosen by user

    if ($('input.save-data').checked) {
      saveCommenterData($('#name').value, $('#email').value, $('#website').value);
    }
  });

  function saveCommenterData(name, email, website) {
    if (name && email) {
      localStorage.setItem('name', name);
      localStorage.setItem('email', email);
      if (website) localStorage.setItem('website', website);
    }
  }

  function getCommenterData() {
    var name = localStorage.getItem('name');
    var email = localStorage.getItem('email');
    var website = localStorage.getItem('website');

    if (name !== null && email !== null) {
      $('#name').value = name;
      $('#email').value = email;
      if (website !== null) $('#website').value = website;
    }
  }

  getCommenterData();
};
/******/ })()
;