$(document).ready(function () {

    $("div.row").change(function () {
        sum();
        multi();
        checkPaymentCondition();

    });

    function sum() {
        var netWorth = 0;

        for (var j = 0; j < 50; j++) {
            var quantity = $("#invoiceformbundle_invoice_positions_" + j + "_quantity").val();
            $("#invoiceformbundle_invoice_positions_" + j + "_quantity").on("change", function () {
                $(this).val($(this).val().replace(/,/g, '.'));
            });
            var price = $("#invoiceformbundle_invoice_positions_" + j + "_priceNet").val();
            $("#invoiceformbundle_invoice_positions_" + j + "_priceNet").on("change", function () {
                $(this).val($(this).val().replace(/,/g, '.'));
            });

            var worth = parseFloat(quantity) * parseFloat(price);

            if (!isNaN(worth)) {
                netWorth += worth;
                $("#invoiceformbundle_invoice_positions_" + j + "_valueNet").val(worth.toFixed(2));
            }
        }
    }

    function multi() {

        var totalGross = 0;

        for (var k = 0; k < 50; k++) {
            var valueNet = $("#invoiceformbundle_invoice_positions_" + k + "_valueNet").val();
            var rateVAT = $("#invoiceformbundle_invoice_positions_" + k + "_vat").val();

            var vat = (rateVAT > 0 && !isNaN(rateVAT) ? ((parseFloat(valueNet) * parseFloat(rateVAT)) / 100) : 0);
            var gross = parseFloat(valueNet) + vat;

            if (!isNaN(vat)) {

                $("#invoiceformbundle_invoice_positions_" + k + "_valueGross").val(gross.toFixed(2));

            }
            if (!isNaN(vat) && ($("#invoiceformbundle_invoice_positions_" + k + "_valueGross").val() > 0)) {
                totalGross += parseFloat(gross);

                $("#invoiceformbundle_invoice_totalGross").on("change", function () {
                    $(this).val($(this).val().replace(/,/g, '.'));
                }).val(totalGross.toFixed(2));

            }
        }
    }
    function checkPaymentCondition() {
        if ($("#invoiceformbundle_invoice_paymentCondition").val() == 'przelew') {
            $("#iban").show();
        } else {
            $("#iban").hide();
        }

    }

    $("#invoiceformbundle_invoice_issueDate").on("change", function () {

        var date = new Date($("#invoiceformbundle_invoice_issueDate").val());

        if (!isNaN(date.getTime())) {
            date.setDate(date.getDate() + 14); //adding 14 days

            $("#invoiceformbundle_invoice_dueDate").val(date.toInputFormat());
        }

    });

    Date.prototype.toInputFormat = function () {
        var yyyy = this.getFullYear().toString();
        var mm = (this.getMonth() + 1).toString(); // getMonth() is zero-based
        var dd = this.getDate().toString();
        return yyyy + "-" + (mm[1] ? mm : "0" + mm[0]) + "-" + (dd[1] ? dd : "0" + dd[0]); // padding
    };

});