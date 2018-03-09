<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title', 'demo5') - learn_laravel
        {{--yield的括号中，title、content名称都是随意的，只要子视图对应上就行--}}
    </title>

    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
{{--@include 是 Blade 提供的视图引用方法，可通过传参一个具体的文件路径名称来引用视图。--}}
@include('layouts._header')

<div class="container">
    <div class="col-md-offset-1 col-md-10">
        @include('shared._messages')
        @yield('content')
        @include('layouts._footer')
    </div>
</div>
<script src="/js/app.js"></script>
</body>
</html>