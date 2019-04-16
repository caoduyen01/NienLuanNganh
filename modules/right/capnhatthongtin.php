<div class="updateuser">
  <button id="myBtn" class="btn btn-info">Đổi Mật khẩu</button>
  <form action="/ban_hang/xuly/xulycapnhatthongtin.php" method="post" onsubmit ="return checkinfo()" autocomplete="off">
    <?php 
    $name = $_SESSION['name'];
    $sqlinfoCus= "select * from customer,account where account.id = customer.idaccount and username='$name'"; 
    $cus = connectTakeQuery($sqlinfoCus);
    $infocus = $cus->fetch_assoc();
    ?>
    <table>
      <tr>
        <div align="center"><h1>Cập nhật thông tin Người Dùng</h1></div>
      </tr>
       <tr>
        <td><label>Họ và tên:</label></td>
        <td><input type="text" name="fullname" class="form-control" id="fullname" onchange="checkFullName()" value="<?php echo $infocus['fullname'];?>"></td>
      </tr>
      <tr id="rowfn">
        <td></td>
        <td ><span id="errfn"></span></td>
      </tr>

       <tr>
        <td><label>email:</label></td>
        <td><input type="email" name="email" class="form-control" id="email" onchange="checkEmail()" value="<?php echo $infocus['email'];?>"></td>
      </tr>
      <tr id="rowem">
        <td></td>
        <td ><span id="errem"></span></td>
      </tr>

      <tr>
        <td><label>Số điện thoại:</label></td>
        <td><input type="text" class="form-control" name="phone" id="phone" onchange="checkphone()" value="<?php echo $infocus['phone'];?>"></td>
      </tr>
      <tr id="rowp">
        <td></td>
        <td ><span id="errp"></span></td>
      </tr>
      <tr>
        <td><label>Địa chỉ</label></td>
        <td><textarea name="address" class="form-control" id="address" onchange="checkadress()" rows="4" cols="30" style="resize: none;" wrap><?php echo $infocus['address'];?></textarea></td>
      </tr>
      <tr id="rowad">
        <td></td>
        <td ><span id="errad"></span></td>
      </tr>
      <tr>
      <td colspan="2"><div align="center"><input type="submit"  class="btn btn-info" name="submit" value="Cập nhật"></div></td></tr>
    </table>
  </form>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">
  
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <form id="cpass" action="/ban_hang/xuly/xulycapnhatthongtin.php" method="post" onsubmit="return ValidatePassword()" autocomplete="off">
     
      <table>
          <tr>
            <td><label>Mật khẩu cũ :</label></td>
            <td><input type="password" class="form-control" name="passwordold" id="passwordold" onchange="ajaxCheckPass(this.value)"></td>
          </tr>
          <tr id="rowpwo" class="error">
            <td></td>
            <td ><span id="errpwo" style="color: red;"></span></td>
          </tr>
          <tr>
            <td><label>Mật khẩu Mới :</label></td>
            <td><input type="password" class="form-control" name="password" id="password" onchange="checkmk1()"></td>
          </tr>
          <tr id="rowpw" class="error">
            <td></td>
            <td ><span id="errpw" style="color: red;" ></span></td>
          </tr>
           <tr>
            <td><label>Nhập Lại mật khẩu:</label></td>
            <td><input type="password" class="form-control" name="confirm" id="confirm" onchange="checkmk2()"></td>
          </tr>
          <tr id="rowcf" class="error">
            <td></td>
            <td ><span id="errcf" style="color: red;"></span></td>
          </tr>
          <tr><td colspan="2" align="center" style="padding-top: 20px;"><input type="submit" class="btn btn-info" name="changepass" value="Đổi mật khẩu"></td>
          </tr>
      </table>
    </form>
    
  </div>

</div>
<?php  
    

     ?>
<script type="text/javascript">
     var regexphone=/^[0-9]{10,11}$/;
     var  b,c,d,e;
        function checkinfo()
        {   b = checkFullName();
            c = checkEmail();
            d = checkphone();
            e = checkadress();

            if ( !b || !c || !d || !e) {
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
            if (address ==  '')
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
        function checkFullName() {
            var fullname = document.getElementById('fullname').value;
            if (fullname ==  '')
            {
                document.getElementById('rowfn').style.visibility='visible';
                document.getElementById('errfn').innerHTML='vui lòng nhập họ tên';
                return false;
            }
            else
            {
                document.getElementById('rowfn').style.visibility='collapse';
                document.getElementById('errfn').innerHTML='';
                return true;
            }
        }
        function checkEmail() {
            var email = document.getElementById('email').value;
            if (email ==  '')
            {
                document.getElementById('rowem').style.visibility='visible';
                document.getElementById('errem').innerHTML='vui lòng nhập email';
                return false;
            }
            else
            {
                document.getElementById('rowem').style.visibility='collapse';
                document.getElementById('errem').innerHTML='';
                return true;
            }
        }
        var a,e;
        var regexmk=/^[A-Za-z0-9]{6,15}$/;
        function ValidatePassword(){
            a = checkmk1();
            e = checkmk2();
            
            if ( !a || !e) {
                return false;
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
        function ajaxCheckPass(pass){
            var xhttp = new XMLHttpRequest();
             xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                var check =this.responseText;
                if (check == 'sai mật khẩu')
                  {
                      document.getElementById('rowpwo').style.visibility='visible';
                      document.getElementById('errpwo').innerHTML='Mật khẩu không đúng';
                      return false;
                  }
                else
                  {
                      document.getElementById('rowpwo').style.visibility='collapse';
                      document.getElementById('errpwo').innerHTML='';
                      return true;
                  }
                       }
              };              
            xhttp.open("POST", "/ban_hang/modules/right/AjaxKTPass.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("pass="+pass);
        }
</script>


<script type="text/javascript">
    var modal = document.getElementById('myModal');
var btnChangePass = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
btnChangePass.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

  </script>