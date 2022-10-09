 @include('layouts.components.header' , [
    'title' => $title ?? '' ,
     'meta_description' => $description ?? ''
 ] )

<body class="bg-gray-100">     
   
    @include('layouts.components.navbar.navbar-wrapper')
      @yield('content')
      @include('layouts.components.back-to-top-button')
    @include('layouts.components.footer')

    <!-- add an external script specific to a page --> 
    @if ( isset($script) )
       <script src={{ asset($script) }}></script>        
    @endif    
   <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
   <script>
      // Get the button
      let mybutton = document.getElementById('btn-back-to-top');
      // When the user scrolls down 20px from the top of the document, show the button
      window.onscroll = function () {
          scrollFunction();
      };

      function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
         mybutton.style.display = 'block';
      } 
      else mybutton.style.display = 'none';
      }
      // When the user clicks on the button, scroll to the top of the document
      mybutton.addEventListener('click', backToTop);

      function backToTop() {
             window.scrollTo({ top: 0 , behaviour : 'smooth' })
       }
   </script>
</body>
</html>