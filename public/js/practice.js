
    //动画功能
    $(document).ready(function(){
        $("#cartoon").click(function(){
            var div=$("div");
            div.animate({height:'200px',opacity:'0.4'},"slow");
            div.animate({width:'200px',opacity:'0.8'},"slow");
            div.animate({height:'100px',opacity:'0.4'},"slow");
            div.animate({width:'100px',opacity:'0.8'},"slow");
        });
    });

    //隐藏和显示按钮
    $(document).ready(function(){
        $("#hide").click(function(){
            $("#hide1").hide();

        $("#show").click(function(){
            $("#hide1").show();
            });
        });
    });

    //JQuery中的DOM操作
    $(document).ready(function(){
        $("#btn1").click(function(){
            $("#test11").text("waht are you doing！");
        });

        $("#btn2").click(function(){
            $("#test22").html("<b>你这是干啥类？</b>");
        });

        $("#btn3").click(function(){
            $("#test33").val("RUNOOB");
        });
    });

    //这是一个回调函数
    $(document).ready(function(){
        $("#btn1").click(function(){
            $("#test1").text(function(i,origText){
                return "旧文本:" + origText + "新文本:Hello world!(index:" + i +")";

            })
        })
    })

    //这是一个拉起函数
    $(document).ready(function(){
        $("#flip").click(function(){
            $("#panel").slideUp("slow");
        });
    });