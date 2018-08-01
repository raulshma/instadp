$("#fPic").submit(function (e) {
    $('.loading').show();
    e.preventDefault();
    var name = $("#name").val();
    $.ajax({
        type: 'post',
        url: 'data.php',
        data: {
            uname: name
        },
        success: function (data) {
            $('.loading').hide();
            $('#response').fadeIn().html(data)
        }
    })
});

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}