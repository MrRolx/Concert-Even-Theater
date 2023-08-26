<!DOCTYPE html>
<html>
<head>
  <title>Concert Booking Form</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <style>
      body {
  background-color: #333;
  color: #fff;
  font-family: Arial, sans-serif;
}

.container {
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  background-color: #222;
  border-radius: 10px;
  text-align: center;
}

h1 {
  margin-top: 0;
}

.form-group {
  margin-bottom: 20px;
  text-align: left;
}

label {
  display: block;
  margin-bottom: 5px;
}

input,
select {
  width: 96%;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #fff;
  color: #333;
}

button {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border: none;
  border-radius: 5px;
  background-color: #007bff;
  color: #fff;
  cursor: pointer;
}

button:hover {
  background-color: #0069d9;
}
/* CSS styles */

    /* ... existing CSS styles ... */

    #invoice {
      display: none;
      margin-top: 20px;
      padding: 20px;
      background-color: #222;
      border-radius: 10px;
      text-align: left;
    }

    #invoice h2 {
      margin-top: 0;
    }

    #invoice table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    #invoice th, #invoice td {
      padding: 5px;
      border: 1px solid #ccc;
    }

    #invoice th {
      background-color: grey;
    }

    #invoice tr:last-child td {
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Concert Booking Form</h1>
    <form action="submit_booking.php" method="POST" onsubmit="return calculatePrice()">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>
      </div>
      <div class="form-group">
        <label for="ticket-type">Ticket Type:</label>
        <select id="ticket-type" name="ticket-type" required>
          <option value="VIP">VIP</option>
          <option value="Standard">Standard</option>
        </select>
      </div>
      <div class="form-group">
        <label for="ticket-count">Tickets Count:</label>
        <input type="number" id="ticket-count" name="ticket-count" min="1" required>
      </div>
      <div class="form-group">
        <label for="payment-method">Payment Method:</label>
        <select id="payment-method" name="payment-method" required>
          <option value="Visa">Visa</option>
          <option value="MasterCard">MasterCard</option>
        </select>
      </div>
      <div class="form-group">
        <label for="card-number">Card Number:</label>
        <input type="text" id="card-number" name="card-number"  pattern="\d{16}" required>
      </div>
      <div class="form-group">
        <label for="expiry-date">Expiry Date:</label>
        <input type="text" id="expiry-date" name="expiry-date"  required>
      </div>
      <div class="form-group">
        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" pattern="\d{3}" required>
      </div>
      <button type="submit">Create Invoice</button>
      

    <div id="invoice">
  
      <table>
        <thead>
        <tr>
          <th>Ticket Type</th>
          <th>Ticket Count</th>
          <th>Unit Price</th>
          <th>Total Price</th>
        </tr>
        </thead>
        <tbody id="invoice-details"></tbody>
      </table>
      <div>
      <button onclick="downloadInvoice()">Download Invoice</button>
    </div>
    </div>
  </form>

  <script>
    // JavaScript function to calculate ticket price and generate invoice
    function calculatePrice() {
      var ticketType = document.getElementById('ticket-type').value;
      var ticketCount = document.getElementById('ticket-count').value;

      var unitPrice = 0;
      if (ticketType === 'VIP') {
        unitPrice = 100;
      } else if (ticketType === 'Standard') {
        unitPrice = 50;
      }

      var totalPrice = unitPrice * ticketCount;

      // Set invoice values
     document.getElementById('invoice-details').innerHTML = `
          <tr>
            <td>${ticketType}</td>
            <td>${ticketCount}</td>
            <td>$${unitPrice}</td>
            <td>$${totalPrice}</td>
          </tr>
        `;
      // Show the invoice
      document.getElementById('invoice').style.display = 'block';

      return false; // Prevent form submission
    }
   
      function downloadInvoice() {
        var tableContent = document.getElementById('invoice').innerHTML;
        var invoiceHtml = `
          <html>
            <head>
              <style>
                /* Styles for the invoice table */
                table {
                  width: 100%;
                  border-collapse: collapse;
                  margin-top: 10px;
                  background-color:Yellow
                }
                th,
                td {
                  padding: 5px;
                  border: 1px solid #ccc;
                }
                th {
                  background-color: grey;
                }
                tr:last-child td {
                  font-weight: bold;
                }
              </style>
            </head>
            <body style="background-image: url('concert.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: 100% 100%;">
              <h2 style="color:white;">Invoice</h2>
              <table>
                ${tableContent}
              </table>
            </body>
          </html>
        `;

        // Convert the invoice HTML to PDF
        var element = document.createElement('a');
        element.setAttribute('href', 'data:text/html;charset=utf-8,' + encodeURIComponent(invoiceHtml));
        element.setAttribute('download','invoice.html');
        element.style.display = 'none';
        document.body.appendChild(element);
        element.click();
        document.body.removeChild(element);

         // Hide the "Download Invoice" button
          // document.getElementById('invoice-download-button').style.display = 'none';

      }
  </script>
  <form>

    <button type="submit" style="background-color: green;">Book Now</button>
  </form>
  </div>
</body>
</html>
