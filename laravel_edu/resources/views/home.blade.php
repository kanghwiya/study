<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    <h1>동글동글</h1>
    <h1 style="color: red">꿍실꿍실</h1>

    <br>
    <br>
    <form action="/home" method="post">
        @csrf
        <button type="submit">POST</button>
    </form>

    <form action="/home" method="POST">
        @csrf
        @method('PUT')<!-- 대문자 -->
        <input type="hidden" name="myMethod" value="PUT"> <!-- 이후 php에서 put으로 인식하도록 만들어 줘야함 -->
        <button type="submit">PUT</button>
        
        <br>

    <form action="/home" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit"> delete </button>
    </form>
    </form>
</body>
</html>