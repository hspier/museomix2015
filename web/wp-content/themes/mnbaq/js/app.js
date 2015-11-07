Foundation.global.namespace = '';
$(document).foundation();

$(document).ready(function() {	

	jsKeyboard.init("virtualKeyboard");


	if($("#btn-comments").length > 0) {
		$("#btn-comments").click(function(ev) {
			$("#comments_row").removeClass("hidden");
			ev.preventDefault();
			ev.stopPropagation();
			return false;
		})
	}
});