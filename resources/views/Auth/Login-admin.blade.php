<html>
  <head>
    {{-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"/> --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1"/>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <title>Auth || Login Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body class="bg-gray-100 text-gray-900 flex justify-center h-screen">
    <div class="max-w-screen-xl m-0 sm:m-20 bg-white shadow sm:rounded-lg flex justify-center flex-1 h-full">
      <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12 flex flex-col justify-center">
        <div class="text-center text-2xl font-extrabold whitespace-nowrap dark:text-white">
          <p>Jajan UTM</p>
        </div>
        <div class="mt-12 flex flex-col items-center">
          <h1 class="text-2xl xl:text-xl font-extrabold">
            Sign In for Admin
          </h1>
          
          <div class="w-full flex-1 mt-8">
          <form action="{{ route('submit-admin') }}" method="POST">
            @csrf
            <div class="mx-auto max-w-xs">
              <input
                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                type="email" name="email" value="{{ old('email') }}"
                placeholder="Email"
              />
              @if ($errors->has('email'))
                  <div class="text-red-700 px-4 py-3 rounded relative" role="alert">
                      <ul class="list-disc list-inside text-sm text-red-700">
                          @foreach ($errors->get('email') as $item)
                              <li>{{ $item }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif

              <input
                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                type="password" name="password" value="{{ old('password') }}"
                placeholder="Password"
              />
              @if ($errors->has('password'))
                  <div class="text-red-700 px-4 py-3 rounded relative" role="alert">
                      <ul class="list-disc list-inside text-sm text-red-700">
                          @foreach ($errors->get('password') as $item)
                              <li>{{ $item }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              @if ($errors->has('login-admin'))
                  <div class="text-red-700 px-4 py-3 rounded relative" role="alert">
                      <ul class="list-disc list-inside text-sm text-red-700">
                          <li>{{ $errors->first('login-admin') }}</li>
                      </ul>
                  </div>
              @endif
              <button
                class="mt-5 tracking-wide font-semibold bg-indigo-500 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none"
              >
               
                <span class="ml-3">
                  Sign In
                </span>
              </button>
              <p class="mt-6 text-xs text-gray-600 text-center">
                I agree to abide by Jajan UTM
                <a href="#" class="border-b border-gray-500 border-dotted">
                  Terms of Service
                </a>
                and its
                <a href="#" class="border-b border-gray-500 border-dotted">
                  Privacy Policy
                </a>
              </p>
            </div>
          </form>
          </div>
        </div>
      </div>
      <div class="flex-1 bg-indigo-100 text-center hidden lg:flex h-screen">
        <div
          class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
          style="background-image: url('https://storage.googleapis.com/devitary-image-host.appspot.com/15848031292911696601-undraw_designer_life_w96d.svg');"
        ></div>
      </div>
    </div>
  </body>
</html>
