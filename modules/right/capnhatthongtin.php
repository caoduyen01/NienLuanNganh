<div class="updateuser">
  <form action="/ban_hang/xuly/xulycapnhatthongtin.php" method="post" onsubmit ="return checkinfo()">
    <table>
      <tr>
        <div align="center"><h1>Cập nhật thông tin Người Dùng</h1></div>
      </tr>
       <tr>
        <td><label>Họ và tên:</label></td>
        <td><input type="text" name="fullname" id="fullname" onchange="checktk()"></td>
      </tr>
      <tr id="rowfn">
        <td ><span id="errfn"></span></td>
      </tr>

       <tr>
        <td><label>email:</label></td>
        <td><input type="email" name="email" id="email" onchange="checktk()"></td>
      </tr>
      <tr id="rowus">
        <td ><span id="errus"></span></td>
      </tr>

      <tr>
        <td><label>Số điện thoại:</label></td>
        <td><input type="text" name="phone" id="phone" onchange="checkphone()"></td>
      </tr>
      <tr id="rowp">
        <td ><span id="errp"></span></td>
      </tr>
      <tr>
        <td><label>Địa chỉ</label></td>
        <td><textarea name="address" id="address" onchange="checkadress()"></textarea></td>
      </tr>
      <tr id="rowad">
        <td ><span id="errad"></span></td>
      </tr>
      <td><div align=""><input type="submit" name="submit"></div></td>
    </table>
  </form>
</div>

<script type="text/javascript">
     var regexphone=/^[0-9]{10,11}$/;
        function checkinfo()
        {
            d = checkphone();
            e = checkadress();

            if (  !d || !e) {
                return false;
            }
        }
         function checkphone() {
            var phonenumber = document.getElementById('phone').value;
            if (!regexphone.test(phonenumber))
            { 
                document.getElementById('rowp').style.visibility='visible';
                document.getElementById('errp').innerHTML='Nhập chính xác số điện thoại';
                return false;
            }
            else
            {
                document.getElementById('rowp').style.visibility='collapse';
                document.getElementById('errp').innerHTML='';
                return true;
            }
        }
        function checkadress() {
            var address = document.getElementById('address').value;
            if (address ===  '')
            {
                document.getElementById('rowad').style.visibility='visible';
                document.getElementById('errad').innerHTML='vui lòng nhập địa chỉ';
                return false;
            }
            else
            {
                document.getElementById('rowad').style.visibility='collapse';
                document.getElementById('errad').innerHTML='';
                return true;
            }
        }
</script>