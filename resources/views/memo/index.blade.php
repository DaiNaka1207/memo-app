<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <form action="{{route('memo.store')}}" method="post" class="mt-5 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @csrf
        <input type="hidden" name="user_id" value="{{$user->id}}">
        <input type="text" name="subject" class="py-3 px-4 mb-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="タイトル" autofocus required>
        <div class="relative">
            <textarea name="content" class="py-3 px-4 block w-full h-48 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" rows="3" placeholder="本文"></textarea>
        </div>
        <div class="text-right">
            <button type="button" onclick="location.href='{{route('dashboard')}}'" class="py-3 px-4 mr-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-yellow-100 text-yellow-800 hover:bg-yellow-200 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-yellow-900 dark:text-yellow-500 dark:hover:text-yellow-400">戻る</button>
            <button type="submit" class="py-3 px-4 mt-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-teal-100 text-teal-800 hover:bg-teal-200 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-teal-900 dark:text-teal-500 dark:hover:text-teal-400">送信</button>
        </div>
    </form>
</x-app-layout>