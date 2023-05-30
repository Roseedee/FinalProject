$(document).ready(function(){
    $("#cancel1").click(function(){
        $("#form-name").toggle();
        $("#name").toggle();
        if($(this).text() == "ยกเลิก") {
            $(this).text("เปลี่ยน");
        }else {
            $(this).text("ยกเลิก");
        }
    });
});

$(document).ready(function(){
    $("#cancel2").click(function(){
        $("#form-email").toggle();
        $("#email").toggle();
        if($(this).text() == "ยกเลิก") {
            $(this).text("เปลี่ยน");
        }else {
            $(this).text("ยกเลิก");
        }
    });
});
$(document).ready(function(){
    $("#cancel3").click(function(){
        $("#form-tel").toggle();
        $("#tel").toggle();
        if($(this).text() == "ยกเลิก") {
            $(this).text("เปลี่ยน");
        }else {
            $(this).text("ยกเลิก");
        }
    });
});

function checkBox_change(index) {
    let btn_submit1 = document.getElementById("submit-btn1").style;
    let btn_submit2 = document.getElementById("submit-btn2").style;
    if(index == 1) {
        btn_submit1.display = "block";
    }else if(index == 2) {
        btn_submit2.display = "block";
    }
}