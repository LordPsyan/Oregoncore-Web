<?php $page = new page; ?>
<div class="box_right_title"><?php echo $page->titleLink(); ?> &raquo; Manage Items</div>
<table width="100%">
        <tr valign="top">
             <td style="text-align: left; width: 300px;"><h3>Modify Single item</h3>
             <p/>Entry<br/>
             <input type="text" style="width: 200px;" id="modsingle_entry"/><br/>
             Price<br/>
             <input type="text" style="width: 200px;" id="modsingle_price"/><br/>
             Shop<br/>
             <select style="width: 205px;" id="modsingle_shop">
                     <option value="vote">Vote Shop</option>
                     <option value="donate">Donation Shop</option>
             </select><br/>
             <input type="submit" value="Update" onclick="modSingleItem()"/>
             <input type="submit" value="Remove" onclick="delSingleItem()"/>
             </td>
             <td style="text-align: left; width: 300px;"><h3>Modify Multiple items</h3>
             <p/>
             Between Item Level<br/>
             <select style="width: 140px;" id="modmulti_il_from">
                      <?php for ($i = 1; $i <= $GLOBALS['maxItemLevel']; $i++) {
						echo "<option>".$i."</option>";
					} ?>
             </select>
             &
             <select style="width: 140px;" id="modmulti_il_to">
                      <?php for ($i = $GLOBALS['maxItemLevel']; $i >= 1; $i--) {
						echo "<option>".$i."</option>";
					} ?>
             </select><br/>
             Price<br/>
             <input type="text" style="width: 200px;" id="modmulti_price"/><br/>
             Quality<br/>
             <select style="width: 205px;" id="modmulti_quality">
                     <option value="all">All</option>
                     <option value="0">Poor</option>
                     <option value="1">Common</option>
                     <option value="2">Uncommon</option>
                     <option value="3">Rare</option>
                     <option value="4">Epic</option>
                     <option value="5">Legendary</option>
             </select><br/>
             Type<br/>
             <select id="modmulti_type" style="width: 205px;">
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
             <select style="width: 205px;" id="modmulti_shop">
                     <option value="vote">Vote Shop</option>
                     <option value="donate">Donation Shop</option>
             </select><br/>
             <input type="submit" value="Update" onclick="modMultiItem()"/>
             <input type="submit" value="Remove" onclick="delMultiItem()"/>
             </td>
        </tr>
</table>