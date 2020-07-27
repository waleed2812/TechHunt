$(document).ready(function () {

    // Account Settings Form
    $("#formaccount").submit(function (e) {

        if ($("#fname").val().match(/[^A-Za-z\s]/g) !== null)
        {

            $("#fname").addClass("border-danger");
            $("#fname").siblings("label").append(
                '<span style="color:red"> (Only Alphabets)</span>');
            return false;
        }

        if ($("#lname").val().match(/[^A-Za-z\s]/g) !== null)
        {
            $("#lname").addClass("border-danger");
            $("#lname").siblings("label").append(
                '<span style="color:red"> (Only Alphabets)</span>');
            return false;
        }

    })

    $("input").keyup(function () {
        $("#fname").removeClass("border-danger");
        $("#fname").siblings("label").children('span').remove();
        $("#lname").removeClass("border-danger");
        $("#lname").siblings("label").children('span').remove();

    })
    // Cart Remove
    $("button").click(function () {

        if ($( this ).html() === "See Details")
            alert(this.id);

        if ($( this ).html() === "Remove From Cart")
        {
            $cartDiv = $("#cart div");
            $divToRm = $( this ).parent().parent()[0];

            for ($i = 1 ; $cartDiv[$i] ; $i++)
            {
                if ($cartDiv[$i] === $divToRm)
                {
                    $divToRm.remove();
                    break;
                }
            }
            calprice();
        }
        // Remove from Wishlist
        if ($( this ).html() === "Remove From Wishlist")
        {
            $cartDiv = $("#wishlist div");
            $divToRm = $( this ).parent().parent()[0];

            for ($i = 1 ; $cartDiv[$i] ; $i++)
            {
                if ($cartDiv[$i] === $divToRm)
                {
                    $divToRm.remove();
                    break;
                }
            }
        }


    })

    function cartload() {
        calprice();
    }
    function calprice() {

        var h2Tags =$("#cart h2");
        $sum = 0;
        for ($i = 0 ; h2Tags[$i] ; $i++)
            $sum += parseFloat(h2Tags[$i].innerHTML.replace(/[^0-9]/g,""));

        $("#total_price").html("Total: "+$sum);
    }

})