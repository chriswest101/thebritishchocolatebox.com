$(function() {
    $("input[name='box_size']").change(function(){
        $(".screen").hide();
        $('.section-heading-spacer').removeClass("selected");
        $("#"+$(this).val()).addClass("selected");
        
        ajaxBox($(this).val());
    });
});

function ajaxBox(boxID) {
    $.ajax({
        url: "ajax.php",
        cache: false,
        type: "post",
        data: { id:"ajaxBox", boxid:boxID },
        success: function(data){
            data = jQuery.parseJSON(data);
            console.log(data)
            $("#boxID").val(data.boxID);
            $("#boxLimit").val(data.boxLimit);
            $("#boxSize").val(data.boxSize);
        }
    });
}