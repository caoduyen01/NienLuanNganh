 <?php $current_url = base64_encode($_SERVER['REQUEST_URI']); ?>
 <form action="xulyadmin/themKH.php" method="post" onsubmit ="return checkinfo()" autocomplete="off">
  <table>
    <tr>
      <div align="center"><h1>Thông tin thành viên</h1></div>
    </tr>
    <tr>
      <td><label>Tài khoản:</label></td>
      <td><input class="form-control form-control-lg" type="text" name="username" id="username" onchange="checkuser()"></td>
    </tr>
    <tr id="rowus">
      <td ><span id="errus"></span></td>
    </tr>
    <tr>
      <td><label>Mật khẩu:</label></td>
      <td><input class="form-control form-control-lg" type="password" name="password" id="password" onchange="checkmk1()"></td>
    </tr>
    <tr id="rowpw">
      <td ><span id="errpw"></span></td>
    </tr>

     <tr>
      <td><label>Nhập Lại mật khẩu:</label></td>
      <td><input class="form-control form-control-lg" type="password" name="confirm" id="confirm" onchange="checkmk2()"></td>
    </tr>
    <tr id="rowcf">
      <td ><span id="errcf"></span></td>
    </tr>
    
     <tr>
      <td><label>Họ và tên:</label></td>
      <td><input class="form-control form-control-lg" type="text" name="fullname" id="fullname" onchange="checktk()"></td>
    </tr>
    <tr id="rowfn">
      <td ><span id="errfn"></span></td>
    </tr>
    <tr>
      <td><label>Mức tài khoản:</label></td>
      <td><select name="level">
          <option value="0">Người thường</option>
          <option value="1">Admin</option>
      </select></td>
    </tr>
     <tr>
      <td><label>email:</label></td>
      <td><input class="form-control form-control-lg" type="email" name="email" id="email" onchange="checktk()"></td>
    </tr>
    <tr id="rowus">
      <td ><span id="errus"></span></td>
    </tr>

    <tr>
      <td><label>Số điện thoại:</label></td>
      <td><input class="form-control form-control-lg" type="text" name="phone" id="phone" onchange="checkphone()"></td>
    </tr>
    <tr id="rowp">
      <td ><span id="errp"></span></td>
    </tr>
    <tr>
      <td><label>Địa chỉ</label></td>
      <td><textarea class="form-control form-control-lg" name="address" id="address" onchange="checkadress()"></textarea></td>
    </tr>
    <tr id="rowad">
      <td ><span id="errad"></span></td>
    </tr>
    <?php echo '<input type="hidden" name="return_url" value="'.$current_url.'" />'; ?>
    <td colspan="2"><div align="center">
        <input type="submit" name="add" value="Thêm mới">
    </div></td>
  </table>
</form> 
<script>
        var a,b,c,d;
        var regextk=/^[A-Za-z][A-Za-z0-9]{4,14}$/;
        var regexmk=/^[A-Za-z0-9]{6,15}$/;
        var regexphone=/^[0-9]{10,11}$/;
        function checkinfo()
        {
            a = checktk();
            b = checkmk1();
            c = checkmk2();
            d = checkphone();
            e = checkadress();

            if ( !a ||!c || !b || !d || !e) {
                return false;
            }
        }
         function checktk() {
            var user = document.getElementById('username').value;
            if (!regextk.test(user))
            {
                document.getElementById("rowus").style.visibility="visible";
                document.getElementById("errus").innerHTML="Tên đăng nhập phải từ 6 đến 15 ký tự, bắt đầu bằng chữ cái và không chứa ký tự đặc biệt";
                return false;
            }
            else
            {
                document.getElementById("rowus").style.visibility="collapse";
                document.getElementById("errus").innerHTML="";
                return true;
            }
        }
          function checkmk1() {
            var pass1 = document.getElementById('password').value;
            if (!regexmk.test(pass1))
            {
                document.getElementById('rowpw').style.visibility='visible';
                document.getElementById('errpw').innerHTML='Mật khẩu phải từ 6 đến 15 ký tự và không chứ ký tự đặc biệt';
                return false;
            }
            else
            {
                document.getElementById('rowpw').style.visibility='collapse';
                document.getElementById('errpw').innerHTML='';
                return true;
            }
        }
        function checkmk2() {
            var pass1 = document.getElementById('password').value;
            var pass2 = document.getElementById('confirm').value;
            if (pass1 != pass2)
            {
                document.getElementById('rowcf').style.visibility='visible';
                document.getElementById('errcf').innerHTML='Mật khẩu không khớp';
                return false;
            }
            else
            {
                document.getElementById('rowcf').style.visibility='collapse';
                document.getElementById('errcf').innerHTML='';
                return true;
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