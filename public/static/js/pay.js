$('input[name="money"]').click(function(){
	$('input[name="money"]').parent().attr('class','b');
    $(this).parent().attr('class','a');
    var x = $(this).siblings(".la").children("span").text();
    var y = $(this).siblings(".la").children("b").text();
    $(".jie ul li:first-child").text(x);
    $(".jie ul li:first-child").next().children("span").text(y);
})
$('input[name="pay"]').click(function(){
	if ($(this).attr("id") == "p1") {
		$('input[name="pay"]').parent().attr('class','b');
    	$(this).parent().attr('class','c');
	}
	if ($(this).attr("id") == "p2") {
		$('input[name="pay"]').parent().attr('class','b');
    	$(this).parent().attr('class','d');
	}
})