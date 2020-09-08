<div id="overlay"></div>
<div id="wrapper">

<?php include "header.php" ?>

<div id="leftcontent">
<div class="box_two">
<?php
if (isset($_GET['newsid'])) 
{
	$id = (int)$_GET['newsid'];
	connect::selectDB('webdb');
	
	$result = mysql_query("SELECT * FROM news WHERE id='".$id."'");
	$row = mysql_fetch_assoc($result); ?>
    <div class='box_two_title'><?php echo $row['title']; ?></div>
    <?php 
	$text = preg_replace("
	  #((http|https|ftp)://(\S*?\.\S*?))(\s|\;|\)|\]|\[|\{|\}|,|\"|'|:|\<|$|\.\s)#ie",
	  "'<a href=\"$1\" target=\"_blank\">http://$3</a>$4'",
	  $row['body']
	);
	echo nl2br($text); ?> 
   
    <br/><br/>
    <span class='yellow_text'>Written by <b><?php echo $row['author'];?></b> | <?php echo $row['date']; ?></span>
    <?php if ($GLOBALS['news']['enableComments']==true) 
	 { 
		 $result = mysql_query("SELECT poster FROM news_comments WHERE newsid='".$id."' ORDER BY id DESC LIMIT 1");
		 $rows = mysql_fetch_assoc($result);
	 if($rows['poster'] == $_SESSION['cw_user_id'] && isset($_SESSION['cw_user'])) 
		echo "<p>You can't post 2 comments in a row!</p>"; 
	 else 
	 {
	?>
    <hr/>
    <h4 class="yellow_text">Comments</h4>
    <?php if ($_SESSION['cw_user']) {?>
    <table width="100%"> <tr> <td>
    <form action="?p=news&id=<?php echo $id; ?>" method="post">
    <textarea id="newscomment_textarea" name="text">Comment this post...</textarea> </td>
    <td><input type="submit" value="Post" name="comment"></td>
    </form> 
    </tr></table>
    <br/>
    <?php
	} 
	else
		echo "<span class='note'>Log in to comment!</span>";
	}
	if (isset($_POST['comment'])) 
	{
		if (isset($_POST['text']) && isset($_SESSION['cw_user']) && strlen($_POST['text'])<1000) 
		{
			$text = mysql_real_escape_string(trim(htmlentities($_POST['text'])));
			$ip = $_SERVER['REMOTE_ADDR'];
			connect::selectDB('logondb');
			
			$getAcct = mysql_query("SELECT `id` FROM `account` WHERE `username` = '{$_SESSION['cw_user']}'"); $row = mysql_fetch_assoc($getAcct);
			$acct = $row['id'];
			connect::selectDB('webdb'); 
			mysql_query("INSERT INTO news_comments VALUE ('','".$id."','".$text."','".$acct."','".$ip."')");
			
			header("Location: ?p=news&id=".$_GET['id']."");
		}
	}
	
    $result = mysql_query("SELECT * FROM news_comments WHERE newsid='".$row['id']."' ORDER BY id ASC");
	if (mysql_num_rows($result)==0)
		echo "<span class='alert'>No comments has been made yet!</span>";
	else 
	{
		$c = 0;
		while($row = mysql_fetch_assoc($result))
		{
			$c++;
			$text = preg_replace("
              #((http|https|ftp)://(\S*?\.\S*?))(\s|\;|\)|\]|\[|\{|\}|,|\"|'|:|\<|$|\.\s)#ie",
             "'<a href=\"$1\" target=\"_blank\">http://$3</a>$4'",
             $row['text']
            );
			connect::selectDB('logondb');
			$query = mysql_query("SELECT username,id FROM account WHERE id='".$row['poster']."'"); 
			$pi = mysql_fetch_assoc($query); 
			$user = ucfirst(strtolower($pi['username']));
			
			$getGM = mysql_query("SELECT COUNT(gmlevel) FROM account_access WHERE id='".$pi['id']."' AND gmlevel>'0'");
			?>
			<div class="news_comment" id="comment-<?php echo $row['id']; ?>"> 
                <div class="news_comment_user"><?php echo $user; 
				if(mysql_result($getGM,0)>0)
					echo "<br/><span class='blue_text' style='font-size: 11px;'>Staff</span>";?>
                </div> 
                <div class="news_comment_body"><?php if(mysql_result($getGM,0)>0) { echo "<span class='blue_text'>"; }?>
				<?php echo nl2br(htmlentities($text));
                if(mysql_result($getGM,0)>0) { echo "</span>"; }
				
				if(isset($_SESSION['cw_gmlevel']) && $_SESSION['cw_gmlevel']>=$GLOBALS['adminPanel_minlvl'] || 
				isset($_SESSION['cw_gmlevel']) && $_SESSION['cw_gmlevel']>=$GLOBALS['staffPanel_minlvl'] && $GLOBALS['editNewsComments']==true)
				 	echo '<br/><br/> ( <a href="#">Edit</a> | <a href="#remove" onclick="removeNewsComment('.$row['id'].')">Remove</a> )';  
			   ?>
               <div class='news_count'>
               		<?php echo '#'.$c; ?>
               </div>
              </div>
            </div>
            <?php
		}
	}
}  
}
else
{
	 $result = mysql_query("SELECT * FROM news ORDER BY id DESC");
	 while($row = mysql_fetch_assoc($result)) 
	 {
			if(file_exists($row['image']))
			{
			echo '
				   <table class="news" width="100%"> 
						<tr>
							<td><h3 class="yellow_text">'.$row['title'].'</h3></td>
						</tr>
				   </table>
				   <table class="news_content" cellpadding="4"> 
					   <tr>
						  <td><img src="'.$row['image'].'" alt=""/></td> 
						  <td>';
			}
			else
			{
				echo '
				   <table class="news" width="100%"> 
						<tr>
							<td><h3 class="yellow_text">'.$row['title'].'</h3></td>
						</tr>
				   </table>
				   <table class="news_content" cellpadding="4"> 
					   <tr>
						   <td>';
			}
			
			$text = preg_replace("
			  #((http|https|ftp)://(\S*?\.\S*?))(\s|\;|\)|\]|\[|\{|\}|,|\"|'|:|\<|$|\.\s)#ie",
			 "'<a href=\"$1\" target=\"_blank\">http://$3</a>$4'",
			 $row['body']
			);
			
			if ($GLOBALS['news']['limitHomeCharacters']==true) 
			{ 		
					echo website::limit_characters(htmlentities($text,200));
					$output.= website::limit_characters($row['body'],200);
				 } 
				 else 
				 {
					 echo nl2br(htmlentities($text)); 
					 $output .= nl2br($row['body']); 
				}
			 $commentsNum = mysql_query("SELECT COUNT(id) FROM news_comments WHERE newsid='".$row['id']."'");
							 
			 if($GLOBALS['news']['enableComments']==TRUE) 
				 $comments = '| <a href="?p=news&amp;newsid='.$row['id'].'">Comments ('.mysql_result($commentsNum,0).')</a>';
			 else
				 $comments = '';
			 
			 echo '
			 <br/><br/><br/>
			 <i class="gray_text"> Written by '.$row['author'].' | '.$row['date'].' '.$comments.'</i>
			 </td> 
			 </tr>
			 </table>';
					
	 }
}
?>

</div>
<div id="footer">
{footer}
</div>
</div>

<div id="rightcontent">     
{login}          
{serverstatus}  			
</div>
</div>