<div class="hidden sm:block bg-white px-2 pb-3 mt-5">
    <h5 class='uppercase py-4 font-semibold text-sm'>  Categories </h5>
        <div class='h-0.5 flex mb-5'> 
            <div class='w-[10%] bg-red-500'></div>
            <div class='w-[90%] bg-gray-300'></div>
        </div>
        <ul class="font-semibold uppercase  text-xs md:pl-3 mb-3 text-gray-700">
            <li class="mt-2">
            <a href="{{ route('post-categories.index', ['category' => 'business']) }}" class="navlink">
                <span> Business </span>
            </a>
        </li>
            <li class="mt-2">
                <a href="{{ route('post-categories.index',['category' => 'sport']) }}" class="navlink">
                    <span> Sport </span>
                </a>
            </li>
            <li class="mt-2">
                <a href="{{ route('post-categories.index', ['category' => 'article']) }}" class="navlink">
                    <span>  Article </span>
                </a>
            </li>
            <li class="mt-2">
                <a href="{{ route('post-categories.index', ['category' => 'health']) }}" class="navlink">
                    <span> Health </span>
                </a>
            </li>
            <li class="mt-2">
                <a href="{{ route('post-categories.index',['category' => 'science']) }}" class="navlink">
                    <span> Science </span>
                </a>
            </li>
            <li class="mt-2">
                <a href="{{ route('post-categories.index', ['category' => 'technology']) }}" class="navlink">
                    <span> Technology </span>
                </a>
            </li>
        </ul>
 </div>