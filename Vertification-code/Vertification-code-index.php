<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verification_code</title>
    <script src="../../JQuery/jquery-3.6.1.min.js" ></script>

</head>

<body>
    <p>Verification:<input type="text" id="code-input" maxlength="4" />

    <img src="Vertification-code.php" id="verti-code" title="Change another code" align="absmiddle"></p>

    <p><input type="button" id="sumbit" value="Submit" /></p>


    <script>
        $(function(){
            //数字验证
            $("#verti-code").click(function(){

                $(this).attr("src",'Vertification-code.php?' + Math.random());

            });

            $("#sumbit").click(function(){

                var code = $("#code-input").val();

                $.post("code-processing.php?act=num",{code:code},function(data){

                    if(data==1){

                        alert("Correct!");

                    }else{

                        alert("Incorrect!");

                    }

                });

            });

        });

    </script>
</body>

</html>