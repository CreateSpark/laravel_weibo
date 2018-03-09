<h1>This is FormPractice</h1>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/practice.js"></script>

    <style type="text/css">
        #panel,#flip
        {
            padding:5px;
            text-align:center;
            background-color:#e5eecc;
            border:solid 1px #c3c3c3;
        }
        #panel
        {
            padding:50px;
        }
    </style>
</head>

<body>

<a href="./js_1.blade.php">js-1（对象）</a>
<a href="www.baidu.com">js-1（对象）</a>
</br>---------------------------------------------------------------------------------------</br>
<button id="cartoon">这是一个动画测试</button>
<p>默认情况下，所有的HTML标签都有一个静态的位置，且是不可能移动的，如果需要改变为，
我们需要的元素的position属性设置为relative，fixed或absolute!</p>
<div style="background:#98bf21;height:100px;width:100px;position:absolute;"></div>

</br></br></br></br></br>
</br>---------------------------------------------------------------------------------------</br>

<p id="hide1">点击隐藏按钮就会消失</p>
<button id="hide">隐藏</button>
<button id="show">显示</button>

</br>---------------------------------------------------------------------------------------</br>

<p id="test11">这是一个段落</p>
<p id="test22">这是另一个段落</p>
<p>输入框：<input type="text" id="test33" value="菜鸟"></p>
<button id="btn1">设置文本</button>
<button id="btn2">设置HTML</button>
<button id="btn3">设置值</button>

</br>---------------------------------------------------------------------------------------</br>
<form action="">
<p>RADIO单选按钮</p>
<input type="radio" name="colors"
       id="red">红色<br>
<input type="radio" name="colors" id="blue">蓝色<br>
<input type="radio" name="colors" id="green">绿色<br>
</form>

</br>---------------------------------------------------------------------------------------</br>
<p>回调函数</p>
<p id="test01">这是一个<p>粗体</p>的段落</p>
<p id="test02">这是另外一个<p>粗体dddd</p>的段落</p>
<button id="btn4">显示 新/旧 文本</button>
<button id="btn5">显示 新/旧 HTML</button>

</br>---------------------------------------------------------------------------------------</br>
<p>jquery</p>
<div id="flip">
    点我拉起面板
</div>

<div id="panel">
    Hello world!
</div>


</body>
</html>