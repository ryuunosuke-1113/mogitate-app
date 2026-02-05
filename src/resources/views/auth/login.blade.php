@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">管理ログイン</h1>

    @if ($errors->any())
        <div class="mb-4 rounded bg-red-100 p-3 text-red-700">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="bg-white rounded shadow p-6 space-y-4">
        @csrf

        <div>
            <label class="block mb-1 font-semibold">Email</label>
            <input name="email" type="email" value="{{ old('email') }}"
                   class="w-full border rounded px-3 py-2" required autofocus>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Password</label>
            <input name="password" type="password"
                   class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="flex items-center justify-between">
            <label class="inline-flex items-center gap-2 text-sm">
                <input type="checkbox" name="remember">
                <span>ログイン状態を保持</span>
            </label>

            <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                ログイン
            </button>
        </div>
    </form>
</div>
@endsection
