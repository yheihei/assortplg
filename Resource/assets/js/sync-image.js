$(document).ready(function () {
    $('[name=assort1]').change(function() {
        // 選択されているvalue属性値を取り出す
        var val = $('[name=assort1]').val();
        console.log(val);
        // 選択されている表示文字列を取り出す
        var txt = $('[name=assort1] option:selected').text();
        console.log(txt);
        //$("#assort1").attr("src", val);
        $("#assort1").css("background-image", 'url('+val+')');
    });
    
    $('[name=assort2]').change(function() {
        // 選択されているvalue属性値を取り出す
        var val = $('[name=assort2]').val();
        console.log(val);
        // 選択されている表示文字列を取り出す
        var txt = $('[name=assort2] option:selected').text();
        console.log(txt);
        //$("#assort2").attr("src", val);
        $("#assort2").css("background-image", 'url('+val+')');
    });
    
    $('[name=assort3]').change(function() {
        // 選択されているvalue属性値を取り出す
        var val = $('[name=assort3]').val();
        console.log(val);
        // 選択されている表示文字列を取り出す
        var txt = $('[name=assort3] option:selected').text();
        console.log(txt);
        //$("#assort3").attr("src", val);
        $("#assort3").css("background-image", 'url('+val+')');
    });
    
    $('[name=assort4]').change(function() {
        // 選択されているvalue属性値を取り出す
        var val = $('[name=assort4]').val();
        console.log(val);
        // 選択されている表示文字列を取り出す
        var txt = $('[name=assort4] option:selected').text();
        console.log(txt);
        //$("#assort4").attr("src", val);
        $("#assort4").css("background-image", 'url('+val+')');
    });
    
    $('[name=assort5]').change(function() {
        // 選択されているvalue属性値を取り出す
        var val = $('[name=assort5]').val();
        console.log(val);
        // 選択されている表示文字列を取り出す
        var txt = $('[name=assort5] option:selected').text();
        console.log(txt);
        //$("#assort5").attr("src", val);
        $("#assort5").css("background-image", 'url('+val+')');
    });
    
    $('[name=assort6]').change(function() {
        // 選択されているvalue属性値を取り出す
        var val = $('[name=assort6]').val();
        console.log(val);
        // 選択されている表示文字列を取り出す
        var txt = $('[name=assort6] option:selected').text();
        console.log(txt);
        //$("#assort6").attr("src", val);
        $("#assort6").css("background-image", 'url('+val+')');
    });
});
