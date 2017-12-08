    <?php
	    
	         mysql_connect("localhost", "root", "12345678") or die("Lỗi kết nối Server");
             mysql_select_db("tuan12") or die("Lỗi kết nối Database");

			
             if(isset($_GET['monhocID']) && $monhoc = $_GET['monhocID'])
			 {
				 if(isset($_GET['giangvienID']) && $giangvien = $_GET['giangvienID'])
			 { 
		      $query = ("SELECT monhoc.tenmonhoc,giangvien.tengiangvien,giangday.* FROM giangday 
			  INNER JOIN giangvien ON giangday.giangvienID=giangvien.giangvienID 
			  INNER JOIN monhoc ON giangday.monhocID=monhoc.monhocID
			  WHERE monhocID=$monhoc AND giangvienID= $giangvien");
             $result=mysql_query($query);
             $res = mysql_fetch_array($result);
             $giangviens = $res['tengiangvien'];
             $monhocs = $res['tenmonhoc'];
			 $ngaybatdau = $res['ngaybatdau'];
		     }
			
			 }
	    		if(isset($_POST['update']))
             {			
               
	            if(empty($ten)) {	
			    echo "<font color='red'>Name field is empty.</font><br/>";
	            } else {	
		          $query = "UPDATE giangday SET monhocID='$monhoc', giangvienID= '$giangvien' WHERE monhocID=$monhoc AND giangvienID= $giangvien";                   
                  $result= mysql_query($query);
	             }
				 header("Location: KT.php");
			 } 
		    ?>	
            <form name="formx" method="POST">
                    <table>
				  
                     <tr>
					  <?php 
            $query1="SELECT * FROM monhoc";
            $KQ1=mysql_query($query1); 
            
            ?>
                        <td width="40%"><label>Môn học</label></td>
                        <td>
                     <select name="monhocID">
                    <?php
                    while($tenmonhoc = mysql_fetch_array($KQ1))
                    {
                    ?>
                        <option value="<?php echo $tenmonhoc['monhocID'] ?>"><?php echo $tenmonhoc['tenmonhoc'] ?></option>
                    <?php 
                    } 
                    ?>
                 </select>
				 </td>
                     </tr>
					      <tr>
					  <?php 
            $query1="SELECT * FROM giangvien";
            $KQ2=mysql_query($query1); 
            
            ?>
                        <td width="40%">Giảng viên</td>
                        <td>
                     <select name="giangvienID">
                    <?php
                    while($tengiangvien = mysql_fetch_array($KQ2))
                    {
                    ?>
                        <option value="<?php echo $tengiangvien['giangvienID'] ?>"><?php echo $tengiangvien['tengiangvien'] ?></option>
                    <?php 
                    } 
                    ?>
                 </select>
				 </td>
                     </tr>
                     <tr>
                         
                        <td width="30%">Ngày bắt đầu:</td>
                        <td><input type="text" name="ngaybatdau" /></td>
                     
                     </tr>
                     <tr align="center">
                        <td colspan="2">
                           <input type="submit" value="Thêm" name="in"/>'
                           <input type="submit" value="Xóa" name="in" onClick="return confirm('Bạn có thực sự muốn xóa')">
                        </td>
                        <td>&nbsp;</td>
                     </tr>
                  </table>
            </form>	
