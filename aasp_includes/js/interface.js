$("input[type='text']").not(document.getElementsByClassName('noremove')).focus(function() {
	this.value="";
});
$("input[type='password']").focus(function() {
	this.value="";
});

document.onkeydown = function(event) 
{
	var key_press = String.fromCharCode(event.keyCode);
	var key_code = event.keyCode;
	if(key_code == 27)
		{
			hideLoader();
		}
}


function showLoader() {
	centerLoader();
	$("#overlay").fadeIn("fast");
	$("#loading").fadeIn("slow");
}

function hideLoader() {
	$("#overlay").fadeOut("fast");
	$("#loading").fadeOut("fast");
	$("#loading").html("Loading...");
}

function centerLoader() {

    var scrolledX = document.body.scrollLeft || document.documentElement.scrollLeft || self.pageXOffset;
    var scrolledY = document.body.scrollTop || document.documentElement.scrollTop || self.pageYOffset;
	

    var screenWidth = document.body.clientWidth || document.documentElement.clientWidth || self.innerWidth;
    var screenHeight = document.body.clientHeight || document.documentElement.clientHeight || self.innerHeight;

    var left = scrolledX + (screenWidth - $("#loading").width())/2;
    var top = scrolledY + (screenHeight - $("#loading").height())/4;
    //centering
    $("#loading").css({
        "position": "absolute",
        "top": top,
        "left": left
    });
	
	
	$("#overlay").click(function(){
         $("#loading").fadeOut();
		 $("#overlay").fadeOut();	
	});
}

function getPage(pagename) {
	$(".box_right").html("<img src='images/ajax-loader.gif'>'");
	$(".box_right").load("pages/" + pagename + ".php");
}

function loader(id) {
	$(id).html("<img src='styles/default/images/ajax-loader.gif'>'");
}
function templateInstallGuide() {
	showLoader();
	$("#loading").html("<h3>Installing Templates</h3>\
	<h4>Step 1</h4>First off, download or create a template for CraftedWeb. If you have experience in HTML/CSS, you should be able to create one yourself by using the default\
	template as a core. If you cannot make one on your own, you must get a template from another source.\
	<h4>Step 2</h4>Next, grab the template folder that you now want to install. The name of the folder does not matter, make sure it's a regular folder, no ZIP or RAR etc.\
	Upload the folder into /styles/ that is located in the root folder of where you installed TrinityWeb on your web server.\
	<h4>Step 3</h4>Log onto your Admin panel, go into Layouts->Template. Below 'Install a new template'. In the first input, enter the name of the folder that contains your\ template. In the next input, enter a name for the template so you can recognize it.\
	<h4>Step 4</h4>Go back into the Admin panel, Layouts->Template. Now below 'Choose Template', choose the name of the template you should installed & click Save.\
	<h4>Done!</h4>Your template should now be installed & active on your website. You can always disable it at any time, and enable it later on. <br/>\
	<i>For template developers:</i> After the template is installed, you no longer need to install it again. Just edit it on-the-fly if you wish.<br/>\
	<input type='submit' value='Got it!' onclick='hideLoader()'>");
}

function setTemplate() {
	var id = document.getElementById("choose_template").value;
	
	showLoader();
	$("#loading").html("Saving...");
	$.post("../aasp_includes/scripts/layout.php", { action: "setTemplate", id: id },
       function(data) {
			window.location='?p=interface'
   });
   
}

function installTemplate() {
	
	var path = document.getElementById("installtemplate_path").value;
	var name = document.getElementById("installtemplate_name").value;
	
	showLoader();
	$("#loading").html("Saving...");
	$.post("../aasp_includes/scripts/layout.php", { action: "installTemplate", path: path,name: name },
       function(data) {
			window.location='?p=interface'
   });
	
}

function uninstallTemplate() {
	
	var id = document.getElementById("uninstall_template_id").value;
	
	showLoader();
	$("#loading").html("Saving...");
	$.post("../aasp_includes/scripts/layout.php", { action: "uninstallTemplate", id:id },
       function(data) {
			window.location='?p=interface'
   });
	
}

function editMenu(id) {
	
	showLoader();
	$.post("../aasp_includes/scripts/layout.php", { action: "getMenuEditForm", id:id },
       function(data) {
			$("#loading").html(data);
   });
	
}

function saveMenuLink(pos) {
	
	var title = document.getElementById("editlink_title").value;
	var url = document.getElementById("editlink_url").value;
	var shownWhen = document.getElementById("editlink_shownWhen").value;
	
	showLoader();
	$("#loading").html("Saving...");
	$.post("../aasp_includes/scripts/layout.php", { action: "saveMenu", title: title, url: url, shownWhen: shownWhen, id: pos },
       function(data) {
			 if(data==true) {
			window.location='?p=interface&s=menu'
		   } else {
			 $("#loading").html(data);  
		   }
   });
   
}

function deleteLink(id) {
	
	showLoader();
	$("#loading").html("Are you sure you wish to delete this link?<br/><br/>\
	<input type='submit' value='Yes I do' onclick='deleteLinkNow( " + id + " )'> <input type='submit' value='No' onclick='hideLoader()'>");
	
}

function deleteLinkNow(id) {
	
	showLoader();
	$("#loading").html("Saving...");
	$.post("../aasp_includes/scripts/layout.php", { action: "deleteLink", id: id },
       function(data) {
			 if(data==true) {
			window.location='?p=interface&s=menu'
		   } else {
			 $("#loading").html(data);  
		   }
   });
   
}

function addLink() {
	
	showLoader();
	$("#loading").html("<h3>Add Link</h3>\
	Title<br/><input type='text' id='addlink_title'><br/>\
	Url<br/><input type='text' id='addlink_url'><br/>\
	Shown When<br/><select id='addlink_shownWhen'>\
	<option value='always'>Always</option><option value='logged'>Logged in</option>\
	<option value='notlogged'>Not logged in</option>\
	</select><br/>\
	<input type='submit' value='Add' onclick='addLinkNow()'>");
	
}

function addLinkNow() {
	
	var title = document.getElementById("addlink_title").value;
	var url = document.getElementById("addlink_url").value;
	var shownWhen = document.getElementById("addlink_shownWhen").value;
	
	$("#loading").html("Adding...");
	
	$.post("../aasp_includes/scripts/layout.php", { action: "addLink", title: title, url: url, shownWhen: shownWhen },
       function(data) {
		   if(data==true) {
			   window.location='?p=interface&s=menu'
		   } else {
			    $("#loading").html(data);  
		   }
   });
	
}

$("#menu_left ul li").not("#menu_head").click(function() {
	if($(this).next().is(":hidden")) {
			 $(this).next().slideDown("slow");
		} else {
          $(this).next().slideUp("slow");
		}
});

function savePage(filename) {

	var action = document.getElementById("action-" + filename).value;

	if(action==2 || action==1) {
		$.post("../aasp_includes/scripts/pages.php", { action: "toggle", value: action, filename: filename },
       function(data) {
			 window.location='?p=pages';
       });
	}
	
	if(action==3) {
		
		window.location='?p=pages&action=edit&filename=' + filename;
		
	}
	
	if(action==4) {
		showLoader();
		$("#loading").html('Are you sure you wish to delete this page?<br/>\
		<input type="submit" value="Yes I do" onclick="deletePage(\'' + filename +  '\')"> \
		<input type="submit" value="No" onclick="hideLoader()">');
	}
	
}

function deletePage(filename) {
	$.post("../aasp_includes/scripts/pages.php", { action: "delete", filename: filename },
       function(data) {
			 window.location='?p=pages';
       });
}

function removeSlideImage(id) {
	showLoader();
	$("#loading").html('Are you sure you wish to remove this image?<br/>\
	<input type="submit" value="Yes I do" onclick="removeSlideImageNow('+ id +')"> \
	<input type="submit" value="No" onclick="hideLoader()">');
}

function removeSlideImageNow(id) {
	$.post("../aasp_includes/scripts/layout.php", { action: "deleteImage", id: id },
       function(data) {
			 window.location='?p=slideshow';
       });
}

function addSlideImage() {
	$("#addSlideImage").fadeIn(500);
}

function editVoteLink(id,title,points,image,url) {
	showLoader();
	$("#loading").html('Title<br/><input type="text" value="'+title+'" id="editVoteLink_title"><br/>\
	Points<br/><input type="text" value="'+points+'" id="editVoteLink_points"><br/>\
	Image Url<br/><input type="text" value="'+image+'" id="editVoteLink_image"><br/>\
	Url<br/><input type="text" value="'+url+'" id="editVoteLink_url"><br/>\
	<input type="submit" value="Save" onclick="saveVoteLink('+id+')"> <input type="submit" value="Close" onclick="hideLoader()">');
}

function saveVoteLink(id) {
	var title = document.getElementById("editVoteLink_title").value;
	var points = document.getElementById("editVoteLink_points").value;
	var image = document.getElementById("editVoteLink_image").value;
	var url = document.getElementById("editVoteLink_url").value;
	
	$.post("../aasp_includes/scripts/pages.php", { action: "saveVoteLink", id: id, title:title, points:points, image:image, url:url },
       function(data) {
			 window.location='?p=services&s=voting';
       });
}

function removeVoteLink(id) {
	showLoader();
	$("#loading").html('Are you sure you wish to remove this voting site?<br/>\
	<input type="submit" value="Yes I do" onclick="removeVoteLinkNow('+ id +')"> \
	<input type="submit" value="No" onclick="hideLoader()">');
}

function removeVoteLinkNow(id) {
	$.post("../aasp_includes/scripts/pages.php", { action: "removeVoteLink", id: id },
       function(data) {
			 window.location='?p=services&s=voting';
       });
}

function addVoteLink() {
	showLoader();
	$("#loading").html('Title<br/><input type="text" id="addVoteLink_title"><br/>\
	Points<br/><input type="text" id="addVoteLink_points"><br/>\
	Image Url<br/><input type="text" id="addVoteLink_image"><br/>\
	Url<br/><input type="text" id="addVoteLink_url"><br/>\
	<input type="submit" value="Add" onclick="addVoteLinkNow()"> <input type="submit" value="Close" onclick="hideLoader()">');
}

function addVoteLinkNow() {
	var title = document.getElementById("addVoteLink_title").value;
	var points = document.getElementById("addVoteLink_points").value;
	var image = document.getElementById("addVoteLink_image").value;
	var url = document.getElementById("addVoteLink_url").value;
	
	   $.post("../aasp_includes/scripts/pages.php", { action: "addVoteLink", title:title, points:points, image:image, url:url },
       function(data) {
			 window.location='?p=services&s=voting';
       });
}

function saveServicePrice(service) {
	var price = document.getElementById(service + "_price").value;
	var currency = document.getElementById(service + "_currency").value;
	var enabled = document.getElementById(service + "_enabled").value;
	
	
	$.post("../aasp_includes/scripts/pages.php", { action: "saveServicePrice", service:service, price: price, currency: currency, enabled: enabled },
       function(data) {
			 window.location='?p=services&s=charservice';
       });
}

function disablePlugin(foldername) {
	
	$.post("../aasp_includes/scripts/layout.php", { action: "disablePlugin", foldername: foldername},
       function(data) {
			 window.location='?p=interface&s=viewplugin&plugin=' + foldername;
       });
}

function enablePlugin(foldername) {
	
	$.post("../aasp_includes/scripts/layout.php", { action: "enablePlugin", foldername: foldername},
       function(data) {
			 window.location='?p=interface&s=viewplugin&plugin=' + foldername;
       });
}