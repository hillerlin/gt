<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript">
function do_open_layout(event, treeId, treeNode) {
//    if (treeNode.isParent) {
//        var zTree = $.fn.zTree.getZTreeObj(treeId)
//        
//        zTree.expandNode(treeNode)
//        return
//    }
    $(event.target).bjuiajax('doLoad', {url:treeNode.url, target:treeNode.divid})
    
    event.preventDefault()
}
</script>
<div class="bjui-pageContent">
    <div style="float:left; width:200px;">
        <ul id="layout-tree-dp" class="ztree" data-toggle="ztree" data-expand-all="true" data-on-click="do_open_layout">
            <?php foreach($list as $v):?>
            <li data-id="<?php echo $v['dept_id']?>" data-pid="<?php echo $v['pid']?>" data-url="<?php echo U('Admin/index')?>" data-divid="#layout-dp">国投资本保理公司</li>
            <?php foreach($v['sub'] as $v1):?>
            <li data-id="<?php echo $v1['dept_id']?>" data-pid="<?php echo $v1['pid']?>" data-url="<?php echo U('Admin/index', array('dp_id' => $v1['dept_id']))?>" data-divid="#layout-dp"><?php echo $v1['department']?></li>
            <?php foreach($v1['sub'] as $v2):?>
            <li data-id="<?php echo $v2['dept_id']?>" data-pid="<?php echo $v2['pid']?>" data-url="<?php echo U('Admin/index', array('dp_id' => $v2['dept_id']))?>" data-divid="#layout-dp"><?php echo $v2['department']?></li>
            <?php foreach($v2['sub'] as $v3):?>
            <li data-id="<?php echo $v3['dept_id']?>" data-pid="<?php echo $v3['pid']?>" data-url="<?php echo U('Admin/index', array('dp_id' => $v3['dept_id']))?>" data-divid="#layout-dp"><?php echo $v3['department']?></li>
            <?php endforeach;?>
            <?php endforeach;?>
            <!--<li data-id="11" data-pid="1" data-url="layout/layout-02.html" data-divid="#layout-02">业务2</li>-->
            <?php endforeach;?>
            <?php endforeach;?>
        </ul>
    </div>
    <div style="margin-left:210px; height:100%; overflow:hidden;">
        <div style="height:100%; overflow:hidden;">
            <fieldset style="height:100%;">
                <!--<legend>第一/三业务区</legend>-->
                <div id="layout-dp" style="height:100%; overflow:hidden;">
                    
                </div>
            </fieldset>
        </div>
    </div>
</div>