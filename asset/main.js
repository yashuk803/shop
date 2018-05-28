var page ={
    init:function () {
        var self = this;
        $(".burger").on("click", function () {
            if($(".mainMenu ul").css("display") != 'none'){
                $(".mainMenu ul").slideUp("slow")}
            else{
                $(".mainMenu ul").slideDown();
            }
        });


        $('.removeItem').click(function () {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            return false;
        });
        $('.addItem').click(function () {
            var $input = $(this).parent().find('input');
            $input.val(parseInt($input.val()) + 1);
            $input.change();
            return false;
        });
        document.getElementById('file').addEventListener('change', self.handleFileSelect, false);
      

   
    },
    handleFileSelect: function(evt) {
    var file = evt.target.files; // FileList object
    var f = file[0];
    // Only process image files.
    if (!f.type.match('image.*')) {
        alert("Image only please....");
    }
    var reader = new FileReader();
    // Closure to capture the file information.
    reader.onload = (function(theFile) {
        return function(e) {
            // Render thumbnail.
           document.getElementById('addImages').setAttribute("src", e.target.result);
        };
    })(f);
    // Read in the image file as a data URL.
    reader.readAsDataURL(f);
}
   
}


window.addEventListener("load", function () {
    page.init();
});