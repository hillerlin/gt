<?php if (!defined('THINK_PATH')) exit();?><div class="bjui-pageFooter">
    <div class="pages">
        <span>每页&nbsp;</span>
        <div class="selectPagesize">
            <select data-toggle="selectpicker" data-toggle-change="changepagesize">
                <?php foreach($page_sizes as $v) {?>
                <option value="<?php echo $v?>"><?php echo $v?></option>
                <?php }?>
            </select>
        </div>
        <span>&nbsp;条，共 <?php echo $total?> 条</span>
    </div>
    <div class="pagination-box" data-toggle="pagination" data-total="<?php echo $total?>" data-page-size="<?php echo ($page_default_size); ?>" data-page-current="1">
    </div>
</div>