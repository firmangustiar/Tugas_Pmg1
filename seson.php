<?php 
session_start();

$_SESSION['level']='MGR';
$_SESSION['nama']='rizki';
$_SESSION['kelas']='karyawan';
$_SESSION['username']='aku';

$level =$_SESSION['level'];
$nama=$_SESSION['nama'];
if($level =='MGR'){
	echo 'saya';
	
}elseif($level =='SPV'){
	echo 'haloo';
  }else{ ?>
<table>	
	<tr>
		<td>Edit</td>
	</tr>
	<tr>
		<td>Edit</td>
	</tr>

	</table>
<?php
}



?>