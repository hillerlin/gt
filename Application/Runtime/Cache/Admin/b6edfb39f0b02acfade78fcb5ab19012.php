<?php if (!defined('THINK_PATH')) exit();?><div class="bjui-pageHeader">
    <form id="pagerForm" data-toggle="ajaxsearch" action="<?php echo U('FundManage/index')?>" method="post">
        <input type='hidden' name='isSearch' value='1'>
        <input type='hidden' name='isExport' value='0'>
        <input type="hidden" name="pageSize" value="${model.pageSize}">
        <input type="hidden" name="pageCurrent" value="${model.pageCurrent}">
        <input type="hidden" name="orderField" value="${param.orderField}">
        <input type="hidden" name="orderDirection" value="${param.orderDirection}">
        <div class="bjui-searchBar">
            <button data-url="<?php echo U('FundManage/add');?>" class="btn btn-blue" data-toggle="dialog" data-icon="plus"
                    data-mask='true' data-id="capital-flow-add" data-height="680" data-width="560" <?php if($roleId==27 || $roleId==13 || $roleId==7) echo 'style="display: none"';?>>新增
            </button>
            &nbsp;
            <button data-url="/Admin/FundManage/edit/fund_id/{#bjui-selected}" class="btn btn-blue" data-toggle="dialog"
                    data-icon="edit" data-mask='true' data-id="capital-flow-edit" data-height="680" data-width="560" <?php if($roleId==27 || $roleId==13 || $roleId==7) echo 'style="display: none"';?>>修改
            </button>
            &nbsp;

            <label>筛选类型:</label>
            <select name="selectType"  id="selectType" data-toggle="selectpicker" data-nextselect="#j_form_city1" onchange="filterEvent()">
                <option value="all">--请选择--</option>
                <option value="1">合伙企业</option>
                <option value="2">客户姓名</option>
                <option value="3">认购项目</option>
                <option value="4">客户经理</option>
                <option value="5">地区</option>
                <option value="6">分部</option>
                <option value="7">期限</option>
            </select>
            &nbsp;
            <label>请输入筛选内容：</label><input type="text" id="selectValue" value="" name="selectValue"
                                       class="form-control" size="10">&nbsp;
            <select name="selectTypeSecond" id="selectTypeSecond" onchange="secondFilterEvent()">

                <option value="all">--请选择--</option>
            </select>
            <label>请再次输入筛选内容：</label><input type="text" id="selectValue" value="" name="selectValueSecond"
                                          class="form-control" size="10">&nbsp;
            <label>打款起始时间：</label><input type="text" value="" data-toggle="datepicker" name="begin_time"
                                       class="form-control" size="12">&nbsp;
            <label>打款结束时间：</label><input type="text" value="" data-toggle="datepicker" name="end_time"
                                       class="form-control" size="12">&nbsp;
            <label>到期时间：</label><input type="text" value="" data-toggle="datepicker" name="expire_time"
                                         class="form-control" size="12">&nbsp;
            <select name="auditType" onchange="auditSubmit()">
                <option value="0">未审核</option>
                <option value="1">已审核</option>
                <option value="2">驳回</option>
                <option value="3">查看全部</option>
                </select>
            <button type="submit" class="btn-default" data-icon="search">查询</button>

            &nbsp;
            <a class="btn btn-orange" href="javascript:;" data-toggle="reloadsearch" data-clear-query="true"
               data-icon="undo">清空查询</a>

        </div>
    </form>

    <form id="pagerForm1" data-toggle="ajaxsearch" action="" method="post" <?php if($roleId==27 || $roleId==13 || $roleId==7 || $roleId==32) echo 'style="display: none"';?>>
    <div style="margin-left: 0;position:relative;z-index:999">
                <div id="j_custom_pic_up" data-toggle="upload" data-uploader="<?php echo U('FundManage/implodeExcel')?>"
                data-file-size-limit="1024000000"
                data-file-type-exts="*.xls;*.xlsx"
                data-auto="false"
                data-dragDrop="true"
                data-on-upload-success="excel_upload_success"
                data-icon="cloud-upload"></div>
            <input type="hidden" name="custom.pic" value="" id="j_custom_pic">
            <span id="j_custom_span_pic"></span>
        </div>
    </form>
<form id="pagerForm2"  action="<?php echo U('FundManage/exportExcel')?>" method="post" <?php if($roleId==27 || $roleId==13 || $roleId==7 || $roleId==32) echo 'style="display: none"';?>>
 <button onclick="_export()" id="exportSubmit" class="btn btn-blue" data-toggle="doexport" data-confirm-msg="确定要导出信息吗？">导出全部</button>
<input type="hidden" name="formVale">
</form>
    <script>
        //导出模块
        function _export() {
           // $("input[name='isExport']").val(1);
            var newUrl="<?php echo U('FundManage/exportExcel')?>"+'?'+$('#pagerForm').serialize();
            $('#pagerForm2').attr('action',newUrl)
            //$("input[name='formVale']").val($('#pagerForm').serialize());
            $('#pagerForm2').submit();
/*            $.post('/Admin/FundManage/testexport',$('#pagerForm').serialize(),function (date) {
                alert(date);
            });*/
            // window.location.href='/Admin/FundManage/testexport'
            //$("#pagerForm").submit();

        }
        var oldSelect=$("#selectType option");
        var newSelect=$("#selectTypeSecond");
        function filterEvent()
        {
            //var attr= str.split(',');
            //var attrIndex=jQuery.inArray(checkValue,attr);//查找下标
            //attr.splice(attrIndex,1);//剔除下标
            newSelect.empty();//重置select
            var __array = new Object();
            var checkValue=$("#selectType").val();//选中的value
            var str=oldSelect.map(function () {
                if($(this).val()!==checkValue && $(this).val()!='all')
                {
                    return __array[$(this).val()]=$(this).html()
                }
            }).get().join(',');
            var appendOption='<option value="all">--请选择--</option>';
            for(_key in __array)
            {
                appendOption+="<option value='"+_key+"'>"+__array[_key]+"</option>";

            }
            newSelect.append(appendOption);
        }
        function secondFilterEvent()
        {

        }

    </script>
</div>
<div class="bjui-pageContent tableContent">
    <table class="table table-bordered table-hover table-striped table-top">
        <thead>
        <tr>
            <?php if($roleId==32) { foreach($roleInfo as $rr=>$vv) { if($vv['field']=='pay_time' || $vv['field']=='begin_interest_time' || $vv['field']=='done_time') { echo "<th data-order-field='".$vv['field']."' data-order-direction='asc' align='center' width='100'>".$vv['name']."</th>"; } else { echo "<th data-order-field='".$vv['field']."' align='center' width='100'>".$vv['name']."</th>"; } } } else { ?>
            <th data-order-field="partnership" align="center" width="100">合伙企业</th>
            <th data-order-direction="asc" data-order-field="pay_time" align="center" width="100">打款时间</th>
            <th data-order-direction="asc" data-order-field="begin_interest_time" align="center" width="100">起息时间</th>
            <th data-order-direction="asc" data-order-field="done_time" align="center" width="100">成立时间</th>
            <th data-order-field="customer_name" align="center" width="100">客户姓名</th>
            <th data-order-field="fund_title" align="center" width="100">认购项目</th>
            <th data-order-field="money" align="center" width="100">金额(万元)</th>
            <th align="center" width="80">客户收益率（%）</th>
            <th data-order-field="term" align="center" width="50">期限</th>
            <th data-order-direction="asc" data-order-field="deadline" align="center" width="100">到期时间</th>
            <th data-order-field="real_name" align="center" width="80">客户经理</th>
            <th data-order-field="branch_name" align="center" width="80">地区</th>
            <th data-order-field="branch_name" align="center" width="80">分部</th>
            <th data-order-field="contract_no" align="center" width="100">合同编号</th>
            <th data-order-field="id_no" align="center" width="100">客户身份证</th>
            <th data-order-field="bank_no" align="center" width="100">客户银行卡号</th>
            <th data-order-field="link_type" align="center" width="100">联系方式</th>
            <!--<th align="center" width="100%">备注</th>-->
            <th align="center" width="80">业绩提成率（%）</th>
            <th align="center" width="80">管理津贴率（%）</th>
            <th align="center" width="80" data-order-direction='asc' data-order-field="isaudit" style="white-space: nowrap;">审核状态</th>
            <th align="center" width="500" style="white-space: nowrap;">合同</th>
            <th align="center" width="200" style="white-space: nowrap;">打款凭证</th>
            <th align="center" width="450">操作</th>
            <?php
 } ?>
        </tr>
        </thead>
        <tbody>

            <?php if($roleId==32) { foreach($list as $v){ ?>
            <tr data-id="<?php echo $v['fund_id']?>">
            <td align="center"><?php echo date('Y-m-d',$v['pay_time'])?></td>
            <td align="center"><?php echo date('Y-m-d',$v['begin_interest_time'])?></td>
            <td align="center"><?php echo $v['customer_name']?></td>
            <td align="center"><?php echo $v['fund_title']?></td>
            <td align="center"
            <?php echo $v['money'] > 0 ? 'class="red"' : ''?>><?php echo number_format($v['money'] , 2)?></td>
            <td align="center"><?php echo $v['fund_rate']?></td>
            <td align="center"><?php echo $v['term']?></td>
            <td align="center"><?php echo $v['real_name']?></td>
            <td align="center"><?php echo $v['branch_name']?></td>
            <td align="center"><?php echo $v['remark']?></td>
        </tr>
        <?php }}else{ foreach($list as $vv){ ?>
            <tr data-id="<?php echo $vv['fund_id']?>">
        <td align="center"><?php echo $vv['partnership']?></td>
        <td align="center"><?php echo date('Y-m-d',$vv['pay_time'])?></td>
        <td align="center"><?php echo date('Y-m-d',$vv['begin_interest_time'])?></td>
        <td align="center"><?php echo date('Y-m-d',$vv['done_time'])?></td>
        <td align="center"><?php echo $vv['customer_name']?></td>
        <td align="center"><?php echo $vv['fund_title']?></td>
        <td align="center"
        <?php echo $vv['money'] > 0 ? 'class="red"' : ''?>><?php echo number_format($vv['money'] , 2)?></td>
        <td align="center"><?php echo $vv['fund_rate']?></td>
        <td align="center"><?php echo $vv['term']?></td>
        <td align="center"><?php echo date('Y-m-d',$vv['deadline'])?></td>
        <td align="center"><?php echo $vv['real_name']?></td>
        <td align="center"><?php echo $vv['branch_name']?></td>
        <td align="center"><?php echo $vv['branch_ch_name']?></td>
        <td align="center"><?php echo $vv['contract_no']?></td>
        <td align="center"><?php echo $vv['id_no']?></td>
        <td align="center"><?php echo $vv['bank_no']?></td>
        <td align="center"><?php echo $vv['link_type']?></td>
        <!--      <td align="center"><?php echo $v['remark']?></td>-->
        <td align="center"><?php echo $vv['performance_rate']?></td>
        <td align="center"><?php echo $vv['manage_rate']?></td>
                <!--(intval($vv['isaudit'])==2)?'驳回':'<span style="color:red">未审核</span>'-->
        <td align="center"><?php  echo intval($vv['isaudit'])==1?'已审核':(intval($vv['isaudit'])==2?'<span style="color:red">驳回</span>':'<span style="color:red">未审核</span>') ; ?>
        </td>
                <td align="center"> <a href="<?php echo U('FundManage/contractInfoEdit', array('fund_id'=>$vv['fund_id']))?>" class="btn btn-green"
                                       data-toggle="dialog" data-mask="true" data-height="500" data-width="950" data-id="project-audit"
                                       data-title="合同编辑"><?php if($vv['contract_file']){ echo '编辑';}else{ echo '<em style="color:red">上传</em>'; }?></a>
                    <?php if($vv['contract_file']):?>
                                     <a href="<?php echo U('FundManage/contractInfoDetail', array('fund_id'=>$vv['fund_id']))?>" class="btn btn-green"
                                       data-toggle="dialog" data-mask="true" data-height="500" data-width="950" data-id="project-audit"
                                       data-title="合同预览">预览</a>
                    <?php endif;?>
                </td>
                <td align="center"><a href="<?php echo U('FundManage/contractInfoEdit', array('fund_id'=>$vv['fund_id'],'type'=>1))?>" class="btn btn-green"
                                      data-toggle="dialog" data-mask="true" data-height="500" data-width="950" data-id="project-audit"
                                      data-title="打款编辑"><?php if($vv['file_path']){ echo '编辑';}else{ echo '<em style="color:red">上传</em>';}?></a>
                    <?php if($vv['file_path']):?>
                                    <a href="<?php echo U('FundManage/contractInfoDetail', array('fund_id'=>$vv['fund_id'],'type'=>1))?>" class="btn btn-green"
                                      data-toggle="dialog" data-mask="true" data-height="500" data-width="950" data-id="project-audit"
                                       data-title="打款预览">预览</a>
                    <?php endif;?>
                </td>
        <td align="center">
            <a href="<?php echo U('FundManage/rateInfo', array('fund_id'=>$vv['fund_id']))?>" class="btn btn-green"
               data-toggle="dialog" data-mask="true" data-height="900" data-width="800" data-id="project-audit"
               data-reload-warn="本页已有打开的内容，确定将刷新本页内容，是否继续？" data-title="利息详情">利息详情</a>
        </td>
        </tr>
        <?php } } ?>

        </tbody>
    </table>
</div>
<div class="bjui-pageFooter">
    <div class="pages">
        <span>每页&nbsp;</span>
        <div class="selectPagesize">
            <select data-toggle="selectpicker" data-toggle-change="changepagesize">
                <option value="30">30</option>
                <option value="60">60</option>
                <option value="120">120</option>
                <option value="150">150</option>
            </select>
        </div>
        <span>&nbsp;条，共 <?php echo $total?> 条</span>
    </div>
    <div class="pagination-box" data-toggle="pagination" data-total="<?php echo $total?>" data-page-size="30"
         data-page-current="1">
    </div>
</div>
<script type="text/javascript">
    function excel_upload_success(file, data) {
        var json = $.parseJSON(data)
        $(this).bjuiajax('ajaxDone', json)
        if (json[BJUI.keys.statusCode] == BJUI.statusCode.ok) {
            add_uploadedfile(json.content);
        }
    }
</script>