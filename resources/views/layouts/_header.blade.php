<header class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="col-md-offset-1 col-md-10">
            <a href="/" id="logo">Lara55</a>
            <nav>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        <li><a href="{{route('PracticeJs')}}">Js练习</a></li>
                        <li><a href="{{route('practice.formPractice')}}">表单练习</a></li>
                        <li><a href="{{ route('users.index') }}">用户列表</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                {{ Auth::user()->name }} <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('users.show', Auth::user()->id) }}">个人中心</a></li>
                                <li><a href="{{ route('users.edit', Auth::user()->id) }}">编辑资料</a></li>
                                <li class="divider"></li>
                                <li>
                                    <a id="logout" href="#">
                                        <form action="{{ route('logout') }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                                        </form>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ route('help') }}">帮助</a></li>
                        <li><a href="{{ route('login') }}">登录</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</header>



{{--{{　}} 是在 HTML 中内嵌 PHP 的 Blade 语法标识符，表示包含在该区块内的代码都将使用 PHP 来编译运行。route() 方法由 Laravel 提供，通过传递一个具体的路由名称来生成完整的 URL--}}




