<div>
    <?php $current_url = base64_encode($_SERVER['REQUEST_URI']); ?>
	<form action="xulyadmin/xulysp.php" method="post" enctype="multipart/form-data" onsubmit="return checkinfo()">
		<table>
			<tr>
				<td><label>Mã sản phẩm: </label></td>
				<td><input type="text" name="series" id="series" onchange="checkseries()"></td>
			</tr>
			<tr id="rowseries">
				<td></td>
	        	<td ><span id="errseries"></span></td>
	      	</tr>

			<tr>
				<td><label>Tên sản phẩm: </label></td>
				<td><input type="text" name="name" id="name" onchange="checkname()"></td>
			</tr>
			<tr id="rowname">
				<td></td>
	        	<td ><span id="errname"></span></td>
	      	</tr>

			<tr>
				<td><label>Hình ảnh: </label></td>
				<td><input type="file" name="picture" id="picture" onchange="checkpicture()"></td>
			</tr>
			<tr id="rowpicture">
				<td></td>
        		<td ><span id="errpicture" ></span></td>
      		</tr>

			<tr>
				<td><label>giá sản phẩm: </label></td>
				<td><input type="text" name="price" id="price" onchange="checkprice()"></td>
			</tr>
			<tr id="rowprice">
				<td></td>
        		<td ><span id="errprice"></span></td>
      		</tr>

			<tr>
				<td><label>Loại sản phẩm: </label></td>
				<td><input type="text" name="type" id="type" onchange="checktype()"></td>
			</tr>
			<tr id="rowtype">
				<td></td>
        		<td ><span id="errtype"></span></td>
      		</tr>

			<tr>
				<td><label>Xuất xứ: </label></td>
				<td><input type="text" name="origanal" id="origanal" onchange="checkoriganal()"></td>
			</tr>
			<tr id="roworiganal">
				<td></td>
        		<td ><span id="erroriganal"></span></td>
      		</tr>

			<tr>
				<td><label>Khối lượng: </label></td>
				<td><input type="text" name="weight" id="weight" onchange="checkweight()"></td>
			</tr>
			<tr id="rowweight">
        		<td ><span id="errweight"></span></td>
      		</tr>

			<tr>
				<td><label>Đơn vị: </label></td>
				<td><select name="unit" id="unit">
					<option value="Kg">kg</option>
					<option value="Hộp">Hộp</option>
				</select></td>
			</tr>
			<tr id="rowunit">
	       	 <td ><span id="errunit"></span></td>
	     	</tr>

			<tr>
				<td colspan="2"><div style="text-align:center;">
                    <input type="submit" name="add" value="Thêm mới">
                    <input type="submit" name="update" value="Cập nhật">
                </div></td>
			</tr>
		</table>
        <?php 
            echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
        ?>
	</form>
</div>
<script type="text/javascript">
     var regexprice=/^[0-9]{1,12}$/;
     var regexseries=/^[A-Z][0-9]{2,7}/;
        function checkinfo()
        {
        	var a = checkseries();
        	var c = checkname();
        	var d = checkoriganal();
        	var f = checkweight();
        	var b = checkprice();
            var e = checkpicture();
            var k = checktype();

            if (  !d || !e || !a || !b || !c || !f || !k) {
                return false;
            }
        }
        // kiem tra trường mã không trống và có kí tự xuất hiện ở đầu 
         function checkseries() {
            var series = document.getElementById('series').value;
            if (!regexseries.test(series))
            { 
                document.getElementById('rowseries').style.visibility='visible';
                document.getElementById('errseries').innerHTML='Nhập Mã chính xác bắt đầu bằng chữ cái, tiếp theo là số';
                return false;
            }
            else
            {
                document.getElementById('rowseries').style.visibility='collapse';
                document.getElementById('errseries').innerHTML='';
                return true;
            }
        }
        // name không trống
        function checkname() {
            var name = document.getElementById('name').value;
            if (name ===  '')
            {
                document.getElementById('rowname').style.visibility='visible';
                document.getElementById('errname').innerHTML='Không để trống trường tên';
                return false;
            }
            else
            {
                document.getElementById('rowname').style.visibility='collapse';
                document.getElementById('errname').innerHTML='';
                return true;
            }
        }
        // kiem tra trường không trống không trống và không
        function checkpicture() {
            var picture = document.getElementById('picture').value;
            if (picture ===  '')
            {
                document.getElementById('rowpicture').style.visibility='visible';
                document.getElementById('errpicture').innerHTML='vui lòng điền hình ảnh';
                return false;
            }
            else
            {
                document.getElementById('rowpicture').style.visibility='collapse';
                document.getElementById('errpicture').innerHTML='';
                return true;
            }
        }
        // gia sp phải là số
        function checkprice() {
            var price = document.getElementById('price').value;
            if ( !regexprice.test(price) && price.length > 12 )
            {
                document.getElementById('rowprice').style.visibility='visible';
                document.getElementById('errprice').innerHTML='giá sản phẩm là là số';
                return false;
            }
            else
            {
                document.getElementById('rowprice').style.visibility='collapse';
                document.getElementById('errprice').innerHTML='';
                return true;
            }
        }
        // Loai sp không trống 
        function checktype() {
            var type = document.getElementById('type').value;
            if (type ===  '')
            {
                document.getElementById('rowtype').style.visibility='visible';
                document.getElementById('errtype').innerHTML='vui lòng nhập loại sản phẩm';
                return false;
            }
            else
            {
                document.getElementById('rowtype').style.visibility='collapse';
                document.getElementById('errtype').innerHTML='';
                return true;
            }
        }
        //xuất xứ không trống 
        function checkoriganal() {
            var origanal = document.getElementById('origanal').value;
            if (origanal ===  '')
            {
                document.getElementById('roworiganal').style.visibility='visible';
                document.getElementById('erroriganal').innerHTML='vui lòng nhập xuất xứ';
                return false;
            }
            else
            {
                document.getElementById('roworiganal').style.visibility='collapse';
                document.getElementById('erroriganal').innerHTML='';
                return true;
            }
        }
        //Khối lượng không để trống 
        function checkweight() {
            var weight = document.getElementById('weight').value;
            if (weight ===  '')
            {
                document.getElementById('rowweight').style.visibility='visible';
                document.getElementById('errweight').innerHTML='vui lòng nhập khối lượng';
                return false;
            }
            else
            {
                document.getElementById('rowweight').style.visibility='collapse';
                document.getElementById('errweight').innerHTML='';
                return true;
            }
        }
</script>