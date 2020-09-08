<?php $page = new page; ?>
<div class="box_right_title"><?php echo $page->titleLink(); ?> &raquo; Add items</div>
<table width="100%">
        <tr valign="top">
             <td style="text-align: left; width: 300px;"><h3>Single item</h3>
             <p/>Entry<br/>
             <input type="text" style="width: 200px;" id="addsingle_entry"/><br/>
             Price<br/>
             <input type="text" style="width: 200px;" id="addsingle_price"/><br/>
             Shop<br/>
             <select style="width: 205px;" id="addsingle_shop">
                     <option value="vote">Vote Shop</option>
                     <option value="donate">Donation Shop</option>
             </select><br/>
             <input type="submit" value="Add" onclick="addSingleItem()"/>
             </td>
             <td style="text-align: left; width: 300px;"><h3>Multiple items</h3>
             <p/>
             Between Item Level<br/>
             <select style="width: 140px;" id="addmulti_il_from">
                      <?php for ($i = 1; $i <= $GLOBALS['maxItemLevel']; $i++) {
						echo "<option>".$i."</option>";
					} ?>
             </select>
             &
             <select style="width: 140px;" id="addmulti_il_to">
                      <?php for ($i = $GLOBALS['maxItemLevel']; $i >= 1; $i--) {
						echo "<option>".$i."</option>";
					} ?>
             </select><br/>
             Price<br/>
             <input type="text" style="width: 200px;" id="addmulti_price"/><br/>
             Quality<br/>
             <select style="width: 205px;" id="addmulti_quality">
                     <option value="all">All</option>
                     <option value="0">Poor</option>
                     <option value="1">Common</option>
                     <option value="2">Uncommon</option>
                     <option value="3">Rare</option>
                     <option value="4">Epic</option>
                     <option value="5">Legendary</option>
             </select><br/>
             Type<br/>
             <select id="addmulti_type" style="width: 205px;">
                                <option value="all">All</option>
                                <option value="0">Consumable</option>
                                <option value="1">Container</option>
                                <option value="2">Weapons</option>
                                <option value="3">Gem</option>
                                <option value="4">Armor</option>
                                <option value="15">Miscellaneous</option>
                                <option value="16">Glyph</option>
                                <option value="15-5">Mount</option>
                                <option value="15-2">Pet</option>
            </select>	
             <br/>
             Shop<br/>
             <select style="width: 205px;" id="addmulti_shop">
                     <option value="vote">Vote Shop</option>
                     <option value="donate">Donation Shop</option>
             </select><br/>
             <input type="submit" value="Add" onclick="addMultiItem()"/>
             </td>
        </tr>
</table>