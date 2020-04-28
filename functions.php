<?php
function jsonToArray(string $file){
	return json_decode(file_get_contents($file),true);
}

function showItem($id,$heading,$picture='https://via.placeholder.com/140x100',$body=null){
	if(!isset($body)) $body='<a href="detail.php?id='.$id.'">Visit profile</a>';
	echo '<div class="media">
 <a href="detail.php?id='.$id.'"> <img src="'.$picture.'" class="mr-3" alt="" width="96"></a>
  <div class="media-body">
    <h5 class="mt-0"><a href="detail.php?id='.$id.'">'.$heading.'</a></h5>
    '.$body.'
  </div>
</div>';
}