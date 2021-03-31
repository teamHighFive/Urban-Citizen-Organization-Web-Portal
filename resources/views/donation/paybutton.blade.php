<div id="paypal-button"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'ATAnP3OBcnytibnmQfFNblYjn5EHcnZtJiNRpmUXeIqP96z299aks3Jdz0zxa-C7VeUKBNvp2NDmMm7j',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,
    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        redirect_urls:{
          return_url:'http://localhost:8000/donation'
        },
        transactions: [{
          amount: {
            total: '10',
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.redirect();
    }
  }, '#paypal-button');

</script>