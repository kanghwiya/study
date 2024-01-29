$('.hello').html('바보').css('color', 'red');

$('.hello2').html('제이쿼리 며칠만에 익숙해질 수 있을까?');

$('#clickBtn').css({'borderradius': '20px', 'color': 'red', 'border': '0', 'background-color': 'transparent'});

$('#ajax').click(function(){
    // AJAX 요청 보내기
    $.ajax({
        url: '/url', // 데이터를 가져올 URL
        type: 'POST', // GET 요청
        dataType: 'json', // 예상되는 데이터 형식
        success: function(data){
            // 성공적으로 데이터를 받았을 때 실행할 코드
            console.log(data);
            // 여기서 데이터를 처리하거나 화면에 표시할 수 있습니다.
        },
        error: function(xhr, status, error){
            // 오류 발생 시 실행할 코드
            console.error(xhr.responseText);
        }
    });
});