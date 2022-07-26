<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TOP</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <script type="text/javascript" charset="UTF-8">
            function onAddFile(event) {
                var reader = new FileReader();
                var files = event.target.files;
                var image = document.getElementById("img_source");
                reader.onload = function (event) { 
                    image.onload = function (){
                        document.getElementById("msg").innerHTML =
                        image.width+"x" +image.height;        
                    }; 
                    image.onerror  = function (){           
                        alert('画像エラー');  
                    };
                    image.src = reader.result;       
                };
                reader.onerror = function (){  
                    alert('リーダーエラー');  
                }
                if (files[0]){    
                    reader.readAsDataURL(files[0]);
                }
            }
        </script>
    </head>
    <body>
        <form method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <div style="margin-bottom: 20px;">
                <input type="file" name="capture_img" accept="image/*" capture="environment"/>
            </div> --}}
            <div style="margin-bottom: 20px;">
                <label>画像を表示する</label>
                <input type="file" name="capture_img1" id="inputfile" accept="image/*" onchange="onAddFile(event);" placeholder="入力">
            </div>
            <div style="margin-bottom: 20px;">
                <label>ファイル選択のみ</label>
                <input type="file" name="capture_img2" accept="image/*" capture="environment"/>
            </div>
            <div>
                <button formaction="{{ route('upload') }}" style="margin-bottom: 20px;">送信（正常終了画面）</button>
                <button formaction="{{ route('error') }}">送信（エラー画面）</button>
            </div>
    </form> 
    <div id="msg"></div>
    <img id="img_source">
    </body>
</html>
