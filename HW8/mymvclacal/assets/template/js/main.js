// $('#mynumber').on('input', function(){
//     console.log('asd');
//     $.ajax({
//         url: 'get.php',
//         data: {
//             id: $('#mynumber').val()
//         },
//         error:function (xhr, ajaxOptions, thrownError){
//
//             $('.result').html(xhr.responseText);
//         }
//     }).done(function(data){
//         var parsed = JSON.parse(data);
//         $('.result').html(makeRow(data));
//     });
// })
//
// function makeRow(data){
//     return "<tr><td>"+data.id+"</td><td>"+data.name+"</td>";
// }
$('#btn_AllGoods').on('click', function () {
    console.log('asd');
    $.ajax({
        url: 'http://mymvclacal/api/v1/get/goods',
        method: "GET",
        error: function (xhr, ajaxOptions, thrownError) {
            $('.result').html(xhr.responseText);
        }
    }).done(function (data) {
        // var parsed = JSON.parse(data);
        // $('.result').html(makeRow(data));
        $('.result').html(data);
    }).fail(function (data) {
        $('.result').html(data);
        console.log('fail')
    });
});
$('#btn_IdFilter').on('click', function () {
    var URL = 'http://mymvclacal/api/v1/get/goods/'+$('#IdFilter').val();
    console.log(URL);
    $.ajax({
        url: URL,
        method: "GET"
       ,
        error: function (xhr, ajaxOptions, thrownError) {
            $('.result').html(xhr.responseText);
        }
    }).done(function (data) {
        // var parsed = JSON.parse(data);
        // $('.result').html(makeRow(data));
        $('.result').html(data);
    }).fail(function (data) {
        $('.result').html(data);
        console.log('fail')
    });
});
$('#btn_IdEdit').on('click', function () {
    var URL = 'http://mymvclacal/api/v1/get/goods/'+$('#IdEdit').val()+','+$('#EditName').val();
    console.log(URL);
    $.ajax({
        url: URL,
        method: "PUT"
        ,
        error: function (xhr, ajaxOptions, thrownError) {
            $('.result').html(xhr.responseText);
        }
    }).done(function (data) {
        // var parsed = JSON.parse(data);
        // $('.result').html(makeRow(data));
        $('.result').html(data);
    }).fail(function (data) {
        $('.result').html(data);
        console.log('fail')
    });
});
$('#btn_IdDelete').on('click', function () {
    var URL = 'http://mymvclacal/api/v1/get/goods/'+$('#IdDelete').val();
    console.log(URL);
    $.ajax({
        url: URL,
        method: "DELETE"
        ,
        error: function (xhr, ajaxOptions, thrownError) {
            $('.result').html(xhr.responseText);
        }
    }).done(function (data) {
        // var parsed = JSON.parse(data);
        // $('.result').html(makeRow(data));
        $('.result').html(data);
    }).fail(function (data) {
        $('.result').html(data);
        console.log('fail')
    });
});
$('#btn_NewGood').on('click', function () {
    var URL = 'http://mymvclacal/api/v1/get/goods/'+$('#NewName').val()+','+$('#NewCategory').val()+','+$('#NewAmount').val();
    console.log(URL);
    $.ajax({
        url: URL,
        method: "POST"
        ,
        error: function (xhr, ajaxOptions, thrownError) {
            $('.result').html(xhr.responseText);
        }
    }).done(function (data) {
        // var parsed = JSON.parse(data);
        // $('.result').html(makeRow(data));
        $('.result').html(data);
    }).fail(function (data) {
        $('.result').html(data);
        console.log('fail')
    });
});

