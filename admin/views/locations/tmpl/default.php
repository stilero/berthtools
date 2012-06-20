<?php

/**
 * @version     $Id$
 * @copyright   Copyright 2011 Stilero AB. All rights re-served.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
//No direct access
defined('_JEXEC) or die;');?>
<form action="index.php" method="post" name="adminForm">
    <table class="adminlist">
        <thead>
            <tr>
                <th width="10"><?php echo JText::_('ID');?></th>
                <th width="10">
                    <input type="checkbox" name="toggle" value="" onClick="checkAll(<?php echo count( $this->locations ) ?>)" />
                </th>
                <th><?php echo JText::_('Name'); ?></th>
                <th><?php echo JText::_('Longitude'); ?></th>
                <th><?php echo JText::_('Latitude'); ?></th>
                <th><?php echo JText::_('Group'); ?></th>
                <th width="8%" align="center"><?php echo JText::_('Order'); ?></th>
                <th width="8%" align="center"><?php echo JText::_('Published'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $k = 0;
            $i = 0;
            foreach ($this->locations as $row) {
                $checked = JHTML::_('grid.id', $i, $row->id );
                $published = JHTML::_('grid.published', $row, $i);
                $link = JRoute::_('index.php?option='
                        .JRequest::getVar('option')
                        .'&task=edit&cid[]='.$row->id
                        .'&hidemenu=1'
                        );
                ?>
            <tr class="<?php echo "row$k"; ?>">
                <td><?php echo $row->id; ?></td>
                <td><?php echo $checked; ?></td>
                <td>
                    <a href="<?php echo $link; ?>"><?php echo $row->name; ?></a>
                </td>
                <td><?php echo $row->longitude; ?></td>
                <td><?php echo $row->latitude; ?></td>
                <td><?php echo $row->loc_group_id; ?></td>
                <td>
                    <input type="text" name="order[] " size="5"
                           value="<?php echo $row->ordering;?>"
                           class="text_area"
                           style="text-align: center" />
                </td>
                <td><?php echo $row->published; ?></td>
            </tr>
            <?php $k = 1- $k; $i++; ?>
            <?php } ?>
        </tbody>
    </table>
    <input type="hidden" name="option"
           value="<?php echo JRequest::getVar('option'); ?>" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="hidemainmenu" value="0" />
</form>