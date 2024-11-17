@extends('User.Layouts.Master')
@section('title', 'Global Chat')

@section('content')
    <div class="flex flex-col antialiased text-gray-800 pt-20 pb-20">
        <!-- breadcrumb -->
        <div class="container py-4 flex items-center mb-8 gap-3 ps-10 lg:ps-20 dark:bg-gray-700">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="#"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-dark-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Home
                    </a>
                </li>
                @php
                $user = Auth::guard('user')->user();
                $merchant = Auth::guard('merchant')->user();
                @endphp
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Global chat</span>
                    </div>
                </li>
            </ol>
        </div>
        <!-- ./breadcrumb -->
        <div class="flex flex-row h-full w-full lg:px-40">
            <div class="flex flex-col flex-auto h-full px-6">
                <div class="text-xs py-4 px-4 text-gray-700 uppercase rounded-t-xl bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <h1>Broadcast Chat</h1>
                </div>
                <div class="flex flex-col flex-auto flex-shrink-0 rounded-b-xl dark:bg-gray-600 bg-gray-300 max-h-screen p-4">
                    <div class="flex flex-col h-full overflow-x-auto mb-4">
                        <div class="flex flex-col h-full">
                            <div class="grid grid-cols-12 gap-y-2">
                                @foreach($messages as $message)
                                    <div class="col-start-1 col-end-13 p-3 rounded-lg" dir="{{ $message->sender_id == Auth::id() ? 'rtl' : 'ltr' }}">
                                        <div class="flex items-start gap-2.5">
                                            @if ($message->sender_type === 'App\Models\User')
                                            <img class="w-8 h-8 rounded-full" src="{{ asset('storage/' . $message->sender->photo  ) }}" alt="User image">
                                            @elseif ($message->sender_type === 'App\Models\Merchant')
                                            <img class="w-8 h-8 rounded-full" src="{{ asset('storage/' . $message->sender->logo  ) }}" alt="User image">
                                            @endif
                                            <div class="flex flex-col gap-1 w-full min-w-[200px] lg:min-w-[300px] max-w-[200px] lg:max-w-[500px]">
                                                <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                                    @if ($message->sender_type === 'App\Models\User')
                                                    <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $message->sender->first_name }}</span>

                                                    @elseif ($message->sender_type === 'App\Models\Merchant')
                                                    <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $message->sender->owner }}</span>

                                                    @endif
                                                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ $message->created_at->format('H:i') }}</span>
                                                </div>
                                                <div class="flex flex-col leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                                                    <p class="text-sm font-normal text-gray-900 dark:text-white">{{ $message->body }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <form action="
                        @if ($user)
                            {{ route('chat.store') }}
                            @elseif($merchant)
                            {{ route('merchant.chat.store') }}
                        @endif
                        " method="POST" class="flex flex-row items-center h-16 rounded-xl bg-white w-full px-4">
                        @csrf
                        {{-- <div>
                            <button class="flex items-center justify-center text-gray-400 hover:text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                    </path>
                                </svg>
                            </button>
                        </div> --}}
                        <div class="flex-grow ml-4 p-2">
                            <div class="relative w-full ">
                                <input type="text" name="body" placeholder="Type your message" class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10" required />
                            </div>
                        </div>
                        <div class="ml-4">
                            <button type="submit" class="flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white px-4 py-1 flex-shrink-0">
                                <span>Send</span>
                                <span class="ml-2">
                                    <svg class="w-4 h-4 transform rotate-45 -mt-px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
