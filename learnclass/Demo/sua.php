﻿<?php
        function Chuanhoa($str, $type = NULL)
            {
                $str   = strtolower($str);
                $str   = trim($str);
                $array = explode(" ", $str);
                foreach ($array as $key => $value)
                    {
                        if (trim($value) == null)
                            {
                                unset($array[$key]);
                                continue;
                            }
                        if ($type == "ten")
                            {
                                $array[$key] = ucfirst($value);
                            }
                    }
                $result = implode(" ", $array);
                return $result;
            }
        //Kêt nối CSDL
        mysql_connect("localhost", "root", "") or die("Lỗi kết nối Server");
        mysql_select_db("hoivien2") or die("Lỗi kết nối Database");
        mysql_set_charset('utf8');
        if (isset($_GET['ma']) && $ma = $_GET['ma'])
            {
                $query  = ("SELECT * FROM hoivien WHERE ma=$ma");
                $result = mysql_query($query);
                $res    = mysql_fetch_array($result);
                $mas    = $res['ma'];
                $tens   = $res['ten'];
            }
        if (isset($_POST['update']))
            {
                $ten = Chuanhoa($_POST['ten2'], "ten");
                if (empty($ten))
                    {
                        echo "<font color='red'>Tên không được trống</font><br/>";
                    }
                else
                    {
                        $query  = "UPDATE hoivien SET ten='$ten' WHERE ma=$ma";
                        $result = mysql_query($query);
                    }
                header("Location: kt.php");
            }
?> 
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <title>Cập nhật thông tin </title>
</head>
<body>
<form name="formx" method="POST">
  <table>
    <tr>
      <td width="30%">Mã HV:</td>
      <td><input type="text" name="ma2" value="<?php echo $_GET['ma']; ?>"/></td>
    </tr>
    <tr>
      <td width="30%">Họ và tên:</td>
      <td><input type="text" name="ten2" value="<?php echo $tens; ?>"/></td>
    </tr>
    <tr align="center">
      <td colspan="2">
        <input type="submit"  name="update" value="Lưu lại"/>'
      </td>
    </tr>
  </table>
</form>
</body>
</html>