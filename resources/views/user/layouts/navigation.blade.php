<div class="navbar bg-base-100">
  <div class="flex-1">
    <a class="btn btn-ghost text-xl" href="/">Napuniverse</a>
  </div>
  <div class="flex-none">
    <ul class="menu menu-horizontal px-1">
      <li><a href="{{ route('blog') }}" class="{{ request()->is('public/blog') ? 'text-primary': '' }}">Blog</a></li>
      <li><a href="{{ route('about') }}" class="{{ request()->is('public/about') ? 'text-primary': '' }}">About Me</a></li>
      <li>
        <details>
          <summary>
            Admin
          </summary>
          <ul class="p-2 bg-base-100 rounded-t-none">
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
          </ul>
        </details>
      </li>
    </ul>
  </div>
</div>