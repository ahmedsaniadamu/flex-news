<nav class="shadow-large justify-between h-16 items-center hidden sm:flex">
    <a href="{{ route('home.index') }}" class="text-2xl ml-1">
        Flex<b class="text-red-400 ">News</b>
    </a>
    <div>
        <ul class="font-semibold text-[12.5px] flex items-center uppercase" style="font-family: sans-serif"> 
            <li>
                <a href="{{ route('post-categories.index' ,  [ 'category' => 'business' ] ) }}" class="navlink">
                    <span> Business </span>
                </a>
            </li>
            <li>
                <a href="{{ route('post-categories.index' , [ 'category' => 'sport' ] ) }}" class="navlink">
                    <span> Sport </span>
                </a>
            </li>
            <li>
                <a href="{{ route('post-categories.index' , [ 'category' => 'science' ]) }}" class="navlink">
                    <span>  Science </span>
                </a>
            </li>            
            <li>
                <a href="{{ route('post-categories.index' , [ 'category' => 'article' ] ) }}" class="navlink">
                    <span> Articles </span>
                </a>
            </li>
            <li>
                <a href="{{ route('post-categories.index' , [ 'category' => 'health' ] ) }}" class="navlink">
                    <span>   Health </span>
                </a>
            </li>  
            <li>
                <a href="{{ route('post-categories.index' , [ 'category' => 'technology' ] ) }}" class="navlink">
                    <span> Technology </span>
                </a>
            </li>
             @guest               
                <li>
                    <a href="{{ route('login') }}" class="navlink">
                        <span> Login </span>
                    </a>
                </li> 
                @else 
                <li>
                    <a 
                         href="{{ route('logout') }}" 
                         class="px-3 rounded-full py-1 navlink border text-red-500 border-red-500"
                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                         >
                        <span> Logout </span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                </li> 
             @endguest           
            <li class="mr-4 ml-2"> 
                 <form action="#" method="POST" class="search-form" onsubmit="
                       event.preventDefault();
                        let form = document.querySelector('form.search-form')
                        form.action = `/search/${ document.querySelector('input.search-input').value }`
                        form.submit();
                    ">
                    @csrf
                    @method('GET')
                    <div class="flex justify-center w-64 items-center">
                        <div class="xl:w-96">
                          <div class="input-group relative flex flex-wrap items-stretch w-full">
                            <input
                                   type="search" 
                                   class="search-input"
                                   name="search"
                                   placeholder="Search"
                                   aria-label="Search" 
                                   aria-describedby="button-addon2"
                                   required
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
            </li>
        </ul>
    </div>
</nav>