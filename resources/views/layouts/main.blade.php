@include('layouts._partials.head')
<body>
    <div id="app">
        @include('layouts._partials.header')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('layouts._partials.scripts')
</body>
</html>
