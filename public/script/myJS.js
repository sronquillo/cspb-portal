function getAnnouncements() {
    $.ajax({
        type: "GET",
        url: "/get/announcements",
        success: function (data) {
            $('#announcements') .empty();
            $.each(data, function (index,productTB) {
                $('#announcements').append('<option value="' + productTB.productID + '">' + productTB.prodName + '</option>');
            });
        }
    });
}
;