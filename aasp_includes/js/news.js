function postNews() {
	var title = document.getElementById("news_title").value;
	var author = document.getElementById("news_author").value;
	var content = document.getElementById("news_content").value;
	var image = document.getElementById("news_image").value;
	content = content.replace(/&nbsp;/, '').replace(/<br>/, '\n');
	showLoader();
	$.post("../aasp_includes/scripts/news.php", { function: "post", title: title, author: author, content: content,image: image },
       function(data) {
			 $("#loading").html(data + "<br/><br/><a href='#' onclick='hideLoader()'>Close</a>"); 
		 
   });
}
function deleteNews(id) {
	showLoader();
	$("#loading").html("Are you sure you wish to delete this news post?<br/>\
	<input type='submit' value='Yes I do' onclick='deleteNewsNow(" + id + ")'><input type='submit' value='No' onclick='hideLoader()'>");
}

function deleteNewsNow(id) {
	$("#loading").html("Deleting...");
	$.post("../aasp_includes/scripts/news.php", { function: "delete", id: id },
       function(data) {
			 window.location='?p=news&s=manage';
   });
	
}

function editNews(id) {
	showLoader();
	    $.post("../aasp_includes/scripts/news.php", { function: "getNewsContent", id: id },
         function(data) {
			 $("#loading").html(data);
       });
	
}
function editNewsNow(id) {
	var title = document.getElementById("editnews_title").value;
	var author = document.getElementById("editnews_author").value;
	var content = document.getElementById('editnews_content').value;
	content = content.replace(/&nbsp;/, '').replace(/<br>/, '\n');
	$("#loading").html("Loading...");
	$.post("../aasp_includes/scripts/news.php", { function: "edit", id: id, title: title, content: content, author: author },
       function(data) {
			 window.location=data;
   });
   
}
