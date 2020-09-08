
<?php include "header.php" ?>

<div class="container">
<div class="row">
<div class="user-panel logged">
<div class="cp-item wow shake">
<span class="cp-icon ico-acc"></span>
<p>Welcome back</p>
<p><span><?php echo ucfirst(strtolower($_SESSION['cw_user']));?></span></p>
<?php 
			if (isset($_SESSION['cw_gmlevel']) && $_SESSION['cw_gmlevel']>=$GLOBALS['adminPanel_minlvl'] && $GLOBALS['adminPanel_enable']==true) 
				echo ' <a href="admin/">(Admin Panel)</a>';
				
			if (isset($_SESSION['cw_gmlevel']) && $_SESSION['cw_gmlevel']>=$GLOBALS['staffPanel_minlvl'] && $GLOBALS['staffPanel_enable']==true) 
				echo ' <a href="staff/">(Staff Panel)</a>';
			?>
</div>
<div class="cp-item wow shake">
<span class="cp-icon ico-coins"></span>
<p>Account balance</p>
<p>
<span class="coin-gold"></span> <span class="count-gold"><?php echo account::loadVP($_SESSION['cw_user']); ?></span>
</p>
</div>
<div class="cp-item wow shake">
<span class="cp-icon ico-cp"></span>
<p>Enter to</p>
<p><a href="?p=ucp"><span>Control Panel</span></a></p>
</div>
<div class="cp-item wow shake last">
<?php if(isset($_SESSION['cw_user'])) { ?>
<a href='?p=logout&last_page=<?php echo $_SERVER["REQUEST_URI"]; ?>'><span class="ico-exit"></span></a>
<?php } ?>
</div>
</div>
</div>
</div>
    
<div class="container">
<div class="row">
<aside class="sidebar pull-right wow bounceInRight">

<div class="twitter-widget-holder js-pretty-scroll-light">
test
</div>


<div class="facebook-widget-holder js-pretty-scroll-light">
<div class="fb-container">
<div class="fb-page" data-href="" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" data-height="3000" data-width="350">
<blockquote cite="" class="fb-xfbml-parse-ignore">
<a href="">Nefelin-WoW Project</a>
</blockquote>
</div>
</div>
</div>

</aside>
<section class="main-section with-sidebar">
<div class="newsbox clearfix">
<article class="howtoplay">
<section id="welcome">
<h2>Welcome to Elysium!</h2>
<p>We are a vanilla World of Warcraft project, striving to be as Blizzlike as possible. This means that your
game play experience should be as close to 2004-2006 as we can possibly make it. As such, all of our rates
are 1x and quests, spells and instances work the way they did back in the day. Please read this thread if
you are a new player (or an old returning one wanting a refresher) before posting questions or issues.
</p>
<p>The aim of this thread is to cover how to get your client up & running, how to register an account for
yourself, and how to handle some common issues.
 Later in the thread, some basic in-game advice will be given as well as directions to more information.
</p>
<p>Quick Links:</p>
<ul>
<li><a href="#install">Installing WoW 1.12.1</a></li>
<li><a href="#register">Registering an account</a></li>
<li><a href="#troubleshooting">Troubleshooting</a></li>
<li><a href="#character-creation">Character creation</a></li>
<li><a href="#getting-started">Getting started</a></li>
</ul>
</section>
<section id="install">
<h3>Installing WoW 1.12.1</h3>
<p>You can use any World of Warcraft client to play, as long as it's version 1.12.1.
Where you got it from doesn't really matter.
You can Google around for one, but we also provide some handy links for you to download it from:
</p>
<ul>
<li><a href="https://drive.google.com/file/d/1TDoNNUXCtsgIUhLw96biPCqjv3AcLYkg/view">Google drive</a></li>
<li><a href="https://mega.nz/#!uYxBWAYb!4bV1pqFl2-zXRS7063GqzAnt53oe5jTcmlVce9CtKPc">Mega</a></li>
<li><a href="https://rutracker.org/forum/viewtopic.php?t=1267317">rutracker.org</a></li>
<li><a href="http://forum.nostalrius.org/viewtopic.php?f=32&t=2803">Nostalrius client</a></li>
</ul>
<p>Once the download is complete, you might have just a single file, named wow.zip or wow.rar.
This means that the file is an archive and needs to be extracted first.
The best program for that job is <a href="https://www.7-zip.org/download.html">7-Zip</a>.
Once you have 7-Zip installed, you can just double-click the wow.zip or wow.rar file and 7-Zip will open it up.
Select "Extract to" and give a destination folder.
</p>
<p><strong>NEVER INSTALL WOW UNDER PROGRAM FILES</strong></p>
<p>You will only make life difficult for yourself in the future if you do.
C:\Games\WoW is a good place or something similar.
This is because ever after Windows Vista, Windows tries to protect important files, making life difficult for gamers who wish to fiddle with the game files.
And you will fiddle with them.
</p>
<p>If your download is not an archive, you can just move it from your download directory to wherever you wish to play it from.
</p>
<p>The next step is to go into the new wow folder and locate a file called "realmlist.wtf" - it might only show up as "realmlist", that's fine.
Right-click on it and select "Open with" and once Windows asks you what program to use, locate Notepad and use that.
Remove everything that is in there and copy & paste the following:
</p>
<ul>
<li><strong>set realmlist logon.elysium-project.org</strong></li>
<li>Save and close Notepad.</li>
<li>Finally, right-click on the file "wow.exe" and select "send to desktop".
This will create a shortcut on your desktop that launches World of Warcraft.
You should not use the launcher as that is useless with private servers.
</li>
<li>Congratulations, your client is ready to go!</li>
</ul>
</section>
<section id="register">
<h3>Registering an account</h3>
<p>You cannot play with just a client. You need an account.
Go to our account creation page. Note that you need a valid email address to register.
Please don't use a throwaway account, as you need this email to be able to change your password.
There is no other option for changing your password!
</p>
<p>When choosing your username and password, few things to keep in mind:</p>
<ol>
<li>Please do not use the same combination that you've used on other private servers.
This is the most common reason for accounts being compromised.</li>
<li>Remember that the maximum length of each is 15 characters.</li>
<li>Pick something that is easy to write but difficult to guess.
Don't just use 1234 as your password.</li>
<li>Elysium staff will <strong>NEVER</strong> ask you for your password!</li>
<li>You should not share your account details with anyone else, ever.Installing WoW 1.12.1</li>
</ol>
</section>
<section id="troubleshooting">
<h3>Troubleshooting</h3>
<p>Remember that you cannot run WoW from inside an archive, you must extract it properly first.
Read above how to do that.</p>
<p>If WoW refuses to start at all, you might need to run it as Administrator.
Right-click on the file "wow.exe", go to properties and in the window that pops up, toggle "Run as administrator" on.
Save, close and try again.
</p>
<p>If you get a complete blank screen at launch, but you can hear music, the problem is with your graphics settings.
New computers might not have DirectX9 installed and later versions of DirectX miss some functions of that one.
Microsoft still offers it as a free download, so get it and install it, see if that fixes your problem.
</p>
<p>If you cannot save realmlist.wtf file after editing it, you probably installed WoW under Program Files.
Move it elsewhere and try again.
If the problem still persist, right-click on the file, click properties, and toggle "Read Only" off at the little window that comes up.
</p>
<p>If your problem isn't listed here, please check out our <a href="https://forum.elysium-project.org/forum/303-help-support/">Help & Support forum</a>.
Search it first, in case someone else has had your exact problem - if not, please make a thread and we will try to help you.</p>
</section>
<section id="character-creation">
<h3>Character creation & Realm selection</h3>
<p>Now that you've logged in, you must choose which of our 2 realms to pick from.
You can create characters and play on both realms with a single account.</p>
<p>Nighthaven PvP - PvP realm, you can find information about it <a href="https://forum.elysium-project.org/topic/57083-fresh-realm-release-nighthaven-pvp/">HERE</a>.</p>
<p>PTR - Public Test Realm:
You can test the things you are interested in testing here with 10x increased rates for faster testing.
Please note that all characters from this realm will be removed, if you want to level, we suggest you to play on Nighthaven realm for now.
</p>
<p>Once you have selected your realm, you can create your character.
If you have not played vanilla WoW before, a fair warning is in place: not all races can be all classes.
Druids, for example, are only available to Night-Elves (Alliance) and Tauren (Horde).
Paladins are only available on Alliance side and Shamans are only available on Horde side.
You should check out our <a href="https://forum.elysium-project.org/forum/265-classes/">class forums</a> for more information.</p>
<p>Please be aware that Elysium does not offer any name, race, class, faction, gender or appearance change services.
Make sure you are happy with your choices as you are stuck with them!</p>
<p>One last thing before you enter the world. On the bottom left corner, there is a button for Addons.
Click it to open a list of Addons that WoW recognizes.
Don't worry if this list is empty - the important thing to do here is to change the amount of memory (RAM) available.
You can safely put it up to 256 Mb or even 512 if you have plenty.
Remember that the client was made for 2004 and computers had fair bit less memory on them back then.
You should not use 0 as it means dynamic memory allocation as this can cause hiccups with the client when it runs out of memory and has to allocate more.
</p>
</section>
<section id="getting-started">
<h3>Getting started</h3>
<p>You will see a short cutscene that ends with your character in the starting area for your race.
Before you do anything else, you should press Esc to bring up the menu.
Go to options. Unless you are running WoW on a 10-year old laptop, you can safely maximize all graphics settings.
You should also go to Keybinds and change them to suit your playing style.
You cannot edit the interface here - you need addons for that.
Please refer to our <a href="https://forum.elysium-project.org/forum/268-ui-addons-macros/">UI, Addon & Macros forum</a> for available options - industrious people are still churning out vanilla addons for us all to use!
</p>
<p>That done, you should see an NPC with a yellow exclamation mark over their head.
He or she will give you your first quest.
The game also offers you helpful hints on the screen as you start, that cover the basics of gameplay.
The best way to get started is to do these initial quests and read the tips, getting accustomed to how the game runs.
Remember that you can easily die at level 1 - don't fight too many mobs (MObile OBjects) at the same time!
</p>
<p>It is usually helpful to group up with other players, especially for kill quests.
The credit for kills is shared between all party members, so kill quests are completed quickly.
It is considered polite to ask other people first, before sending an invite to their way.
Later on, you will come across elite quests and dungeon quests - these are very difficult to solo, so it's better to find a group to do them with.
Remember that WoW is a social game!
</p>
<p>Don't worry if you die - it will happen!
Just run back to your corpse, resurrect yourself and get back to questing.
</p>
<p>Hopefully this thread has been useful to you. Enjoy your time on Azeroth!</p>
</section>
</article>
</div>
</section>
</div>
</div>
</main>

<footer id="footer">
<div class="container">
<div class="row clearfix">
<div class="column">
<div id="footer-copy" class="wow fadeInUp">
&copy; 2018 - 2019 <br />
<a href="./">Nefelin-WoW Project, Vanilla Legacy Server</a> 
<a class="legals" href="">Contact us - About us</a> 
<a class="legals" href="">Refund policy / private policy</a> 
</div></div></div></div>
</div>
</div>
</div>
</footer>
<script type="text/javascript" src="/themes/nefelin/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="/themes/nefelin/js/custom.js"></script>