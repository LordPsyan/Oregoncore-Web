<?php $page = new page; ?>
<div class="box_right_title"><?php echo $page->titleLink(); ?> &raquo; Menu</div>
<table class="center">
        <tr><th>Position</th><th>Title</th><th>Url</th><th>Shown When</th><th>Actions</th></tr>
        <?php 
        $x = 1;
            $result = mysql_query("SELECT * FROM site_links ORDER BY position ASC");
            while($row = mysql_fetch_assoc($result)) { ?>
                <tr><td><?php echo $x; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['url']; ?></td>
                <td><?php 
						if($row['shownWhen']=='logged') {
							echo "Logged in";
						} elseif($row['shownWhen']=='notlogged') {
							echo "Not logged in";
						}  else {
							echo ucfirst($row['shownWhen']);
						}
                   ?>
                </td>
                <td>
                    <a href="#" onclick="editMenu(<?php echo $row['position']; ?>)"
                    >Edit</a> &nbsp; <a href="#" onclick="deleteLink(<?php echo $row['position']; ?>)">Delete</a>
                </td>
                </tr>
            <?php $x++; }
        ?>
 </table>
 <br/>
 <a href="#" onclick="addLink()" class="content_hider">Add a new link</a>