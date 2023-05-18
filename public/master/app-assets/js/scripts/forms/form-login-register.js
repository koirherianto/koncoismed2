$(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") === "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

$("#username").on({
    keydown: function(e) {
        if (e.which === 32)
            return true;
    },
    keyup: function(){
        this.value = this.value.toLowerCase();
    },
    change: function() {
        this.value = this.value.replace(/\s/g, "_");

    }
});
