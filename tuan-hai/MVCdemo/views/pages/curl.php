<?php 
include_once './public/curl1.php';

    if (isset($_GET['date'])) {
            $url='https://ketqua.net/xo-so-truyen-thong.php?ngay='.$_GET['date'];
    }else{
    	$url = 'https://ketqua.net/';
    }
        $curl = new cURL();
        var_dump($url);
        $html = $curl->get($url);
        $result = array();

    if (preg_match('#<span class="pull-left col-sm-5 chu15" id="result_date">Thứ (.*?) ngày (.*?)</span>#is',$html,$match)) {
        $result['w']   = $match[1];
        $result['day'] = $match[2];
    }
    if (preg_match('#<td style="width:16%;vertical-align:middle;font-size:16px;color:red;">Đặc biệt</td><td id="rs_0_0" colspan="12" style="width:84%;" class="phoi-size chu22 gray need_blank vietdam phoi-size chu30 maudo stop-reload" rs_len="5">(.*?)</td>#is',$html,$match)) {
	    $result['ketquaDB']  = $match[1];
    }
    if (preg_match('#<td style="width:16%;vertical-align:middle;font-size:16px;">Giải nhất</td><td id="rs_1_0" colspan="12" style="width:84%;" class="phoi-size chu22 gray need_blank vietdam" rs_len="5">(.*?)</td>#',$html,$match)) {
	    $result['ketquaG1']  = $match[1];
    }
    if (preg_match('#<td style="width:16%;vertical-align:middle;font-size:16px;">Giải nhì</td><td id="rs_2_0" colspan="6" style="width:42%;" class="phoi-size chu22 gray need_blank vietdam" rs_len="5">(.*?)</td><td id="rs_2_1" colspan="6" style="width:42%;" class="phoi-size chu22 gray need_blank vietdam" rs_len="5">(.*?)</td>#',$html,$match)) {
	    $result['ketquaG21'] = $match[1];
	    $result['ketquaG22'] = $match[2];
  
    }
 ?>

<form action="index.php?controller=PDOhome&action=cURL" method="get" accept-charset="utf-8">
   	    <p>Date: <input type="text" name="date" id="datepicker">
                 <input type="hidden" name="controller" value="PDOhome">
                 <input type="hidden" name="action" value="cURL">
                 <input type="submit"  value="xem">
                </p>
   </form>
 <h2>Mở thưởng thu <?php echo $result['w'] ?> ngay <?php echo $result['day'] ?></h2>
 <table>
 	
 	<thead>
 		<tr>
 			<th>Đặc biệt</th>
 			<th>Giải nhất</th>
 			<th>Giải nhì</th>
 		</tr>
 	</thead>
 	<tbody>
 		<tr>
 			<td><?php echo $result['ketquaDB'] ?></td>
 			<td><?php echo $result['ketquaG1']; ?></td>
 			<td><?php echo $result['ketquaG21'] ; ?> <?php echo $result['ketquaG22'] ?> </td>
 		</tr>
 	</tbody>
 </table>