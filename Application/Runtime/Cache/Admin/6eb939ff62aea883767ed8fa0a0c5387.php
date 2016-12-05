<?php if (!defined('THINK_PATH')) exit();?><div class="bjui-pageHeader">
    <form id="pagerForm" data-toggle="ajaxsearch" action="<?php echo U('Company/index')?>" method="post">
        <input type="hidden" name="isSearch" value="1">
        <input type="hidden" name="pageSize" value="${model.pageSize}">
        <input type="hidden" name="pageCurrent" value="${model.pageCurrent}">
        <input type="hidden" name="orderField" value="${param.orderField}">
        <input type="hidden" name="orderDirection" value="${param.orderDirection}">
        <div class="bjui-searchBar">
            <button data-url="<?php echo U('Company/add');?>" class="btn btn-blue" data-toggle="dialog" data-height='450' data-icon="plus" data-id="company-add">新增客户</button>
            &nbsp;
<!--            <label>资料类型:</label>
            <select name="submit_status" data-toggle="selectpicker">
                <option value="">全部</option>
                <option value="0">核心企业</option>
                <option value="1">交易对手</option>
            </select>&nbsp;-->
            <label>公司名称：</label><input type="text" id="company_name" value="<?php echo ($post["company_name"]); ?>" name="company_name" class="form-control" size="10">&nbsp;
            <label>联系人姓名：</label><input type="text" value="<?php echo ($post["company_linker"]); ?>" name="company_linker" class="form-control" size="8">&nbsp;
            <!--<input type="checkbox" id="j_table_chk" value="true" data-toggle="icheck" data-label="我的客户">-->
            <!--<button type="button" class="showMoreSearch" data-toggle="moresearch" data-name="custom"><i class="fa fa-angle-double-down"></i></button>-->
            <button type="submit" class="btn-default" data-icon="search">查询</button>&nbsp;
            <a class="btn btn-orange" href="javascript:;" data-toggle="reloadsearch" data-clear-query="true" data-icon="undo">清空查询</a>
        </div>
        <div class="bjui-moreSearch">
            <label>职业：</label><input type="text" value="" name="profession" size="15" />
            <label>&nbsp;性别:</label>
            <select name="sex" data-toggle="selectpicker">
                <option value="">全部</option>
                <option value="true">男</option>
                <option value="false">女</option>
            </select>
            <label>&nbsp;手机:</label>
            <input type="text" value="" name="mobile" size="10">
        </div>
    </form>
</div>
<div class="bjui-pageContent tableContent">
    <table class="table table-bordered table-hover table-top">
        <thead>
            <tr>
                <th data-order-field="company_name" align="center" width="300">公司名称</th>
                <th data-order-field="company_linker" align="center" width="100">联系人</th>
                <th data-order-field="company_mobile" align="center" width="100">联系人手机号</th>
                <th data-order-field="company_phone" align="center" width="150">联系人座机号</th>
                <th data-order-field="company_email" align="center" width="150">联系人邮箱</th>
                <th data-order-field="company_address" align="center" width="300">公司地址</th>
                <th data-order-field="industry" align="center" width="150">行业分类</th>
                <th data-order-field="industry" align="center" width="100">项目经理</th>
                <th data-order-field="company_remark" align="center" width="150">公司备注</th>
<!--                <th data-order-field="bank_name" align="center" width="150">开户行</th>
                <th data-order-field="bank_no" align="center" width="150">开户卡号</th>-->
                <th width="150" align="center">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($list as $v){?>
            <tr data-id="<?php echo $v['company_id']?>" >
                <td align="center"><?php echo $v['company_name']?></td>
                <td align="center"><?php echo $v['company_linker']?></td>
                <td align="center"><?php echo $v['company_mobile']?></td>
                <td align="center"><?php echo $v['company_phone']?></td>
                <td align="center"><?php echo $v['company_email']?></td>
                <td align="center"><?php echo $v['company_address']?></td>
                <td align="center"><?php echo $industries[$v['industry']]?></td>
                <td align="center"><?php echo $v['admin']['real_name']?></td>
                <td align="center"><?php echo $v['company_remark']?></td>
<!--                <td align="center"><?php echo $v['bank_name']?></td>
                <td align="center"><?php echo $v['bank_no']?></td>-->
                <td align="center">
                    <?php if($is_supper || $is_pmd_boss):?>
                    <a href="<?php echo U('Company/distribute', array('company_id'=>$v['company_id']))?>" class="btn btn-green" data-toggle="dialog" data-height="250" data-id="company-distribute" data-title="分配">分配</a>
                    <?php endif; ?>
                    <a href="<?php echo U('Company/edit', array('company_id'=>$v['company_id']))?>" class="btn btn-green" data-toggle="dialog" data-height="400" data-id="company-edit" data-title="编辑">编辑</a>
                    <a href="<?php echo U('Company/del', array('company_id'=>$v['company_id']))?>" class="btn btn-red" data-toggle="doajax" data-confirm-msg="确定要删除该行信息吗？">删</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<?php echo W('Layout/PageFooter', array($total));?>
<script>
    $(function(){
            for(var i=0;i<3;i++) {
                if($("select").get(0).options[i].value == '<?php echo ($post["status"]); ?>')  {
                    $("select").get(0).options[i].selected = true;  
                    break;
                }
            }
     })
    
</script>