<nav class="shadow-large justify-between h-14 items-center sm:hidden flex mb-0">
    <a href="{{ route('home.index') }}" class="text-xl pl-2 logo nav-item">
        Flex<b class="text-red-400 ">News</b>
    </a>
    <span 
         class="bi bi-justify text-3xl pr-1 nav-item" 
         data-bs-toggle="offcanvas" 
         data-bs-target="#offcanvasExample" 
         aria-controls="offcanvasExample">
    </span>     
                                 
    <div class="offcanvas offcanvas-start fixed bottom-0 flex flex-col max-w-full bg-white invisible bg-clip-padding shadow-sm outline-none transition duration-300 ease-in-out text-gray-700 top-0 left-0 border-none w-96" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header flex items-center justify-between py-4 px-1 shadow">            
            <button 
                   type="button" class="bi bi-arrow-left text-2xl pr-2 pl-2" 
                   data-bs-dismiss="offcanvas" aria-label="Close"
            ></button>
            <form action="#" method="POST" class="m-search-form" onsubmit="
                    event.preventDefault();
                    let form = document.querySelector('m-form.search-form')
                    form.action = `/search/${ document.querySelector('input.m-search-input').value }`
                    form.submit();
            ">
                @csrf
                @method('GET')
                <div class="flex justify-center w-56 items-center">
                    <div class="xl:w-96">
                      <div class="input-group relative flex flex-wrap items-stretch w-full">
                        <input
                               type="search" 
                               class="m-search-input"
                               placeholder="Search"
                               aria-label="Search" 
                               aria-describedby="button-addon2"
                        >
                        <button type="submit" class="search-btn"  id="button-addon2">
                          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
             </form>
              @if (Auth::check())
                    <a 
                        href="{{ route('logout') }}" 
                        class="px-3 rounded-lg py-1 navlink border text-red-500 border-red-500 ml-4"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    >
                    <span> Logout </span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                    @else                     
                        <a href="{{ route('login') }}" class="px-4 rounded-lg py-1 navlink border text-red-500 border-red-500 ml-4">
                            <span> Login </span>
                        </a>                     
              @endif
        </div>

        <div class="offcanvas-body flex-grow py-2 px-1 overflow-y-auto">
              <h5 class="pl-1 text-xl font-bold"> Categories </h5>
              <ul class="font-semibold pl-3 text-md">
                <li class="mt-2">
                  <a href="{{ route('post-categories.index' , [ 'category' => 'business' ]) }}" class="navlink">
                      <span> Business </span>
                  </a>
               </li>
                <li class="mt-2">
                    <a href="{{ route('post-categories.index' , [ 'category' => 'sport' ]) }}" class="navlink">
                        <span> Sport </span>
                    </a>
                </li>
                <li class="mt-2">
                    <a href="{{ route('post-categories.index', [ 'category' => 'science' ]) }}" class="navlink">
                        <span>  Science </span>
                    </a>
                </li>            
                <li class="mt-2">
                    <a href="{{ route('post-categories.index', [ 'category' => 'article' ]) }}" class="navlink">
                        <span> Articles </span>
                    </a>
                </li>
                <li class="mt-2">
                    <a href="{{ route('post-categories.index', [ 'category' => 'health' ]) }}" class="navlink">
                        <span>   Health </span>
                    </a>
                </li>  
                <li class="mt-2">
                    <a href="{{ route('post-categories.index', [ 'category' => 'technology' ]) }}" class="navlink">
                        <span> Technology </span>
                    </a>
                </li>
              </ul>
        </div>
    </div>    
</nav>