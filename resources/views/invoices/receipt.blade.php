<!DOCTYPE html>
<html lang="en, id">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
      A Simple Invoice Template Responsive and clean with HTML CSS SCSS
    </title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/css/invoice.css" />
  </head>
  <body>


  <div style="display:flex;align-items:center;justify-content:center;">
    <input type="button" onclick="printDiv('printableArea')" value="Print Receipt" style="background:blue;color:white; padding: 10px; border: none;font-size:18px;;;"/>
  </div>
    <section class="wrapper-invoice" id="printableArea">
      <!-- switch mode rtl by adding class rtl on invoice class -->
      <div class="invoice">
        <div class="invoice-information">
          <p><b>Invoice #</b> : 12345</p>
          <p><b>Created Date </b>: {{$customer->updated_at}}</p>
          <p><b>Due Date</b> : {{$customer->created_at}}</p>
        </div>
        <!-- logo brand invoice -->
        <div class="invoice-logo-brand">
          <!-- <h2>Tampsh.</h2> -->
          <img src="./assets/image/tampsh.png" alt="" />
        </div>
        <!-- invoice head -->
        <div class="invoice-head">
          <div class="head client-info">
            <p>Tampsh, Inc.</p>
            <p>NPWP: 12.345.678.910.111213.1415</p>
            <p>Bondowoso, Jawa timur</p>
            <p>{{$customer->name}}</p>
          </div>
          <div class="head client-data">
            <p>-</p>
            <p>Virtual Switch</p>
            <p>+2349874646464</p>
            <p>Abuja, Federal Capital Territory (FCT)</p>
          </div>
        </div>
        @php $total = 0; @endphp
        <!-- invoice body-->
        <div class="invoice-body">
          <table class="table">
            <thead>
              <tr>
                <th>Item Description</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $item)
                @php $total += $item->subtotal; @endphp
                <tr>
                    <td>{{$item->name}}</td>
                    <td>NGN {{$item->subtotal}}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
          <div class="flex-table">
            <div class="flex-column"></div>
            <div class="flex-column">
              <table class="table-subtotal">
                <tbody>
                  <tr>
                    <td>Subtotal</td>
                    <td>NGN {{$total}}</td>
                  </tr>
                  <tr>
                    <td>PPN 10%</td>
                    <td>NGN.00</td>
                  </tr>
                  <tr>
                    <td>Credit</td>
                    <td>NGN.0</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- invoice total  -->
          <div class="invoice-total-amount">
            <p>Total : NGN {{$total}}</p>
          </div>
        </div>
        <!-- invoice footer -->
        <div class="invoice-footer">
          <p>Thankyou, happy shopping again</p>
        </div>
      </div>
    </section>
    <div class="copyright">
      <p>Created by ❤ Avera Faga David</p>
    </div>


<script type="text/javascript">

    function printDiv(divName) {
        var data=document.getElementById(divName).innerHTML;
        var myWindow = window.open('');
        myWindow.document.write('<html><head><title></title>');
        myWindow.document.write('<link rel="stylesheet" href="./assets/css/invoice.css" type="text/css" />');
        myWindow.document.write('</head><body >');
        myWindow.document.write(data);
        myWindow.document.write('</body></html>');
        myWindow.document.close(); // necessary for IE >= 10

        myWindow.onload=function(){ // necessary if the div contain images

            myWindow.focus(); // necessary for IE >= 10
            myWindow.print();
            myWindow.close();
        };
    }
</script>
  </body>
</html>
