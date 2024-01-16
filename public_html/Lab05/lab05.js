$("document").ready(function() {
    $(".drag-image").draggable({
        containment: "#gamebox",
        cursor: "grab"
    });

    const original_top = $("#beeimage").offset().top;
    const original_left = $("#beeimage").offset().left;
    const original_width = $('#beeimage').width();
    const original_height = $('#beeimage').height();

    $("#beeimage").hover(function() {
        $(this).css({
            "position": "absolute",
        });
        $(this).animate({
            width: "100vw",
            height: "100vh",
            top: 0,
            left: 0,
        }, 1000);

        setTimeout(function() {
            $("#goback-btn").show().click(function() {
                $("#beeimage").animate({
                    top: original_top,
                    left: original_left,
                    width: original_width,
                    height: original_height,
                }, 1000, function() {
                    $("#goback-btn").hide();
                });
            });
        }, 1500);
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var downloadButton = document.querySelector("#downloadbutton button");
    var gamebox = document.getElementById("gamebox");
    
    downloadButton.addEventListener("click", function() {
        html2canvas(gamebox).then(function(canvas) {
            var imageDataURL = canvas.toDataURL("image/png");
            var downloadLink = document.createElement("a");
            downloadLink.href = imageDataURL;
          downloadLink.download = "mr_potato_head.png";
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);
        });
    });
});

