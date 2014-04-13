$(document).ready(function () {
	$("button#edit_ratings_btn").click(function() {
		$("div#current_ratings_div").attr("style", "display: none");
		$("div#edit_ratings_div").attr("style", "display: block");
	});

	$("button#cancel_btn").click(function() {
		$("div#current_ratings_div").attr("style", "display: block");
		$("div#edit_ratings_div").attr("style", "display: none");
	});
});