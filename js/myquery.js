$(document).ready(function () {

    $("#formaccount").submit(function (e) {
        $fname = $("#fname").val();
        $lname = $("#lname").val();

        if ( !($fname.match(/[a-zA-Z]/g)) )
        {
            $("#fname").addClass("border-danger");
            return false;
        }

        if ( !($lname.match(/[a-zA-Z]/g)) )
        {
            $("#lname").addClass("border-danger");
            return false;
        }


    })
    $("input").click(function () {
        $("#fname").removeClass("border-danger");

    })
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