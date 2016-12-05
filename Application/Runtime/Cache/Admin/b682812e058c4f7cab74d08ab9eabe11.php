<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript">
$('#test-datagrid').datagrid({
    gridTitle : '角色列表',
    showToolbar: true,
    toolbarItem: 'add',
//    toolbarCustom: '<a href="<?php echo U("role/datagrid-lookup-nation")?>" class="btn btn-default" data-toggle="dialog" data-width="800" data-height="400" data-id="dialog">分配权限</a>',
    local: 'remote',
    dataUrl: "<?php echo U('Admin/index',array('dp_id' => $dp_id))?>",
    dataType: 'json',
//    sortAll: true,
    filterAll: false,
    columns: [
        {
            name: 'role_name',
            label: '角色',
            align: 'center',
            width: 150,
        },
        {
            name: 'status',
            label: '状态',
            align: 'center',
            width: 85,
            type: 'select',
            items: [{'0':'禁用'},{'1':'可用'}],
            render: function(value) {
                return parseInt(value) === 0 ? '禁用' : '可用';
            },
        },
        {
            name: 'admin_name',
            label: '登录名',
            align: 'center',
            width: 150,
        },
        {
            name: 'real_name',
            label: '姓名',
            align: 'center',
            width: 150,
        },
        {
            name: 'last_login_time',
            label: '上次登录',
            align: 'center',
            type: 'date',
            pattern: 'yyyy-MM-dd HH:mm:ss',
            width: 200,
        },
        {
            name: 'login_times',
            label: '登录次数',
            align: 'center',
            width: 100,
            edit: false
        },
        {
            name: 'last_login_ip',
            label: '最后登录ip',
            align: 'center',
            width: 200,
        },
        {
            name: 'admin_id',
            label: '编辑',
            align: 'center',
            width: 300,
            render: function(value) {
                return  '<a href="<?php echo U("Admin/edit")?>?admin_id='+value+'" class="btn btn-green" data-toggle="dialog" data-height="400" data-id="admin-edit" data-reload-warn="本页已有打开的内容，确定将刷新本页内容，是否继续？" data-title="编辑管理员}">编辑</a>\n\
                <a href="<?php echo U("Admin/editPaswd")?>?admin_id='+value+'" class="btn btn-green" data-toggle="dialog" data-height="400" data-id="admin-editpaswd" data-reload-warn="本页已有打开的内容，确定将刷新本页内容，是否继续？" data-title="修改密码">修改密码</a>\n\
                <a href="<?php echo U('Admin/del_admin')?>?admin_id='+value+'" class="btn btn-red" data-toggle="doajax" data-confirm-msg="确定要删除该行信息吗？">删</a>';
            }
        },
    ],
    hiddenFields: [{name:'deptcode'}],
    editUrl: '<?php echo U("Admin/save_admin")?>',
    delUrl:  '<?php echo U("Admin/del_admin")?>',
    delPK:'admin_id',
    paging: {pageSize:30,selectPageSize:'10,30,60', pageCurrent:1},
    showCheckboxCol: true,
    showEditBtnsCol: true,
    linenumberAll: true,
    showTfoot: true,
    contextMenuB: true,
    columnMenu:true,
    editMode: 'dialog',
    height:'100%',
    editDialogOp: {'width':500, 'height':500,'url': "<?php echo U('admin/add',array('dp_id' => $dp_id))?>",'target':null}
//    fullGrid:true
})
</script>
<div class="bjui-pageContent">
<script type="text/javascript">
var $datagrid = $('#test-datagrid')

$(document).on('bjui.beforeCloseDialog', function(e) {
    var $dialog = $(e.target);
//    debugger;
    $dialog.data = "{'admin_id':'1'}";
//    var $select = $('#test-datagrid').data('selectedTrs');
//    $(this).navtab('reloadFlag', '1');

 });
 $(document).on('bjui.beforeLoadDialog', function(e) {
    var $dialog = $(e.target);
//    debugger;
//    $dialog.prototype.getCurrent;
//    var $select = $('#test-datagrid').data('selectedTrs')
//    $dialog.loadUrl("<?=U('admin/edit')?>","admin_id:"+$select);
//    var $select = $('#test-datagrid').data('selectedTrs');
//    $(this).navtab('reloadFlag', 'bjui-hnav-tree1_2');
//    $(this).loadUrl({'url': '<?=U('admin/edit')?>','data':{'admin_id':'11'},'target':null});

 })
</script>
    <div style="margin:10px;">
        <!--<hr style="margin: 5px 0">-->
        <table id="test-datagrid" data-width="100%" data-height="800" class="table table-bordered">
        </table>
    </div>
    <a id="doc-alertmsg-demo"></a >

</div>