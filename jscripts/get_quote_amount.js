const selectQuote = document.getElementById("quote");
const quoteAmount = document.getElementById("quoteAmount");

let selectedAmount;
let quoteId;
selectQuote.addEventListener("change", function (e) {
  // // console.log(22, e.target.value);
  // // location.reload();
  // quoteAmount.value = e.target.value;
  // proc_cltinfpol();
});

function proc_cltinfpol(lform, pact, url) {
  vokay = true;
  if (vokay) {
    resp = true;
    if (pact == "getamount") {
      // const selectQuote = document.getElementById("quote");
      let quote = lform.quote[lform.quote.selectedIndex];
      const quoteId = quote.getAttribute("data-quote");
      const productType = quote.getAttribute("data-product-type");

      lform.action = `${url}&quoteId=${quoteId}&productType=${productType}`;
      lform.submit();
    }
    if (pact == "paystack") {
      // lform.preventDefault();
      lform.method = "post";
      lform.action = url;
      lform.submit();
      // payWithPaystack(lform);
      return;
      // postnewwin2(lform, "iestapayment.php", "", pact, "", "", "");

      // postnewwin1(lform,'iestasks_payment.php','','payform0',pact,'');
    }
  }
}

function payWithPaystack(form) {
  var paymentForm = document.getElementById("paymentForm");
  // paymentForm.addEventListener("submit", payWithPaystack, false);
  var handler = PaystackPop.setup({
    key: "pk_test_94421f169edbfc26726d6547a9975b182495f6fa", // Replace with your public key
    email: "dharmykoya38@gmail.com",
    amount: 500 * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
    currency: "NGN", // Use GHS for Ghana Cedis or USD for US Dollars
    firstname: "damilola",
    lastname: "adekoya",
    reference: "Q000234", // Replace with a reference you generated
    callback: function (response) {
      //this happens after the payment is completed successfully
      var reference = response.reference;
      alert("Payment complete! Reference: " + reference);
      // Make an AJAX call to your server with the reference to verify the transaction
    },
    onClose: function () {
      alert("Transaction was not completed, window closed.");
    },
  });
  handler.openIframe();
}
