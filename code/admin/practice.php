<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script>
    function sum()
    {
      var bp1=parseInt(document.getElementById('pp1').value);
      var bq1=parseInt(document.getElementById('qq1').value);
       var total1=parseInt(bp1)*parseInt(bq1);
       document.getElementById('ttt1').value=total1;
    }

    function sum2()
    {
      var total1=parseInt(document.getElementById('ttt1').value);
      var tx=parseInt(document.getElementById('taxprice1').value);
      var total2=(parseInt(total1)*(parseFloat(tx)/100))+parseInt(total1);
      document.getElementById('ttt2').value=total2;
    }

     function sum3()
     {
      var total2=parseFloat(document.getElementById('ttt2').value);
      var dsc=parseInt(document.getElementById('discount').value);
      var t4=(parseFloat(dsc)/100)*parseFloat(total2);
      var total3=parseFloat(total2)-parseFloat(t4);
      document.getElementById('ttt3').value=total3;
     }

      function sum4()
      {
        var total3=parseFloat(document.getElementById('ttt3').value);
        var tpaid=parseFloat(document.getElementById('paidamount').value);
        var balance=parseFloat(total3)-parseFloat(tpaid);

        document.getElementById('ttt4').value=balance;
      }
  </script>
  







</head>
<body>
  <br><br><center>
        <form action="/action_page.php">
          <div class="row">
  <div class="form-group">
    <label for="email" style="margin-right:650px">Price(per Piece):</label>
    <input type="text" id="pp1" class="form-control" style="width: 50%">
  </div>
  <div class="form-group">
    <label for="pwd" style="margin-right:650px">Quantity:</label>
    <input type="text" onkeyup="sum()" class="form-control" id="qq1" style="width: 50%">
  </div>

   <div class="form-group">
    <label for="pwd" style="margin-right:650px">Total Price:</label>
    <input type="text" class="form-control" id="ttt1" readonly="readonly" style="width: 50%">
  </div>
</div>
       <div class="row">
            <div class="form-group">
    <label for="pwd" style="margin-right:650px">Tax:</label>
    <input type="text"  class="form-control" id="taxprice1" onkeyup="sum2()" style="width: 50%">
  </div>

        <div class="form-group">
    <label for="pwd" style="margin-right:650px">Total:</label>
    <input type="text" class="form-control" id="ttt2" readonly="readonly" style="width: 50%" >
  </div>
        </div>

        <div class="row">
           <div class="form-group">
    <label for="pwd" style="margin-right:650px">Discount:</label>
    <input type="text" onkeyup="sum3()"  class="form-control" id="discount" style="width: 50%">
  </div>
          <div class="form-group">
    <label for="pwd" style="margin-right:650px">Total Amount:</label>
    <input type="text"  class="form-control" id="ttt3" readonly="readonly" style="width: 50%">
  </div>
        </div>

         <div class="row">
           <div class="form-group">
    <label for="pwd" style="margin-right:650px">paid:</label>
    <input type="text" onkeyup="sum4()"  class="form-control" id="paidamount" style="width: 50%">
  </div>
          <div class="form-group">
    <label for="pwd" style="margin-right:650px">Balance:</label>
    <input type="text"  class="form-control" id="ttt4" readonly="readonly" style="width: 50%">
  </div>
        </div>
 
</form>
</center>
</body>
</html>